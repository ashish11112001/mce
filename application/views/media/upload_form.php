<main id="main-container">
    <div class="content">
        <h2>Upload File</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('media/uploadFile'); ?>
        <div class="form-group">
            <label for="folder_name">Select Folder:</label>
            <select name="folder_name" class="form-control">
                <?php foreach ($folders as $folder) : ?>
                    <option value="<?php echo $folder['Prefix']; ?>"><?php echo $folder['Prefix']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="userfile">Select File:</label>
            <input type="file" class="form-control-file" name="userfile" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
        <?php echo form_close(); ?>
    </div>

</main>