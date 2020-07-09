<!-- Main content -->
<?php
require_once './connection_sql.php';
?>

<script src="https://unpkg.com/vue"></script>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-40240032-1', 'secugenindia.com');
  ga('send', 'pageview');
</script> <script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<!-- <link rel="stylesheet" type="text/css" href="css/secugenindia.css" />
 --><script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jqFancyTransitions.1.8.min.js" type="text/javascript"></script>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Service Register</h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="tmpno" value="" class="form-control">
                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group">
                    <a onclick="newent();" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <a onclick="NewWindow('search_service_register.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>

                    <a onclick="print1();" class="btn btn-danger btn-sm">
                        <span class="fa fa-print"></span> &nbsp; LAB FORM
                    </a>

                    <a onclick="print2();" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Rform 1
                    </a>
                     <a onclick="print3();" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Rform 2
                    </a>

                    <a onclick="update();" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-download"></span> &nbsp; Update
                    </a>

                     <a onclick="cancel();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                    </a>
                    <a onclick="NewWindow('search_service_register.php?stname=mrn', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND MRN
                    </a>

                    <a onclick="printcash();" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Recipt
                    </a>

                </div>

                <div id="msg_box"  class="span12 text-center"  ></div>

                 <div class="col-md-12">
                  <div class="form-group">
                       <input id="file-3" class="file" type="file" data-preview-file-type="any" data-upload-url="#">

                  <p id="demo"></p>

                 </div>
                 
                 


                </div>

                <div class="col-md-12">
                     <div class="form-group panel panel-primary">
                        <label class="col-sm-12 panel-heading" for="invno">Personal Details</label>
                         <div class="panel-body">
                    
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Ref No</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Ref No" id="txt_refno" class="form-control  input-sm" disabled="">
                        </div>
                        <label class="col-sm-2" for="invno">Date</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="Date" onload="getDate()" name="txt_srdate" id="txt_srdate"  class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Passport No.</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Passport No." id="txt_patno" class="form-control  input-sm">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2" for="invno">First Name</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="First Name" id="txt_fname" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Last Name</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Last Name" id="txt_lname" class="form-control  input-sm">
                        </div>
                      <!--   <label class="col-sm-2" for="invno">AGE Yrs.</label -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="AGE Yrs." id="txt_agemnths" class="form-control  input-sm">
                        </div>
                  </div>
                  <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1 hidden" for="c_code">G_Flag</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="G_Flag" value="G"  id="gflag" class="form-control hidden input-sm">
                        </div>

                    </div>

                  <div class="form-group">
                        <label class="col-sm-2" for="invno">AGE</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="AGE Months" id="txt_ageyrs" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Date Of Birth</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="Date Of Birth" name="txt_dob" id="txt_dob"  class="form-control  input-sm" onkeyup="cal_bdate();">
                        </div>
                        <label class="col-sm-2" for="invno">Gender</label>
                        <div class='col-sm-2'>
                        <select id="txt_gender" class='form-control input-sm'>
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Nationality</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Srilankan"  value="Srilankan" id="txt_nation" class="form-control  input-sm">
                        </div>
                       
                         <label class="col-sm-2" for="invno">Country Name</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Country Name" id="cou_name_txt" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Select Country</label>
                        <div class="col-sm-2">
                            <a onfocus="this.blur()" onclick="NewWindow('search_country_dtls.php', 'mywin', '800', '700', 'yes', 'center');
                                    return false" href="">
                                <button type="button" class="btn btn-danger">
                                    <span>...</span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                      <!--   <label class="col-sm-2" for="invno">No Of Children</label> -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="No Of Children" id="txt_nochld" class="form-control  input-sm">
                        </div>
                        <!-- <label class="col-sm-2" for="invno">Last Child's Age</label> -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="Last Child's Age" id="txt_lchldage" class="form-control  input-sm">
                        </div>

                        <!--  <label class="col-sm-2" for="invno">Country</label> -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="Country" id="country_txt" class="form-control  input-sm">
                        </div>

                    </div>
                </div>
                </div>
                </div>

                   <div class="col-md-12">
                     <div class="form-group panel panel-primary">
                        <label class="col-sm-12 panel-heading" for="invno"><b>Medical Details</b></label>
                         <div class="panel-body">
                

                    <div class="form-group">
                        <!-- <label class="col-sm-2" for="invno">Medical Code</label> -->
                        <div class="col-sm-2">
                             <input type="hidden" placeholder="Medical Code" id="txt_medicode" class="form-control  input-sm">
                        </div>
                        <!-- <label class="col-sm-2" for="invno">Medical Name</label> -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="Medical Name" id="txt_mediname" class="form-control  input-sm">
                        </div>
                      <!--   <label class="col-sm-2" for="invno">Medical Status</label> -->
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="Medical Status" id="txt_medistatus" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group">
                       
                        <label class="col-sm-2" for="invno">Type</label>
                        <!-- <div class="col-sm-2">
                            <input type="text" placeholder="Type" id="txt_type" class="form-control  input-sm">
                        </div> -->
                        <div class="col-sm-2">
                                <?php
                                echo"<select id = \"txt_type\" class =\"form-control input-sm\">";
                                $sql = "select * from sr_type";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<b><option value='" . $row["desc"] . "'>" . $row["desc"] . "</option></b>";
                                }
                                echo"</select>";
                                ?>
                            </div>

                        <label class="col-sm-2" for="invno" hidden="">Dest</label>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="Dest" id="txt_dest" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno " hidden="">XRAY No.</label>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="XRAY No" id="txt_xrayno" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2" for="invno" hidden="">Serial No.</label>
                        <div class="col-sm-2">
                          <input type="hidden" placeholder="Serial No" id="txt_serino" class="form-control  input-sm">  
                        </div>
                        <label class="col-sm-2" for="invno" hidden="">Place Of Issued</label>
                        <div class="col-sm-2">
                             <input type="hidden" placeholder="Place Of Issued" id="txt_pla_of_iss" class="form-control  input-sm">
                             
                        </div>
                        <label class="col-sm-2" for="invno" hidden="">G No.</label>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="G No" id="txt_gno" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group">                      
                        <label class="col-sm-2" for="invno">Position Applied</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Position Applied" id="txt_posapp" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno" hidden="">GCC No.</label>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="GCC No" id="txt_gccno" class="form-control  input-sm">
                        </div>                       
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Date Issued</label>
                        <div class="col-sm-2">

                              <input type="date" placeholder="Date Issued" name="txt_dtofissu" id="txt_dtofissu"  class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Time</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Time" id="txt_time" class="form-control  input-sm " onload="cal_time();">
                        </div>
                        <label class="col-sm-2" for="invno">Remarks</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Remarks" id="txt_rem" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group">
                        
                        
                        <label class="col-sm-2" for="invno">Lab No</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Lab Ref" id="txt_labref" class="form-control  input-sm" >
                        </div>
                        
                        <label class="col-sm-2" for="c_code">Agency</label>
                            <div class="col-sm-2">
                                <?php
                                echo"<select id = \"agname_txt\" class =\"form-control input-sm\">";
                                $sql = "select * from customer";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<b><option value='" . $row["name"] . "'>" . $row["name"] . "</option></b>";
                                }
                                echo"</select>";
                                ?>
                            </div>
                            <label class="col-sm-2" for="invno">Status</label>
                        <div class="col-sm-2">
                             <select id="txt_cusadd" class="form-control  input-sm">
                                <option value="Married">Married</option>
                                <option value="UnMarried">UnMarried</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <label class="col-sm-2" for="invno">Finger New 1</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Finger New 1" id="txt_fn1" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Finger New 2</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Finger New 2" id="txt_fn2" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">New Ref</label>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="New Ref" id="txt_TEST_newref" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                             <select id="txt_newref"  class="form-control"  onchange="setlab();">
                                <option value="NM" selected>New Medical</option>
                                <option value="RC">Recheck</option>
                                 <option value="MMR">MMR</option>
                            </select>
                        </div>
                    </div>
                </div>
              
    


<!-- /////////////////////////////////////////////// -->


 <div class="col-md-12">
             <div class="Container" >

                <table id="inputheader" class="table table-bordered" hidden="">
                    <thead>
                        <tr>
                            <th style="width: 20%;"><input v-model="H1" id="H1"></th>
                            <th style="width: 20%;"><input v-model="H2" id="H2"></th>
                        </tr>
                    </thead>                  
                </table>


        <div id="beTable" >
            <div id="getTable" class="row">
                <div class="col-md-8">
                    <table id="myTable" class="table table-bordered" >
                        <thead>
                            <tr>
                                <th style="width: 20%;" contenteditable="false">Medical_Description</th>
                                <th style="width: 20%;" contenteditable="false">Amount</th>
                                <th style="width: 5%;" contenteditable="false"></th>
                                <th style="width: 10%;" onclick="addRow();" >+</th>
                            </tr>
                        </thead>
                       

                    </table>
                </div>
                <div class="col-md-4">
                  <div class="col-sm-3" align="right">
                            <div id="getImg"></div>
                        </div>
                         <div class="col-sm-3"></div>
                         <div  class="col-md-4">
                    <img border="2" id="FPImage1" alt="Fingerpint Image" height=100 width=100 src="images\finger.png" > <br>
                     <input type="button" value="Click to Scan" onclick="captureFP()" class="btn btn-danger"> <br>
                </div>
                </div>
               
                



              </div>

               <br><br><br><br><br>    




          </div>

            




        <div class="row">
            <div class="col-md-8" id="mattable">

            </div>


        </div>
    </div>

                                           
                    </div>
 
 
                   <!--  ///////////////////////////////////////// --> 

                </div>

                   <div class="col-md-12">
                    <div class="form-group panel panel-primary">
                         <label class="col-sm-12 panel-heading" for="invno">Payment Details</label>
                          <div class="panel-body">
                     

                     <div class="form-group">
                        <label class="col-sm-2" for="invno">Cheque No.</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Cheque No" id="txt_cheqno" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Amount</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Amount" id="medi_amounttot" class="form-control  input-sm">
                        </div>
                    </div>

                    

                  

                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Cheque Amount</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Cheque Amount" id="txt_cheqamt" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Cheque Date</label>
                        <div class="col-sm-2">
                             <input type="date" placeholder="Cheque Date" name="txt_cheqdt" id="txt_cheqdt"  class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Cash</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Cash" id="txt_cash"  onkeyup ="setamount();"  class="form-control  input-sm" >
                        </div>
                        
                    </div>

                    <div class="form-group">
                         <label class="col-sm-2" for="invno">Bank</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Bank" id="txt_bank" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Refund Amount</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Refund Amount" id="txt_rfamt" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Refund Date</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="Cheque Date" name="txt_rfdt" id="txt_rfdt" class="form-control  input-sm">
                        </div>

                        
                    </div>

                    <div class="form-group">
                         <label class="col-sm-2" for="invno">Paid Amount</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Paid Amount" id="txt_paid" class="form-control  input-sm">
                        </div>

                        
                    </div>

                    <!-- Hidden Texts To fingerprint -->
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="SerialNumber" id="SerialNumber" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageHeight" id="ImageHeight" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageWidth" name="ImageWidth" id="ImageWidth" class="form-control  input-sm">
                        </div>

                        
                    </div>
                     <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageDPI" id="ImageDPI" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageQuality" id="ImageQuality" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="NFIQ" name="txt_rfdt" id="NFIQ" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="TemplateBase64" name="TemplateBase64_txt" id="TemplateBase64_txt" class="form-control  input-sm">
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageDPI" id="ImageDPI" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="ImageQuality" id="ImageQuality" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="NFIQ" name="txt_rfdt" id="NFIQ" class="form-control  input-sm">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" placeholder="TemplateBase64" name="TemplateBase64_txt" id="TemplateBase64_txt" class="form-control  input-sm">
                        </div>
                    </div>

                    <!-- end -->


                    <div class="form-group">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>   
                    </div>                          
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                      </div>
                    </section>
                    <script src="js/service_register.js"></script>
                    <script>newent();</script>

                  <script type="text/javascript">
/*! table-to-json - v0.13.0 - Daniel White */
!function(a){"use strict";a.fn.tableToJSON=function(b){var c={ignoreColumns:[],onlyColumns:null,ignoreHiddenRows:!0,ignoreEmptyRows:!1,headings:null,allowHTML:!1,includeRowId:!1,textDataOverride:"data-override",extractor:null,textExtractor:null};b=a.extend(c,b);var d=function(a){return void 0!==a&&null!==a},e=function(a){return void 0!==a&&a.length>0},f=function(c){return d(b.onlyColumns)?-1===a.inArray(c,b.onlyColumns):-1!==a.inArray(c,b.ignoreColumns)},g=function(b,c){var f={},g=0;return a.each(c,function(a,c){g<b.length&&d(c)&&(e(b[g])&&(f[b[g]]=c),g++)}),f},h=function(c,d,e){var f,g=a(d),h=b.extractor||b.textExtractor,i=g.attr(b.textDataOverride);return null===h||e?a.trim(i||(b.allowHTML?g.html():d.textContent||g.text())||""):a.isFunction(h)?(f=i||h(c,g),"string"==typeof f?a.trim(f):f):"object"==typeof h&&a.isFunction(h[c])?(f=i||h[c](c,g),"string"==typeof f?a.trim(f):f):a.trim(i||(b.allowHTML?g.html():d.textContent||g.text())||"")},i=function(c,d){var e=[],f=b.includeRowId,g="boolean"==typeof f?f:"string"==typeof f,i="string"==typeof f==!0?f:"rowId";return g&&void 0===a(c).attr("id")&&e.push(i),a(c).children("td,th").each(function(a,b){e.push(h(a,b,d))}),e},j=function(a){var c=a.find("tr:first").first();return d(b.headings)?b.headings:i(c,!0)};return function(c,e){var i,j,k,l,m,n,o,p=[],q=0,r=[];return c.children("tbody,*").children("tr").each(function(c,e){if(c>0||d(b.headings)){var f=b.includeRowId,g="boolean"==typeof f?f:"string"==typeof f;n=a(e);var r=n.find("td").length===n.find("td:empty").length;!n.is(":visible")&&b.ignoreHiddenRows||r&&b.ignoreEmptyRows||n.data("ignore")&&"false"!==n.data("ignore")||(q=0,p[c]||(p[c]=[]),g&&(q+=1,void 0!==n.attr("id")?p[c].push(n.attr("id")):p[c].push("")),n.children().each(function(){for(o=a(this);p[c][q];)q++;if(o.filter("[rowspan]").length)for(k=parseInt(o.attr("rowspan"),10)-1,m=h(q,o),i=1;i<=k;i++)p[c+i]||(p[c+i]=[]),p[c+i][q]=m;if(o.filter("[colspan]").length)for(k=parseInt(o.attr("colspan"),10)-1,m=h(q,o),i=1;i<=k;i++)if(o.filter("[rowspan]").length)for(l=parseInt(o.attr("rowspan"),10),j=0;j<l;j++)p[c+j][q+i]=m;else p[c][q+i]=m;m=p[c][q]||h(q,o),d(m)&&(p[c][q]=m),q++}))}}),a.each(p,function(c,h){if(d(h)){var i=d(b.onlyColumns)||b.ignoreColumns.length?a.grep(h,function(a,b){return!f(b)}):h,j=d(b.headings)?e:a.grep(e,function(a,b){return!f(b)});m=g(j,i),r[r.length]=m}}),r}(this,j(this))}}(jQuery);
</script>

<script type="text/javascript">
 /**
 * table-to-json
 * jQuery plugin that reads an HTML table and returns a javascript object representing the values and columns of the table
 *
 * @author Daniel White
 * @copyright Daniel White 2017
 * @license MIT <https://github.com/lightswitch05/table-to-json/blob/master/MIT-LICENSE>
 * @link https://github.com/lightswitch05/table-to-json
 * @module table-to-json
 * @version 0.13.0
 */
(function( $ ) {
  'use strict';

  $.fn.tableToJSON = function(opts) {

    // Set options
    var defaults = {
      ignoreColumns: [],
      onlyColumns: null,
      ignoreHiddenRows: true,
      ignoreEmptyRows: false,
      headings: null,
      allowHTML: false,
      includeRowId: false,
      textDataOverride: 'data-override',
      extractor: null,
      textExtractor: null
    };
    opts = $.extend(defaults, opts);

    var notNull = function(value) {
      return value !== undefined && value !== null;
    };
    
    var notEmpty = function(value) {
      return value !== undefined && value.length > 0;
    };
    
    var ignoredColumn = function(index) {
      if( notNull(opts.onlyColumns) ) {
        return $.inArray(index, opts.onlyColumns) === -1;
      }
      return $.inArray(index, opts.ignoreColumns) !== -1;
    };

    var arraysToHash = function(keys, values) {
      var result = {}, index = 0;
      $.each(values, function(i, value) {
        // when ignoring columns, the header option still starts
        // with the first defined column
        if ( index < keys.length && notNull(value) ) {
          if (notEmpty(keys[index])){
            result[ keys[index] ] = value;
          }
          index++;
        }
      });
      return result;
    };

    var cellValues = function(cellIndex, cell, isHeader) {
      var $cell = $(cell),
        // extractor
        extractor = opts.extractor || opts.textExtractor,
        override = $cell.attr(opts.textDataOverride),
        value;
      // don't use extractor for header cells
      if ( extractor === null || isHeader ) {
        return $.trim( override || ( opts.allowHTML ? $cell.html() : cell.textContent || $cell.text() ) || '' );
      } else {
        // overall extractor function
        if ( $.isFunction(extractor) ) {
          value = override || extractor(cellIndex, $cell);
          return typeof value === 'string' ? $.trim( value ) : value;
        } else if ( typeof extractor === 'object' && $.isFunction( extractor[cellIndex] ) ) {
          value = override || extractor[cellIndex](cellIndex, $cell);
          return typeof value === 'string' ? $.trim( value ) : value;
        }
      }
      // fallback
      return $.trim( override || ( opts.allowHTML ? $cell.html() : cell.textContent || $cell.text() ) || '' );
    };

    var rowValues = function(row, isHeader) {
      var result = [];
      var includeRowId = opts.includeRowId;
      var useRowId = (typeof includeRowId === 'boolean') ? includeRowId : (typeof includeRowId === 'string') ? true : false;
      var rowIdName = (typeof includeRowId === 'string') === true ? includeRowId : 'rowId';
      if (useRowId) {
        if (typeof $(row).attr('id') === 'undefined') {
          result.push(rowIdName);
        }
      }
      $(row).children('td,th').each(function(cellIndex, cell) {
        result.push( cellValues(cellIndex, cell, isHeader) );
      });
      return result;
    };

    var getHeadings = function(table) {
      var firstRow = table.find('tr:first').first();
      return notNull(opts.headings) ? opts.headings : rowValues(firstRow, true);
    };

    var construct = function(table, headings) {
      var i, j, len, len2, txt, $row, $cell,
        tmpArray = [], cellIndex = 0, result = [];
      table.children('tbody,*').children('tr').each(function(rowIndex, row) {
        if( rowIndex > 0 || notNull(opts.headings) ) {
          var includeRowId = opts.includeRowId;
          var useRowId = (typeof includeRowId === 'boolean') ? includeRowId : (typeof includeRowId === 'string') ? true : false;

          $row = $(row);

          var isEmpty = ($row.find('td').length === $row.find('td:empty').length) ? true : false;

          if( ( $row.is(':visible') || !opts.ignoreHiddenRows ) && ( !isEmpty || !opts.ignoreEmptyRows ) && ( !$row.data('ignore') || $row.data('ignore') === 'false' ) ) {
            cellIndex = 0;
            if (!tmpArray[rowIndex]) {
              tmpArray[rowIndex] = [];
            }
            if (useRowId) {
              cellIndex = cellIndex + 1;
              if (typeof $row.attr('id') !== 'undefined') {
                tmpArray[rowIndex].push($row.attr('id'));
              } else {
                tmpArray[rowIndex].push('');
              }
            }

            $row.children().each(function(){
              $cell = $(this);
              // skip column if already defined
              while (tmpArray[rowIndex][cellIndex]) { cellIndex++; }

              // process rowspans
              if ($cell.filter('[rowspan]').length) {
                len = parseInt( $cell.attr('rowspan'), 10) - 1;
                txt = cellValues(cellIndex, $cell);
                for (i = 1; i <= len; i++) {
                  if (!tmpArray[rowIndex + i]) { tmpArray[rowIndex + i] = []; }
                  tmpArray[rowIndex + i][cellIndex] = txt;
                }
              }
              // process colspans
              if ($cell.filter('[colspan]').length) {
                len = parseInt( $cell.attr('colspan'), 10) - 1;
                txt = cellValues(cellIndex, $cell);
                for (i = 1; i <= len; i++) {
                  // cell has both col and row spans
                  if ($cell.filter('[rowspan]').length) {
                    len2 = parseInt( $cell.attr('rowspan'), 10);
                    for (j = 0; j < len2; j++) {
                      tmpArray[rowIndex + j][cellIndex + i] = txt;
                    }
                  } else {
                    tmpArray[rowIndex][cellIndex + i] = txt;
                  }
                }
              }

              txt = tmpArray[rowIndex][cellIndex] || cellValues(cellIndex, $cell);
              if (notNull(txt)) {
                tmpArray[rowIndex][cellIndex] = txt;
              }
              cellIndex++;
            });
          }
        }
      });
      $.each(tmpArray, function( i, row ){
        if (notNull(row)) {
          // remove ignoredColumns / add onlyColumns
          var newRow = notNull(opts.onlyColumns) || opts.ignoreColumns.length ?
            $.grep(row, function(v, index){ return !ignoredColumn(index); }) : row,

            // remove ignoredColumns / add onlyColumns if headings is not defined
            newHeadings = notNull(opts.headings) ? headings :
              $.grep(headings, function(v, index){ return !ignoredColumn(index); });

          txt = arraysToHash(newHeadings, newRow);
          result[result.length] = txt;
        }
      });
      return result;
    };

    // Run
    var headings = getHeadings(this);
    return construct(this, headings);
  };
})( jQuery );

</script>


 <script>
        function captureFP() {
            CallSGIFPGetData(SuccessFunc, ErrorFunc);

        }
        /* 
            This functions is called if the service sucessfully returns some data in JSON object
         */
        function SuccessFunc(result) {
            console.log(result);
            if (result.ErrorCode == 0) {
                /*  Display BMP data in image tag
                    BMP data is in base 64 format 
                */
                if (result != null && result.BMPBase64.length > 0) {
                    document.getElementById("FPImage1").src = "data:image/bmp;base64," + result.BMPBase64;
                }

                 var SerialNumber_txt=result.SerialNumber ;
                 document.getElementById('SerialNumber').value = SerialNumber_txt;
                
                 var ImageHeight_txt=result.ImageHeight ;
                 document.getElementById('ImageHeight').value = ImageHeight_txt;

                  var ImageWidth_txt=result.ImageWidth ;
                 document.getElementById('ImageWidth').value = ImageWidth_txt;

                  var ImageDPI_txt=result.ImageDPI ;
                 document.getElementById('ImageDPI').value = ImageDPI_txt;

                  var ImageQuality_txt=result.ImageQuality ;
                 document.getElementById('ImageQuality').value = ImageQuality_txt;

                var NFIQ_txt=result.NFIQ ;
                 document.getElementById('NFIQ').value = NFIQ_txt;

                  var TemplateBase64_txt=result.TemplateBase64 ;
                 document.getElementById('TemplateBase64_txt').value = TemplateBase64_txt;
            }
            else {
                alert("Fingerprint Capture ErrorCode " + result.ErrorCode)
            }
        }

        function ErrorFunc(status) {

            /*  
                If you reach here, user is probabaly not running the 
                service. Redirect the user to a page where he can download the
                executable and install it. 
            */
            alert("Check if SGIBIOSRV is running ");

        }

        function CallSGIFPGetData(successCall, failCall) {
            var uri = "http://localhost:8000/SGIFPCapture";

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    fpobject = JSON.parse(xmlhttp.responseText);
                    successCall(fpobject);
                    console.log(xmlhttp);

                }
                else if (xmlhttp.status == 404) {
                    failCall(xmlhttp.status)
                }
            }
            xmlhttp.onerror = function () {
                failCall(xmlhttp.status);
            }
            xmlhttp.open("POST", uri, true);
            xmlhttp.send();
        }

</script>

