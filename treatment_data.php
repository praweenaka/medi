<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT treatno FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['treatno'];
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";

    $sql2 = "SELECT * from treatment ";
    foreach ($conn->query($sql2) as $row) { 
       $myArr = array($row['name'],floatval($row['id'])); 
       $myJSON = json_encode($myArr); 
       $ResponseXML .= "<json><![CDATA[$myJSON]]></json>"; 
   }


   $ResponseXML .= "</new>";

   echo $ResponseXML;
}
if ($_GET["Command"] == "save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from invoice where    invoiceno  = '" . $_GET['invoiceno'] . "'";
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Invoice No...!!!");
        }
        $bal = $_GET['tot'] - $_GET['advance'] - $_GET['discount'];
        
        $dis="";
        if($dis==""){
            $dis=0;
        }else{
            $dis=$_GET['discount'];
        }
        
        $sql = "insert into invoice(invoiceno,sdate,fname,lname,nic,sex,coursename,country,dob,stu_id,address,contactp,contacth,email,note,tot,advance,bal,discount,datetime,uniq,user1,regfee,lvl1,lvl2) values
        ('" . $_GET['invoiceno'] . "','" . $_GET['sdate'] . "','" . $_GET['fname'] . "','" . $_GET['lname'] . "','" . $_GET['nic'] . "','" . $_GET['sex'] . "','" . $_GET['coursename'] . "','" . $_GET['country'] . "','" . $_GET['sdate'] . "','" . $_GET['age'] . "','" . $_GET['address'] . "','" . $_GET['contactp'] . "','" . $_GET['contacth'] . "','" . $_GET['email'] . "','" . $_GET['note'] . "','" . $_GET['tot'] . "','" . $_GET['advance'] . "','" . $bal . "','" . $dis . "','" . date("Y-m-d H:i:s") . "','" . $_GET['uniq'] . "','" . $_SESSION["CURRENT_USER"] . "','" . $_GET['regfee'] . "','" . $_GET['lvl1'] . "','" . $_GET['lvl2'] . "')";
        $result = $conn->query($sql);

        $sql = "update invpara set invoice=invoice+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Save";
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


if ($_POST["Command"] == "imageup") {
    $target_dir = "uploads/";

    $mrefno = str_replace("/", "-", "hfghf");

    $target_dir = $target_dir . "userimg" . "/";
    if (!file_exists($target_dir)) {
        if (mkdir($target_dir, 0777, true)) {

        }
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $mok = "no";
    if (file_exists($target_file)) {
        $mok = "no";
    } else {
        $mok = "ok";
    }


    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    if ($mok = "ok") {

        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $sql = "update invoice set img='" . $target_file . "' where invoiceno='" . $_POST["invoiceno"] . "' ";
            echo $sql;
            $result = $conn->query($sql);

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo $e;
        }
    } else {
        echo "Sorry, file already exists";
    }
}
?>