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


function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_medical_inquiry_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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
    var url = "search_medical_inquiry_data.php";
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
        //alert( XMLAddress1[0].childNodes[0].nodeValue);
//        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
//        var stname = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);


    opener.document.getElementById('refno_txt').value = obj.refno;
    opener.document.getElementById('pportno_txt').value = obj.pportno;
    opener.document.getElementById('cou_name_txt').value = obj.country;
    opener.document.getElementById('gamca_txt').value = obj.gamca;
    opener.document.getElementById('eno_txt').value = obj.eno;
    opener.document.getElementById('date_txt').value = obj.mpdate;
    opener.document.getElementById('xrayno_txt').value = obj.xrayno;
    opener.document.getElementById('subname_txt').value = obj.subname;
    opener.document.getElementById('name_txt').value = obj.mpname;
    opener.document.getElementById('sex_txt').value = obj.sex;
    opener.document.getElementById('status_txt').value = obj.status;
    opener.document.getElementById('agency_txt').value = obj.agency;
    opener.document.getElementById('age_txt').value = obj.age;
    opener.document.getElementById('custrem_txt').value = obj.custrem;
    opener.document.getElementById('doctor1_txt').value = obj.doctor1;
    opener.document.getElementById('doctor2_txt').value = obj.doctor2;
    opener.document.getElementById('doctor3_txt').value = obj.doctor3;
    opener.document.getElementById('doctor4_txt').value = obj.doctor4;
    opener.document.getElementById('doctor5_txt').value = obj.doctor5;
    opener.document.getElementById('lab1_txt').value = obj.lab1;
    opener.document.getElementById('lab2_txt').value = obj.lab2;
    opener.document.getElementById('lab3_txt').value = obj.lab3;
    opener.document.getElementById('xray1_txt').value = obj.xray1;
    opener.document.getElementById('xray2_txt').value = obj.xray2;
     opener.document.getElementById('msg_box').innerHTML = obj.delivery ;


    self.close();

    }



}


function update_cust_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_medical_inquiry_data.php";
    url = url + "?Command=" + "search_custom";


    url = url + "&cusno=" + document.getElementById('cusno').value;
    url = url + "&customername1=" + document.getElementById('customername1').value;
    url = url + "&customername2=" + document.getElementById('customername2').value;
    url = url + "&stname=" + stname;



    xmlHttp.onreadystatechange = showcustresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function showcustresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;



    }
}