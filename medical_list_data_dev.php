<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Medical List</title>

        <style>
            /*table
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
            }*/
            th { white-space: nowrap; }
        </style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

 <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script language="JavaScript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script language="JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script language="JavaScript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script language="JavaScript" src=" https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


 <script language="JavaScript" src="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"></script>








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

        $tb .= "<center>";
        

        ?>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Lab No</th>
                <th>PP No</th>
                <th>Name</th>
                <th>Medical</th>
                <th>Country</th>
                <th>Amount</th>
                <th>Refund</th>
                <th>Balance</th>
                <th>Sex</th>

            </tr>
        </thead>
        <tbody>


<?php


 $temp = 0;



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
while ($row = mysqli_fetch_array($result)) {

     $sql1 = "SELECT * FROM mediprint_main where refno = '" .$row['refno'] . "'"; 
     $result1 = mysqli_query($GLOBALS['dbinv'], $sql1); 
    while ($row1 = mysqli_fetch_array($result1)) {
        $temp = $temp ." : ". $row1["mediDescript"];  
    }



     $bal = $row['csh_amt'] - $row['refamt'];


            $balall=$balall+$bal;

             $balrefall= $balrefall+$row['refamt'];

             $balamoall= $balamoall+$row['csh_amt'];
    



    echo '<tr>';
    echo '<td>'.$row['labref'].'</td>';
    echo '<td>'.$row['patientno'].'</td>';
    echo '<td>'. $row['fname'] ." ". $row['lastname']. '</td>';
    echo '<td style=\"text-align: center;>'. substr($temp,2) .'</td>';
    echo '<td>'. $row['countryname'].'</td>';
    echo '<td>'.$row['csh_amt'].'</td>';
    echo '<td>'. $row['refamt'] .'</td>';
    echo '<td>'.$bal.'</td>';
    echo '<td>'.$row['sex'] .'</td>';
    echo '</tr>';

    $temp = "";
}
?>
           
           

        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" style="text-align:right">Total:</th>
                <th  style="text-align:right">Total:</th>
                <th  style="text-align:right">Total:</th>
             
             
                <th></th>

            </tr>
        </tfoot>

      <!--   <div class="form-group">
                    <div class="col-sm-4">
                         <input class="button button2" type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export to Excel">
 <div class="form-group"><br></div>

                    </div>
                </div> -->
    </table>
       
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {


   dom: 'Bfrtip',
        buttons: [  
            'print', 'excel', 'pdf'

        ],


      
           
        
        "pageLength": 15,
        // "paging": false,
        "ordering": false,
        "searching": false,


        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total1 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                total2 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                 total3 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



              
            // Total over this page
            pageTotal1 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
                // Total over this page
            pageTotal2 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                // Total over this page
            pageTotal3 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



                
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                pageTotal1 +' ( '+ total1 +' total)'
            );
            // Update footer
            $( api.column( 6 ).footer() ).html(
                pageTotal2 +' ( '+ total2 +' total)'
            );

             // Update footer
            $( api.column( 7 ).footer() ).html(
                pageTotal3 +' ( '+ total3 +' total)'
            );


           
        }
    } );

    
} );
</script>

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

           





    </body>
</html> 
  