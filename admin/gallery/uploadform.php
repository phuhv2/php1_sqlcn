<?php include '../access.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create</title>
    </head>
    <body>
        <h2>Gallery</h2>
        <?php if (count($files) == 0) : ?>
            <p>No images uploaded.</p>
        <?php else: ?>
            <ul>
            <?php foreach($files as $filename) :
                $file_url = $image_dir . '/' .
                            $filename;
                $delete_url = '.?action=delete&filename=' .
                              urlencode($filename);
            ?>
                <li>
                    <img width="100px" src="../../uploads/<?php echo $filename; ?>"><br/>
                    <a href="<?php echo $delete_url;?>">
                        <img src="delete.png" alt="Delete"/></a>
                    <a href="<?php echo $file_url; ?>">
                        <?php echo $filename; ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </body>
</html>