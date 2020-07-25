<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


            <title>Search Expense</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">

                <script language="JavaScript" src="js/expense.js"></script>

                </head>

                <body>

                    <?php if (isset($_GET['cur'])) { ?>
                        <input type="hidden" value="<?php echo $_GET['cur']; ?>" id="cur" />
                        <?php
                    } else {
                        ?>
                        <input type="hidden" value="" id="cur" />
                        <?php
                    }
                    ?>
                    <table width="735"   class="table table-bordered">

                        <tr>
                            <?php
                            $stname = "";
                            if (isset($_GET['stname'])) {
                                $stname = $_GET["stname"];
                            }
                            ?>
                            <td width="110" ><input type="text" size="20" name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                            <td width="200" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                            <td width="200" ><input type="text" size="70" name="customername1" id="customername1" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>

                    </table>    
                    <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                            <tr>
                                <th width="150">Expense No</th>
                                <th width="150">Date</th>
                                <th width="200">Amount</th>  
                                <th width="250">Note</th>  
                            </tr>

                            <?php
                            $sql = "SELECT * from expense   order by id desc limit 50";

                            $stname = "";
                            if (isset($_GET['stname'])) {
                                $stname = $_GET["stname"];
                            }

                            foreach ($conn->query($sql) as $row) {

                                echo "<tr>               
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['expenseno'] . "</a></td> 
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['sdate'] . "</a></td> 
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . number_format($row['amount'], 2, ".", ",") . "</a></td>
                              <td onclick=\"custno('" . $row['expenseno'] . "','$stname');\">" . $row['note'] . "</a></td> 
                                   
                            </tr>";
                            }
                            ?>
                        </table>
                    </div>

                </body>
                </html>
