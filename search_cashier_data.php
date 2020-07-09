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

    $sql = "Select * from sregdetails where refno ='" . $cuscode . "'";

    //echo  $sql;




    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

         $ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
         $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";
        
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";




    $ResponseXML .= "<table   class=\"table table-bordered\">
                
           
                <th>REF NO.</th>
                <th>PA NO.</th>
                <th>Date</th>


                  
                </tr>";

    $sql = "Select * from sregdetails where REFNO <> ''";



    if ($_GET['cusno'] != "") {
        $sql .= " and ref_no like '%" . $_GET['cusno'] . "%'";
    }
    if ($_GET['customername1'] != "") {
        $sql .= " and passport_no like '%" . $_GET['customername1'] . "%'";
    }
    if ($_GET['customername2'] != "") {
        $sql .= " and c_date like '%" . $_GET['customername2'] . "%'";
    }

    if ($_GET['customername3'] != "") {
        $sql .= " and agency like '%" . $_GET['customername3'] . "%'";
    }
    if ($_GET['customername4'] != "") {
        $sql .= " and country like '%" . $_GET['customername4'] . "%'";
    }

    if ($_GET['customername5'] != "") {
        $sql .= " and gcc_no like '%" . $_GET['customername5'] . "%'";
    }
    if ($_GET['customername6'] != "") {
        $sql .= " and date_of_issue like '%" . $_GET['customername6'] . "%'";
    }
     if ($_GET['customername7'] != "") {
        $sql .= " and medical_date like '%" . $_GET['customername7'] . "%'";
    }


    $sql .= " ORDER BY REFNO limit 50 ";

    //$sql .= " ORDER BY CourseCode limit 50 ";



    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['REFNO'];

        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>    
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['REFNO'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['PA_NO'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['dob'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['agname'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['cou_name'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['g_no'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['PDATE'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['MNAME'] . "</a></td>
                           
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
