<?php

include './connection_sql.php';
?>





<?php

include './connection_sql.php';

include 'barcode128.php';



$mid = $_GET["txt_ref"];


   $sql2 = "SELECT * FROM sregdetails where refno = '" . $mid . "'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch();


    $sql3 = "SELECT * FROM med_dele where refno = '" . $mid . "'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch();

    // $pubdate= $row2["tdate"] ;
    // $da = strtotime($pubdate);
    // $dat = date('H:i:s', $da);

    //$date=date_create( date("Y/m/d"));

    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $time= date('H:i:s');

    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $date=date('d-m-Y ');



    echo '<br>
        <div id="page-wrap"> 
<div> 
<table style="width:100%;margin-top:45px;">

  <tr >
    <td colspan="3"  align="left"><p style="height: 30%; ">'.bar128(stripcslashes($row2["patientno"])).'</p></td>

  </tr>
  <tr>
     <td>&nbsp</td>
    <td><b>'.$row2["labref"].'</b></td>
    <td>&nbsp</td>
    <td align="center"></td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td align="center">'.$date . '</td>
    <td>&nbsp </td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td align="center">' . $time . '</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>' . $row2["countryname"] . '</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>' . $row2["fname"] ." ". $row2["lastname"] . '</td>
    <td></td>
    <td></td>
    <td  >'.$row2["age_years"].' years</td>
    <td></td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>' . $row2["sex"] . '</td>
    <td><p style="margin-left: -90px;">' . $row2["medistatus"] . '</p></td>
    <td></td>
    <td>' . $row2["nation"] . '</td>
    <td></td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td>' . $row2["patientno"] . '</td>
    <td><p style="margin-left: -60px;">' . $row2["dtisu"] . '</p></td>
    <td>&nbsp</td>
    <td></td>
    <td></td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
   <tr>
    <td>' . $row2["POS_APP"] . '</td>
    <td  align="center">' . $row2["agname"] . '</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
  </tr>
</table>
</div>
<br>';
?>




