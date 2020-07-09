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

 document.getElementById('txt_refno').value="";
 document.getElementById('txt_srdate' ).value="";
 document.getElementById('txt_patno' ).value="";
 document.getElementById('txt_fname' ).value="";
 document.getElementById('txt_lname' ).value="";
 document.getElementById('txt_ageyrs' ).value="";
 document.getElementById('txt_agemnths').value=""; 
 document.getElementById('txt_dob' ).value="";
 document.getElementById('txt_gender').value=""; 
 document.getElementById('txt_nation').value=""; 
 document.getElementById('country_txt').value="";
 document.getElementById('cou_name_txt' ).value="";
 document.getElementById('txt_nochld').value=""; 
 document.getElementById('txt_lchldage' ).value="";
 document.getElementById('txt_medicode' ).value="";
 document.getElementById('txt_mediname' ).value="";
 document.getElementById('txt_medistatus' ).value="";
 document.getElementById('txt_type' ).value="";
 document.getElementById('txt_dest' ).value="";
 document.getElementById('txt_xrayno' ).value="";
 document.getElementById('txt_serino').value=""; 
 document.getElementById('txt_pla_of_iss' ).value="";
 document.getElementById('txt_gno').value=""; 
 document.getElementById('txt_posapp' ).value="";
 document.getElementById('txt_gccno' ).value="";
 document.getElementById('txt_cusadd' ).value="";
 document.getElementById('txt_dtofissu' ).value="";
 document.getElementById('txt_time' ).value="";
 document.getElementById('txt_rem' ).value="";
 document.getElementById('txt_labref').value=""; 
 document.getElementById('txt_newref' ).value="";
 document.getElementById('txt_fn1' ).value="";
 document.getElementById('txt_fn2' ).value="";
 document.getElementById('txt_cheqno').value=""; 
 document.getElementById('txt_cheqamt' ).value="";
 document.getElementById('txt_cheqdt' ).value="";
 document.getElementById('txt_cash').value="";
 document.getElementById('txt_bank').value=""; 
 document.getElementById('txt_rfamt').value="";
 document.getElementById('txt_rfdt' ).value="";
  document.getElementById('agname_txt' ).value="";

 document.getElementById('gflag').value="" ;
 document.getElementById('msg_box').innerHTML = "";
 document.getElementById('getImg').innerHTML = "";
 document.getElementById('file-3').value = "";


// Fingerprint Text Clear
document.getElementById('SerialNumber').value="";
document.getElementById('ImageHeight').value="";
document.getElementById('ImageWidth').value="";
document.getElementById('ImageDPI').value="";
document.getElementById('ImageQuality').value="";
document.getElementById('NFIQ').value="";
document.getElementById('TemplateBase64_txt').value="";
document.getElementById('FPImage1').innerHTML="";



 
 getdt();
 cal_time();
 getDate();

 
}

function getDate(){


var today = new Date();
document.getElementById("txt_srdate").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}


function cal_time(){
    
var today = new Date();

var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
document.getElementById('txt_time').value=time;

}

function cal_bdate(){
    

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date;


        var date2 = new Date(dateTime);
        var date1 = new Date(document.getElementById('txt_dob' ).value);// remember this is equivalent to 06 01 2010


         var diff = Math.floor(date2.getTime() - date1.getTime());
        var day = 1000 * 60 * 60 * 24;

        var days = Math.floor(diff/day);
        var months = Math.floor(days/31);
        var years = Math.floor(months/12);

        ++years;
        document.getElementById('txt_ageyrs').value=years;

 

}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "service_register_data.php";
    url = url + "?Command=" + "getdt"; 

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        document.getElementById('txt_refno').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;
            
       getlab();
    }
}


function getlab() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "service_register_data.php";
    url = url + "?Command=" + "getlab"; 


    url = url + "&txt_newref=" + document.getElementById('txt_newref').value;

    xmlHttp.onreadystatechange = assign_lab;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_lab() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id1");
        document.getElementById('txt_labref').value =  XMLAddress1[0].childNodes[0].nodeValue;

        
            

    }
}


function setlab() {
     getlab();  

    // var pref = document.getElementById('txt_newref').value;

    // var text = document.getElementById('txt_labref').value;
    
    // var obj = text.split("/");

    // document.getElementById('txt_labref').value = pref + "/" + obj[1];  

   
}

function setamount() {

    var pref = document.getElementById('txt_cash').value;
    document.getElementById('txt_paid').value = pref;    
}



function save_inv() {

xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    
    if (document.getElementById('txt_srdate').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_patno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_fname').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>First Name Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_lname').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Last Name Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_gender').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Gender Is Not Enterd</span></div>";
        return false;
    }
  

    if (document.getElementById('cou_name_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Country Name Is Not Enterd</span></div>";
        return false;
    }
    // if (document.getElementById('file-3').innerHTML == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Choose an Image</span></div>";
    //     return false;
    // }
    if (document.getElementById('txt_labref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Lab No Is Not Enterd</span></div>";
        return false;
    }
    


    var files = $('#file-3')[0].files; 
    var name = document.getElementById('file-3');

    var t = 0;
    var data = new FormData();
    for (var i = 0, f; f = files[i]; i++) {
        var alpha = name.files[0];
        if (alpha == "") {
            t = 0;
        } else {
            t = 1;
        }
        data.append('id', document.getElementById('txt_patno').value);
        data.append('file', alpha);
    }



    data.append('Command', "imgsave");

    $.ajax({
        url: 'service_register_data.php',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (msg) {

        }
    });

      var table1 = $('#myTable').tableToJSON();
        var Jtable1 = JSON.stringify(table1);
 
    var url = "service_register_data.php";
    url = url + "?Command=" + "save_item";
 
    url = url + "&txt_refno=" + document.getElementById('txt_refno').value;
    url = url + "&txt_srdate=" + document.getElementById('txt_srdate').value;
    url = url + "&txt_patno=" + document.getElementById('txt_patno').value;
    url = url + "&txt_fname=" + document.getElementById('txt_fname').value;
    url = url + "&txt_lname=" + document.getElementById('txt_lname').value;
    url = url + "&txt_ageyrs=" + document.getElementById('txt_ageyrs').value;
    url = url + "&txt_agemnths=" + document.getElementById('txt_agemnths').value;
    url = url + "&txt_dob=" + document.getElementById('txt_dob' ).value;
    url = url + "&txt_gender=" + document.getElementById('txt_gender').value;
    url = url + "&txt_nation=" + document.getElementById('txt_nation').value;
    url = url + "&txt_count=" + document.getElementById('country_txt').value;
    url = url + "&txt_countname=" + document.getElementById('cou_name_txt').value;
    url = url + "&txt_nochld=" + document.getElementById('txt_nochld').value;
    url = url + "&txt_lchldage=" + document.getElementById('txt_lchldage').value;
    url = url + "&txt_medicode=" + document.getElementById('txt_medicode').value;
    url = url + "&txt_mediname=" + document.getElementById('txt_mediname').value;
    url = url + "&txt_medistatus=" + document.getElementById('txt_medistatus').value;
    url = url + "&txt_type=" + document.getElementById('txt_type').value;
    url = url + "&txt_dest=" + document.getElementById('txt_dest').value;
    url = url + "&txt_xrayno=" + document.getElementById('txt_xrayno').value;
    url = url + "&txt_serino=" + document.getElementById('txt_serino').value;
    url = url + "&txt_pla_of_iss=" + document.getElementById('txt_pla_of_iss').value;
    url = url + "&txt_gno=" + document.getElementById('txt_gno').value;
    url = url + "&txt_posapp=" + document.getElementById('txt_posapp' ).value;
    url = url + "&txt_gccno=" + document.getElementById('txt_gccno' ).value;
    url = url + "&txt_cusadd=" + document.getElementById('txt_cusadd' ).value;
    url = url + "&txt_dtofissu=" + document.getElementById('txt_dtofissu' ).value;
    url = url + "&txt_time=" + document.getElementById('txt_time' ).value;
    url = url + "&txt_rem=" + document.getElementById('txt_rem' ).value;
    url = url + "&txt_labref=" + document.getElementById('txt_labref').value;
    url = url + "&txt_newref=" + document.getElementById('txt_newref' ).value;
    url = url + "&txt_fn1=" + document.getElementById('txt_fn1').value;
    url = url + "&txt_fn2=" + document.getElementById('txt_fn2').value;
    url = url + "&txt_cheqno=" + document.getElementById('txt_cheqno').value;
    url = url + "&txt_cheqamt=" + document.getElementById('txt_cheqamt').value;
    url = url + "&txt_cheqdt=" + document.getElementById('txt_cheqdt').value;
    url = url + "&txt_cash=" + document.getElementById('txt_cash').value;
    url = url + "&txt_bank=" + document.getElementById('txt_bank').value;
    url = url + "&txt_rfamt=" + document.getElementById('txt_rfamt').value;
    url = url + "&txt_paid=" + document.getElementById('txt_paid').value;
    url = url + "&txt_rfdt=" + document.getElementById('txt_rfdt' ).value;
    url = url + "&agname_txt=" + document.getElementById('agname_txt' ).value;
    url = url + "&gflag=" + document.getElementById('gflag' ).value;
    url = url + "&uniq=" + document.getElementById('tmpno').value;
    url = url + "&medi_amounttot=" + document.getElementById('medi_amounttot').value;


    // Fingerprint Text Clear
    url = url + "&SerialNumber=" + document.getElementById('SerialNumber').value;
    url = url + "&ImageHeight=" + document.getElementById('ImageHeight').value;
    url = url + "&ImageWidth=" + document.getElementById('ImageWidth').value;
    url = url + "&ImageDPI=" + document.getElementById('ImageDPI').value;
    url = url + "&ImageQuality=" + document.getElementById('ImageQuality').value;
    url = url + "&NFIQ=" + document.getElementById('NFIQ').value;
    url = url + "&TemplateBase64_txt=" + document.getElementById('TemplateBase64_txt').value;

    url = url + "&Jtable1=" + Jtable1;

    //console.log(Jtable1)


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

} 


function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(1000).delay(2000);
            $("#msg_box").slideUp(400);
             setTimeout(location.reload.bind(location), 1000);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}



function addRow() {
    var k = Math.floor(Math.random() * 1000000);
  var table = document.getElementById("myTable");

  var row = table.insertRow(table.length);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  
 
  cell1.setAttribute("id", "code"+k);
  cell2.setAttribute("id", "name"+k);
   
  cell3.setAttribute("contenteditable", "true");
  cell3.setAttribute("onkeyup", "qtyTot();");
 
    // cell7.setAttribute("contenteditable", "true");
  cell1.innerHTML = "";
  cell2.innerHTML = "";
  cell3.innerHTML = "<a href=\"\" onclick=\"NewWindow('medicals_view.php?stname=ser_r&k="+k+"', 'mywin', '800', '700', 'yes', 'center');                                                                    return false\" onfocus=\"this.blur()\">                                                                <input type=\"button\" name=\"searchcusti\" id=\"searchcusti\" value=\"...\" class=\"btn btn-default btn-sm\">                                                            </a>";
  cell4.innerHTML = '<input type="button" value="-" onclick="deleteRow(this)">';


   qtyTot();
}

function deleteRow(r) {

  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);

        qtyTot();
}


function cancel() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
     if (document.getElementById('txt_srdate').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_patno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Pation No Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_fname').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>First Name Is Not Enterd</span></div>";
        return false;
    }

    var url = "service_register_data.php";
    url = url + "?Command=" + "cancel";


    url = url + "&refno_txt=" + document.getElementById('txt_refno').value;
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

function update()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('txt_srdate').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Date Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_patno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Pation No Is Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_fname').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>First Name Is Not Enterd</span></div>";
        return false;
    }


    //  if (document.getElementById('agn_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Ref Not Enterd</span></div>";
    //     $("#msg_box").hide().slideDown(400).delay(2000);
    //         $("#msg_box").slideUp(400);
    //     return false;
    // }
    
    

    var url = "service_register_data.php";
    url = url + "?Command=" + "update_item";

   
    url = url + "&txt_refno=" + document.getElementById('txt_refno').value;
    url = url + "&txt_srdate=" + document.getElementById('txt_srdate').value;
    url = url + "&txt_patno=" + document.getElementById('txt_patno').value;
    url = url + "&txt_fname=" + document.getElementById('txt_fname').value;
    url = url + "&txt_lname=" + document.getElementById('txt_lname').value;
    url = url + "&txt_ageyrs=" + document.getElementById('txt_ageyrs').value;
    url = url + "&txt_agemnths=" + document.getElementById('txt_agemnths').value;
    url = url + "&txt_dob=" + document.getElementById('txt_dob' ).value;
    url = url + "&txt_gender=" + document.getElementById('txt_gender').value;
    url = url + "&txt_nation=" + document.getElementById('txt_nation').value;
    url = url + "&txt_count=" + document.getElementById('country_txt').value;
    url = url + "&txt_countname=" + document.getElementById('cou_name_txt').value;
    url = url + "&txt_nochld=" + document.getElementById('txt_nochld').value;
    url = url + "&txt_lchldage=" + document.getElementById('txt_lchldage').value;
    url = url + "&txt_medicode=" + document.getElementById('txt_medicode').value;
    url = url + "&txt_mediname=" + document.getElementById('txt_mediname').value;
    url = url + "&txt_medistatus=" + document.getElementById('txt_medistatus').value;
    url = url + "&txt_type=" + document.getElementById('txt_type').value;
    url = url + "&txt_dest=" + document.getElementById('txt_dest').value;
    url = url + "&txt_xrayno=" + document.getElementById('txt_xrayno').value;
    url = url + "&txt_serino=" + document.getElementById('txt_serino').value;
    url = url + "&txt_pla_of_iss=" + document.getElementById('txt_pla_of_iss').value;
    url = url + "&txt_gno=" + document.getElementById('txt_gno').value;
    url = url + "&txt_posapp=" + document.getElementById('txt_posapp' ).value;
    url = url + "&txt_gccno=" + document.getElementById('txt_gccno' ).value;
    url = url + "&txt_cusadd=" + document.getElementById('txt_cusadd' ).value;
    url = url + "&txt_dtofissu=" + document.getElementById('txt_dtofissu' ).value;
    url = url + "&txt_time=" + document.getElementById('txt_time' ).value;
    url = url + "&txt_rem=" + document.getElementById('txt_rem' ).value;
    url = url + "&txt_labref=" + document.getElementById('txt_labref').value;
    url = url + "&txt_newref=" + document.getElementById('txt_newref' ).value;
    url = url + "&txt_fn1=" + document.getElementById('txt_fn1' ).value;
    url = url + "&txt_fn2=" + document.getElementById('txt_fn2' ).value;
    url = url + "&txt_cheqno=" + document.getElementById('txt_cheqno').value;
    url = url + "&txt_cheqamt=" + document.getElementById('txt_cheqamt' ).value;
    url = url + "&txt_cheqdt=" + document.getElementById('txt_cheqdt' ).value;
    url = url + "&txt_cash=" + document.getElementById('txt_cash').value;
    url = url + "&txt_bank=" + document.getElementById('txt_bank').value;
    url = url + "&txt_rfamt=" + document.getElementById('txt_rfamt').value;
    url = url + "&txt_rfdt=" + document.getElementById('txt_rfdt' ).value;
    url = url + "&txt_paid=" + document.getElementById('txt_paid').value;
    url = url + "&agname_txt=" + document.getElementById('agname_txt' ).value;
    url = url + "&gflag=" + document.getElementById('gflag' ).value;
    url = url + "&uniq=" + document.getElementById('tmpno').value;

    url = url + "&medi_amounttot=" + document.getElementById('medi_amounttot').value;

     url = url + "&SerialNumber=" + document.getElementById('SerialNumber').value;
    url = url + "&ImageHeight=" + document.getElementById('ImageHeight').value;
    url = url + "&ImageWidth=" + document.getElementById('ImageWidth').value;
    url = url + "&ImageDPI=" + document.getElementById('ImageDPI').value;
    url = url + "&ImageQuality=" + document.getElementById('ImageQuality').value;
    url = url + "&NFIQ=" + document.getElementById('NFIQ').value;
    url = url + "&TemplateBase64_txt=" + document.getElementById('TemplateBase64_txt').value;


    xmlHttp.onreadystatechange = salessaveresultup;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function salessaveresultup() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Updated") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Updated</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function print1() {

    var url = "medical_report_labform.php";
    url = url + "?txt_ref=" + document.getElementById('txt_refno').value;


    window.open(url, '_blank');



}

function print2() {


    var url = "medical_report_rform1.php";
    url = url + "?txt_ref=" + document.getElementById('txt_refno').value;



    window.open(url, '_blank');



}

function print3() {

    var url = "medical_report_rform2.php";
    url = url + "?txt_ref=" + document.getElementById('txt_refno').value;


    window.open(url, '_blank');



}

function print4() {

    var url = "medical_report_print4.php";
    url = url + "?txt_ref=" + document.getElementById('txt_refno').value;


    window.open(url, '_blank');



}


function printcash() {

    var url = "cashier_print1.php";
    url = url + "?txt_ref=" + document.getElementById('txt_refno').value;


    window.open(url, '_blank');



}


function qtyTot() {

    var table = $('#myTable').tableToJSON();
    console.log(table);
    var  qtyTot = 0.00;
    var tempqty = 0.00;
    for (var i = table.length - 1; i >= 0; i--) {
          
          tempqty = parseFloat(table[i].Amount) || 0;
        qtyTot = tempqty + qtyTot;
    }

        document.getElementById("medi_amounttot").value = qtyTot;

}






setInterval(function(){ qtyTot(); }, 2000);





















