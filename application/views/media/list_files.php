<!DOCTYPE html>
<html>
<head>
    <title>List of Files</title>
</head>
<body>
    <h2>List of Files</h2>
    <?php if (!empty($files)): ?>
        <ul>
        <?php foreach ($files as $file): ?>
            <li><?php echo $file['Key']; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No files found.</p>
    <?php endif; ?>
</body>
</html>
