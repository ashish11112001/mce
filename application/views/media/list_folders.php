<style>
    .card-folders .card-body>.breadcrumb {
        margin-left: -1.25em;
        margin-right: -1.25em;
        margin-top: -1.25em;
        border-radius: 0;
    }

    .folder-container {
        text-align: center;
        margin-left: 1rem;
        margin-right: 1rem;
        margin-bottom: 1.5rem;
        width: 100px;
        padding: 0;
        align-self: start;
        background: none;
        border: none;
        outline-color: transparent !important;
        cursor: pointer;
    }

    .folder-icon {
        font-size: 3em;
        line-height: 1.25em;
    }

    .file-icon-color {
        color: #5f5d58;
        text-shadow: 1px 1px 0px #5a5a5a;
    }

    .folder-icon-color {
        color: #ffc107;
        text-shadow: 1px 1px 0px #e0a800;
    }

    .folder-name {
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }

    .flex-column .folder-container {
        display: flex;
        width: auto;
        min-width: 100px;
        text-align: left;
        margin: 0;
        margin-bottom: 1rem;
    }

    .flex-column .folder-icon,
    .flex-column .folder-name {
        display: inline-flex;
    }

    .flex-column .folder-icon {
        font-size: 1.4em;
        margin-right: 1rem;
    }

    .file-icon-color {
        color: #999;
    }
</style>
<main id="main-container">
    <div class="content">

        <div class="card card-folders">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col mr-auto">
                        <h4 class="card-title m-0">Folders</h4>
                    </div>
                    <div class="col col-auto pr-2">
                        <div class="btn-group">
                            <a href="<?php echo base_url('media/createFolderForm/'.$folder); ?>" class="btn btn-sm btn-outline-secondary outline-none active">Create Folder</a> 
                            <a href="<?php echo base_url('media/uploadFile'); ?>" class="btn btn-sm btn-outline-primary  outline-none active">Upload File</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Folders Container -->
            <div class="card-body" id="foldersGroup">

                <div id="main-folders" class="d-flex align-items-stretch flex-wrap">
                    <?php if (!empty($folders)) : 
                       
                        ?>
                        <?php foreach ($folders as $folder) :
                            $fld= rtrim($folder['Prefix'], '/');
                             ?>
                            <div class="d-inline-flex">
                                <a href="<?php echo base_url('media/listFolders/'.$fld); ?>">
                                <button class="folder-container">
                                    <div class="folder-icon">
                                        <i class="fa fa-folder folder-icon-color"></i>
                                    </div>
                                    <div class="folder-name"><?php echo rtrim($folder['Prefix'], '/'); ?></div>
                                    </button>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <p>No folders found.</p>
                    <?php endif; ?>

                    <?php if (!empty($files)) : 
                        
                        ?>
                        <?php foreach ($files as $file) : var_dump($file);?>
                            <div class="d-inline-flex">
                                <button class="folder-container">
                                    <div class="folder-icon">
                                        <i class="fa fa-file file-icon-color"></i>
                                    </div>
                                    <div class="folder-name"><?php echo $file; ?></div>
                                </button>
                            </div>
                        <?php endforeach; ?>


                    <?php endif; ?>
                </div>
            </div>
            <!-- End Folders Container -->

        </div>

    </div>
</main>