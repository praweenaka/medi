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

    var url = "search_medical_print2_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function custno(code, stname)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_medical_print2_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;
    url = url + "&stname=" + stname;

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

       
        opener.document.getElementById('refno_txt').value= obj.refno;
        opener.document.getElementById('pport_txt').value= obj.pport;
        opener.document.getElementById('ldate_txt').value= obj.ldate;
        opener.document.getElementById('agency_txt').value= obj.agency;
        opener.document.getElementById('ctry_txt').value= obj.ctry;
        opener.document.getElementById('gccno_txt').value= obj.gccno;
        opener.document.getElementById('v_cholerae_txt').value= obj.v_cholerae;
        opener.document.getElementById('helminths_txt').value= obj.helminths;
        opener.document.getElementById('bilharziasis_txt').value= obj.bilharziasis;
        opener.document.getElementById('sal_sheg_txt').value= obj.sal_sheg;
        opener.document.getElementById('sugar_txt').value= obj.sugar;
        opener.document.getElementById('albumin_txt').value=obj.albumin;
        opener.document.getElementById('u_bilharziasis_txt').value= obj.u_bilharziasis;
        opener.document.getElementById('preg_txt').value= obj.pregnancy;
        opener.document.getElementById('hivtest_txt').value= obj.HIVtest;
        opener.document.getElementById('hbsag_txt').value= obj.HBsag;
        opener.document.getElementById('antihcv_txt').value= obj.antiHCV;
        
        

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


    var url = "search_medical_print2_data.php";
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

