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
                        <button type="button" class="btn btn-sm btn-outline-secondary outline-none active" data-toggle="modal" data-target="#myModalfolder">Create Folder</button>
                        <button type="button" class="btn btn-sm btn-outline-primary  outline-none active" data-toggle="modal" data-target="#myModalfile">Upload File</button>
                         </div>
                    </div>
                </div>
            </div>
            <!-- Folders Container -->
            <div class="card-body" id="foldersGroup">

                <div id="main-folders" class="d-flex align-items-stretch flex-wrap">
                    <?php if (!empty($objects['folders'])) : 
                       
                        ?>
                         <?php foreach ($objects['folders'] as $folder) : 
                           
                            ?>
                            <div class="d-inline-flex">
                                <a href="<?php echo base_url('media/viewFolderContents') . '?folder=' . $folder['Prefix']; ?>">
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

                    <?php if (!empty($objects['files'] )) : 
                        
                        ?>
                       <?php foreach ($objects['files'] as $file) : ?>
                            <div class="d-inline-flex">
                                <button class="folder-container fold"  id="https://file--storage.s3.ap-south-1.amazonaws.com/<?php echo $file['Key'];  ?>">
                                    <div class="folder-icon">
                                        <i class="fa fa-file file-icon-color"></i>
                                    </div>
                                    <div class="folder-name"><?php echo $file['Key']; ?></div>
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
<div id="myModalfolder" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFolderModalLabel">Create New Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="folderForm" action="<?php echo base_url('media/createNewFolder'); ?>" method="post">
          <div class="form-group">
            <label for="folderName">Folder Name:</label>
            <input type="text" id="newFolderName" name="newFolderName" class="form-control" required>
        <input type="hidden" name="currentPath" value="<?php echo $currentFolderPath; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>

  </div>
</div>

<div id="myModalfile" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFolderModalLabel">Upload New File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="folderForm" enctype="multipart/form-data" action="<?php echo base_url('media/uploadFile'); ?>" method="post">
          <div class="form-group">
            <label for="folderName">Select File:</label>
         
            <input type="file" class="form-control" name="userfile" required>
        <input type="hidden" name="folder_name" value="<?php echo $currentFolderPath; ?>">
          </div>
          <button type="submit" class="btn btn-primary">upload</button>
        </form>
      </div>
    </div>

  </div>
</div>
<script>
$(".fold").click(function() {
    // or alert($(this).attr('id'));
    var str = this.id;
    alert("Path Copied");
    const el = document.createElement('textarea');
        el.value = str;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
});
</script>