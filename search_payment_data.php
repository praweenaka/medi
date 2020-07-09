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

    $sql = "Select * from rege where refno ='" . $cuscode . "'";
   // echo $sql;


    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        
        $ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
        $ResponseXML .= "<str_customername1><![CDATA[" . $row['COUNTRY'] . "]]></str_customername1>";
        $ResponseXML .= "<str_customername2><![CDATA[" . $row['SERI_NO'] . "]]></str_customername2>";
        

    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}



if ($_GET["Command"] == "search_custom") {

    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                 <th>Ref No.</th>
                    <th>Date</th>
                    <th>Serial No</th>
 
                </tr>";

    $sql = "Select * from rege where refno<> ''";

    if ($_GET['cusno'] != "") {
        $sql .= " and refno like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and  pdate like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and sno like '%" . $_GET['customername2'] . "%'";
    }

    $sql .= "ORDER BY refno limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['refno'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr> 
            
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['refno'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['pdate'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['sno'] . "</a></td>
                              
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
