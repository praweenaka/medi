<?php

session_start();

include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "Select * from agency where agncode ='" . $cuscode . "'";


    $sql = $conn->query($sql);

    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr> 
                   <th>Medical Code</th>
                   <th>Medical Name</th>
              </tr>";


    $sql = "Select * from agency where agncode<> ''";


    if ($_GET['cusno'] != "") {
        $sql .= " and agncode like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and medicaltype like '%" . $_GET['customername1'] . "%'";
    }
     
    $sql .= " ORDER BY id limit 50 ";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['agncode'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>  
                              <td onclick=\"custno('$cuscode','$k');\">" . $row['agncode'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$k');\">" . $row['medicaltype'] . "</a></td>
                              
                         </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
