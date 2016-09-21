<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            session_start();
            include '../config.php';
            if(isset($_POST['submit'])) {
            
            $username = addslashes($_POST['username']);
            $password = md5(addslashes($_POST['password']));
            
            $query = mysql_query("SELECT id, username, password FROM members WHERE username='{$username}'");
            $member = mysql_fetch_array($query);
            
            if(mysql_num_rows($query) <= 0 ){
		echo "Tên truy nhập không tồn tại. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            if ($password != $member['password']){
		echo "Nhập sai mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            
            $_SESSION['user_id'] = $member['id'];
            $_SESSION['user_admin'] = $member['admin'];
            echo "Bạn đã đăng nhập với tài khoản {$member['username']} thành công. <a href='index.php'>Nhấp vào đây để vào trang chủ</a>";
            }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tên truy nhập:</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
