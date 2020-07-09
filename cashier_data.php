<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT cashcode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['cashcode']; 

    $tmpinvno = "000000" . $no; 
    $lenth = strlen($tmpinvno);
    $no = trim("CASH/") . substr($tmpinvno, $lenth - 7);




    $ResponseXML .= "<id><![CDATA[$no]]></id>";
   


    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql1 = "select * from cashier where refno = '" . $_GET['refno_txt'] . "'";
        $result1 = $conn->query($sql1);
        //echo $sql;
        if ($row1 = $result1->fetch()) {
            exit("Duplicate ....!!!");
        } 
        $sql1 = "Insert into cashier(refno,cdate,pno,fname,agname,labno,country,cou_name,chkno,chkdt,chkamt,bank,cash,refdt,refund,pamt,ptype,medi_ref)values 
                      ('" . $_GET['refno_txt'] . "','" . $_GET['date_txt'] . "','" . $_GET['pno_txt'] . "','" . $_GET['fname_txt'] . "','" . $_GET['agname_txt'] . "','" . $_GET['labno_txt'] . "','" . $_GET['country_txt'] . "','" . $_GET['cou_name_txt'] . "','" . $_GET['chkno_txt'] . "','" . $_GET['chkdt_txt'] . "','" . $_GET['chkamt_txt'] . "','" . $_GET['bank_txt'] . "','" . $_GET['cash_txt'] . "','" . $_GET['refdt_txt'] . "','" . $_GET['refund_txt'] . "','" . $_GET['pamt_txt'] . "','" . $_GET['ptype_txt'] . "','" . $_GET['medino_txt'] . "')";

        $result = $conn->query($sql1);
        $sql = "SELECT cashcode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['cashcode'];
        $no2 = $no + 1;
        $sql = "update invpara set cashcode = $no2 where cashcode = $no";
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
        $sql = "update cashier set cancel = '1'  where refno = '" . $_GET['refno_txt'] . "'";
        $result = $conn->query($sql);
        echo "cancel";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}







?>