<?php

session_start();
date_default_timezone_set('Asia/Colombo');
////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
require_once ("connectioni.php");

require_once ("connection_sql.php");

////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');

// if ($_GET["Command"] == "init") {

//     $sql = "insert into person (code,DREFNO) 
//             values ('" . mysqli_escape_string($GLOBALS['dbinv'], $_GET["template_1"])  . "','".$_GET["drefno"]."')";

//     $result = mysqli_query($GLOBALS['dbinv'], $sql);

//     $ResponseXML = "";
//     $ResponseXML .= "<salesdetails>";

//     $ResponseXML .= "<success><![CDATA[yes]]></success>";

//     $ResponseXML .= "</salesdetails>";
//     echo $ResponseXML;
// }

if ($_GET["Command"] == "getArray") {

    $sql = "select * from sregdetails"; //can be edited

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);


    if (!$result1) {
        echo mysqli_error($GLOBALS['dbinv']);
    }
    $result = array();
    while ($items = mysqli_fetch_array($result1)) {
        array_push($result, array("id" => $items['refno'],"obj" => array("passport" => $items['patientno'],"country" => $items['countryname'],"date" => $items['srdate'],"fname" => $items['fname'],"lname" => $items['lastname'],"mediname" => $items['meditype'],"sex" => $items['sex'],"status" => $items['medistatus'],"agency" => $items['agname'],"age" => $items['age_years'],"remark" => $items['remaks'],"img" => $items['img']), "code" => $items['Tempbase'],  "name" => $items['fname']));
    }
    

    echo json_encode($result);
}


mysqli_close($GLOBALS['dbinv']);
?>