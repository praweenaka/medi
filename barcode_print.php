    <!-- Main content -->
    <?php
    require_once './connection_sql.php';
    ?>
    <link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Barcode Print</h3>
            </div>
            <form name= "form1" role="form" class="form-horizontal">
                <div class="box-body">
                    <input type="hidden" id="tmpno" value="" class="form-control">
                    <input type="hidden" id="item_count" class="form-control">

                    <div class="form-group">

                    <a onclick="NewWindow('search_service_register.php?stname=barcode', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                     <a onclick="printBarcode();" class="btn btn-danger btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Print
                    </a>
                    </div>
                    <div id="msg_box"  class="span12 text-center"  ></div> 


                    <div class="col-md-12">
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Ref No</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Ref No" id="txt_refno" class="form-control  input-sm" disabled="">
                            </div>
                              <label class="col-sm-1" for="invno">Date</label>
                            <div class="col-sm-2">
                                <input type="date" placeholder="Date" onload="getDate()" name="txt_srdate" id="txt_srdate"  class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Passport No.</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Passport No." id="txt_patno" class="form-control  input-sm">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">First Name</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="First Name" id="txt_fname" class="form-control  input-sm" disabled="">
                            </div>
                            <label class="col-sm-1" for="invno">last Name</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="last Name" id="txt_lname" class="form-control  input-sm">
                            </div>
                        </div> 
                    </div>
                </section>

<script src="js/barcode_print.js"></script>




