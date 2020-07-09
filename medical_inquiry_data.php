<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT micode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['micode'];
    $tmpinvno = "000000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("MI/") . substr($tmpinvno, $lenth - 7);

    $ResponseXML .= "<id><![CDATA[$no]]></id>";  
    $ResponseXML .= "</new>"; 
    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "SELECT micode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['micode'];
        $tmpinvno = "000000" . $no;
        $lenth = strlen($tmpinvno);
        $no = trim("MI/") . substr($tmpinvno, $lenth - 7);
        
        // $sql1 = "select * from inqurey_med where refno = '" . $_GET['refno_txt'] . "'";
        // $result1 = $conn->query($sql1);
        
        // if ($row1 = $result1->fetch()) {
        //     exit("Duplicate ....!!!");
        // }
        

       $sql1 = "Insert into inqurey_med(refno,pportno,country,gamca,eno,mpdate,xrayno,subname,mpname,sex,status,agency,age,custrem,doctor1,doctor2,doctor3,doctor4,doctor5,lab1,lab2,lab3,xray1,xray2)values 
                        ('" .$no. "','" . $_GET['pportno_txt'] ."','" . $_GET['ctry_txt'] ."','" . $_GET['gamca_txt'] ."','" . $_GET['eno_txt'] ."','" . $_GET['date_txt'] ."','" . $_GET['xrayno_txt'] ."','" . $_GET['subname_txt'] ."','" . $_GET['name_txt'] ."','" . $_GET['sex_txt'] ."','" . $_GET['status_txt'] ."','" . $_GET['agency_txt'] ."','" . $_GET['age_txt'] ."','" . $_GET['custrem_txt'] ."','" . $_GET['doctor1_txt'] ."','" . $_GET['doctor2_txt'] ."','" . $_GET['doctor3_txt'] ."','" . $_GET['doctor4_txt'] ."','" . $_GET['doctor5_txt'] ."','" . $_GET['lab1_txt'] ."','" . $_GET['lab2_txt'] ."','" . $_GET['lab3_txt'] ."','" . $_GET['xray1_txt'] ."','" . $_GET['xray2_txt'] ."')";
        $result = $conn->query($sql1);
        $sql = "SELECT micode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['micode'];
        $no2 = $no + 1;
        $sql = "update invpara set micode = $no2 where micode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "cancel") {
    try {
        $sql = "update inqurey_med set cancel = '1'  where refno = '" . $_GET['refno_txt'] . "'";
        $result = $conn->query($sql);
        echo "cancel";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "update_item") {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
    try {
        $sql = "update inqurey_med set pportno = '".$_GET['pportno_txt']."',country = '".$_GET['ctry_txt']."',gamca = '".$_GET['gamca_txt']."',eno = '".$_GET['eno_txt']."',mpdate = '".$_GET['date_txt']."',xrayno = '".$_GET['xrayno_txt']."',subname = '".$_GET['subname_txt']."',mpname = '".$_GET['name_txt']."',sex = '".$_GET['sex_txt']."',status = '".$_GET['status_txt']."',agency = '".$_GET['agency_txt']."',age = '".$_GET['age_txt']."',custrem = '".$_GET['custrem_txt']."',doctor1 = '".$_GET['doctor1_txt']."',doctor2 = '".$_GET['doctor2_txt']."',doctor3 = '".$_GET['doctor3_txt']."',doctor4 = '".$_GET['doctor4_txt']."',doctor5 = '".$_GET['doctor5_txt']."',lab1 = '".$_GET['lab1_txt']."', lab2 = '".$_GET['lab2_txt']."',lab3 = '".$_GET['lab3_txt']."',xray1 = '".$_GET['xray1_txt']."',xray2 = '".$_GET['xray2_txt']."' where refno = '" . $_GET['refno_txt'] . "'";


          $result = $conn->query($sql);

        $conn->commit();
        echo "Updated";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

?>