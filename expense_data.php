<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT expense FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['expense'];
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}
if ($_GET["Command"] == "save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from expense where   expenseno  = '" . $_GET['expenseno'] . "'";
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Expense No...!!!");
        }
 
        $sql = "insert into expense(expenseno,amount,sdate,note,user,uniq,datetime) values
                ('" . $_GET['expenseno'] . "','" . $_GET['amount'] . "','" . $_GET['sdate'] . "','" . $_GET['note'] . "','" . $_SESSION["CURRENT_USER"] . "','" . $_GET['uniq'] . "','" . date("Y-m-d H:i:s") . "' )";

        $result = $conn->query($sql);
 
         $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['expenseno'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Expense', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
         $result2 = $conn->query($sql2);
            
        $sql = "update invpara set expense=expense+1";
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

    $sql = "SELECT * from expense where   expenseno  = '" . $_GET['custno'] . "'";

    $i = 1;
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) { 

        $ResponseXML .= "<expenseno><![CDATA[" . $row['expenseno'] . "]]></expenseno>";
        $ResponseXML .= "<amount><![CDATA[" . $row['amount'] . "]]></amount>";
        $ResponseXML .= "<sdate><![CDATA[" . $row['sdate'] . "]]></sdate>";
        $ResponseXML .= "<note><![CDATA[" . $row['note'] . "]]></note>";
        $ResponseXML .= "<cancel><![CDATA[" . $row['cancel'] . "]]></cancel>";
    }
      
 
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
 
if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class = \"table table-bordered\">
                <tr>
                    <th width=\"210\">Expense No</th>
                    <th width=\"150\">Date</th>
                    <th width=\"250\">Amount</th> 
                    <th width=\"250\">Note</th> 
                </tr>";

    $sql = "select * from expense where   expenseno <> ''";

    if ($_GET["expenseno"] != "") {
        $sql .= " and expenseno like '" . Trim($_GET["expenseno"]) . "%'";
    }
    if ($_GET["amount"] != "") {
        $sql .= " and amount like '" . Trim($_GET["amount"]) . "%'";
    }
    if ($_GET["note"] != "") {
        $sql .= " and note like '" . Trim($_GET["note"]) . "%'";
    }
    $sql .= "order by id desc";

    foreach ($conn->query($sql) as $row) {
       
        $ResponseXML .= "<tr>
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['expenseno'] . "</a></td> 
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['sdate'] . "</a></td>
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['amount'] . "</a></td>
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['note'] . "</a></td> 
                  </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
 
if ($_GET["Command"] == "cancelItem") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sqlinv = "select * from expense where expenseno='" . $_GET["expenseno"] . "' ";
        $resultinv = $conn->query($sqlinv);
        if ($rowinv = $resultinv->fetch()) {
 
            $sql = "UPDATE expense set cancel='1' where expenseno='" . $_GET['expenseno'] . "'";
            $result = $conn->query($sql);
 
            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_GET['expenseno'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Expense', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);
            
            $conn->commit();
            echo "Cancel";
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>