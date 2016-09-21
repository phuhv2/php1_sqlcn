<?php include '../access.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create</title>
    </head>
    <body>
<?php
	$id = $_GET['id'];
	if(isset($_POST['post'])){
            if($_FILES['images']['name'] == ""){
                $name = $_POST['name'];
                $desc = $_POST['description'];
                $price = $_POST['price'];
                $cate = $_POST['cate_id'];
                mysql_query("update products set name='$name', description='$desc', price='$price', cate_id='$cate' where id = '$id'") or die('loi truy van 1');
                header('location: index.php');
            } else {
                if(isset($_FILES['images'])) {
                    if ($_FILES["images"]["size"] > 5000000) {
                        echo "Sorry, your file is too large.";
                        $_FILES['images']['error'] = 1;
                    }

                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["images"]["name"]);
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $_FILES['images']['error'] = 1;
                    }

                    if ($_FILES['images']['error'] > 0) {
                        echo 'File Upload Error';
                    } else {
                        $file_name = preg_replace('/[^a-zA-Z0-9\.\-]/', '', $_FILES['images']['name']);
                        move_uploaded_file($_FILES['images']['tmp_name'], '../../uploads/'.  time().'-'.$file_name);
                        $name = $_POST['name'];
                        $desc = $_POST['description'];
                        $price = $_POST['price'];
                        $cate = $_POST['cate_id'];
                        $images = time().'-'.$file_name;
                        mysql_query("update products set name='$name', description='$desc', price='$price', images='$images', cate_id='$cate' where id = '$id'") or die('loi truy van 2');
                        header('location: index.php');
                    }
                }
            }
	}
	$qr = mysql_query("select * from products where id = '$id'") or die('Loi truy van 1');
	$rs = mysql_fetch_array($qr);
?>
<form method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" value="<?php echo $rs['name'];?>"></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?php echo $rs['description'];?>"></td>
        </tr>
        <tr>
            <td>Price: </td>
            <td><input type="text" name="price" value="<?php echo $rs['price'];?>"></td>
        </tr>
        <tr>
            <td>Image: </td>
            <td><input type="file" name="images"></td>
        </tr>
        <tr>
            <td>Category: </td>
            <td>
                <select name="cate_id">
                        <?php 
                            $query2 = mysql_query("select id, cate_name from category") or die('Loi truy van');
                            while($rs2 = mysql_fetch_array($query2)){
                        ?>
                        <option value="<?php echo $rs2['id']; ?>">
                            <?php echo $rs2['cate_name']; ?>
                        </option>
                            <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="post" value="Update"></td>
        </tr>
    </table>
</form>
    </body>
</html>