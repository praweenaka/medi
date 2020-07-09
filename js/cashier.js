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
function getDate(){

var today = new Date();
document.getElementById("date_txt").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}

function newent() {

    document.getElementById('refno_txt').value = "";
    document.getElementById('date_txt').value = "";
    document.getElementById('pno_txt').value = "";
    document.getElementById('fname_txt').value = "";
    //document.getElementById('lname_txt').value = "";
    document.getElementById('agname_txt').value = "";
    document.getElementById('labno_txt').value = "";
    document.getElementById('country_txt').value = "";
    document.getElementById('cou_name_txt').value = "";
    document.getElementById('chkno_txt').value = "";
    document.getElementById('chkdt_txt').value = "";
    document.getElementById('chkamt_txt').value = "";
    document.getElementById('bank_txt').value = "";
    document.getElementById('cash_txt').value = "";
    document.getElementById('refdt_txt').value = "";
    document.getElementById('refund_txt').value = "";
    document.getElementById('pamt_txt').value = "";
    document.getElementById('ptype_txt').value = "";
    document.getElementById('medino_txt').value = "";
    document.getElementById('msg_box').innerHTML = "";
    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "cashier_data.php";
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


        getDate();
    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    document.getElementById('msg_box').innerHTML = "";
    if (document.getElementById('date_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Paid Date Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('pno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('fname_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Is Not Selected</span></div>";
        return false;
    }
    // if (document.getElementById('chkno_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cheque No Is Not Entered</span></div>";
    //     return false;
    // }
    // if (document.getElementById('chkamt_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cheque Amount Is Not Entered</span></div>";
    //     return false;
    // }
    // if (document.getElementById('cash_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Cash Amount Is Not Entered</span></div>";
    //     return false;
    // }
    // if (document.getElementById('pamt_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Paid Amount Is Not Enterd</span></div>";
    //     return false;
    // }
    // if (document.getElementById('ptype_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Payment Type Is Not Selected</span></div>";
    //     return false;
    // }
    if (document.getElementById('bank_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Bank Is Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('refdt_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>refund Date Is Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('refund_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Refund Amount Is Not Enterd</span></div>";
        return false;
    }

    var url = "cashier_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&date_txt=" + document.getElementById('date_txt').value;
    url = url + "&pno_txt=" + document.getElementById('pno_txt').value;
    url = url + "&fname_txt=" + document.getElementById('fname_txt').value;
    //url = url + "&lname_txt=" + document.getElementById('lname_txt').value;
    url = url + "&agname_txt=" + document.getElementById('agname_txt').value;
    url = url + "&labno_txt=" + document.getElementById('labno_txt').value;
    url = url + "&country_txt=" + document.getElementById('country_txt').value;
    url = url + "&cou_name_txt=" + document.getElementById('cou_name_txt').value;
    url = url + "&chkno_txt=" + document.getElementById('chkno_txt').value;
    url = url + "&chkdt_txt=" + document.getElementById('chkdt_txt').value;
    url = url + "&chkamt_txt=" + document.getElementById('chkamt_txt').value;
    url = url + "&bank_txt=" + document.getElementById('bank_txt').value;
    url = url + "&cash_txt=" + document.getElementById('cash_txt').value;
    url = url + "&refdt_txt=" + document.getElementById('refdt_txt').value;
    url = url + "&refund_txt=" + document.getElementById('refund_txt').value;
    url = url + "&pamt_txt=" + document.getElementById('pamt_txt').value;
    url = url + "&ptype_txt=" + document.getElementById('ptype_txt').value;
    url = url + "&medino_txt=" + document.getElementById('medino_txt').value;

    
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
    document.getElementById('msg_box').innerHTML = "";
    if (document.getElementById('date_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Found</span></div>";
        return false;
    }
    if (document.getElementById('pno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Found/span></div>";
        return false;
    }
    if (document.getElementById('fname_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Data Not Found</span></div>";
        return false;
    }

    var url = "cashier_data.php";
    url = url + "?Command=" + "cancel";


    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";

    xmlHttp.onreadystatechange = cancelcashier;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function cancelcashier() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "cancel") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Cancelled Successfully</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}




function print() {

    var url = "cashier_print.php";
    url = url + "?refno_txt=" + document.getElementById('refno_txt').value;


    window.open(url, '_blank');



}
























