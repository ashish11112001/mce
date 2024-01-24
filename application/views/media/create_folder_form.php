<main id="main-container">
    <div class="content">
        <h2>Create Folder</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open('media/createFolder/'.$folder); ?>
            <div class="form-group">
                <label for="folder_name">Folder Name:</label>
                <input type="text" class="form-control" name="folder_name" placeholder="Enter folder name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Folder</button>
        <?php echo form_close(); ?>
    </div>
</main>

