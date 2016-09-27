<html>
    <head>
        <meta charset="UTF-8">
        <title>Category</title>
    </head>
    <body>
        <?php include '../access.php'; ?>
<form method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Cate_Name: </td>
            <td><input type="text" name="cate_name"></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"></td>
            <td><input type="submit" value="Create" name="post"></td>
        </tr>
    </table>
</form>
<?php
    if (isset($_POST['post'])) {
        $cate_name = $_POST['cate_name'];
        $desc = $_POST['description'];
        $user_id = $_SESSION['user_id'];
                
        include '../../config.php';
        mysql_query("insert into category(cate_name, description, user_id) values('$cate_name','$desc', '$user_id')") or die('loi truy van');
        header('location: index.php');
    }
?>
    </body>
</html>