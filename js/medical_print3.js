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
    document.getElementById('date_txt').value="";
    document.getElementById('agency_txt').value="";
    document.getElementById('ctry_txt').value="";
    document.getElementById('gccno_txt').value="";
    document.getElementById('mdate_txt').value="";
    document.getElementById('reyevision_txt').value="";
    document.getElementById('leyevision_txt').value="";
    document.getElementById('otherreye_txt').value="";
    document.getElementById('creatinine.txt').value="";
    document.getElementById('otherleye_txt').value="";
    document.getElementById('rightear_txt').value="";
    document.getElementById('leftear_txt').value="";
    document.getElementById('bp_txt').value="";
    document.getElementById('heart_txt').value="";
    document.getElementById('lungs_txt').value="";
    document.getElementById('abdomen_txt').value="";
    document.getElementById('hernia_txt').value="";
    document.getElementById('varicosities_txt').value="";
    document.getElementById('extremities_txt').value="";
    document.getElementById('skin_txt').value="";
    document.getElementById('hemoglobin.txt').value="";
    document.getElementById('malaria_txt').value="";
    document.getElementById('lft_txt').value="";
    document.getElementById('urea_txt').value="";
    document.getElementById('bloodgroup_txt').value="";
    document.getElementById('psy_etc_txt').value="";
    document.getElementById('alergy_txt').value="";
    document.getElementById('other_txt').value="";
    document.getElementById('msg_box').innerHTML = "";
    getdt();
}


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_print_part2_data.php";
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

    var url = "medical_print_part2_data.php";
    url = url + "?Command=" + "save_item";

     url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
     url = url + "&pport_txt=" + document.getElementById('pport_txt').value;
     url = url + "&date_txt=" + document.getElementById('date_txt').value;
     url = url + "&agency_txt=" + document.getElementById('agency_txt').value;
     url = url + "&ctry_txt=" + document.getElementById('ctry_txt').value;
     url = url + "&gccno_txt=" + document.getElementById('gccno_txt').value;
     url = url + "&mdate_txt=" + document.getElementById('mdate_txt').value;
     url = url + "&reyevision_txt=" + document.getElementById('reyevision_txt').value;
     url = url + "&leyevision_txt=" + document.getElementById('leyevision_txt').value;
     url = url + "&otherreye_txt=" + document.getElementById('otherreye_txt').value;
     url = url + "&otherleye_txt=" + document.getElementById('otherleye_txt').value;
     url = url + "&rightear_txt=" + document.getElementById('rightear_txt').value;
     url = url + "&leftear_txt=" + document.getElementById('leftear_txt').value;
     url = url + "&bp_txt=" + document.getElementById('bp_txt').value;
     url = url + "&heart_txt=" + document.getElementById('heart_txt').value;
     url = url + "&lungs_txt=" + document.getElementById('lungs_txt').value;
     url = url + "&abdomen_txt=" + document.getElementById('abdomen_txt').value;
     url = url + "&hernia_txt=" + document.getElementById('hernia_txt').value;
     url = url + "&varicosities_txt=" + document.getElementById('varicosities_txt').value;
     url = url + "&extremities_txt=" + document.getElementById('extremities_txt').value;
     url = url + "&skin_txt=" + document.getElementById('skin_txt').value;
     url = url + "&hemoglobin_txt=" + document.getElementById('hemoglobin_txt').value;
     url = url + "&malaria_txt" + document.getElementById('malaria_txt').value;
     url = url + "&lft_txt=" + document.getElementById('lft_txt').value;
     url = url + "&creatinine_txt=" + document.getElementById('creatinine_txt').value;
     url = url + "&urea_txt=" + document.getElementById('urea_txt').value;
     url = url + "&bloodgroup_txt=" + document.getElementById('bloodgroup_txt').value;
     url = url + "&psy_etc_txt=" + document.getElementById('psy_etc_txt').value;
     url = url + "&alergy_txt=" + document.getElementById('alergy_txt').value;
     url = url + "&other_txt=" + document.getElementById('other_txt').value;
  
    
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
            setTimeout("location.reload(true);",500);
             
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


    var url = "medical_print_part2_data.php";
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

    var url = "medical_print_part2_data.php";
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

    var url = "medical_print_part2_data.php";
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

    var url = "medical_print_part2_data.php";
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























