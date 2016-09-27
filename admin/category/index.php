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
                    <td>Create_By</td>
                    <td>Edit</td>
		</tr>
            </thead>
            <tbody>
                <?php
                    $query = mysql_query("select * from category") or die('Loi truy van');
                    while($rs = mysql_fetch_array($query)){
                        ?>
                <tr>
                    <td><?php echo $rs['cate_name']; ?></td>
                    <td><?php echo $rs['description']; ?></td>
                    <td>
                        <?php 
                            $user_id = $rs['user_id'];
                            $query2 = mysql_query("select id, username from members where id='$user_id'") or die('Loi truy van 2');
                            while($rs2 = mysql_fetch_array($query2)){
                                echo $rs2['username'];
                            }
                        ?>
                    </td>
                    <td><a href="delete.php?id=<?php echo $rs['id']; ?>">Xóa</a> | <a href="update.php?id=<?php echo $rs['id']; ?>">Sửa</a></td>
                </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table><br/>
        <a href="create.php">Thêm mới</a>
    </body>
</html>
