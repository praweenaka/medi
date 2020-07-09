<?php

include './connection_sql.php';
?>





<?php

include './connection_sql.php';


$mid = $_GET["txt_ref"];



    $sql1 = "SELECT * FROM sregdetails where refno = '" . $mid . "'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch();

    $sql12 = "SELECT * FROM mediprint_main where refno = '" . $mid . "'";
    $result12 = $conn->query($sql12);
    $row12 = $result12->fetch();


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
    <td  width="20%" align="center" height="15">Date </td>
    <td  width="1%" align="left" > : ' . $row1["srdate"] . ' </td>
    <td  width="50%" align="left" height="15"></td>
    <td></td>
  </tr>
  <tr>
    <td ></td>
    <td width="5%" align="center" height="15"> Lab No</td>
    <td  width="1%" align="left" > : ' . $row1["labref"] . ' </td>
    <td width="50%" align="left" height="15"></td>


  </tr>
  <tr>
    <td ></td>
    <td width="5%"  align="center" height="15">Name</td>
    <td  align="left" > : ' . $row1["fname"] . " "  . $row1["lastname"] .' </td>
    <td width="50%"  align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%"  align="center" height="15"> Passport No</td>
    <td  width="1%" align="left" > :  ' . $row1["patientno"] . '  </td>
    <td width="50%" align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Country</td>
    <td  width="1%" align="left" > : ' . $row1["countryname"] . '  </td>
    <td width="50%" align="left" height="15"></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Amount</td>
    <td  width="1%" align="left" > : ' . $row1["meditot"] . '  </td>
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
    <td  width="1%" align="left" > : ' . $row1["paid_amt"] . '</td>
    <td width="50%" align="left" height="15"> </td>
  </tr>
  <tr>
    <td></td>
    <td width="5%" align="center" height="15">Agent</td>
    <td  width="1%" align="left" > : ' . $row1["agname"] . ' </td>
    <td width="50%" align="left" height="15"> </td>
  </tr>';

                 if ($row1["refamt"] == "0"  || $row1["refamt"] == "") {


                 }else{
                    echo'
                 <tr>
                  <td></td>
                  <td width="5%" align="center" height="15">Refund</td>
                  <td  width="1%" align="left" > : ' . $row1["refamt"] . ' </td>
                  <td width="50%" align="left" height="15"> </td>';
                 }

    echo '

  </tr>
</table>

<table style="width:100%">
<tr>
    <td></td>
    <td width="100%" height="20"><b style="MARGIN-left: 10PX;"><u>Test</u></b> </td>
  </tr>';
                if ($row1["newref"] == "" ||  $row1["newref"] == "NM") { 
                }else{                
                

                $sql12 = "SELECT * FROM mediprint_main where refno = '" . $mid . "'";                

                            echo '<tr>
                              <td></td>
                              <td colspan=2 width="40px" height="20" >';                

                              $temp = "";
                        foreach ($conn->query($sql12) as $row) {
                           $temp = $temp ." : ". $row["mediDescript"];                

                        }
                            echo '<font size="2"><b style="MARGIN-left: 10PX;">' . substr($temp,2) . '</b></font>';
                            echo '</td>
                            </tr>';
}
echo'
<tr>
    <td></td>
    <td width="100%" height="20"><b style="MARGIN-left: 10PX;">* Please Produce This Recipt To Collect Report</b> </td>
  </tr>


</table>
</div>
<br>';
?>




