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
    
    document.getElementById('refno_txt').value="";
    document.getElementById('pport_txt').value="";
    document.getElementById('ldate_txt').value="";
    document.getElementById('agency_txt').value="";
    document.getElementById('ctry_txt').value="";
    document.getElementById('gccno_txt').value="";
    document.getElementById('v_cholerae_txt').value="";
    document.getElementById('helminths_txt').value="";
    document.getElementById('bilharziasis_txt').value="";
    document.getElementById('sal_sheg_txt').value="";
    document.getElementById('sugar_txt').value="";
    document.getElementById('albumin_txt').value="";
    document.getElementById('u_bilharziasis_txt').value="";
    document.getElementById('preg_txt').value="";
    document.getElementById('hivtest_txt').value="";
    document.getElementById('hbsag_txt').value="";
    document.getElementById('antihcv_txt').value="";
    document.getElementById('msg_box').innerHTML = "";
    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_labinfo_data.php";
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
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.getElementById('refno_txt').value = XMLAddress1[0].childNodes[0].nodeValue;
           
       
        


    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    document.getElementById('msg_box').innerHTML = "";
    if (document.getElementById('pport_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No. Not Enterd</span></div>";
        return false;
    }

    var url = "medical_labinfo_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "pport_txt=" + document.getElementById('pport_txt').value;
    url = url + "ldate_txt=" + document.getElementById('ldate_txt').value;
    url = url + "agency_txt=" + document.getElementById('agency_txt').value;
    url = url + "ctry_txt=" + document.getElementById('ctry_txt').value;
    url = url + "gccno_txt=" + document.getElementById('gccno_txt').value;
    url = url + "v_cholerae_txt=" + document.getElementById('v_cholerae_txt').value;
    url = url + "helminths_txt=" + document.getElementById('helminths_txt').value;
    url = url + "bilharziasis_txt=" + document.getElementById('bilharziasis_txt').value;
    url = url + "sal_sheg_txt=" + document.getElementById('sal_sheg_txt').value;
    url = url + "sugar_txt=" + document.getElementById('sugar_txt').value;
    url = url + "albumin_txt=" + document.getElementById('albumin_txt').value;
    url = url + "u_bilharziasis_txt=" + document.getElementById('u_bilharziasis_txt').value;
    url = url + "preg_txt=" + document.getElementById('preg_txt').value;
    url = url + "hivtest_txt=" + document.getElementById('hivtest_txt').value;
    url = url + "hbsag_txt=" + document.getElementById('hbsag_txt').value;
    url = url + "antihcv_txt=" + document.getElementById('antihcv_txt').value;
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


function edit() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    document.getElementById('msg_box').innerHTML = "";

    if (document.getElementById('sjrequestref_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
        return false;
    }


    var url = "medical_labinfo_data.php";
    url = url + "?Command=" + "update";


    url = url + "&sjrequestref=" + document.getElementById('sjrequestref_txt').value;
    url = url + "&date_in=" + document.getElementById('date_txt').value;
    url = url + "&customer=" + document.getElementById('customer_txt').value;
    url = url + "&mkex=" + document.getElementById('mkex_txt').value;
    xmlHttp.onreadystatechange = update;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function update() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "update") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Updated</span></div>";

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


function delete1() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_labinfo_data.php";
    url = url + "?Command=" + "delete";


    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";

    xmlHttp.onreadystatechange = delete2;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


//    xmlHttp.open("GET", url, true);
//    xmlHttp.send(null);
}

function delete2() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Deleted</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
            
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function add_tmp() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_labinfo_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";

//    url = url + "&aodnumber=" + mid;
    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&uniq=" + document.getElementById('uniq').value;
    url = url + "&av_treat=" + document.getElementById('av_treat').value;
    
    xmlHttp.onreadystatechange = aodtmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}


function aodtmp() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        document.getElementById('av_treat').value = "";



    }
}


function remove_tmp(id) {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_labinfo_data.php";
    url = url + "?Command=" + "removerow";

    url = url + "&uniq=" + document.getElementById('uniq').value;
    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&id=" + id;


    xmlHttp.onreadystatechange = removeAdo;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}


function removeAdo() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

    }
}


function print() {

    var url = "sample_jobrequest_data_print.php";
    url = url + "?aod_number=" + document.getElementById('aod_number').value;


    window.open(url, '_blank');



}























