<?php

session_start();
date_default_timezone_set('Asia/Colombo');
////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
require_once ("connection_sql.php");

////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');

if ($_GET["Command"] == "init") {

    $sql = "insert into person (code,DREFNO) 
            values ('" . mysqli_escape_string($GLOBALS['dbinv'], $_GET["template_1"])  . "','".$_GET["drefno"]."')";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $ResponseXML .= "<success><![CDATA[yes]]></success>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "getArray") {

    


$sql1 = "select * from sregdetails";

$supAry = Array();
    foreach ($conn->query($sql1) as $row2) {
        array_push($supAry, $row2);
       
    }


    echo json_encode($supAry);

    // $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    // if (!$result1) {
    //     echo mysqli_error($GLOBALS['dbinv']);
    // }
    // $result = array();
    // while ($items = mysqli_fetch_array($result1)) {
    //     array_push($result, array("id" => $items['DREFNO'], "code" => $items['code']));
    // }
}


mysqli_close($GLOBALS['dbinv']);
?>