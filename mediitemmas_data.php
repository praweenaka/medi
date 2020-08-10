<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT item FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['item'];
 
    $uniq = uniqid();

    $tmpinvno = "0000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("I/") . substr($tmpinvno, $lenth - 5);
 
    $ResponseXML .= "<code><![CDATA[$no]]></code>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    $ResponseXML .= "<sdate><![CDATA[" . date("Y-m-d") . "]]></sdate>";
     

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_POST["Command"] == "save") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from s_mas where  code  = '" . $_POST['code'] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Item Name...!!!");
        }
        
        $sqlsave = "Insert into s_mas(code,des,brand,country,user,datetime,qty,cost,selling) values ('" . $_POST['code'] . "','" . $_POST['des'] . "','" . $_POST['brand1'] . "','" . $_POST['country'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','" . $_POST['qty1'] . "','" . $_POST['cost1'] . "','" . $_POST['selling1'] . "') ";
        $resultsave = $conn->query($sqlsave);
        
        $sqlsave1 = "Insert into s_trn(code,name,cost,selling,qty,note,subtot,user,datetime,type) values 
        ('" . $_POST['code'] . "','" . $_POST['des'] . "','" . $_POST['cost1'] . "','" . $_POST['selling1'] . "','" . $_POST['qty1'] . "','stkup','".$_POST['cost1']*$_POST['qty1']."','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','item') ";
        $resultsave1 = $conn->query($sqlsave1);
         
        
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" .  $_POST['code'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Item', 'SAVE', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
            
        $sql = "UPDATE invpara set item=item+1";
        $result = $conn->query($sql);
            
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "cancel_inv") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from s_mas where code='" . $_POST['code'] . "'";
 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

             
             $sql = "UPDATE s_mas set cancel='1' where code='" . $row['code'] . "'";
            $result = $conn->query($sql);
            
            $sql1 = "UPDATE s_trn set cancel='1' where code='" . $row['code'] . "'";
            $result1 = $conn->query($sql1);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Item', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Item  Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "removetreat") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from s_trn where id='" . $_POST['id'] . "'";
 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

             
             $sql = "UPDATE s_mas set cancel='1' where code='" . $row['code'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['id'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'ItemPur', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Item Name Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

  
 

if ($_POST["Command"] == "addorder") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlmas = "SELECT * from s_mas where  code  = '" . $_POST['item'] . "'";
        $resultmas = $conn->query($sqlmas);
        $rowmas = $resultmas->fetch();
        
        $sql = "SELECT * from s_mas where  code  = '" . $_POST['item'] . "' and costold !='0.00' "; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) { 
            $costold=$row['cost'];
        }else{ 
             $costold=$_POST['cost'];
        }
       
        $sql = "SELECT * from s_mas where  code  = '" . $_POST['item'] . "' and sellingold !='0.00' "; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) { 
            $sellingold=$row['selling'];
        }else{ 
             $sellingold=$_POST['selling'];
        }
        $sql = "update s_mas set qty=qty+'".$_POST['qty']."',cost='".$_POST['cost']."',selling='".$_POST['selling']."',costold='".$costold."',sellingold='".$sellingold."' where code='" . $_POST['item']  . "'";
        $result = $conn->query($sql);
            
        $sqlsave = "Insert into s_trn(code,name,cost,selling,qty,subtot,s_code,user,datetime,type) values ('" . $_POST['item'] . "','" . $rowmas['des'] . "','" . $_POST['cost'] . "','" . $_POST['selling'] . "','" . $_POST['qty'] . "','" . $_POST['qty']*$_POST['cost'] . "','" . $_POST['s_code'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','item') ";
        $resultsave = $conn->query($sqlsave);
 
        $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['item'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'ItemPur', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
        $result2 = $conn->query($sql2);
            
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
  




if ($_GET["Command"] == "pass_quot") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "Select * from s_mas where cancel='0' and code ='" . $cuscode . "'";
    $sql = $conn->query($sql);

    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
 

?>