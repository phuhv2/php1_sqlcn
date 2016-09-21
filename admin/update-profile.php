<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Profile</title>
    </head>
    <body>
        <?php 
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            session_start();
            echo '<a href="index.php">Bấm vào đây để quay lại<br></a>';
            include '../config.php';
            
            if(!$_SESSION['user_id']) { 
                echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
            } else { 
            $user_id = intval($_SESSION['user_id']);
            $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
            $member = @mysql_fetch_array( $sql_query ); 
            $thanhcong = 'Sửa thành công <a href="index.php">Quay lại</a>';
            $kothanh = 'Sửa ko thành công';
            echo "<b>Sửa thông tin tài khoản {$member['username']}</b>.<br>"; 
            
            if ($_GET['do']=="sua") {
		$ten = addslashes( $_POST['name'] );
		$pass = md5( addslashes( $_POST['pass'] ) );
		$address = addslashes( $_POST['address'] );
		$mobile = addslashes( $_POST['mobile'] );
		$email = addslashes( $_POST['email'] );
                
		$sql="
		UPDATE `members` SET
		`address` = '".$address."',
		`name` = '".$ten."',
		`mobile` = '".$mobile."',
		`email` = '".$email."' WHERE `id` =$user_id LIMIT 1 ;";
		
		if($sua=mysql_query($sql)) {
                    echo $thanhcong;
                } else {
                    echo $kothanh;
                }	
		if ($_POST['pass']!="") {
                    $sqlx="UPDATE `members` SET `password` = '".$pass."' WHERE `id` = '$user_id' LIMIT 1 ;";
                    $suapass=mysql_query($sqlx) or die('loi truy van');
                    if($suapass) {
                        echo "(Đã đổi pass) ";
                    } else {
                    echo "(Chưa đổi pass) ";
                    }
		}
	} else {
        echo "
        <form method='POST' action='?do=sua'>
            <table>
                <tr>
                    <td>Tên:</td>
                    <td><input type='text' value='{$member['name']}' name='name' size='20'></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type='text' name='email' value='{$member['email']}' size='20'></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type='text' value='{$member['address']}' name='address' size='20'></td>
                </tr>
                <tr>
                    <td>SĐT:</td>
                    <td><input type='text' name='mobile' value='{$member['mobile']}' size='20'></td>
                </tr>
                <tr>
                    <td>Pass:</td>
                    <td><input type='password' name='pass' size='20'></td>
                </tr>
                <tr>
                    <td><input type='submit' value='Sửa'></td>
                    <td><input type='reset' value='Khôi phục' name='B2'></td>
                </tr>
            </table>
        </form>
        ";
        } 
    }
?>
    </body>
</html>
