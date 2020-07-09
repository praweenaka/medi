<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');

function generateId($id, $ref, $switch) {

    if ($switch == "pre") {
        $temp = substr($id, strlen($ref));
        $id = (int) $temp;

        return $id;
    } else if ($switch == "post") {

        $temp = substr("0000000" . $id, -7);
        $id = $ref . $temp;

        return $id;
    }
}

if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT country_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['country_code'];

 
    $tmpinvno = "000000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("C/") . substr($tmpinvno, $lenth - 7);
    $post = generateId($no, "IT/", "post");
    $uniq = uniqid();


    $ResponseXML .= "<ccode_txt><![CDATA[$no]]></ccode_txt>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}



if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

            $sql = "delete from country where c_code = '" . $_GET['ccode_txt'] . "'";
        
       $result = $conn->query($sql);

    $sql1 = "Insert into country(c_code,c_name,c_head,amount,prefix,refno,uniq)values 
                        ('" . $_GET['ccode_txt'] . "','" . $_GET['cname_txt'] ."','" . $_GET['chead_txt'] ."','" . $_GET['amt_txt'] ."','" . $_GET['short_txt'] ."','" . $_GET['refno_txt'] ."','" . $_GET['uniq'] ."')";
        $result = $conn->query($sql1);
//        echo $sql;

        $sql = "SELECT country_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['country_code'];
        $no2 = $no + 1;
        $sql = "update invpara set country_code = $no2 where country_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "update") {

       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
    try {

 $sql = "update country set c_code='".$_GET['ccode_txt']."', c_name='".$_GET['cname_txt']."', c_head='".$_GET['chead_txt']."', amount='".$_GET['amt_txt']."', prefix='".$_GET['short_txt']."', refno='".$_GET['refno_txt']."' where c_code = '" . $_GET['ccode_txt'] . "'";

        $result = $conn->query($sql);

        $conn->commit();
        echo "Updated";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "delete") {
   
        $sql = "delete from customer where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
      //  echo $sql;
        echo "delete";
   
}

?>