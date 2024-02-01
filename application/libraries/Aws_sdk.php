<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/aws-sdk-php/aws-autoloader.php'; // Path to autoload.php

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


class Aws_sdk {
    protected $CI;
    protected $sdk;


    public function __construct() {
        $this->CI =& get_instance();

        // Load AWS configuration from CodeIgniter config file
      

        // Initialize S3 client
        $credentials = [
            'key'    => ${{ secrets.KEY }}, // Replace with your AWS access key
            'secret' => ${{ secrets.SECRET_ID }}, // Replace with your AWS secret key
        ];

        $config = [
            'version' => 'latest',
            'region' => 'ap-south-1',
            'credentials' => $credentials
        ];

        try {
            $this->s3 = new S3Client($config);
        } catch (AwsException $e) {
            log_message('error', 'AWS SDK initialization error: ' . $e->getMessage());
            $this->s3 = null;
        }
    }

    public function createFolder($folderName, $bucketName) {
        try {
            $this->s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $folderName . '/',
                'Body' => ''
            ]);
            return true;
        } catch (AwsException $e) {
            log_message('error', 'Error creating folder: ' . $e->getMessage());
            return false;
        }
    }

    public function uploadFile($filePath, $bucketName, $folderName = '', $key = null) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }
    
        try {
            $key = ($key !== null) ? $key : ($folderName !== '' ? $folderName . '' . basename($filePath) : basename($filePath));
    
        //    var_dump($key);
        //    var_dump($filePath);
        //    die();
            
            $result = $this->s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $key,
                'SourceFile' => $filePath,
                // 'ACL' => 'public-read' // Set appropriate permissions
            ]);
    
            return $result;
        } catch (AwsException $e) {
            log_message('error', 'Error uploading file: ' . $e->getMessage());
            return $e->getMessage();
            
        }
    }


    public function listObjects($bucketName) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }

        try {
            $folders = [];
            $files = [];

            $objects = $this->s3->listObjectsV2([
                'Bucket' => $bucketName
            ]);

            foreach ($objects['Contents'] as $object) {
                if (substr($object['Key'], -1) === '/') {
                    $folders[] = $object['Key'];
                } else {
                    $files[] = $object['Key'];
                }
            }

            return [
                'folders' => $folders,
                'files' => $files
            ];
        } catch (AwsException $e) {
            log_message('error', 'Error listing objects: ' . $e->getMessage());
            return [];
        }
    }

    public function listObjectsInFolder($bucketName, $folderName) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }
    
        try {
            $objects = $this->s3->listObjectsV2([
                'Bucket' => $bucketName,
                'Prefix' => $folderName . '/',
                'Delimiter' => '/'
            ]);
    
            // $folders = isset($objects['CommonPrefixes']) ? $objects['CommonPrefixes'] : [];
            // $files = isset($objects['Contents']) ? $objects['Contents'] : [];
    
            // return [
            //     'folders' => $folders,
            //     'files' => $files
            // ];
            $result = [];

            // List files
            if (isset($objects['Contents'])) {
                foreach ($objects['Contents'] as $object) {
                    $result['files'] = [
                        'name' => basename($object['Key']),
                        'url' => $this->getFileURL($bucketName, $object['Key'])
                    ];
                }
            }
    
            // List folders
            if (isset($objects['CommonPrefixes'])) {
                foreach ($objects['CommonPrefixes'] as $folder) {
                    $result['folders'] = [
                        'name' => rtrim(basename($folder['Prefix']), '/'),
                        'url' => $this->getFolderURL($bucketName, rtrim($folder['Prefix'], '/'))
                    ];
                }
            }

            return $result;




        } catch (AwsException $e) {
            log_message('error', 'Error listing objects: ' . $e->getMessage());
            return [];
        }
    }

    public function createFolderInFolder($bucketName, $parentFolder, $newFolderName) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }
    
        try {
            $result = $this->s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $parentFolder . '/' . $newFolderName . '/', // Appending '/' to indicate a folder
                'Body' => ''
            ]);
    
            return $result;
        } catch (AwsException $e) {
            log_message('error', 'Error creating folder: ' . $e->getMessage());
            return false;
        }
    }

    public function createAnyFolder($bucketName, $folderPath) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }
    
        try {
            // Check if folderPath has a trailing slash to indicate a folder
            $endsWithSlash = substr($folderPath, -1) === '/';
    
            // Check if folderPath contains a slash to determine if it's a root folder or inner folder
            $isRootFolder = (strpos($folderPath, '/') === false);
    
            if ($isRootFolder) {
                // Creating a root folder (without any inner parent folder)
                if (!$endsWithSlash) {
                    $folderPath .= '/'; // Append a trailing slash to indicate a folder
                }
            } else {
                // Creating an inner folder inside an existing folder
                $parentFolder = dirname($folderPath);
    
                // Check if the parent folder ends with a slash; if not, append it
                if (substr($parentFolder, -1) !== '/') {
                    $parentFolder .= '/';
                }
    
                // Create the inner folder
                $this->s3->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $folderPath . '/',
                    'Body' => ''
                ]);
            }
    
            return true;
        } catch (AwsException $e) {
            log_message('error', 'Error creating folder: ' . $e->getMessage());
            return false;
        }
    }
    public function listRootObjects($bucketName) {
        if ($this->s3 === null) {
            log_message('error', 'S3 client not initialized.');
            return false;
        }
    
        try {
            $objects = $this->s3->listObjectsV2([
                'Bucket' => $bucketName,
                'Delimiter' => '/'
            ]);
    
            $files = isset($objects['Contents']) ? $objects['Contents'] : [];
            $folders = isset($objects['CommonPrefixes']) ? $objects['CommonPrefixes'] : [];
    
            return [
                'files' => $files,
                'folders' => $folders
            ];
        } catch (AwsException $e) {
            log_message('error', 'Error listing objects: ' . $e->getMessage());
            return [];
        }
    }
    public function getFolderURL($bucketName, $folderPath) {
        // Replace 'us-east-1' with your actual AWS region
        $region = 'ap-south-1'; 
    
        // Construct folder URL
        $folderURL = "https://s3-$region.amazonaws.com/$bucketName/$folderPath/";
    
        return $folderURL;
    }

    public function getFileURL($bucketName, $filePath) {
        $region = 'ap-south-1'; // Replace with your AWS region
    
        // Construct file URL
        $fileURL = "https://s3-$region.amazonaws.com/$bucketName/$filePath";
    
        return $fileURL;
    }

    public function listObjectsInFolder1($bucketName, $folderName)
    {

        // var_dump($folderName);
        // die();
        try {
            $objects = $this->s3->listObjectsV2([
                'Bucket' => $bucketName,
                'Prefix' => $folderName,
                'Delimiter' => '/'
            ]);

            $result = [];

            if (isset($objects['Contents'])) {
                $result['files'] = $objects['Contents'];
            }

            if (isset($objects['CommonPrefixes'])) {
                $result['folders'] = $objects['CommonPrefixes'];
            }


            
    
            


            return $result;
        } catch (AwsException $e) {
            log_message('error', 'Error listing objects: ' . $e->getMessage());
            return [];
        }
    }

    public function createFolderAtCurrentPath($bucketName, $currentPath, $newFolderName)
{
    try {
        // Ensure the current path ends with a trailing slash
        if (substr($currentPath, -1) !== '/' && $currentPath!='') {
            $currentPath .= '/';
        }

        $folderPath = $currentPath . $newFolderName . '/'; // New folder path

      

        $result = $this->s3->putObject([
            'Bucket' => $bucketName,
            'Key'    => $folderPath, // Key represents the folder path
            'Body'   => ''
        ]);

        if ($result) {
            return true; // Folder creation successful
        } else {
            return false; // Failed to create the folder
        }
    } catch (AwsException $e) {
        log_message('error', 'Error creating folder: ' . $e->getMessage());
        return false;
    }
}


    public function getSdk() {
        return $this->sdk;
    }
}
