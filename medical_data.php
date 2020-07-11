<?php

session_start();


require_once ("connection_sql.php");
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');

$main = array($_POST['main']);
$obj  = json_decode($main[0], true);
$operation = $obj[Main];
$cols = $obj[Col];



if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT medino FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['medino']; 
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($operation == "SAVE") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from medical where  medino  = '" . $cols[medino] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Medical No...!!!");
        }

        $sqlsave = "Insert into medical(uniq,medino,cuscode,pr,bp,weight,height,bgroup,sdate,treatment,investi,complain,allergy,note,user,datetime) values ('".$cols[uniq]."','".$cols[medino]."','".$cols[name]."','".$cols[pr]."','".$cols[bp]."','".$cols[weight]."','".$cols[height]."','".$cols[bgroup]."','".$cols[sdate]."','".implode(", ", $cols[treatment])."','".implode(", ", $cols[investi])."','".implode(", ", $cols[complain])."','".implode(", ", $cols[allergy])."','".$cols[note]."','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."') ";

        $resultsave = $conn->query($sqlsave);

        $sql = "update invpara set medino=medino+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Save";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($operation == "HISTORY") { 

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    
    $sql = "Select * from medical where cuscode ='" . $cols[name] . "'";  
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $sql = "Select * from medical where cuscode ='" . $cols[name] . "'";  
        foreach ($conn->query($sql) as $row) { 
       // $myArr = array($row['name'],floatval($row['id'])); 
            $myArr = array($row['sdate'],floatval($row['weight'])); 
            $myJSON = json_encode($myArr); 
            $ResponseXML .= "<json><![CDATA[$myJSON]]></json>"; 
        }
        $ResponseXML .= "<resu><![CDATA[1]]></resu>"; 
    }else {
       $ResponseXML .= "<resu><![CDATA[0]]></resu>"; 
   }

   $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\">     
   <tr class=\"info\">
   <th style=\"width: 300px;\">Date</th>
   <th style=\"width: 400px;\">Treatment</th>
   <th style=\"width: 400px;\">Complain</th> 
   <th></th>
   <th></th>
   </tr>";


    $sql = "Select * from medical where cuscode ='" . $cols[name] . "'";  
   foreach ($conn->query($sql) as $row) {
     $ResponseXML .= "<tr>                              
     <td >" . $row['sdate'] . "</td>
     <td >" . $row['treatment'] . "</td>
     <td >" . $row['complain'] . "</td>";
     $ResponseXML .= "</tr>";
 }

 $ResponseXML .= "   </table>]]></sales_table>"; 

 
 $ResponseXML .= "</salesdetails>";
 echo $ResponseXML;
}


if ($_GET["Command"] == "pass_quot") {

    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "SELECT * from invoice where   invoiceno  = '" . $_GET['custno'] . "'";

    $i = 1;
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<invoiceno><![CDATA[" . $row['invoiceno'] . "]]></invoiceno>";
        $ResponseXML .= "<sdate><![CDATA[" . $row['sdate'] . "]]></sdate>";
        $ResponseXML .= "<fname><![CDATA[" . $row['fname'] . "]]></fname>";
        $ResponseXML .= "<lname><![CDATA[" . $row['lname'] . "]]></lname>";
        $ResponseXML .= "<nic><![CDATA[" . $row['nic'] . "]]></nic>";
        $ResponseXML .= "<sex><![CDATA[" . $row['sex'] . "]]></sex>";
        $ResponseXML .= "<coursename><![CDATA[" . $row['coursename'] . "]]></coursename>";
        $ResponseXML .= "<country><![CDATA[" . $row['country'] . "]]></country>";
        $ResponseXML .= "<dob><![CDATA[" . $row['dob'] . "]]></dob>";
        $ResponseXML .= "<age><![CDATA[" . $row['stu_id'] . "]]></age>";
        $ResponseXML .= "<address><![CDATA[" . $row['address'] . "]]></address>";
        $ResponseXML .= "<contactp><![CDATA[" . $row['contactp'] . "]]></contactp>";
        $ResponseXML .= "<contacth><![CDATA[" . $row['contacth'] . "]]></contacth>";
        $ResponseXML .= "<email><![CDATA[" . $row['email'] . "]]></email>";
        $ResponseXML .= "<note><![CDATA[" . $row['note'] . "]]></note>";
        $ResponseXML .= "<tot><![CDATA[" . $row['tot'] . "]]></tot>";
        $ResponseXML .= "<advance><![CDATA[" . $row['advance'] . "]]></advance>";
        $ResponseXML .= "<discount><![CDATA[" . $row['discount'] . "]]></discount>";
        $ResponseXML .= "<cancel><![CDATA[" . $row['cancel'] . "]]></cancel>";
        $ResponseXML .= "<regfee><![CDATA[" . $row['regfee'] . "]]></regfee>";
        $ResponseXML .= "<img><![CDATA[" . $row['img'] . "]]></img>";
        $ResponseXML .= "<lvl1><![CDATA[" . $row['lvl1'] . "]]></lvl1>";
        $ResponseXML .= "<lvl2><![CDATA[" . $row['lvl2'] . "]]></lvl2>"; 
    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
    <tr>
    <th width=\"110\">Invoice No</th>
    <th width=\"200\">Name</th>
    <th width=\"200\">Nic</th>
    </tr>";

    $sql = "select * from invoice where   invoiceno <> ''";
    if ($_GET["invoiceno"] != "") {
        $sql .= " and invoiceno like '" . Trim($_GET["invoiceno"]) . "%'";
    }
    if ($_GET["nic"] != "") {
        $sql .= " and nic like '" . Trim($_GET["nic"]) . "%'";
    }
    if ($_GET["fname"] != "") {
        $sql .= " and fname like '" . Trim($_GET["fname"]) . "%'";
    }

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['invoiceno'];
        $ResponseXML .= "<tr>               
        <td onclick=\"custno('$cuscode', '$stname');\">" . $row['invoiceno'] . "</a></td>
        <td onclick=\"custno('$cuscode', '$stname');\">" . $row['fname'] . "</a></td>
        <td onclick=\"custno('$cuscode', '$stname');\">" . $row['nic'] . "</a></td>
        
        </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}

if ($_GET["Command"] == "cancelItem") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from invoice where invoiceno='" . $_GET['invoiceno'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE invoice set cancel='1' where invoiceno='" . $_GET['invoiceno'] . "'";
            $result = $conn->query($sql);

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['invoiceno'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Invoice', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Invoice Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

?>