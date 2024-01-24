<!DOCTYPE html>
<html>
<head>
    <title>Folder Contents</title>
</head>
<body>
    <!-- Display current folder path -->
    <h2>Current Folder: <?php echo $currentFolderPath; ?></h2>

    <!-- Display folders -->
    <?php if (!empty($folders)): ?>
        <ul>
            <?php foreach ($folders as $folder): ?>
                <li>
                    <a href="<?php echo base_url('your_controller/viewFolderContents') . '?folder=' . $currentFolderPath . '/' . rtrim($folder['Prefix'], '/'); ?>" target="_blank">
                        <?php echo rtrim($folder['Prefix'], '/'); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No folders found in the current folder.</p>
    <?php endif; ?>

    <!-- Display files if needed -->
</body>
</html>
