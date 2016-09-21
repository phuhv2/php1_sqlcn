<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
    <form action="" method="post">
	<table width="400" cellspacing="1">
		<tr>
			<td>Tên truy nhập:</td>
			<td><input type="text" name="username" value=""></td>
		</tr>
		<tr>
			<td>Mật khẩu:</td>
			<td><input type="password" name="password" value=""></td>
		</tr>
		<tr>
			<td>Xác nhận mật khẩu:</td>
			<td><input type="password" name="verify_password" value=""></td>
		</tr>
                <tr>
			<td>Tên:</td>
			<td><input type="text" name="name" value=""></td>
		</tr>
		<tr>
			<td>Địa chỉ E-mail:</td>
			<td><input type="text" name="email" value=""></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><input type="text" name="address" value=""></td>
		</tr>
		<tr>
			<td>SĐT:</td>
			<td><input type="text" name="mobile" value=""></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Đăng ký tài khoản"></td>
			<td></td>
		</tr>
            </table>
        </form>
        <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        include '../config.php';
            function check_email($email) {
                if (strlen($email) == 0) return false;
                if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
                return false;
                }
            if(isset($_POST['submit'])){
                $username = addslashes($_POST['username']);
                $password = md5(addslashes($_POST['password']));
                $verify_password = md5(addslashes( $_POST['verify_password']));
                $ten = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $address = addslashes($_POST['address']);
                $mobile = addslashes($_POST['mobile']);
                
            if(!$username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $email || ! $ten || ! $address || ! $mobile) {
		echo "Xin vui lòng nhập đầy đủ các thông tin. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            if (mysql_num_rows(mysql_query("SELECT username FROM members WHERE username='$username'"))>0) {
		echo "Username này đã có người dùng, Bạn vui lòng chọn username khác. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            if ( mysql_num_rows(mysql_query("SELECT email FROM members WHERE email='$email'"))>0) {
		echo "Email này đã có người dùng, Bạn vui lòng chọn Email khác. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            if (!check_email($email)) {
		echo "Email này ko hợp lệ. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            if ( $password != $verify_password ){
		echo "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
		exit;
            }
            mysql_query("INSERT INTO members (username, password, name, email, address, mobile) VALUES ('$username', '$password', '$ten', '$email', '$address', '$mobile')") or die('loi truy van');
            echo "Tài khoản $username đã được tạo. <a href='login.php'>Nhấp vào đây để đăng nhập</a>";
            }
        ?>
    </body>
</html>
