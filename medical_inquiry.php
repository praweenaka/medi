
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

 <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jqFancyTransitions.1.8.min.js" type="text/javascript"></script>



<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Medical Inquiry</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <a onclick="NewWindow('search_medical_inquiry.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                    <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Print
                    </a>


                    <a onclick="update();" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-download"></span> &nbsp; Update
                    </a>

                     <a onclick="cancel();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                    </a>

                    <a onclick="NewWindow('search_medical_print.php?stname=miq', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>

                    <a value="Check" onclick="capture_img(succTwo, failureFunc)" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-download"></span> &nbsp; Check
                    </a>

                    <a value="Matching" onclick="matchScore(succMatch, failureFunc)" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-download"></span> &nbsp; Match
                    </a>

                 
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


                <div class="col-md-12">
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Ref No.</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="refno_txt" class="form-control  input-sm" disabled="">
                        </div>

                         <label class="col-sm-1" for="c_code">Passport</label>
                        <div class="col-sm-2">
						   <input type="text" placeholder=""  id="pportno_txt" class="form-control  input-sm">
                           
                        </div>
                          <label class="col-sm-1" for="c_code">Country</label>

                        <div class="col-sm-2">
						   <input type="text" placeholder=""  id="cou_name_txt" class="form-control  input-sm">
                          
                        </div>

                        <div class="col-sm-2">
                            <a onfocus="this.blur()" onclick="NewWindow('search_country_dtls.php', 'mywin', '800', '700', 'yes', 'center');
                                    return false" href="">
                                <button type="button" class="btn btn-danger">
                                    <span>...</span>
                                </button>
                            </a>
                        </div>

                         <div class="col-sm-2">
                            <input type="text" placeholder="Country" id="country_txt" class="form-control hidden  input-sm">
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                       
                        <label class="col-sm-1" for="c_code">GAMCA NO</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="gamca_txt" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-1" for="c_code">E NO</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="eno_txt" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-1" for="c_code">Date</label>
                        <div class="col-sm-2">

                            <input type="date" placeholder="Date" name="date_txt" id="date_txt" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                       

                        <label class="col-sm-1" for="c_code">XRay No.</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="xrayno_txt" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-1" for="c_code">Passenger Name</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="subname_txt" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-1" for="c_code">Medical Name</label>
                        <div class="col-sm-2">
                        <input type="text" placeholder=""  id="name_txt" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                       
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for='c_code'>Sex</label>
                        <div class='col-sm-2'>
                        <input type="text" placeholder=""  id="sex_txt" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-1" for='c_code'>Status</label>

                        <div class="col-sm-2">
                        <input type="text" placeholder=""  id="status_txt" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-1" for="invno">Agency</label>
                        <div class="col-sm-3">
                        <input type="text" placeholder=""  id="agency_txt" class="form-control  input-sm">
                        </div>
                    </div>



                    <div class="form-group"></div>
                    <div class="form-group-sm">
                      
                        
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for='c_code'>Age</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="age_txt" class="form-control  input-sm">
                        </div>


                        <label class="col-sm-1" for='c_code'>Cust.Remarks</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="custrem_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group">
                         
                           <label class="col-sm-1" for='c_code'>Add Remark1</label>
                      
                        <div class="col-sm-8">
                            <input type="text" placeholder=""  id="doctor1_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    </div>
                    <div class="form-group">
                         
                           <label class="col-sm-1" for='c_code'>Add Remark2</label>
                    
                        <div class="col-sm-8">
                            <input type="text" placeholder=""  id="doctor2_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                                    
                    </div> <div class="form-group">
                         
                           <label class="col-sm-1" for='c_code'>Add Remark3</label>

                                    
                       <div class="col-sm-8">
                            <input type="text" placeholder=""  id="doctor3_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    
                    </div> <div class="form-group">
                         
                           <label class="col-sm-1" for='c_code'>Remark 1(NP)</label>
                             
                        <div class="col-sm-8">
                            <input type="text" placeholder=""  id="doctor4_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    </div> <div class="form-group">
                         
                           <label class="col-sm-1" for='c_code'>Remark 2(NP)</label>
                    
                        <div class="col-sm-8">
                            <input type="text" placeholder=""  id="doctor5_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    </div>
                   

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for='c_code'>Lab</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="lab1_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="lab2_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    
                     
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="lab3_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for='c_code'>X-Ray</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder=""  id="xray1_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                                      
                    <div class="col-sm-2">
                            <input type="text" placeholder=""  id="xray2_txt" class="form-control  input-sm">
                            <!--hidden-->
                        </div>
                         
                    </div>

                      <div class="form-group">
                        
                                      
                    
                         <div style="background: red" id="getImg" style="margin-left: 800px"></div>
                    </div>
                   

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/medical_inquiry.js"></script>
 <!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>newent();</script>




