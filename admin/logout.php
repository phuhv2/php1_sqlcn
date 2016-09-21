<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout</title>
    </head>
    <body>
        <?php
            session_start();
            if (session_destroy()) {
                echo "Thoát thành công!";
                echo '<br><a href="index.php">Bấm vào đây để quay lại trang chủ</a><br>';
            } else {
                echo "Error!";;
            }
        ?>
    </body>
</html>
