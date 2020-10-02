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
      <h3 class="box-title"><b>Pharamacy</b></h3>
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
                     <input type="text"   value="<?php echo date('Y-m-d'); ?>"  disabled  id="sdate" class="form-control dt input-sm  ">
                  </div>
               </div>
            </div>
           
         </div>
         <div class="form-group"></div>
         <div class="form-group"></div>
         <div id="msg_box"  class="span12 text-center"  ></div>
         <div class="form-group col-md-12">
            
               <div class="form-group">
                  <label class="col-md-1" for="txt_usernm">PHARAMACY CODE</label>
                  <div class="col-md-2">
                     <input type="text" placeholder="PHARAMACY CODE" id="pharmcyno" name="pharmcyno" class="form-control  input-sm" disabled="">
                  </div>
                  <div class="col-md-1">
                     <a href="search_pharamacy.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onfocus="this.blur()">
                     <input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
                     </a>
                  </div>
                  <label class="col-md-2" for="txt_usernm">MEDICAL ORDER</label>
                  <div class="col-md-2">
                     <input type="text" placeholder="MEDICAL ORDER" id="ordno" class="form-control  input-sm" disabled="">
                  </div>
                  <div class="col-md-1">
                     <a href="search_pharamacyorder.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onfocus="this.blur()">
                     <input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
                     </a>
                  </div>
               </div>
                
                   <div class="form-group" > 
                         
                        <div id="msg_box"  class="span12 text-center"  ></div>
                        <div class="row col-sm-12"> 
                            <label class="col-sm-1" for="txt_usernm">PATIENT NAME</label>
                             <div class="col-sm-3">
                                  <select name="c_code" id="c_code" class="form-control input-sm" >
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
                             
                                <div class="col-sm-3">
                                     <select name="item" id="item" class="form-control input-sm" >
                                      <?php
                                           require_once("./connection_sql.php");
                                           $sql = "Select * from s_mas  where cancel ='0'";
                                           foreach ($conn->query($sql) as $row) {
                                               echo "<option value='" . $row["code"] . "'>" . $row["des"] . "-" . $row["selling"] . "-" . $row["qty"] . "</option>";
                                           }
                                           ?> 
                                  </select>  
                                </div> 
                                <div class="col-sm-2">
                                    <input   type="number" id="qty"   name="qty" class="form-control  "  placeholder="QTY"> 
                                </div>  
                                 <div class="col-sm-2">
                                    <input   type="number" id="selling"   name="selling" disabled class="form-control  "  placeholder="AMOUNT"> 
                                </div> 
                                <div class="col-sm-2">
                                    <button class="btn btn-primary btn-block" type="button" onclick="add()">
                                        Add
                                    </button> 
                                </div>

                              
                                    <table id="myTable" class="table info" style=" width: 75%;overflow:auto;">
                                        <thead>
                                            <tr> 
                                                <th>ITEM</th> 
                                                <th>QTY</th>   
                                                <th>AMOUNT</th>  
                                                <th>SUB TOTAL</th> 
                                                <th></th> 
                                            </tr>
                                        </thead>
                                         
                                    </table>
                                     <div id="itemdetails"></div>
                                     <div class="form-group" >
                                  <div class="col-md-6"></div>
                                  <label class="col-md-1" for="txt_usernm" align="left">TOTAL</label>
                                  <div class="col-md-2">
                                     <input type="text" placeholder="Total" id="gtot" onKeyup="calcu();" class="form-control  input-sm" disabled >
                                  </div>
                              </div>
                              <div class="form-group" ></div>  
                                 <div class="col-md-6"></div>
                                    <label class="col-sm-1" for="txt_usernm">DOCTOR CHARGES</label>
                                    <div class="col-md-2">
                                     <input type="number" placeholder="DOCTOR CHARGES" id="dcharge" onblur="calcu();" value="0.00" class="form-control  input-sm"  >
                                  </div>
                               </div>   
                                
                              <div class="form-group" >
                                  <div class="col-md-6"></div>
                                  <label class="col-md-1" for="txt_usernm" align="left">GRAND TOTAL</label>
                                  <div class="col-md-2">
                                     <input type="text" placeholder="GRAND TOTAL" id="gtot1" class="form-control  input-sm" disabled="">
                                  </div>
                              </div>  
                    </div>        
            </div>
            
           
             
         </div>
   </form>
   </div>
</section>
<script src="js/pharamacy.js" type="text/javascript"></script>
<script>setTimeout(function(){ new_ent(); }, 1700);</script>
<script>
    // var temp_ref  = document.getElementById('code').value;
    
    
    // setTimeout(function(){ 
    //     if(temp_ref == ""){
    //         alert("fsdfjis");
    //         new_ent();
    //     }
    //      }, 10000);
    
    
    </script>



