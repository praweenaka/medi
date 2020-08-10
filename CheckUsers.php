<?php

session_start();
date_default_timezone_set('Asia/Colombo');
$Command = "";

if (isset($_GET['Command'])) {

    $Command = $_GET["Command"];
    include './connection_sql.php';
}


if ($Command == "CheckUsers") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $UserName = $_GET["UserName"];
    $Password = $_GET["Password"]; 
    
    $sql = "SELECT * FROM user_mast WHERE user_name =  '" . $UserName . "' and password = '" . md5($Password) . "' ";
    $result = $conn->query($sql);

    if ($row = $result->fetch()) {
//        if (true) {

        $sessionId = session_id();
        $_SESSION['sessionId'] = session_id();
        session_regenerate_id();
        $ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['UserName'] = $UserName; 
        $_SESSION['User_Type'] = $row['user_type'];
        $_SESSION['CURRENT_USER'] = $UserName;
       

        $action = "ok";
        $cookie_name = "user";
        $cookie_value = $UserName;
        //setcookie($cookie_name, $cookie_value, time() + (43200)); // 86400 = 1 day

        $token = substr(hash('sha512', mt_rand() . microtime()), 0, 50);
        $extime = time() + 100000;


        $domain = $_SERVER['HTTP_HOST'];

// set cookie

        setcookie('user', $cookie_value, $extime, "/", $domain);


        $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        echo $action;


       $time = date("H:i:s");
        // $time = date("g.i a");
        $today = date('Y-m-d');
        
         $sql = "Insert into loging(Name,Date,Logon_Time,Sessioan_Id,ip) values ('" . $UserName . "','" . $today . "','" . $time . "','" . $_SESSION['sessionId'] . "','" . $ip . "')";
        $conn->exec($sql);
        // clearstatcache();
    } else {
        $action = "not";
        $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        $ResponseXML .= "</salesdetails>";
        echo $ResponseXML;
    }
}



if ($_GET["Command"] == "save_inv") {


    $sql = "select * from user_mast where user_name='" . $_GET["user_name"] . "'";
    $result = $conn->query($sql);
    if ($row1 = $result->fetch()) {
        echo "User Found !!!";
    } else {
        $sql = "insert into user_mast(user_name,user_type, password,password1) values ('" . $_GET["user_name"] . "', '" . $_GET["user_type"] . "','" . md5($_GET["password"]) . "', '" . $_GET["password"] . "')";
 
        $result = $conn->query($sql); 
             echo "Saved";
             
         $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['user_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'USER', 'SAVE', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
         $result2 = $conn->query($sql2);
    }
}

if ($Command == "logout") {

    $today = date('Y-m-d');
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('user', "", 1, "/", $domain);

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $time = date("H:i:s");
        $sql2 = "update loging set Logout_Time = '" . $time . "'  where Sessioan_Id = '" . $_SESSION['sessionId']. "'"; 


        $result = $conn->query($sql2);

        $conn->commit();
        // echo "EDIT";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
     session_unset();
    session_destroy();

   
}


if ($_GET["Command"] == "getdt") {

    $tb = "";
    $tb .= "<table class='table table-hover'>";


    $sql = "select * from user_mast order by user_name desc";




    $tb .= "<tr>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">Name</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">User Type</th>"; 

    $tb .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $tb .= "<tr>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "')\">" . $row['user_name'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "')\">" . $row['user_type'] . "</td>"; 
        $tb .= "</tr>";
    }
    $tb .= "</table>";

    echo $tb;
}

 

if ($_GET["Command"] == "delete") {

    $sql = "delete from user_mast where user_name = '" . $_GET['user_name'] . "'";
    $result = $conn->query($sql);
    
    $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['user_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'USER', 'DELETE', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
         $result2 = $conn->query($sql2);

//    $conn->commit();
    echo "Delete";
}

?>
