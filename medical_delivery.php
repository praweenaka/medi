                            <!-- Main content -->
                            <?php
                            date_default_timezone_set('Asia/Colombo');
                            require_once './connection_sql.php';
                            ?>
                            <section class="content">

                              <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Medical Delivery</h3>
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
                                      <a onclick="NewWindow('search_medical_delivery.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                                      </a>
                                      

                                      <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                                        <span class="fa fa-folder"></span> &nbsp; Print
                                      </a>

                                      <a onclick="cancel();" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                                      </a>

                                      <a onclick="delivered();" class="btn btn-primary btn-sm">
                                        <span class="fa fa-truck"></span> &nbsp; Deliver
                                      </a>
                                    </div>
                                    <div id="msg_box"  class="span12 text-center"  ></div>

                                    <div class="col-md-12">

                                      <div class="form-group"></div>
                                      <div class="form-group-sm">
                                        <label class="col-sm-1" for="invno">Ref No.</label>
                                        <div class="col-sm-2">
                                          <input type="text" placeholder="" id="refno" class="form-control  input-sm"  disabled="">
                                        </div>

                                        <label class="col-sm-1" for="invno">Serial No</label>
                                        <div class="col-sm-2">
                                          <input type="text" placeholder="" id="serino_txt" class="form-control  input-sm">
                                        </div>

                                        <a onfocus="this.blur()" onclick="NewWindow('search_service_register.php?stname=medi_deli', 'mywin', '800', '700', 'yes', 'center');
                                        return false" href="">
                                        <button type="button" class="btn btn-danger">
                                          <span>...</span>
                                        </button>
                                      </a>

                                    </div>

                                    <div class="form-group"></div>
                                    <div class="form-group-sm">
                                      
                                      <label class="col-sm-1" for="invno">Medical Date</label>
                                      <div class="col-sm-2">

                                        <input type="date" placeholder="Medical Date" name="mdate_txt" id="mdate_txt"  class="form-control  input-sm">
                                      </div>
                                      <label class="col-sm-1" for="invno">Passport No.</label>
                                      <div class="col-sm-2">
                                        <input type="text" placeholder="Passport No." id="pno_txt" class="form-control  input-sm">
                                      </div>
                                    </div>

                                    

                                    <div class="form-group"></div>
                                    <div class="form-group-sm">
                                      <label class="col-sm-1" for="invno">Name</label>
                                      <div class="col-sm-1">
                                        <input type="text" placeholder="" id="name1_txt" class="form-control  input-sm">
                                      </div>
                                      <div class="col-sm-2">
                                        <input type="text" placeholder="" id="name2_txt" class="form-control  input-sm">
                                      </div>

                                      <label class="col-sm-1" for="invno">Our Ref</label>
                                      <div class="col-sm-2">
                                        <input type="text" placeholder="Our Ref" id="ourref_txt" class="form-control  input-sm">
                                      </div>


                                    </div>

                                    <div class="form-group"></div>
                                    <div class="form-group-sm">
                                      <label class="col-sm-1" for="invno">Delevery Date</label>
                                      <div class="col-sm-2">
                                        <input type="date" placeholder="Delivery Date" name="dele_txt" id="dele_txt" class="form-control  input-sm">

                                        
                                      </div>
                                      <label class="col-sm-1" for="invno">Time</label>
                                      <div class="col-sm-2">

                                        <input value="<?php echo date('h:m'); ?>" type="time" id="time_txt"   name="time_txt"  class="form-control input-sm" required> 
                                      </div>
                                    </div>

                                    <div class="form-group"></div>
                                    

                                    
                                    

                                    <div class="form-group-sm">  
                                      <label class="col-sm-1" for="invno">Remarks</label>
                                      <div class="col-sm-2">
                                        <textarea id="remarks_txt"  rows="4" cols="10" class="form-control  input-sm"></textarea>
                                      </div>

                                    </div>
                                  </div>

                                  <div class="form-group"></div>
                                  <div class="form-group-sm">  
                                    <label class="col-sm-1" for="invno">Medical Amount</label>
                                    <div class="col-sm-2">
                                     <input type="text" placeholder="Medical Amount" id="medamt_txt" class="form-control  input-sm">
                                   </div>
                                   <label class="col-sm-1" for="invno">Paid Amount</label>
                                   <div class="col-sm-2">
                                     <input type="text" placeholder="Paid Amount" id="paidamt_txt" class="form-control  input-sm">
                                   </div>
                                   <label class="col-sm-1" for="invno">Balance To Pay</label>
                                   <div class="col-sm-2">
                                     <input type="text" placeholder="Balance To Pay" id="balpay_txt" class="form-control  input-sm">
                                   </div>
                                 </div>
                                 <div class="col-sm-3" align="right">
                                  <div id="getImg"></div>
                                </div>
                                
                                

                              </div>
                              

                              
                              <div class="form-group-sm">   
                                
                               
                              </div>
                            </div>


                          </section>
                          <script src="js/medical_delivery.js"></script>
                          <script>newent();</script>



