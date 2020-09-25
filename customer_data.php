<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT ctmcode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['ctmcode'];
 
    $uniq = uniqid();

    $tmpinvno = "0000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("SEN/") . substr($tmpinvno, $lenth - 5);
 
    $ResponseXML .= "<cust_txt><![CDATA[$no]]></cust_txt>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    



    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql1 = "select * from customer where code = '" . $_GET['cust_txt'] . "'";
        $result1 = $conn->query($sql1);
        //echo $sql;
        if ($row1 = $result1->fetch()) {
            exit("Duplicate Customer....!!!");
        }
        $bgroup=$_GET['bgroup']; 
        $sql1 = "Insert into customer(code,uniq,name,add1,tel,age,bgroup,allergy,email,note,user,sdate,s_diag)values
        ('" . $_GET['cust_txt'] . "','" . $_GET['uniq'] . "','" . $_GET['name_txt'] . "','" . $_GET['addr1_txt'] . "','" . $_GET['contact_txt'] . "','" . $_GET['age'] . "','".$bgroup."','".$_GET['allergy']."','" . $_GET['email'] . "','" . $_GET['note'] . "','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','" . $_GET['s_diag'] . "')";
 
        $result = $conn->query($sql1);
        
         $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['cust_txt'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Pation', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
         $result2 = $conn->query($sql2);
        
        $sql = "update invpara set ctmcode=ctmcode+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "cancel") {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        try {
            $sql1 = "select * from customer where code = '" . $_GET['cust_txt'] . "'";
        $result1 = $conn->query($sql1); 
        if ($row1 = $result1->fetch()) {
            $sql = "update customer set cancel ='1' where code='".$_GET['cust_txt']."'";
             $result = $conn->query($sql);
             
             $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['cust_txt'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Pation', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
             $result2 = $conn->query($sql2);
    
            $conn->commit();
            echo "Canceled";
        }else{
            echo "No Result Found..";
        }
            
        } catch (Exception $e) {
            $conn->rollBack();
            echo $e;
        }
}

if ($_GET["Command"] == "update") {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        try {
            $sql1 = "select * from customer where code = '" . $_GET['cust_txt'] . "'";
            $result1 = $conn->query($sql1); 
            if ($row1 = $result1->fetch()) {
                $sql = "update customer set name ='".$_GET['name_txt']."',add1 ='".$_GET['addr1_txt']."',tel ='".$_GET['contact_txt']."',age ='".$_GET['age']."',bgroup ='".$_GET['bgroup']."',allergy ='".$_GET['allergy']."',email ='".$_GET['email']."',note ='".$_GET['note']."',s_diag ='".$_GET['s_diag']."' where code='".$_GET['cust_txt']."'";
                 $result = $conn->query($sql);
                  
                 $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['cust_txt'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Pation', 'Update', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
                 $result2 = $conn->query($sql2);
        
                $conn->commit();
                echo "Update";
            }else{
                echo "No Result Found..";
            }
            
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

    $sql = "Select * from customer where cancel='0' and code ='" . $cuscode . "'";
    $sql = $conn->query($sql);

    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "datecal") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $date=date_create(date('Y-m-d'));
    $da=$_GET['age1'];
    $date=date_sub($date,date_interval_create_from_date_string("$da year")); 
    $age= date_format($date,"Y-m-d");



    $ResponseXML .= "<age><![CDATA[" .$age .  "]]></age>";
    


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}



  
?>