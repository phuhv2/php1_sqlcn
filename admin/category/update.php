<?php include '../access.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $id = $_GET['id'];
    if(isset($_POST['post'])){
            $name = $_POST['cate_name'];
            $desc = $_POST['description'];
            mysql_query("update category set cate_name='$name', description='$desc' where id = '$id'") or die('loi truy van 1');
            header('location: index.php');
        }
    $qr = mysql_query("select * from category where id = '$id'") or die('Loi truy van 1');
    $rs = mysql_fetch_array($qr);
?>
<form method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Cate_Name: </td>
            <td><input type="text" name="cate_name" value="<?php echo $rs['cate_name'];?>"></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?php echo $rs['description'];?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="post" value="Update"></td>
        </tr>
    </table>
</form>
    </body>
</html>
