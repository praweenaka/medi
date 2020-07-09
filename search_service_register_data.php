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

  $sql = $conn->query($sql);
  if ($row = $sql->fetch()) {

   $ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
   
 }

 $sqlsjobs = "select * from  mediprint_main where refno = '" . $cuscode . "'";
 
 foreach ($conn->query($sqlsjobs) as $rowsjob) {

   $ResponseXML .= "<subrow><![CDATA[" . json_encode($rowsjob) . "]]></subrow>";
   
 }



 $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";

 $ResponseXML .= "</salesdetails>";
 echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {

  $ResponseXML = "";


//echo "string";

  $ResponseXML .= "<table   class=\"table table-bordered\">
  <tr>
  <th>Ref No.</th>
  <th>Date</th>
  <th>Lab No</th>
  <th>Patientewfwaf No.</th>            
  </tr>";

  $sql = "Select * from sregdetails where refno <> '' and  cancel='0' ";

  
  if ($_GET['cusno'] != "") {
    $sql .= " and refno like '%" . $_GET['cusno'] . "%'";
  }
  if ($_GET['customername1'] != "") {
    $sql .= " and srdate like '%" . $_GET['customername1'] . "%'";
  }
  if ($_GET['customername2'] != "") {
    $sql .= " and patientno like '%" . $_GET['customername2'] . "%'";
  }


  $sql .= "  ORDER BY refno limit 50 ";


  foreach ($conn->query($sql) as $row) {
    $cuscode = $row['refno'];


    $stname = $_GET["stname"];

    $ResponseXML .= "<tr>    
    <td onclick=\"custno('$cuscode', '$stname');\">" . $row['refno'] . "</a></td>
    <td onclick=\"custno('$cuscode', '$stname');\">" . $row['srdate'] . "</a></td>
    <td onclick=\"custno('$cuscode', '$stname');\">" . $row['labref'] . "</a></td>
    <td onclick=\"custno('$cuscode', '$stname');\">" . $row['patientno'] . "</a></td>
    
    </tr>";
  }


  $ResponseXML .= "   </table>";


  echo $ResponseXML;
}
?>
