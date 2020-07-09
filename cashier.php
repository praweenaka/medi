    <!-- Main content -->
    <?php
    require_once './connection_sql.php';
    ?>
    <link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cashier</h3>
            </div>
            <form name= "form1" role="form" class="form-horizontal">
                <div class="box-body">
                    <input type="hidden" id="tmpno" value="" class="form-control">
                    <input type="hidden" id="item_count" class="form-control">

                    <div class="form-group">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <a onclick="NewWindow('search_cashier_save.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                     <a onclick="print();" class="btn btn-danger btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Print
                    </a>


                     <a onclick="cancel();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                    </a> 
                    </div>
                    <div id="msg_box"  class="span12 text-center"  ></div> 


                    <div class="col-md-12">
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Ref No</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Ref No" id="refno_txt" class="form-control  input-sm" disabled="">
                            </div>
                              <label class="col-sm-1" for="invno">Date</label>
                            <div class="col-sm-2">
                                <input type="date" placeholder="Date" onload="getDate()" name="date_txt" id="date_txt"  class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Passport No.</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Passport No." id="pno_txt" class="form-control  input-sm">
                            </div>

                            <a onfocus="this.blur()" onclick="NewWindow('search_cashier.php', 'mywin', '800', '700', 'yes', 'center');
                                    return false" href="">
                                <button type="button" class="btn btn-primary">
                                    <span>...</span>
                                </button>
                            </a>
                        </div> 
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Name</label>
                            <div class="col-sm-2">
                                 <input type="text" placeholder="Name" id="fname_txt" class="form-control  input-sm">
                               
                                <!--  -->
                            </div>
                            
                            <div class="col-sm-2">
                                 <input type="hidden" placeholder="MediNO" id="medino_txt" class="form-control  input-sm">
                               
                                <!--  -->
                            </div>
                            
                        </div>
    
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="c_code">Agency</label>
                            <div class="col-sm-2">
                                <?php
                                echo"<select id = \"agname_txt\" class =\"form-control input-sm\">";
                                $sql = "select * from agency";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<b><option value='" . $row["medicaltype"] . "'>" . $row["medicaltype"] . "</option></b>";
                                }
                                echo"</select>";
                                ?>
                            </div>

                             <label class="col-sm-1" for="invno">Lab No.</label>
                            <div class="col-sm-2">
                                 <input type="text" placeholder="labNo" id="labno_txt" class="form-control  input-sm">
                               
                            </div>

                        </div>
                            <div class="form-group"></div>
                            <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Country ID</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Country" id="country_txt" class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Country Name</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Country Name" id="cou_name_txt" class="form-control  input-sm">
                            </div>
                            <a onfocus="this.blur()" onclick="NewWindow('search_country_dtls.php', 'mywin', '800', '700', 'yes', 'center');
                                    return false" href="">
                                <button type="button" class="btn btn-default">
                                    <span>...</span>
                                </button>
                            </a>
                        </div>


                        <div class="form-group"></div>
                        <div class="form-group-sm">

                            <label class="col-sm-1" for="invno">Cheque No</label>
                            <div class="col-sm-2">
                                 <input type="text" placeholder="Cheque No" id="chkno_txt" class="form-control  input-sm">
                            </div>

                            <label class="col-sm-1" for="invno">Cheque Amount </label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Cheque Amount" id="chkamt_txt" class="form-control  input-sm">
                            </div>

                            <label class="col-sm-1" for="invno">Cheque Date </label>
                            <div class="col-sm-2">
                                 <input type="date" placeholder="Date" name="chkdt_txt" id="chkdt_txt"  class="form-control  input-sm">
                            </div>
                        </div>

                        <div class="form-group"></div>
                         <div class="form-group-sm">

                             <label class="col-sm-1" for="invno">Cash</label>
                            <div class="col-sm-2">

                                <input type="text" placeholder="Cash" id="cash_txt" class="form-control  input-sm">
                            </div>

                          
                            <label class="col-sm-1" for="invno">Paid Amount</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Paid Amount" id="pamt_txt" class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Payment Type</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Payment Type" id="ptype_txt" class="form-control  input-sm">
                            </div>
                            </div>
                          

                        <div class="form-group"></div>
                        <div class="form-group-sm">
                             <label class="col-sm-1" for="invno">Bank</label>
                            <div class="col-sm-2">

                             <input type="text" placeholder="Bank" name="bank_txt" id="bank_txt" class="form-control  input-sm">
                            </div>
                           
                            <label class="col-sm-1" for="invno">Refund Date</label>
                            <div class="col-sm-2">

                                <input type="date" placeholder="Refund Date" name="refdt_txt" id="refdt_txt" class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Refund</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Refund" id="refund_txt" class="form-control  input-sm">

                            </div>
                        </div>
                         <div class="col-sm-3" align="right">
                                                  <div id="getImg"></div>
                                                 </div>
                                            

                       

                    </div>
                   






                        </section>
                        <script src="js/cashier.js"></script>
                        <script>newent();</script>
                



