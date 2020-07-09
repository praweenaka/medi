    <!-- Main content -->
    <?php
    require_once './connection_sql.php';
    ?>
    <link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Country</h3>
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
                    <a onclick="NewWindow('search_country_main.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
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
                            <label class="col-sm-1" for="invno">Country Code</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Country Code" id="ccode_txt" class="form-control  input-sm" disabled="">
                            </div>
                             <div class="col-sm-2">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                            <!--hidden-->
                        </div>

                        <div class="form-group"></div>
                         <div class="form-group-sm">
                              <label class="col-sm-1" for="invno">Country Name</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Country Name" id="cname_txt" class="form-control  input-sm">
                            </div>
                        </div>
                        <div class="form-group"></div>
                         <div class="form-group-sm">
                             <label class="col-sm-1" for="invno">Country Head</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Counrty Head" id="chead_txt" class="form-control  input-sm">
                            </div>
                        </div>
                         <div class="form-group"></div>
                         <div class="form-group-sm">
                            <label class="col-sm-1" for="invno">Amount</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Amount" id="amt_txt" class="form-control  input-sm">
                            </div>
                        </div>

                         <div class="form-group"></div>
                         <div class="form-group-sm">

                             <label class="col-sm-1" for="invno">Short</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Short" id="short_txt" class="form-control  input-sm">
                            </div>
                        </div>

                         <div class="form-group"></div>
                         <div class="form-group-sm">

                             <label class="col-sm-1" for="invno">Reference</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Reference" id="refno_txt" class="form-control  input-sm">
                            </div>
                        </div>
                            

                        
                        </div>

                       

                    </div>

                  </div>

                </div>
                   






                        </section>
                        <script src="js/country.js"></script>
                        <script>newent();</script>



