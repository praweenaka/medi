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

    var url = "search_patient_registration_data.php";
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
    var url = "search_patient_registration_data.php";
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
        opener.document.getElementById('medicode_txt').value = obj.medcode;
        opener.document.getElementById('agname_txt').value = obj.AGNAME;
        opener.document.getElementById('medidate_txt').value = obj.medDate;
        opener.document.getElementById('gno_txt').value = obj.g_no;
        opener.document.getElementById('mediname_txt').value = obj.medName;
        opener.document.getElementById('amount_txt').value = obj.Amount;
        opener.document.getElementById('amount1_txt').value = obj.amount1;
        opener.document.getElementById('amount2_txt').value = obj.amount2;
        opener.document.getElementById('type_txt').value = obj.Type;
        opener.document.getElementById('country_txt').value = obj.country;
        opener.document.getElementById('cou_name_txt').value = obj.cou_name;
        opener.document.getElementById('cus_remark_txt').value = obj.cus_remark;
        opener.document.getElementById('age_y_txt').value = obj.AGE_Y;
        opener.document.getElementById('age_m_txt').value = obj.AGE_M;
        opener.document.getElementById('dest_txt').value = obj.dest;
        opener.document.getElementById('pa_no_txt').value = obj.pa_no;
        opener.document.getElementById('seri_no_txt').value = obj.seri_no;
        opener.document.getElementById('xrayno_txt').value = obj.XRAYNO;
        opener.document.getElementById('pic_txt').value = obj.pic;
        opener.document.getElementById('sex_txt').value = obj.sex;
        opener.document.getElementById('medStatus_txt').value = obj.medStatus;
        opener.document.getElementById('nationl_txt').value = obj.NATIONL;
        opener.document.getElementById('pla_of_is_txt').value = obj.PLA_OF_IS;
        opener.document.getElementById('pos_app_txt').value = obj.POS_APP;
        opener.document.getElementById('no_child_txt').value = obj.No_child;
        opener.document.getElementById('last_ch_age_txt').value = obj.last_ch_age;
        opener.document.getElementById('gccno_txt').value = obj.GCC_NO;
        opener.document.getElementById('chkno_txt').value = obj.chkno;
        opener.document.getElementById('cusadd_txt').value = obj.cusadd;
        opener.document.getElementById('lastname_txt').value = obj.Lastname;
        opener.document.getElementById('user_refno_txt').value = obj.userrefno;
        opener.document.getElementById('dtisu_txt').value = obj.dtisu;
        opener.document.getElementById('stime_txt').value = obj.sTime;
        opener.document.getElementById('picloc_txt').value = obj.picloc;
        opener.document.getElementById('dob_txt').value = obj.dob;
        opener.document.getElementById('cash_txt').value = obj.cash;
        opener.document.getElementById('labref_txt').value = obj.labref;
        opener.document.getElementById('chkno2_txt').value = obj.chkno_2;
        opener.document.getElementById('chkdt_txt').value = obj.chkdt;
        opener.document.getElementById('chkamt_txt').value = obj.chkamt;
        opener.document.getElementById('bank_txt').value = obj.bank;
        opener.document.getElementById('type_2_txt').value = obj.Type_2;
        opener.document.getElementById('amount_1_1txt').value = obj.amount1_1;
        opener.document.getElementById('amount 1_2_txt').value = obj.amount2_2;
        opener.document.getElementById('medtype_txt').value = obj.medtype;
        opener.document.getElementById('nwref_txt').value = obj.nwref;
        opener.document.getElementById('finger_new1_txt').value = obj.finger_new1;
        opener.document.getElementById('finger_new2_txt').value = obj.finger_new2;

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


    var url = "search_patient_registration_data.php";
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