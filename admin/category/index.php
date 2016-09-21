<?php include '../access.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category</title>
    </head>
    <body>
        <h1>Category</h1>
        <table border="1" width="60%">
            <thead>
		<tr>
                    <td>Cate_Name</td>
                    <td>Description</td>
                    <td>Edit</td>
		</tr>
            </thead>
            <tbody>
                <?php
                    $query = mysql_query("select * from category") or die('Loi truy van');
                    while($rs = mysql_fetch_array($query)){
                        echo '<tr>';
                        echo '<td>'.$rs['cate_name'].'</td>';
                        echo '<td>'.$rs['description'].'</td>';
                        echo '<td><a href="delete.php?id='.$rs['id'].'">Xóa</a> | <a href="update.php?id='.$rs['id'].'">Sửa</a></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table><br/>
        <a href="create.php">Thêm mới</a>
    </body>
</html>
