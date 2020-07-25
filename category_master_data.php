<?php

session_start();
 
require_once ("connection_sql.php");
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');
 
if ($_POST["Command"] == "addinvesti") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from investigation where  name  = '" . $_POST['investi_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Investigation Name...!!!");
        }
        
        $sqlsave = "Insert into investigation(name,user,datetime) values ('" . $_POST['investi_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['investi_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Investigation', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "addallergy") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from allergy where  name  = '" . $_POST['allergy_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Allergy Name...!!!");
        }
        
        $sqlsave = "Insert into allergy(name,user,datetime) values ('" . $_POST['allergy_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
       $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['allergy_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Allergy', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "addcomplain") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from complain where  name  = '" . $_POST['complain_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Complain Name...!!!");
        }
        
        $sqlsave = "Insert into complain(name,user,datetime) values ('" . $_POST['complain_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
         $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['complain_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Complain', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_POST["Command"] == "addsdiag") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from s_diagnosis where  name  = '" . $_POST['investi_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Diagnosis Name...!!!");
        }
        
        $sqlsave = "Insert into s_diagnosis(name,user,datetime) values ('" . $_POST['s_diag'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
        
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['s_diag'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Diagnosis', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
 
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
 

if ($_POST["Command"] == "removeinvesti") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from investigation where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE investigation set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'investi', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Investigation Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "removeallergy") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from allergy where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE allergy set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'allergy', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Allergy Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "removecomplain") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from complain where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE complain set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'complain', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Complain Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

 

if ($_POST["Command"] == "removes_diag") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from s_diagnosis where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE s_diagnosis set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'S Diagnosis', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Diagnosis Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

?>