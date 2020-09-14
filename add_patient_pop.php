 


<title>Search Item</title>

 

<!-- <script language="JavaScript" src="js/customer.js"></script> -->


<!--/.add category--> 

<div class="modal fade" id="addpatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Search Meal Order List</h4></center>
            </div>
            <div class="modal-body">
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

                            <a onclick="newent1();" class="btn btn-default btn-sm">
                                <span class="fa fa-user-plus"></span> &nbsp; NEW
                            </a>

                            <a onclick="save_inv1();" class="btn btn-success btn-sm">
                                <span class="fa fa-save"></span> &nbsp; Save
                            </a>
                            <a onclick="NewWindow('search_customer.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                            </a>


                            <!--<a onclick="update111();" class="btn btn-danger btn-sm">-->
                                <!--    <span class="glyphicon glyphicon-download"></span> &nbsp; Update-->
                                <!--</a>-->

                                <a onclick="cancel1();" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL
                                </a> 
                            </div>
                            <div id="msg_box1"  class="span12 text-center"  ></div> 


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


<script>setTimeout(function(){ newent1(); }, 1700);</script>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> 
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    function GetXmlHttpObject()
{
    var xmlHttp = null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}


function keyset(key, e)
{

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000000";

}

function newent1() {


  document.getElementById('cust_txt').value = "";
  document.getElementById('uniq').value = "";
  document.getElementById('name_txt').value = "";
  document.getElementById('addr1_txt').value = ""; 
  document.getElementById('contact_txt').value = "";   
  document.getElementById('age').value = "";    
   document.getElementById('email').value = "";    
  document.getElementById('note').value = "";    
  document.getElementById('msg_box').innerHTML = "";    
  $("#allergy").select2('val','');  
  $("#bgroup").select2('val','');  
  $("#s_diag").select2('val','');   
  getdt1();
}



function getdt1() {

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }

  var url = "customer_data.php";
  url = url + "?Command=" + "getdt";
  url = url + "&ls=" + "new";

  xmlHttp.onreadystatechange = assign_dt1;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}

function assign_dt1() {
  var XMLAddress1;

  if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
  {

    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cust_txt");
    document.getElementById('cust_txt').value = XMLAddress1[0].childNodes[0].nodeValue;
//
XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;
}
}



function save_inv1()
{

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null)
  {
    alert("Browser does not support HTTP Request");
    return;
  }


  if (document.getElementById('cust_txt').value == "") {
    document.getElementById('msg_box1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Click New</span></div>";

    return false;
  }
  if (document.getElementById('name_txt').value == "") {
    document.getElementById('msg_box1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Not Entered..</span></div>";

    return false;
  }



  var url = "customer_data.php";
  url = url + "?Command=" + "save_item";


  var allergy = $('#allergy').val(); 
  var s_diag = $('#s_diag').val(); 
  url = url + "&allergy=" + allergy;   
  url = url + "&s_diag=" + s_diag;   
  url = url + "&cust_txt=" + document.getElementById('cust_txt').value;
  url = url + "&uniq=" + document.getElementById('uniq').value;
  url = url + "&name_txt=" + document.getElementById('name_txt').value;
  url = url + "&addr1_txt=" + document.getElementById('addr1_txt').value;
  url = url + "&age=" + document.getElementById('age').value; 
  url = url + "&contact_txt=" + document.getElementById('contact_txt').value; 
  url = url + "&bgroup=" + document.getElementById('bgroup').value; 
  url = url + "&email=" + document.getElementById('email').value; 
  url = url + "&note=" + document.getElementById('note').value; 
  xmlHttp.onreadystatechange = salessaveresult1;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}

function salessaveresult1() {
  var XMLAddress1;

  if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

    if (xmlHttp.responseText == "Saved") {
      document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
     // setTimeout("location.reload(true);", 500);
    } else {
      document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
    }
  }
}



 
function cancel() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
     var msg = confirm("Do you want to CANCEL this invoice ! ");
        if (msg == true) {
    if (document.getElementById('cust_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Pation Not Selected</span></div>";
        return false;
    }

    var url = "customer_data.php";
    url = url + "?Command=" + "cancel";
    url = url + "&cust_txt=" + document.getElementById('cust_txt').value;

    xmlHttp.onreadystatechange = re_cancel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
}

function re_cancel() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Canceled") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Canceled</span></div>";
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


 
 function custno(code)
{
    //alert(code);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "customer_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;

    xmlHttp.onreadystatechange = passcusresult_quot;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
         
        opener.document.getElementById('cust_txt').value = obj.code;
        opener.document.getElementById('name_txt').value = obj.name;
        opener.document.getElementById('addr1_txt').value = obj.add1; 
         opener.document.getElementById('email').value = obj.email;
        opener.document.getElementById('contact_txt').value = obj.tel; 
         opener.document.getElementById('bgroup').value = obj.bgroup;
        opener.document.getElementById('age').value = obj.age; 
        opener.document.getElementById('note').value = obj.note;    
        
        // opener.document.getElementById('allergy').value. = obj.allergy; 
        // opener.document.getElementById('s_diag').value. = obj.s_diag; 
        
        self.close();
    }



}


</script>