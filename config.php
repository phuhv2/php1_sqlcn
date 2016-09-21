<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $conn = mysql_connect($server, $user, $pass) or die('Loi ket noi den server');
    mysql_select_db('php1_pdo') or die('Khong co csdl');
    mysql_query("set names 'utf8'");
?>