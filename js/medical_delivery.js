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

    document.getElementById('refno').value="";   
    document.getElementById('serino_txt').value="";   
    document.getElementById('mdate_txt').value="";   
    document.getElementById('pno_txt').value="";   
    document.getElementById('name1_txt').value="";   
    document.getElementById('name2_txt').value="";   
    document.getElementById('dele_txt').value="";   
    document.getElementById('time_txt').value="";   
    document.getElementById('ourref_txt').value="";   
    document.getElementById('remarks_txt').value="";   
    document.getElementById('medamt_txt').value="";   
    document.getElementById('paidamt_txt').value="";   
    document.getElementById('balpay_txt').value="";
    document.getElementById('msg_box').innerHTML = "";
    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_delivery_data.php";
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
        document.getElementById('refno').value = XMLAddress1[0].childNodes[0].nodeValue; 

    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    document.getElementById('msg_box').innerHTML = "";
    if (document.getElementById('refno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Paid Date Not Enterd</span></div>";
        return false;
    }
    
 
    if (document.getElementById('pno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('name1_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('dele_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Delivery Date Is Not Enterd</span></div>";
        return false;
    }
    // if (document.getElementById('medamt_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Medical Amount Is Not Enterd</span></div>";
    //     return false;
    // }
    // if (document.getElementById('paidamt_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Paid Amount Is Not Enterd</span></div>";
    //     return false;
    // }
    // if (document.getElementById('balpay_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Balance Is Not Enterd</span></div>";
    //     return false;
    // }

 
    var url = "medical_delivery_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&refno=" + document.getElementById('refno').value;   
    url = url + "&serino_txt=" + document.getElementById('serino_txt').value;   
    url = url + "&mdate_txt=" + document.getElementById('mdate_txt').value;   
    url = url + "&pno_txt=" + document.getElementById('pno_txt').value;   
    url = url + "&name1_txt=" + document.getElementById('name1_txt').value;   
    url = url + "&name2_txt=" + document.getElementById('name2_txt').value;   
    url = url + "&dele_txt=" + document.getElementById('dele_txt').value;   
    url = url + "&time_txt=" + document.getElementById('time_txt').value;   
    url = url + "&ourref_txt=" + document.getElementById('ourref_txt').value;   
    url = url + "&remarks_txt=" + document.getElementById('remarks_txt').value;   
    url = url + "&medamt_txt=" + document.getElementById('medamt_txt').value;   
    url = url + "&paidamt_txt=" + document.getElementById('paidamt_txt').value;   
    url = url + "&balpay_txt=" + document.getElementById('balpay_txt').value;



    
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
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        }
    }
}

function delivered() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('refno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Paid Date Not Enterd</span></div>";
        return false;
    }
    // if (document.getElementById('serino_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Serial No Not Enterd</span></div>";
    //     return false;
    // }
    // if (document.getElementById('mdate_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Medical Date Is Not Enterd</span></div>";
    //     return false;
    // }
    document.getElementById('msg_box').innerHTML = "";



    var url = "medical_delivery_data.php";
    url = url + "?Command=" + "deliver";

    url = url + "&refno=" + document.getElementById('refno').value;   
    url = url + "&pno_txt=" + document.getElementById('pno_txt').value;  
    xmlHttp.onreadystatechange = deliver;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function deliver() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Delivered") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>delivered</span></div>";

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



    var url = "medical_delivery_data.php";
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


function cancel() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('refno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('serino_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('mdate_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Entered</span></div>";
        return false;
    }

    var url = "medical_delivery_data.php";
    url = url + "?Command=" + "cancel";


    url = url + "&refno=" + document.getElementById('refno').value;
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";

    xmlHttp.onreadystatechange = cancelmd;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function cancelmd() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Canceled</span></div>";
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

    var url = "medical_delivery_data.php";
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

    var url = "medical_delivery_data.php";
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























