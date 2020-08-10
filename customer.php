<?php
   session_start();
   ?> 
<style type="text/css">
   @import url(https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css);
     
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
   $(function () {
     $("select").select2();
   });
   
</script>
    <link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ADD PATIENT</h3>
                <h4 style="float: right;height: 3px;"><b id="time"></b></h4>
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


                        <!--<a onclick="update111();" class="btn btn-danger btn-sm">-->
                        <!--    <span class="glyphicon glyphicon-download"></span> &nbsp; Update-->
                        <!--</a>-->

                        <a onclick="cancel();" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                        </a> 
                    </div>
                    <div id="msg_box"  class="span12 text-center"  ></div> 


                    <div class="col-md-12">
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                            <label class="col-md-2" for="invno">PATIENT CODE</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="PATIENT CODE" id="cust_txt" class="form-control  input-sm" disabled="">
                            </div>

                            <div class="col-sm-3">
                                <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                                <!--hidden-->
                            </div>
                        </div>


                        <div class="form-group"></div>
                        <div class="form-group-sm">
                          <label class="col-sm-2" for="invno">NAME</label>
                          <div class="col-sm-3">
                            <input type="text" placeholder="NAME" id="name_txt" class="form-control  input-sm">
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group-sm">
                           <label class="col-sm-2" for="invno">ADDRESS</label>
                           <div class="col-sm-3">
                            <input type="text" placeholder="ADDRESS" id="addr1_txt" class="form-control  input-sm">
                        </div> 

                    </div>
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="invno">BIRTHDAY</label>
                        <div class="col-sm-3">
                         <input type="text" placeholder="BIRTHDAY" id="age" class="form-control dt input-sm  ">
                     </div>
                     <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="invno">CONTACT NO</label>
                        <div class="col-sm-3">
                         <input type="text" placeholder="CONTACT NO" id="contact_txt" class="form-control  input-sm">
                     </div>

                 </div>
                 <div class="form-group"></div>
                <div class="form-group-sm">
                      <label class="col-md-2" for="txt_usernm">B GROUP</label>
                      <div class="col-md-3">
                          <select name="bgroup" id="bgroup" class="form-control input-sm" >
                              <!--<option value="">Select Group</option>-->
                              <option value="A+">A+</option>
                              <option value="A-">A-</option> 
                              <option value="B+">B+</option> 
                              <option value="B-">B-</option> 
                              <option value="O+">O+</option> 
                              <option value="O-">O-</option> 
                              <option value="AB+">AB+</option> 
                              <option value="AB-">AB-</option>  
                          </select>
                      </div>
                   </div>

                 <div class="form-group"></div>
                 <div class="form-group-sm">

                     <label class="col-sm-2" for="invno">E-MAIL ADDRESS</label>
                     <div class="col-sm-3">

                        <input type="text" placeholder="E-MAIL ADDRESS" id="email" class="form-control  input-sm">
                    </div>
                </div>
                
                
                <div class="form-group"></div>
                 <div class="form-group-sm">

                     <label class="col-sm-2" for="invno">ALLERGY</label>
                     <div class="col-sm-3">
                        <select name="allergy" id="allergy" style="width: 100%" multiple="multiple"  class="form-control input-sm"> 
                                             <?php
                                                require_once("./connection_sql.php");
                                                $sql = "Select * from allergy  where cancel ='0'";
                                                foreach ($conn->query($sql) as $row) {
                                                    echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                    </div>
                </div>
                <div class="form-group"></div>
                 <div class="form-group-sm">

                     <label class="col-sm-2" for="invno">MEDICAL/SERGICAL HISTORY</label>
                     <div class="col-sm-3">
                        <select name="s_diag" id="s_diag" style="width: 100%" multiple="multiple"  class="form-control input-sm"> 
                                             <?php
                                                require_once("./connection_sql.php");
                                                $sql = "Select * from s_diagnosis  where cancel ='0'";
                                                foreach ($conn->query($sql) as $row) {
                                                    echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                    </div>
                </div>
                <div class="form-group"></div>
                <div class="form-group-sm">

                     <label class="col-sm-2" for="invno">NOTE</label>
                     <div class="col-sm-3">
                         <textarea placeholder="NOTE" id="note" class="form-control input-sm"></textarea>
                    </div>
                </div>
                

            </div>

        </div>

    </form>

</div>
 

</section>
<script src="js/customer.js"></script> 

<script>setTimeout(function(){ newent(); }, 1700);</script>

