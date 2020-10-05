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
        $sql = "SELECT * from s_diagnosis where  name  = '" . $_POST['s_diag'] . "'"; 
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
 
 if ($_POST["Command"] == "addgeneral") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from general where  name  = '" . $_POST['general_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved General Name...!!!");
        }
        
        $sqlsave = "Insert into general(name,user,datetime) values ('" . $_POST['general_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['general_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'General', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "addlungs") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from lungs where  name  = '" . $_POST['lungs_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Lungs Name...!!!");
        }
        
        $sqlsave = "Insert into lungs(name,user,datetime) values ('" . $_POST['lungs_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['lungs_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Lungs', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "addabdomen") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from abdomen where  name  = '" . $_POST['abdomen_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Abdomen Name...!!!");
        }
        
        $sqlsave = "Insert into abdomen(name,user,datetime) values ('" . $_POST['abdomen_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['abdomen_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Abdomen', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
if ($_POST["Command"] == "addcns") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from cns where  name  = '" . $_POST['cns_name'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Cns Name...!!!");
        }
        
        $sqlsave = "Insert into cns(name,user,datetime) values ('" . $_POST['cns_name'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['cns_name'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Cns', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
//  ===================================================================================================================================================

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

if ($_POST["Command"] == "removegeneral") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from general where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE general set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'General', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("General Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "removelungs") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from lungs where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE lungs set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Lungs', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Lungs Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "removeabdomen") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from abdomen where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE abdomen set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Abdomen', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Abdomen Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "removecns") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from cns where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE cns set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Cns', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Cns Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

?>