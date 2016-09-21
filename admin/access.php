<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
	header('Location: ../login.php');
    }
    include('../../config.php');
    $user_id = intval($_SESSION['user_id']);
    $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
    $member = @mysql_fetch_array($sql_query);
    
    if($member['admin']=="0") {
        header('Location: ../login.php');
    }
?>