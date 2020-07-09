<?php

include './connection_sql.php';
?>





<?php

include './connection_sql.php';


$mid = $_GET["refno_txt"];



    $sql1 = "SELECT * FROM cashier where refno = '" . $mid . "'";


    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch();

    




    echo '<br>
        <div id="page-wrap"> 
<div> 
<table style="width:100%">
  <tr >
    <th colspan="5"  ><h3 style="MARGIN-RIGHT: 350PX;">MEDILAB LANKA (PVT) LTD</h3></th>
  </tr>
  <tr>
    <th colspan="5"><p style="MARGIN-RIGHT: 350PX;">No 260, Deans Road, Colombo 10</p></th>
  </tr>
  <tr>
    <th colspan="5"><p style="MARGIN-RIGHT: 350PX;">TEL : 011-5836661, 011-5851223</p></th>
  </tr>
  <tr>
    <th colspan="5"><p style="MARGIN-RIGHT: 350PX;">WEB :www.medilablanka.com</p></th>
  </tr>
   <tr>
    <th colspan="5"><p style="MARGIN-RIGHT: 350PX;">Recipt Copy</p></th>
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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td  width="5%" align="center" height="15">Date </td>
    <td  width="1%" align="left" > : ' . $row1["cdate"] . ' </td>
    <td  width="50%" align="left" height="15"></td>
    <td></td>
  </tr>
  <tr>
    <td ></td>
    <td width="5%" align="center" height="15"> Lab No</td>
    <td  width="1%" align="left" > : ' . $row1["labno"] . ' </td>
    <td width="50%" align="left" height="15"></td>


  </tr>
  <tr>
    <td ></td>
    <td width="5%"  align="center" height="15">Name</td>
    <td  width="1%" align="left" > : ' . $row1["fname"] . ' </td>
    <td width="50%"  align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%"  align="center" height="15"> Passport No</td>
    <td  width="1%" align="left" > :  ' . $row1["pno"] . '  </td>
    <td width="50%" align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Country</td>
    <td  width="1%" align="left" > : ' . $row1["cou_name"] . '  </td>
    <td width="50%" align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Amount</td>
    <td  width="1%" align="left" > : ' . $row1["cash"] . '  </td>
    <td width="50%" align="left" height="15"></td>

  </tr>

  <tr>
    <td></td>
    <td width="5%" align="center" height="15"></td>
    <td  width="1%" align="left" >  </td>
    <td width="50%" align="left" height="15"></td>

  </tr>
 <tr>
    <td></td>
    <td width="5%" align="center" height="15">Paid</td>
    <td  width="1%" align="left" > : ' . $row1["pamt"] . '</td>
    <td width="50%" align="left" height="15"> </td>

  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Agent</td>
    <td  width="1%" align="left" > : ' . $row1["agname"] . ' </td>
    <td width="50%" align="left" height="15"> </td>

  </tr>

</table>

<table style="width:100%">
  


  <tr>
    <td></td>


    
    <td width="100%" height="20"><b style="MARGIN-left: 10PX;">* Please Produce This Recipt To Collect Report</b> </td>

  </tr>
</table>
</div>
<br>';
?>




