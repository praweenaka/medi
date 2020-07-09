<?php

include './connection_sql.php';
?>





<?php

include './connection_sql.php';

include 'barcode1281.php';



$mid = $_GET["txt_ref"];



    $sql1 = "SELECT * FROM mediprint where passport_no = '" . $mid . "'";


    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch();

    $sql2 = "SELECT * FROM sregdetails where patientno = '" . $row1["passport_no"] . "'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch();


    $sql3 = "SELECT * FROM med_dele where refno = '" . $mid . "'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch();

    $pubdate= $row1["tdate"] ;
    $da = strtotime($pubdate);
    $dat = date('H:i:s', $da);


    echo '<br>
        <div id="page-wrap"> 
<div> 
<table style="width:100%;margin-top:35px;">

  <tr>
    <td colspan="3"  align="center"><p style="height: 30%;">'.bar128(stripcslashes($row2["patientno"])).'</p>
	</td> 
  </tr>
    <tr >
     <td align="center"><p><font size="1">' . $row1["name"] . ' / ' . $row2["labref"] . '</font></p></td>
       </tr>
    <tr >
     <td align="center"><p><font size="1">' . $row2["age_years"] . 'Y / ' . $row2["sex"] . '</font></p></td>
  </tr>
  </tr>
</table>
</div>
<br>';
?>




