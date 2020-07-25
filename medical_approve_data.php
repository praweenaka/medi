<?php

session_start();


require_once ("connection_sql.php");
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');


 if ($_POST["Command"] == "del") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from medical where id='" . $_POST['id'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            $sql = "SELECT * from medical where medino='" . $row['medino'] . "' and pharamacy !='0'"; 
            $sql = $conn->query($sql);
            if ($row = $sql->fetch()) {
                exit('Already Billed...');
            }
            $sql = "UPDATE medical set cancel='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'medical', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2); 
            
            $conn->commit();
            echo "Cancel";
        } else {
            exit("Medical Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "approve") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from medical where id='" . $_POST['id'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE medical set flag='1' where id='" . $_POST['id'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'medical', 'approve', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Approve";
        } else {
            exit("Medical Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

?>