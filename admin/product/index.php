<?php include '../access.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
    </head>
    <body>
        <h1>Danh sách sản phẩm</h1>
        <table border="1" width="100%">
            <thead>
		<tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Cate_id</td>
                    <td>Price</td>
                    <td>Image</td>
                    <td>Edit</td>
		</tr>
            </thead>
            <tbody>
                <?php
                    $query = mysql_query("select * from products") or die('Loi truy van');
                    while($rs = mysql_fetch_array($query)){
                        ?>
                <tr>
                    <td><?php echo $rs['name']; ?></td>
                    <td><?php echo $rs['description']; ?></td>
                    <td>
                        <?php 
                            $cate_id = $rs['cate_id'];
                            $query2 = mysql_query("select id, cate_name from category where id=$cate_id") or die('Loi truy van');
                            while($rs2 = mysql_fetch_array($query2)){
                                echo $rs2['cate_name'];
                            }
                        ?>
                    </td>
                    <td><?php echo $rs['price']; ?></td>
                    <td><img width="100px" src="../../uploads/<?php echo $rs['images']; ?>"></td>
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