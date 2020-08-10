<?php

session_start();
date_default_timezone_set('Asia/Colombo');
require_once ("connection_sql.php");

if ($_GET["Command"] == "save") {

    $sql = "delete from user_mast where user_name = '" . $_SESSION['CURRENT_USER'] . "'";
    $results = $conn->query($sql);  

    $sql = "insert into user_mast(user_name,password,password1) values ('" . $_GET["usn"] . "','" . md5($_GET["psw"]) . "', '" . $_GET["psw"] . "')";
    $results = $conn->query($sql); 

    if (!$results) {
        echo "not saved";
    } else {
        $time_now = mktime(date('h') + 5, date('i') + 30, date('s'));
        $time = date('h:i:s', $time_now); 

        $today = date('Y-m-d');
        $domain = $_SERVER['HTTP_HOST'];
        setcookie('user', "", 1, "/", $domain);

        session_unset();
        session_destroy();
        echo "saved";
    }
}
?>
