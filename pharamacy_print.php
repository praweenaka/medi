 <?php session_start(); ?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>RECEIPT PRINT</title>
  
    </head>

    <body>


<?php

include './connection_sql.php';

$mid = $_GET["pharmcyno"];

    $sqlpara = "SELECT * FROM invpara";
    $resultpara = $conn->query($sqlpara);
    $rowpara = $resultpara->fetch();
    
    $sql = "SELECT * FROM pharamacy where pharmcyno = '" . $mid . "'"; 
    $result = $conn->query($sql);
    $row = $result->fetch();

 ?>
         
<table style="width:100%">
  <tr >
    <th colspan="2"  ><h2><p style="MARGIN-right: 44PX;"><?php echo $rowpara["COMPANY"]?></p></h2></th>
  </tr>
  <tr>
    <th colspan="2"><p style="MARGIN-RIGHT: 44PX;"><?php echo$rowpara["ADD1"].','.$rowpara["ADD3"]?></p></th>
  </tr>
  <tr>
    <th colspan="2"><p style="MARGIN-RIGHT: 44PX;">TEL : <?php echo$rowpara["TELE"]?></p></th>
  </tr> 
   <tr>
    <th colspan="2"><p style="MARGIN-RIGHT: 44PX;">Receipt Copy</p></th>
  </tr>
  
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td  width="10%" align="left" height="15">RECEIPT NO </td>
    <td  width="20%" align="left" > : <?php echo $row["pharmcyno"] ?></td> 
    <td></td>
  </tr>
  <tr> 
    <td  width="10%" align="left" height="15">RECEIPT DATE </td>
    <td  width="20%" align="left" > :<?php echo $row["sdate"] ?></td> 
    <td></td>
  </tr>
  <tr> 
    <td  width="10%" align="left" height="15">PATIENT</td>
    <td  width="20%" align="left" > : <?php echo $row["cusname"] ?></td> 
    <td></td>
  </tr> 
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>

</table>
<table>
 <?php  
    echo "<tr class='info'>
    <td width='80'><b>ITEM</b></td>
    <td width='60px'><b>QTY</b></td>
    <td width='60px'><b>PRICE</b></td>
    <td width='90px'><b>SUB TOTAL</b></td>
  </tr>";
  $tot=0;
   $sql1 = "SELECT * FROM pharmacy_item where pharmcyno = '" . $mid . "'"; 
  foreach ($conn->query($sql1) as $row1) {
      echo '<tr>';
    echo '<td>'.$row1['name'].'</td>';
    echo '<td align="center" >'.$row1['qty'].'</td>';
    echo '<td align="right" >'. $row1['selling'].'</td>'; 
    echo '<td align="right" >'. number_format($row1['qty']*$row1['selling'],2).'</td>'; 
    echo '</tr>';
    $tot=number_format($row1['qty']*$row1['selling'],2);
  }
  ?>
  
  <tr>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  </table> 
  <table> 
   <tr>
     <td width="1%">&nbsp;</td> 
     <td  width="2%" align="left">TOTAL</td>
    <td  width="1%" align="right" > : <?php echo number_format(str_replace(",", "", $row["grandtot"]),2) ?></td> 
    <td  width="20%" align="left"></td>
     
  </tr>
  <tr>
     <td width="1%">&nbsp;</td> 
     <td  width="2%" align="left">DOCTOR CHARGES</td>
    <td  width="1%" align="right" > : <?php echo number_format($row["dcharge"],2)?></td> 
     <td  width="20%" align="left"></td>
  </tr>
  <tr>
     <td width="1%">&nbsp;</td> 
     <td  width="2%" align="left" ><b>GRAND TOTAL</b></td>
    <td  width="1%" align="right" > : <b><?php echo number_format(str_replace(",", "", $row["grandtot1"]),2)?></b></td> 
     <td  width="20%" align="left"></td>
  </tr> 
  </table>  
  
<table>  
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
 
<tr>
    <td></td>
<td></td>

    
    <td width="100%" height="20"><b style="MARGIN-left: 100PX;">*** THANK YOU  ***</b> </td>

  </tr>
</table>  
  

</body>
</html> 
  



