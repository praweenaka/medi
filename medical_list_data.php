<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Medical List</title>

        <style>
            table
            {
                border-collapse:collapse;
            }
            table, td, th
            {
                border:1px solid black;
                font-family:Arial, Helvetica, sans-serif;
                padding:5px;
            }
            th
            {
                font-weight:bold;
                font-size:14px;

            }
            td
            {
                font-size:14px;
                border-bottom:none;
                border-top:none;
            }
        </style>

    </head>

    <body>


        <?php
        require_once("connectioni.php");

        include './connection_sql.php';
        $rep = trim($_GET["rep"]);

        $sql_head = "select * from invpara";
        $result_head = mysqli_query($GLOBALS['dbinv'], $sql_head);
        $row_head = mysqli_fetch_array($result_head);

        $tb = "<center><span class=\"style1\">" . $row_head["COMPANY"] . "</span></center><br>";

        $tb .= "<center>Medical List";

        $tb .= "<center><table border=1 id=itemdetails ><tr>";

        $tb .= "<tr >";
        $tb .= "<th width=\"70\"  background=\"\">Lab No</th>";
        $tb .= "<th width=\"100\"  background=\"\">PP No</th>";
        $tb .= "<th width=\"200\"  background=\"\">Name</th>";

        if ($_GET['option7']=='1' || $_GET['option2']=='1') {
        $tb .= "<th width=\"200\"  background=\"\">Medical</th>";
    }
        $tb .= "<th width=\"100\"  background=\"\">Country</th>";
        $tb .= "<th width=\"70\"  background=\"\">Amount</th>";
        if ($_GET['option7']=='1') {
                # code...
            }else{
        $tb .= "<th width=\"180\"  background=\"\">Refund</th>";
        $tb .= "<th width=\"180\"  background=\"\">Balance</th>";
    }
        $tb .= "<th width=\"180\"  background=\"\">Sex</th>";



        if ($_GET['option1'] == "1") { 

             $sql = "Select * from sregdetails ";
            if ($_GET['option5'] == "1") {
                $sql .= "where  srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "')  and cancel='0'  order by newref ";
            }
        } elseif ( $_GET['option2'] == "1") {
            $sql = "Select * from sregdetails where newref='RC' ";

            if ($_GET['option5'] == "1") {
                $sql .= "and   srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "') and cancel='0' order by labref  ";
            }           
        }elseif ( $_GET['option6'] == "1") {
            $sql = "Select * from sregdetails where newref='NM' ";
            if ($_GET['option5'] == "1") {
                $sql .= "and  srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "') and cancel='0'  order by labref  ";
                //echo $sql;
            }           
        }elseif ( $_GET['option7'] == "1") {
            $sql = "Select * from sregdetails where newref='MMR' ";

            if ($_GET['option5'] == "1") {
                $sql .= "and srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "') and cancel='0' order by labref ";

                
            }
        } elseif ($_GET['option3'] == "1") {
            $sql = "Select * from sregdetails  ";
            if ($_GET['option5'] == "1") {

                $sql .= "where  srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "')and cancel='0' order by labref   ";
            }
           
        } elseif ($_GET['option4'] == "1") {
            $sql = "Select * from sregdetails  ";
            if ($_GET['option5'] == "1") {
                $sql .= "where  srdate BETWEEN ('" . $_GET['from_date'] . "') AND ('" . $_GET['to_date'] . "') and cancel='0' order by labref    ";
            }           
        }else {
             $sql = "Select * from sregdetails  ";           
        }
      
        $result = mysqli_query($GLOBALS['dbinv'], $sql);



        $mbrand = "";

        $balamount="";

        $balall="";
        $balrefall="";
        $balamoall="";

        while ($row = mysqli_fetch_array($result)) {

            $sql23 = "SELECT * FROM mediprint_main where refno = '" .$row['refno'] . "'";
              foreach ($conn->query($sql23) as $row23) {
                           $temp = $temp ." : ". $row23["mediDescript"];                

                        }

            $bal = $row['csh_amt'] - $row['refamt'];


            $balall=$balall+$bal;

             $balrefall= $balrefall+$row['refamt'];

             $balamoall= $balamoall+$row['csh_amt'];


            $tb .= "<tr style=\"border-bottom:1pt solid black;\" ><td style=\"text-align: center;\">" . $row['labref'] . "</td>";
            $tb .= "<td style=\"text-align: center;\">" . $row['patientno'] . "</td>";
            $tb .= "<td style=\"text-align: center;\">" . $row['fname'] ." ". $row['lastname']. "</td>";

             if ($_GET['option7']=='1' || $_GET['option2']=='1') {

             $tb .= "<td style=\"text-align: center;\">" .$row23["mediDescript"]. "</td>";
             }


            $tb .= "<td style=\"text-align: center;\">" . $row['countryname'] . "</td>";
            $tb .= "<td style=\"text-align: center;\">" . $row['csh_amt'] . "</td>";

            if ($_GET['option7']=='1') {
                # code...
            }else{
                 $tb .= "<td style=\"text-align: center;\">" . $row['refamt'] . "</td>";
            $tb .= "<td style=\"text-align: center;\">".$bal."</td>";
            }
           
            $tb .= "<td style=\"text-align: center;\">" . $row['sex'] . "</td>";
         
            $tb .= "</tr>";

           }
           $tb .= "<th colspan=4    width=\"70\"  background=\"\"></th>";

           if ($_GET['option7']=='1' || $_GET['option2']=='1') {
              $tb .= "<th colspan=1    width=\"70\"  background=\"\"></th>";
           }
           $tb .= "<th colspan=1    width=\"70\"  background=\"\">".$balamoall."</th>";
           if ($_GET['option7']=='1') {
                # code...
            }else{

           $tb .= "<th colspan=1    width=\"70\"  background=\"\">".$balrefall."</th>";
           $tb .= "<th colspan=1    width=\"70\"  background=\"\">".$balall."</th>";
           }
           $tb .= "<th colspan=1    width=\"70\"  background=\"\"></th>";
           $tb .= "</table>";
 
           echo $tb;
        ?>

        <div class="form-group">
                    <div class="col-sm-4">
                         <input class="button button2" type="button" onclick="tableToExcel('itemdetails', 'W3C Example Table')" value="Export to Excel">
 <div class="form-group"><br></div>

                    </div>
                </div>


    </body>
</html> 
   <script>

            var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,'
                    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                                        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
                                                             return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                                 window.location.href = uri + base64(format(template, ctx))
                                                                                                }
                                                                                              })()
</script>