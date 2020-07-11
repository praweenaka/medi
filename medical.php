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
      <h3 class="box-title"><b>New Medical Create</b></h3>
      <h4 style="float: right;height: 3px;"><b id="time"></b></h4>

   </div>
   <form name= "form1" role="form" class="form-horizontal">
      <div class="box-body">
         <input type="hidden" id="uniq" class="form-control">
         <input type="hidden" id="item_count" class="form-control">
         <div class="form-group">
            <div class="col-sm-9">
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
            <div class="col-sm-3">
               <div class="form-group">
                  <label class="col-md-5" for="txt_usernm">Medical Date</label>
                  <div class="col-md-6">
                     <input type="date"   value="<?php echo date('Y-m-d'); ?>"   id="sdate" class="form-control input-sm  ">
                  </div>
               </div>
            </div>
           
         </div>
         <div class="form-group"></div>
         <div class="form-group"></div>
         <div id="msg_box"  class="span12 text-center"  ></div>
         <div class="form-group">
            <!-- //////////////////////////////// -->
            <div class="col-md-4">
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Medical No</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Medical No" disabled="" id="medino" name="medino" class="form-control">
                  </div>
                  <div class="col-md-1">
                     <a href="search_invoice.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onfocus="this.blur()">
                     <input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
                     </a>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Name</label>
                  <div class="col-md-6">
                     <select name="name" id="name" class="selectpicker form-control select2"  onchange="histroy();" data-show-subtext="true" data-live-search="true" style="width: 100%">
                        <option value="">Select Patient</option> 
                        <?php
                           require_once("./connection_sql.php");
                           $sql = "Select * from customer  where cancel ='0'";
                           foreach ($conn->query($sql) as $row) {
                               echo "<option value='" . $row["code"] . "'>" . $row["name"] . "-" . $row["tel"] . "</option>";
                           }
                           ?>
                     </select>
                  </div> 
                  <div class="col-md-1">
                     <a href="home.php?url=Customer"  target="_blank">
                     <input type="button" name="searchitem" id="searchitem" value="New" class="btn btn-primary btn-sm">
                     </a>
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
                  <label class="col-md-3" for="txt_usernm">B Group</label>
                  <div class="col-md-6">
                      <select name="bgroup" id="bgroup" class="form-control input-sm" >
                          <option value="">Select Group</option>
                          <option value="A">A</option>
                          <option value="B">B</option> 
                      </select>
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Note</label>
                  <div class="col-md-6">
                     <textarea id="note"  rows="4" cols="10" class="form-control  input-sm" placeholder="Note"></textarea>
                  </div>
               </div>
                              
            </div>
            <!-- ====================================== -->
            <div class="col-md-4">
               <div class="form-group"><label class="col-md-3" for="c_code">&nbsp;</label></div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Weight</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Weight" id="weight" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Height</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="Height" id="height" class="form-control">
                  </div>
               </div> 
               <div class="form-group">
                  <label class="col-md-3" for="c_code">Treatment</label>
                  <div class="col-md-9">
                     <select name="treatment" id="treatment" style="width: 100%" multiple="multiple"  class="form-control input-sm">
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
                     <select name="investi" id="investi" style="width: 100%" multiple="multiple" class="form-control input-sm"> 
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
                     <select name="complain" id="complain" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
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
                     <select name="allergy" id="allergy" style="width: 100%" multiple="multiple"  class="form-control input-sm"> 
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
  
                <figure class="highcharts-figure" >
                    <div id="container" style="height: 350px;"></div>
                    <p class="highcharts-description">
                       
                    </p>
                </figure>
                <div id="itemdetails" style="overflow-x:auto; height: 200px;"></div>  
            </div>
             
         </div>
   </form>
   </div>
</section>
<script src="js/medical.js" type="text/javascript"></script>
<script>newent();</script>