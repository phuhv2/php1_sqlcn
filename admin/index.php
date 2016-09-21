<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
    </head>
    <body>
        <?php 
        //Hide Undefined index
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        session_start();
        header('Content-Type: text/html; charset=UTF-8');
        include '../config.php';
        if (!$_SESSION['user_id']){ 
            echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
        } else {
                $user_id = intval($_SESSION['user_id']);
                $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
                $member = @mysql_fetch_array( $sql_query ); 
                echo "Bạn đang đăng nhập với tài khoản {$member['username']}."; 
                echo "<br><a href='update-profile.php'>Sửa thông tin</a>";
                if ($member['admin']=="1")  echo "<br><a href='admin-cp.php'>Trang quản trị</a>";
                echo "<br><a href='logout.php'>Thoát ra</a>";
            } 
        ?>
    </body>
</html>
