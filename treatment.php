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
<section class="content">
   <div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title"><b>New Treatment Create</b></h3>
      <h4 style="float: right;height: 3px;"><b id="time"></b></h4>
   </div>
   <form name= "form1" role="form" class="form-horizontal">
      <div class="box-body">
         <input type="hidden" id="uniq" class="form-control">
         <input type="hidden" id="item_count" class="form-control">
         <div class="form-group">
            <a onclick="newent();" class="btn btn-default  ">
            <span class="fa fa-user-plus"></span> &nbsp; New
            </a>
            <a onclick="save_inv();" class="btn btn-success  ">
            <span class="fa fa-save"></span> &nbsp; Save
            </a>
            <a onclick="print_inv();" class="btn btn-primary  ">
            <span class="fa fa-print"></span> &nbsp; Print
            </a>
            <a onclick="cancel_inv();" class="btn btn-danger  ">
            <span class="fa fa-trash"></span> &nbsp; Cancel
            </a>
         </div>
         <div class="form-group"></div>
         <div class="form-group"></div>
         <div id="msg_box"  class="span12 text-center"  ></div>
         <div class="form-group">
            <!-- //////////////////////////////// -->
            <div class="col-md-4">
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Treat No</label>
                  <div class="col-xs-5">
                     <input type="text" placeholder="Treat No" disabled="" id="treatno" class="form-control">
                  </div>
                  <div class="col-xs-1">
                     <a href="search_invoice.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onfocus="this.blur()">
                     <input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
                     </a>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Name</label>
                  <div class="col-md-6">
                     <select name="treatment1" id="treatment1" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                        <option value="">Select Pation</option>
                        <?php
                           require_once("./connection_sql.php");
                           $sql = "Select * from treatment  where cancel ='0'";
                           foreach ($conn->query($sql) as $row) {
                               echo "<option data-subtext='" . $row["name"] . "'>" . $row["name"] . "</option>";
                           }
                           ?>
                     </select>
                  </div> 
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Nic</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Nic" id="nic" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Tel</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Nic" id="tel" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 " for="txt_usernm">Sex</label>
                  <div class="col-sm-3">
                     <input type="radio" name="sex" value="Male" id="male" /> Male
                  </div>
                  <div class="col-md-3">
                     <input type="radio" name="sex" value="Female" id="female" /> Female
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Age</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Age" id="age" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">PR</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="PR" id="pr" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">BP</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="BP" id="bp" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Weight</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Weight" id="weight" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">B Group</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="B Group" id="weight" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Height</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Height" id="height" class="form-control">
                  </div>
               </div>
            </div>
            <!-- ====================================== -->
            <div class="col-md-4">
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Treat Date</label>
                  <div class="col-xs-4">
                     <input type="text"   value="<?php echo date('Y-m-d'); ?>"   id="sdate" class="form-control dt">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="c_code">Treatment</label>
                  <div class="col-md-9">
                     <select name="treatment1" id="treatment1" multiple="multiple"  class="form-control input-sm">
                     <?php
                        require_once("./connection_sql.php");
                        $sql = "Select * from treatment  where cancel ='0'";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="c_code">Investigation</label>
                  <div class="col-md-9">
                     <select name="investi1" id="investi1"  multiple="multiple" class="form-control input-sm"> 
                     <?php
                        require_once("./connection_sql.php");
                        $sql = "Select * from treatment  where cancel ='0'";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="c_code">Complain</label>
                  <div class="col-md-9">
                     <select name="complain1" id="complain1"  multiple="multiple"  class="form-control input-sm"> 
                     <?php
                        require_once("./connection_sql.php");
                        $sql = "Select * from treatment  where cancel ='0'";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="c_code">Allergy</label>
                  <div class="col-md-9">
                     <select name="allergy1" id="allergy1"  multiple="multiple"  class="form-control input-sm"> 
                     <?php
                        require_once("./connection_sql.php");
                        $sql = "Select * from treatment  where cancel ='0'";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                        ?>
                     </select>
                  </div>
               </div>
            </div>
            <!-- ////////////////////////////////////////// -->
            <div class="col-md-4">
  
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                       
                    </p>
                </figure>
            </div>
         </div>
   </form>
   </div>
</section>
<script src="js/treatment.js" type="text/javascript"></script>
<script>newent();</script>