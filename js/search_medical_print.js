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

    var url = "search_medical_print_data.php";
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
    var url = "search_medical_print_data.php";
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

          XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        var stname = XMLAddress1[0].childNodes[0].nodeValue;

             //opener.document.form1.txt_ref.value = obj.REFNO; 
        

              if (stname == "miq") {


    
        opener.document.getElementById('cou_name_txt').value = obj.country;
        opener.document.getElementById('pportno_txt').value = obj.passport_no;
        opener.document.getElementById('date_txt').value = obj.medical_date;
        opener.document.getElementById('xrayno_txt').value = obj.xray_no;
         opener.document.getElementById('sex_txt').value = obj.sex;
          opener.document.getElementById('agency_txt').value = obj.agency;
           opener.document.getElementById('age_txt').value = obj.age;
           opener.document.getElementById('subname_txt').value = obj.name;
          opener.document.getElementById('status_txt').value = obj.status;

            opener.document.getElementById('custrem_txt').value = obj.serial_no;

         

         opener.document.getElementById('doctor1_txt').value = obj.remark1;
        opener.document.getElementById('doctor2_txt').value = obj.remark2;
        opener.document.getElementById('doctor3_txt').value = obj.remark3;
        opener.document.getElementById('doctor4_txt').value = obj.remark1_np;
         opener.document.getElementById('doctor5_txt').value = obj.remark2_np;

           opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + obj.img + "\" alt=\"\">";
        
                   

          
         }else{

          opener.document.form1.txt_ref.value = obj.ref_no;;
           opener.document.form1.txt_passno.value = obj.passport_no;
           opener.document.form1.dtbdate.value = obj.c_date;
           opener.document.form1.txt_agname.value = obj.agency;
           opener.document.form1.cmbhead.value = obj.country;
           opener.document.form1.txt_gccno.value = obj.gcc_no;
           opener.document.form1.dtcdate.value = obj.medical_date;
           opener.document.form1.txtName.value = obj.name;
           opener.document.form1.txtheight.value = obj.height;
           opener.document.form1.txtweg.value = obj.weight;
           opener.document.form1.cmbsex.value = obj.sex;
           opener.document.form1.txt_ag_ye.value = obj.age;
           opener.document.form1.cmbnat.value = obj.nationality;
           opener.document.form1.dtisu.value = obj.date_of_issue;
           opener.document.form1.TXTREFNO.value = obj.patients_ref_no;
           opener.document.form1.txtPOS_APP.value = obj.position_applied;
           opener.document.form1.cmbstatus.value = obj.status;
           opener.document.form1.txt_serino.value = obj.serial_no;
           opener.document.form1.txt_xrayno.value = obj.xray_no;
           opener.document.form1.txtdarem1.value = obj.remark1;
           opener.document.form1.txtdarem2.value = obj.remark2;
           opener.document.form1.txtdarem3.value = obj.remark3;
           opener.document.form1.txtrem1np.value = obj.remark1_np;
           opener.document.form1.txtrem2np.value = obj.remark2_np;
           opener.document.form1.txtxarem1.value = obj.xray_remark1;
           opener.document.form1.txtaremnp.value = obj.xray_remark2;
           opener.document.form1.txtlarem1.value = obj.lab_remark1;
           opener.document.form1.txtlarnp1.value = obj.lab_remark2;
           opener.document.form1.txtlabrem.value = obj.lab_remark3;
           opener.document.form1.txtEYE_NE_R.value = obj.vision_r_eye;
           opener.document.form1.txtEYE_NE_L.value = obj.vision_l_eye;
           opener.document.form1.txtEYE__R.value = obj.other_r_eye;
           opener.document.form1.txtEYE__L.value = obj.l_eye;
           opener.document.form1.txtYEAR_R.value = obj.right_ear;
           opener.document.form1.txtYEAR_L.value = obj.left_ear;
           opener.document.form1.txtbp.value = obj.blood_pressure;
           opener.document.form1.txtheart.value = obj.heart;
           opener.document.form1.txtlungs.value = obj.lungs;
           opener.document.form1.txtadb.value = obj.abdomen;
           opener.document.form1.txther.value = obj.hernia;
           opener.document.form1.txtvaric.value = obj.varicosities;
           opener.document.form1.txtextrem.value = obj.extremities;
           opener.document.form1.txtskin.value = obj.skin;
           opener.document.form1.txtHEM.value = obj.hemoglobin;
           opener.document.form1.cmbmal.value = obj.maleria;
           opener.document.form1.txtcreat.value = obj.creatinine;
           opener.document.form1.txturea.value = obj.urea;
           opener.document.form1.txtlft.value = obj.l_f_t;
           opener.document.form1.cmbbg.value = obj.blood_group;
           opener.document.form1.txtphyneuro.value = obj.p_and_n_disorders;
           opener.document.form1.txtal.value = obj.allegy;
           opener.document.form1.txtothe.value = obj.other;
           opener.document.form1.txtv_drlchest.value = obj.vdrl_chest;
           opener.document.form1.txt_xray.value = obj.x_ray;
           opener.document.form1.txt_vacci.value = obj.vaccination;
           opener.document.form1.txtvchol.value = obj.v_cholerae;
           opener.document.form1.txthelmin.value = obj.helminths;
           opener.document.form1.txtbilhar2.value = obj.bilharziasiss;
           opener.document.form1.txtsalshei.value = obj.salmonella_shegella;
           opener.document.form1.txtsug.value = obj.sugar;
           opener.document.form1.txtalbu.value = obj.albumin;
           opener.document.form1.txtbilhar1.value = obj.bilharziasis;
           opener.document.form1.txtpreg.value = obj.pregnency_test;
           opener.document.form1.cmbhiv.value = obj.HIV;
           opener.document.form1.cmbhbs.value = obj.HBS;
           opener.document.form1.antihcv.value = obj.HCV;
           }





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


    var url = "search_medical_print_data.php";
    url = url + "?Command=" + "search_custom";


    url = url + "&cusno=" + document.getElementById('cusno').value;
    url = url + "&customername1=" + document.getElementById('customername1').value;
    url = url + "&customername2=" + document.getElementById('customername2').value;
    url = url + "&customername3=" + document.getElementById('customername3').value;
    url = url + "&customername4=" + document.getElementById('customername4').value;
    url = url + "&customername5=" + document.getElementById('customername5').value;
    url = url + "&customername6=" + document.getElementById('customername6').value;
    url = url + "&customername7=" + document.getElementById('customername7').value;
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

