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

    var url = "search_medical_print3_data.php";
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
    var url = "search_medical_print3_data.php";
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

      
        opener.document.getElementById('refno_txt').value=obj.refno;
        opener.document.getElementById('pport_txt').value=obj.pport;
        opener.document.getElementById('date_txt').value=obj.ldate;
        opener.document.getElementById('agency_txt').value=obj.agency;
        opener.document.getElementById('ctry_txt').value=obj.country;
        opener.document.getElementById('gccno_txt').value=obj.gccno;
        opener.document.getElementById('mdate_txt').value=obj.mdate;
        opener.document.getElementById('reyevision_txt').value=obj.reyevision;
        opener.document.getElementById('leyevision_txt').value=obj.leyevision;
        opener.document.getElementById('otherreye_txt').value=obj.otherreye;
        opener.document.getElementById('creatinine.txt').value=obj.creatinine;
        opener.document.getElementById('otherleye_txt').value=obj.otherleye;
        opener.document.getElementById('rightear_txt').value=obj.rightear;
        opener.document.getElementById('leftear_txt').value=obj.leftear;
        opener.document.getElementById('bp_txt').value=obj.bp;
        opener.document.getElementById('heart_txt').value=obj.heart;
        opener.document.getElementById('lungs_txt').value=obj.lungs;
        opener.document.getElementById('abdomen_txt').value=obj.abdomen;
        opener.document.getElementById('hernia_txt').value=obj.hernia;
        opener.document.getElementById('varicosities_txt').value=obj.varicosities;
        opener.document.getElementById('extremities_txt').value=obj.extremities;
        opener.document.getElementById('skin_txt').value=obj.skin;
        opener.document.getElementById('hemoglobin.txt').value=obj.hemoglobin;
        opener.document.getElementById('malaria_txt').value=obj.malaria;
        opener.document.getElementById('lft_txt').value=obj.lft;
        opener.document.getElementById('urea_txt').value=obj.urea;
        opener.document.getElementById('bloodgroup_txt').value=obj.bloodgroup;
        opener.document.getElementById('psy_etc_txt').value=obj.psy_etc;
        opener.document.getElementById('alergy_txt').value=obj.alergy;
        opener.document.getElementById('other_txt').value=obj.other;
        
        

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


    var url = "search_medical_print3_data.php";
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

