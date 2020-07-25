 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>STOCK REPORT</title>
        <style>
            body{
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
            }
            table
            {
                border-collapse:collapse;
            }
            table, td, th
            {
                font-family:Arial, Helvetica, sans-serif;
                padding:4px;
            }
            th
            {
                font-weight:bold;
                font-size:12px;
            }
            td
            {
                font-size:12px;
                border-bottom:  none;
                border-top:  none;
            }
            .topbor {
                border-top: none;
                border-bottom: none;
                border-right: 1px solid ;
            }

            .topbor1 {
                border-bottom: 0.5px dotted #000000 ;
            }
        </style>
        <style type="text/css">
            <!--
            .style1 {
                color: #0000FF;
                font-weight: bold;
                font-size: 24px;
            }
            <!--
            .style2 {
                color: #0000FF;
                font-weight: bold;
                font-size: 20px;
            }

            -->
        </style>
    </head>

    <body> 


        <?php
        session_start(); 
if($_GET['stname']=="sales"){
        date_default_timezone_set('Asia/Colombo');
        require_once ("connection_sql.php"); 
          
            $d1 = $_GET["dtfrom"];
            $d2 = $_GET["dtto"]; 
            
            $sql_head = "select * from invpara"; 
            $result_head = $conn->query($sql_head); 
            $row_head = $result_head->fetch(); 
              
            $stt = "<center><h3 class='style1'>".$row_head["COMPANY"]."</h3></center>";
            $stt .= "<center><h3>SALES REPORT</h3></center>"; 
            
            $stt .= "<center><table border='1'>";
            $stt .= "<tr>
                    <th width='200'>PHARAMACY NO</th> 
                    <th  width='160'>DATE</th>
                    <th  width='160'>PATIENT CODE</th>
                    <th  width='160'>PATIENT NAME</th>
                    <th  width='160'>AMOUNT</th> ";
            $stt .= "</tr>";
            
            $tot=0;
             $sql = "select * from pharamacy where cancel='0' and sdate>='".$_GET["dtfrom"]."' and sdate<='".$_GET["dtto"]."' order by id desc";   
            
           
            foreach ($conn->query($sql) as $row) { 
                $stt .= "<tr class='topbor1'><td align='center'>" . $row['pharmcyno'] . "</td>";
                $stt .= "<td align='center'>" . $row['sdate'] . "</td>";
                $stt .= "<td align='center'>" . $row['cuscode'] . "</td>";
                $stt .= "<td align='center'>" . $row['cusname'] . "</td>";  
                $stt .= "<td align='center' style='text-align:right'>" . number_format($row['grandtot1'],2,".",",") . "</td>";  
                $stt .= "</tr>";
                
                $tot=$tot+$row['grandtot1'];
            }

            $stt .= "<tr><td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td> <td>TOTAL</td><td align='right'><b>" . number_format($tot,2,".",",") . "</b></td></tr>";
            $stt .= "</table></center>";
          
      
        echo $stt;
}

if($_GET['stname']=="expense"){
        date_default_timezone_set('Asia/Colombo');
        require_once ("connection_sql.php"); 
          
            $d1 = $_GET["dtfrom"];
            $d2 = $_GET["dtto"]; 
            
            $sql_head = "select * from invpara"; 
            $result_head = $conn->query($sql_head); 
            $row_head = $result_head->fetch(); 
              
            $stt = "<center><h3 class='style1'>".$row_head["COMPANY"]."</h3></center>";
            $stt .= "<center><h3>EXPENSE REPORT</h3></center>"; 
            
            $stt .= "<center><table border='1'>";
            $stt .= "<tr>
                    <th width='200'>EXPENSE NO</th> 
                    <th  width='160'>DATE</th>
                    <th  width='160'>NOTE</th> 
                    <th  width='160'>AMOUNT</th> ";
            $stt .= "</tr>";
            
            $tot=0;
             $sql = "select * from expense where cancel='0' and sdate>='".$_GET["dtfrom"]."' and sdate<='".$_GET["dtto"]."' order by id desc";   
            
           
            foreach ($conn->query($sql) as $row) { 
                $stt .= "<tr class='topbor1'><td align='center'>" . $row['expensemo'] . "</td>";
                $stt .= "<td align='center'>" . $row['sdate'] . "</td>";
                $stt .= "<td align='center'>" . $row['note'] . "</td>"; 
                $stt .= "<td align='center' style='text-align:right'>" . number_format($row['amount'],2,".",",") . "</td>";  
                $stt .= "</tr>";
                
                $tot=$tot+$row['amount'];
            }

            $stt .= "<tr><td >&nbsp;</td><td>&nbsp;</td>  <td>TOTAL</td><td align='right'><b>" . number_format($tot,2,".",",") . "</b></td></tr>";
            $stt .= "</table></center>";
          
      
        echo $stt;
}
        ?>



    </body>
</html>
