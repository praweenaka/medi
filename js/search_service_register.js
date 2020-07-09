function GetXmlHObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiObject("Microsoft.XMLHTTP");
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

    xmlHttp = GetXmlHObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_service_register_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function custno(code, stname)

{
    xmlHttp = GetXmlHObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_service_register_data.php";
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
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        var stname = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        vobj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);


        if (stname == "code") {

            //opener.document.getElementById('txt_refno').value = obj.txt_refno;
            opener.document.getElementById('txt_refno').value= vobj.refno;
            opener.document.getElementById('txt_srdate' ).value= vobj.srdate;
            opener.document.getElementById('txt_patno' ).value= vobj.patientno;
            opener.document.getElementById('txt_fname' ).value= vobj.fname;
            opener.document.getElementById('txt_lname' ).value= vobj.lastname;
            opener.document.getElementById('txt_ageyrs' ).value= vobj.age_years;
            opener.document.getElementById('txt_agemnths').value= vobj.age_months; 
            opener.document.getElementById('txt_dob' ).value= vobj.bdate;
            opener.document.getElementById('txt_gender').value= vobj.sex; 
            opener.document.getElementById('txt_nation').value= vobj.nation; 
            opener.document.getElementById('country_txt').value= vobj.country;
            opener.document.getElementById('cou_name_txt' ).value= vobj.countryname;
            opener.document.getElementById('txt_nochld').value= vobj.no_chid; 
            opener.document.getElementById('txt_lchldage' ).value= vobj.lastchildage;
            opener.document.getElementById('txt_medicode' ).value= vobj.medicode;
            opener.document.getElementById('txt_mediname' ).value= vobj.mediname;
            opener.document.getElementById('txt_medistatus' ).value= vobj.medistatus;
            opener.document.getElementById('txt_type' ).value= vobj.meditype;
            opener.document.getElementById('txt_dest' ).value= vobj.dest;
            opener.document.getElementById('txt_xrayno' ).value= vobj.xrayno;
            opener.document.getElementById('txt_serino').value= vobj.serino; 
            opener.document.getElementById('txt_pla_of_iss' ).value= vobj.PLA_OF_IS;
            opener.document.getElementById('txt_gno').value= vobj.gno; 
            opener.document.getElementById('txt_posapp' ).value= vobj.POS_APP;
            opener.document.getElementById('txt_gccno' ).value= vobj.gccno;
            opener.document.getElementById('txt_cusadd' ).value= vobj.address;
            opener.document.getElementById('txt_dtofissu' ).value= vobj.dtisu;
            opener.document.getElementById('txt_time' ).value= vobj.med_time;
            opener.document.getElementById('txt_rem' ).value= vobj.remaks;
            opener.document.getElementById('txt_labref').value= vobj.labref; 
            opener.document.getElementById('txt_newref' ).value= vobj.newref;
            opener.document.getElementById('txt_fn1' ).value= vobj.finger1;
            opener.document.getElementById('txt_fn2' ).value= vobj.finger2;
            opener.document.getElementById('txt_cheqno').value= vobj.cheqno; 
            opener.document.getElementById('txt_cheqamt' ).value= vobj.cheq_amt;
            opener.document.getElementById('txt_cheqdt' ).value= vobj.cheq_date;
            opener.document.getElementById('txt_cash').value= vobj.csh_amt;
            opener.document.getElementById('txt_bank').value= vobj.bank; 
            opener.document.getElementById('txt_rfamt').value= vobj.refamt;
            opener.document.getElementById('txt_rfdt' ).value= vobj.dt_refund;
            opener.document.getElementById('agname_txt' ).value= vobj.agname;
            opener.document.getElementById('txt_paid' ).value= vobj.paid_amt;
            opener.document.getElementById('medi_amounttot' ).value= vobj.meditot;



            opener.document.getElementById('SerialNumber' ).value= vobj.serialNo;
            opener.document.getElementById('ImageHeight' ).value= vobj.H;
            opener.document.getElementById('ImageWidth').value= vobj.W;
            opener.document.getElementById('ImageDPI').value= vobj.DPI; 
            opener.document.getElementById('ImageQuality').value= vobj.Quality;
            opener.document.getElementById('NFIQ' ).value= vobj.NFIQ;
            opener.document.getElementById('TemplateBase64_txt' ).value= vobj.Tempbase;

            opener.document.getElementById('tmpno').value= vobj.uniq;
            opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + vobj.img + "\" alt=\"\">";



            var rowCount = window.opener.document.getElementById('myTable').rows.length;

            var i;

            for (i = 0; i < rowCount-1; i++) { 
                window.opener.document.getElementById("myTable").deleteRow(1);
            }
                // table.parentNode.removeChild(table);

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subrow");
                var i;
                for (i = 0; i < XMLAddress1.length; i++) { 

                  var obj = JSON.parse(XMLAddress1[i].childNodes[0].nodeValue);

                  var table = window.opener.document.getElementById('myTable');

                // table.parentNode.removeChild(table);
                var row = table.insertRow(table.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3); 

                cell1.innerHTML = obj.mediDescript;
                cell2.innerHTML = obj.amount;
                cell3.innerHTML = "";
                cell4.innerHTML = '<input type="button" value="-" onclick="deleteRow(this)">';
                
            }
            
        }
        if (stname == "barcode") {

            //opener.document.getElementById('txt_refno').value = obj.txt_refno;
            opener.document.getElementById('txt_refno').value= vobj.refno;
            opener.document.getElementById('txt_srdate' ).value= vobj.srdate;
            opener.document.getElementById('txt_patno' ).value= vobj.patientno;
            opener.document.getElementById('txt_fname' ).value= vobj.fname;
            opener.document.getElementById('txt_lname' ).value= vobj.lastname;
            

        }

        if (stname == "mrn") {

            //opener.document.getElementById('txt_refno').value = obj.txt_refno;
         // opener.document.getElementById('txt_refno').value= vobj.refno;
         opener.document.getElementById('txt_srdate' ).value= vobj.srdate;
         opener.document.getElementById('txt_patno' ).value= vobj.patientno;
         opener.document.getElementById('txt_fname' ).value= vobj.fname;
         opener.document.getElementById('txt_lname' ).value= vobj.lastname;
         opener.document.getElementById('txt_ageyrs' ).value= vobj.age_years;
         opener.document.getElementById('txt_agemnths').value= vobj.age_months; 
         opener.document.getElementById('txt_dob' ).value= vobj.bdate;
         opener.document.getElementById('txt_gender').value= vobj.sex; 
         opener.document.getElementById('txt_nation').value= vobj.nation; 
         opener.document.getElementById('country_txt').value= vobj.country;
         opener.document.getElementById('cou_name_txt' ).value= vobj.countryname;
         opener.document.getElementById('txt_nochld').value= vobj.no_chid; 
         opener.document.getElementById('txt_lchldage' ).value= vobj.lastchildage;
         opener.document.getElementById('txt_medicode' ).value= vobj.medicode;
         opener.document.getElementById('txt_mediname' ).value= vobj.mediname;
         opener.document.getElementById('txt_medistatus' ).value= vobj.medistatus;
         opener.document.getElementById('txt_type' ).value= vobj.meditype;
         opener.document.getElementById('txt_dest' ).value= vobj.dest;
         opener.document.getElementById('txt_xrayno' ).value= vobj.xrayno;
         opener.document.getElementById('txt_serino').value= vobj.serino; 
         opener.document.getElementById('txt_pla_of_iss' ).value= vobj.PLA_OF_IS;
         opener.document.getElementById('txt_gno').value= vobj.gno; 
         opener.document.getElementById('txt_posapp' ).value= vobj.POS_APP;
         opener.document.getElementById('txt_gccno' ).value= vobj.gccno;
         opener.document.getElementById('txt_cusadd' ).value= vobj.address;
         opener.document.getElementById('txt_dtofissu' ).value= vobj.dtisu;
         opener.document.getElementById('txt_time' ).value= vobj.med_time;
         opener.document.getElementById('txt_rem' ).value= vobj.remaks;
         opener.document.getElementById('txt_labref').value= vobj.labref; 
         opener.document.getElementById('txt_newref' ).value= vobj.newref;
         opener.document.getElementById('txt_fn1' ).value= vobj.finger1;
         opener.document.getElementById('txt_fn2' ).value= vobj.finger2;
         opener.document.getElementById('txt_cheqno').value= vobj.cheqno; 
         opener.document.getElementById('txt_cheqamt' ).value= vobj.cheq_amt;
         opener.document.getElementById('txt_cheqdt' ).value= vobj.cheq_date;
         opener.document.getElementById('txt_cash').value= vobj.csh_amt;
         opener.document.getElementById('txt_bank').value= vobj.bank; 
         opener.document.getElementById('txt_rfamt').value= vobj.refamt;
         opener.document.getElementById('txt_rfdt' ).value= vobj.dt_refund;
         opener.document.getElementById('agname_txt' ).value= vobj.agname;



         opener.document.getElementById('SerialNumber' ).value= vobj.serialNo;
         opener.document.getElementById('ImageHeight' ).value= vobj.H;
         opener.document.getElementById('ImageWidth').value= vobj.W;
         opener.document.getElementById('ImageDPI').value= vobj.DPI; 
         opener.document.getElementById('ImageQuality').value= vobj.Quality;
         opener.document.getElementById('NFIQ' ).value= vobj.NFIQ;
         opener.document.getElementById('TemplateBase64_txt' ).value= vobj.Tempbase;

         opener.document.getElementById('tmpno').value= vobj.uniq;
         opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + vobj.img + "\" alt=\"\">";



     }



     if (stname == "medi_pri") {
        opener.document.getElementById('TXTREFNO').value = vobj.refno;

        opener.document.getElementById('cmbsex').value = vobj.sex;

        opener.document.getElementById('txt_ag_ye').value = vobj.age_years;

        opener.document.getElementById('cmbnat').value = vobj.nation;

        opener.document.getElementById('dtisu').value = vobj.dtisu;

        opener.document.getElementById('txtName').value = vobj.fname + "  " + vobj.lastname;

        opener.document.getElementById('txtPOS_APP').value = vobj.POS_APP;

        opener.document.getElementById('cmbstatus').value = vobj.medistatus;

        opener.document.getElementById('txt_serino').value = vobj.serino;

        opener.document.getElementById('txt_xrayno').value = vobj.xrayno;

        opener.document.getElementById('txt_passno').value = vobj.patientno;

        opener.document.getElementById('dtbdate').value = vobj.bdate;

        opener.document.getElementById('txt_agname').value = vobj.agname;

        opener.document.getElementById('cmbhead').value = vobj.countryname;

        opener.document.getElementById('txt_gccno').value = vobj.gno;

        opener.document.getElementById('dtcdate').value = vobj.srdate;

        // opener.document.getElementById('cmbstatus').value = vobj.srdate;

        opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + vobj.img + "\" alt=\"\">";
    }

    if (stname == "miq") {
        opener.document.getElementById('pportno_txt').value = vobj.patientno;
        opener.document.getElementById('cou_name_txt').value = vobj.countryname;
        opener.document.getElementById('xrayno_txt').value = vobj.xrayno;
        opener.document.getElementById('age_txt').value = vobj.age_years;
        opener.document.getElementById('custrem_txt').value = vobj.remarks;
        opener.document.getElementById('sex_txt').value = vobj.sex;
        
    }

    if (stname == "miqs") {
        opener.document.getElementById('pportno_txt').value = vobj.patientno;
        opener.document.getElementById('cou_name_txt').value = vobj.countryname;
        opener.document.getElementById('xrayno_txt').value = vobj.xrayno;
        opener.document.getElementById('age_txt').value = vobj.age_years;
        opener.document.getElementById('custrem_txt').value = vobj.remaks;
        opener.document.getElementById('sex_txt').value = vobj.sex;
        opener.document.getElementById('status_txt').value = vobj.medistatus;
        opener.document.getElementById('agency_txt').value = vobj.agname;
        opener.document.getElementById('date_txt').value = vobj.srdate;
        opener.document.getElementById('subname_txt').value = vobj.fname + "  " + vobj.lastname;
        opener.document.getElementById('name_txt').value = vobj.meditype;

        


        
        
        
    }
    if (stname == "medi_deli") {

        //alert("cfdvdfv");
        opener.document.getElementById('serino_txt').value = vobj.serino;
        opener.document.getElementById('pno_txt').value = vobj.patientno;
        opener.document.getElementById('name1_txt').value = vobj.fname;
        opener.document.getElementById('name2_txt').value = vobj.lastname;
        opener.document.getElementById('mdate_txt').value = vobj.srdate;

        opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + vobj.img + "\" alt=\"\">";

    }

    self.close();
}

}


function update_cust_list(stname)
{

    xmlHttp =  GetXmlHObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_service_register_data.php";
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


