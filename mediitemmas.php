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
      <h3 class="box-title"><b>MEDICAL MASTER</b></h3>
      <h4 style="float: right;height: 3px;"><b id="time"></b></h4>

   </div>
   <form name= "form1" role="form" class="form-horizontal">
      <div class="box-body">
         <input type="hidden" id="uniq" class="form-control">
         <input type="hidden" id="item_count" class="form-control">
         <div class="form-group">
            <div class="col-sm-9">
                <a onclick="new_ent();" class="btn btn-default  ">
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
                  <label class="col-md-5" for="txt_usernm">DATE</label>
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
            <div class="col-md-5">
                 
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">Code</label>
                  <div class="col-md-5">
                     <input type="text" placeholder="Code" id="code" class="form-control  input-sm" disabled="">
                  </div>
                  <div class="col-md-1">
                     <a href="search_mediitemmas.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onfocus="this.blur()">
                     <input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
                     </a>
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">DESCRIPTION</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="DESCRIPTION" id="des" class="form-control  input-sm">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">BRAND</label>
                  <div class="col-md-6">
                                  <select name="brand" id="brand1" class="form-control input-sm" >
                                       
                                        <?php
                                           require_once("./connection_sql.php");
                                           $sql = "Select * from brand_mas  where cancel ='0'";
                                           foreach ($conn->query($sql) as $row) {
                                               echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                           }
                                           ?>
                                  </select>
                              </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">COUNTRY</label>
                 <div class="col-md-6">
                                  <select name="country" id="country" class="form-control input-sm" >
                                       <?php
                                           require_once("./connection_sql.php");
                                           $sql = "Select * from country  where cancel ='0'";
                                           foreach ($conn->query($sql) as $row) {
                                               echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                           }
                                           ?>
                                  </select>
                              </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">COST</label>
                  <div class="col-md-6">
                     <input type="text" placeholder="COST" id="cost1" disabled class="form-control  input-sm  ">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">SELLING</label>
                  <div class="col-md-6">
                      <input type="text" placeholder="SELLING" id="selling1" disabled class="form-control  input-sm">
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-md-3" for="txt_usernm">QTY</label>
                  <div class="col-md-6">
                      <input type="text" placeholder="QTY" id="qty1" disabled class="form-control  input-sm">
                  </div>
               </div>            
            </div>
            <!-- ====================================== -->
            <div class="col-md-7">
               
                 <div class="form-group" style="background-color: #ffffff"> 
                         
                        <div id="msg_box"  class="span12 text-center"  ></div>
                        <div class="row col-sm-12"> 
                         <label class="col-sm-3" for="txt_usernm">SUPPLIER NAME</label>
                         <div class="col-sm-5">
                              <select name="s_code" id="s_code" class="form-control input-sm" >
                                      <?php
                                           require_once("./connection_sql.php");
                                           $sql = "Select * from customer  where cancel ='0'";
                                           foreach ($conn->query($sql) as $row) {
                                               echo "<option value='" . $row["code"] . "'>" . $row["code"] . "-" . $row["name"] . "</option>";
                                           }
                                           ?> 
                                  </select>
                         </div> 
                         </div> 
                          
                        <div class="form-group"></div>
                            <div class="row col-sm-12"> 
                                <div class="col-sm-3">
                                     <select name="item" id="item" class="form-control input-sm" >
                                      <?php
                                           require_once("./connection_sql.php");
                                           $sql = "Select * from s_mas  where cancel ='0'";
                                           foreach ($conn->query($sql) as $row) {
                                               echo "<option value='" . $row["code"] . "'>" . $row["des"] . "</option>";
                                           }
                                           ?> 
                                  </select>  
                                </div> 
                                <div class="col-sm-2">
                                    <input   type="number" id="qty"   name="qty" class="form-control  "  placeholder="QTY"> 
                                </div> 
                                <div class="col-sm-2">
                                    <input   type="number" id="cost"   name="cost" class="form-control  "  placeholder="COST"> 
                                </div> 
                                 <div class="col-sm-2">
                                    <input   type="number" id="selling"   name="selling" class="form-control  "  placeholder="SELLING"> 
                                </div> 
                                <div class="col-sm-2">
                                    <button class="btn btn-primary btn-block" type="button" onclick="add('treat')">
                                        ADD
                                    </button> 
                                </div>

                            </div>

                            <div class="row">

                                <div class="table-responsive " style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                                    <div id="table_row">
                                        <!--table data--> 
                                        <table id="myTable" class="table info">
                                            <thead>
                                                <tr> 
                                                    <th>ITEM</th> 
                                                    <th>QTY</th> 
                                                    <th>COST</th> 
                                                    <th>SELLING</th>  
                                                    <th>SUBTOTAL</th> 
                                                    <th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <?php
                                                $sql = "select * from s_trn where cancel='0'  order by id desc limit 10";
                                                foreach ($conn->query($sql) as $row) {

                                                    $tb_row++;
                                                     
                                                    ?>  
                                                    <tr id="row">  

                                                        <td><input value="<?php echo $row["name"] ?>" type="text" id="name"   disabled  name="name" class="form-control"  ></td>
                                                        <td><input value="<?php echo $row["qty"] ?>" type="text" id="name"   disabled  name="name" class="form-control"  ></td>
                                                        <td><input value="<?php echo $row["cost"] ?>" type="text" id="name"   disabled  name="name" class="form-control"  ></td>
                                                        <td><input value="<?php echo $row["selling"] ?>" type="text" id="name"   disabled  name="name" class="form-control"  ></td>
                                                         <td><input value="<?php echo $row["subtot"] ?>" type="text" id="name"   disabled  name="name" class="form-control"  ></td>
                                                 <?php     if($_SESSION['User_Type']=="ADMIN"){?>
                                                        <td>
                                                            <button   onclick="remove_add('<?php echo $row["id"]; ?>')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                        </td> 
                                                      <?php   }?>
                                                    </tr> 

                                                    <?php
                                                   
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                    </div>
                 
            </div>
            <!-- ////////////////////////////////////////// -->
           
             
         </div>
   </form>
   </div>
</section>
<script src="js/mediitemmas.js" type="text/javascript"></script>
<script>setTimeout(function(){ new_ent(); }, 1700);</script>