<?php include '../access.php'; ?>
<?php
    $id = $_GET['id'];
    mysql_query("delete from category where id = '$id'") or die('loi truy van');
    header('location: index.php');
?>