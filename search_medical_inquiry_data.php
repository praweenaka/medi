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

    $sql = "Select * from inqurey_med where refno ='" . $cuscode . "'";




    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

         $ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
        
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";




    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Ref No.</th>
                    <th>Passport No.</th>
                    <th>Country</th>
                  
                </tr>";

    $sql = "Select * from inqurey_med where refno <> ''";



    if ($_GET['cusno'] != "") {
        $sql .= " and refno like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and pportno like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and country like '%" . $_GET['customername2'] . "%'";
    }


    $sql .= " ORDER BY refno limit 50 ";

    //$sql .= " ORDER BY CourseCode limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['refno'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>    
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['refno'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['pportno'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['country'] . "</a></td>
                           
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
