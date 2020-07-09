function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}

function newent() {
    
    document.getElementById('ccode_txt').value = "";
    document.getElementById('cname_txt').value = "";
    document.getElementById('chead_txt').value = "";
    document.getElementById('amt_txt').value = "";
    document.getElementById('short_txt').value = "";
    document.getElementById('refno_txt').value = "";
    document.getElementById('uniq').value = "";

    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "country_data.php";
    url = url + "?Command=" + "getdt";
    //url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_dt() {
    var XMLAddress1;

    //alert(XMLAddress1);

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("ccode_txt");
        document.getElementById('ccode_txt').value = XMLAddress1[0].childNodes[0].nodeValue;
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


     if (document.getElementById('ccode_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Ref Not Enterd</span></div>";
        $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        return false;
    }
    
    

    var url = "country_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&ccode_txt=" + document.getElementById('ccode_txt').value;
    url = url + "&cname_txt=" + document.getElementById('cname_txt').value;
    url = url + "&chead_txt=" + document.getElementById('chead_txt').value;
    url = url + "&amt_txt=" + document.getElementById('amt_txt').value;
    url = url + "&short_txt=" + document.getElementById('short_txt').value;
    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&uniq=" + document.getElementById('uniq').value;
    


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function update1() {

   xmlHttp = GetXmlHttpObject();
   if (xmlHttp == null) {
       alert("Browser does not support HTTP Request");
       return;
   }
   if (document.getElementById('ccode_txt').value == "") {
       document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Customer Code Entered</span></div>";
       return false;
   }

    var url = "country_data.php";
    url = url + "?Command=" + "update";

    url = url + "&ccode_txt=" + document.getElementById('ccode_txt').value;
    url = url + "&cname_txt=" + document.getElementById('cname_txt').value;
    url = url + "&chead_txt=" + document.getElementById('chead_txt').value;
    url = url + "&amt_txt=" + document.getElementById('amt_txt').value;
    url = url + "&short_txt=" + document.getElementById('short_txt').value;
    url = url + "&refno_txt=" + document.getElementById('refno_txt').value


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function update() {
   var XMLAddress1;

   if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

       if (xmlHttp.responseText == "update") {
           document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Updated</span></div>";
             $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);

       } else {
           document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
             $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
       }
   }
}







