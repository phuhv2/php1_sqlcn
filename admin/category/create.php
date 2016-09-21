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
            <td></td>
            <td><input type="submit" value="Create" name="post"></td>
        </tr>
    </table>
</form>
<?php
    if (isset($_POST['post'])) {
        $cate_name = $_POST['cate_name'];
        $desc = $_POST['description'];
                
        include '../../config.php';
        mysql_query("insert into category(cate_name, description) values('$cate_name','$desc')") or die('loi truy van');
        header('location: index.php');
    }
?>