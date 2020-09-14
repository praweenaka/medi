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

function newent() {


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
  getdt();
}



function getdt() {

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }

  var url = "customer_data.php";
  url = url + "?Command=" + "getdt";
  url = url + "&ls=" + "new";

  xmlHttp.onreadystatechange = assign_dt;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}

function assign_dt() {
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



function save_inv()
{

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null)
  {
    alert("Browser does not support HTTP Request");
    return;
  }


  if (document.getElementById('cust_txt').value == "") {
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Click New</span></div>";

    return false;
  }
  if (document.getElementById('name_txt').value == "") {
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Not Entered..</span></div>";

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
  xmlHttp.onreadystatechange = salessaveresult;
  xmlHttp.open("GET", url, true);
  xmlHttp.send(null);
}

function salessaveresult() {
  var XMLAddress1;

  if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

    if (xmlHttp.responseText == "Saved") {
      document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
     setTimeout("location.reload(true);", 500);
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


 function datecal()
{
    //alert(code);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "customer_data.php";
    url = url + "?Command=" + "datecal";
     url = url + "&age1=" + document.getElementById('age1').value;

    xmlHttp.onreadystatechange = re_datecal;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function re_datecal()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        document.getElementById('age').value = XMLAddress1[0].childNodes[0].nodeValue;
    }



}