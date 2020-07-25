<?php
include './connection_sql.php';
?>

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">REPORTS</h3>
        </div>
        <form name= "form1" role="form" target="_blank" action="report_stock.php" method="GET" class="form-horizontal">
            <div class="box-header with-border">
                <h3 class="box-title">STOCK REPORT AS AT</h3>
            </div>
            <div class="box-body"> 
                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="form-group"> 
                    <label class="col-sm-1 control-label" for="dtfrom">Date From</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="Date" name="dtfrom" id="dtfrom" disabled value="<?php echo date('Y-m-d'); ?>" class="form-control dt input-sm">
                    </div> 
                    <label class="col-sm-1 control-label" for="dtto">Date To</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="Date" name="dtto" id="dtto" disabled value="<?php echo date('Y-m-d'); ?>" class="form-control dt input-sm">
                    </div>

                    <button type="submit" class="btn btn-primary" value="View"> View</button>
                </div> 


            </div>
        </form>
        <form name= "form1" role="form" target="_blank" action="report_sales.php" method="GET" class="form-horizontal">
            <div class="box-body">
            <div class="box-header with-border">
                <h3 class="box-title">SALES REPORT</h3>
            </div>
                <input type="text"c name="stname" id="stname" value="sales" class="hidden">
                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="form-group"> 
                    <label class="col-sm-1 control-label" for="dtfrom">Date From</label>
                    <div class="col-sm-2">
                        <input type="date" placeholder="Date" name="dtfrom" id="dtfrom" value="<?php echo date('Y-m-d'); ?>" class="form-control  input-sm">
                    </div> 
                    <label class="col-sm-1 control-label" for="dtto">Date To</label>
                    <div class="col-sm-2">
                        <input type="date" placeholder="Date" name="dtto" id="dtto" value="<?php echo date('Y-m-d'); ?>" class="form-control  input-sm">
                    </div> 
                    <button type="submit" class="btn btn-primary" value="View"> View</button>
                </div> 


            </div>
        </form>
        
        <form name= "form1" role="form" target="_blank" action="report_sales.php" method="GET" class="form-horizontal">
            <div class="box-body">
            <div class="box-header with-border">
                <h3 class="box-title">EXPENSES REPORT</h3>
            </div>
                <input type="text"c name="stname" id="stname" value="expense" class="hidden">
                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="form-group"> 
                    <label class="col-sm-1 control-label" for="dtfrom">Date From</label>
                    <div class="col-sm-2">
                        <input type="date" placeholder="Date" name="dtfrom" id="dtfrom" value="<?php echo date('Y-m-d'); ?>" class="form-control  input-sm">
                    </div> 
                    <label class="col-sm-1 control-label" for="dtto">Date To</label>
                    <div class="col-sm-2">
                        <input type="date" placeholder="Date" name="dtto" id="dtto" value="<?php echo date('Y-m-d'); ?>" class="form-control  input-sm">
                    </div> 
                    <button type="submit" class="btn btn-primary" value="View"> View</button>
                </div> 


            </div>
        </form>
        
         
    </div>

</section>  
