    <!-- Main content -->
    <?php
    require_once './connection_sql.php';
    ?>
    <link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer</h3>
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
                    <a onclick="NewWindow('search_customer.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                    <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-folder"></span> &nbsp; Print
                    </a>

                    <a onclick="update1();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-download"></span> &nbsp; Update
                    </a>

                     <a onclick="cancel();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                    </a> 
                    </div>
                    <div id="msg_box"  class="span12 text-center"  ></div> 


                    <div class="col-md-12">
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Customer Code</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Customer Code" id="cust_txt" class="form-control  input-sm" disabled="">
                            </div>

                              <div class="col-sm-2">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                            <!--hidden-->
                        </div>
                    </div>


                     <div class="form-group"></div>
                        <div class="form-group-sm">
                              <label class="col-sm-1" for="invno">Name</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Name" id="name_txt" class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Address</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Address" id="addr1_txt" class="form-control  input-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Address" id="addr2_txt" class="form-control  input-sm">
                            </div>
                        </div>

                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Contact Person</label>
                            <div class="col-sm-2">
                             <input type="text" placeholder="Contact Person" id="contact_txt" class="form-control  input-sm">
                            </div>
                            
                        </div>

                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-sm-1" for="c_code">Opening Balance</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Opening Balance" id="openbal_txt" class="form-control  input-sm">
                            </div>

                             <label class="col-sm-1" for="invno">Opening Date</label>
                            <div class="col-sm-2">
                               <input type="date" placeholder="Opening Date" id="opdate_txt" class="form-control  input-sm">
                            </div>

                        </div>



                         <div class="form-group"></div>
                            <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Current Balance</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Current Balance" id="currbal_txt" class="form-control  input-sm">
                            </div>
                            <label class="col-sm-1" for="invno">Credit Limit</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Credit Limit" id="crlimit_txt" class="form-control  input-sm">
                            </div>
                           
                        </div>


                        <div class="form-group"></div>
                        <div class="form-group-sm">

                          
                            <label class="col-sm-1" for="invno">Telephone </label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Telephone" id="telno_txt" class="form-control  input-sm">
                            </div>

                            <label class="col-sm-1" for="invno">Fax</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Fax" id="fax_txt" class="form-control  input-sm">
                            </div>
                        </div>



                         <div class="form-group"></div>
                         <div class="form-group-sm">

                             <label class="col-sm-1" for="invno">E-mail Address</label>
                            <div class="col-sm-2">

                                <input type="text" placeholder="E-mail Address" id="email_txt" class="form-control  input-sm">
                            </div>
                        </div>



                         <div class="form-group"></div>
                         <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Labour Li No</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Labour Li No" id="labourno_txt" class="form-control  input-sm">
                            </div>
                            </div>


                        </div>

                    </div>

                </form>

            </div>








                        </section>
                        <script src="js/customer.js"></script>
                        <script>newent();</script>



