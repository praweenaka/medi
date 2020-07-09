
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
document.getElementById('txt_ref').value=""; 
document.getElementById('txt_passno').value="";
document.getElementById('dtbdate').value="";
document.getElementById('txt_agname').value="";
document.getElementById('cmbhead').value="";
document.getElementById('txt_gccno').value="";
document.getElementById('dtcdate') .value="";
document.getElementById('txtName').value="";
document.getElementById('txtheight').value=""; 
document.getElementById('txtweg').value="";
document.getElementById('cmbsex') .value="";
document.getElementById('txt_ag_ye').value="";
document.getElementById('cmbnat').value=""; 
document.getElementById('dtisu').value="";
document.getElementById('TXTREFNO').value="";
document.getElementById('txtPOS_APP').value="";
document.getElementById('cmbstatus').value=""; 
document.getElementById('txt_serino').value="";
document.getElementById('txt_xrayno').value="";
document.getElementById('txtdarem1').value=""; 
document.getElementById('txtdarem2').value="";
document.getElementById('txtdarem3').value="";
document.getElementById('txtrem1np').value="";
document.getElementById('txtrem2np').value="";
document.getElementById('txtxarem1').value="";
document.getElementById('txtaremnp').value="";
document.getElementById('txtlarem1').value="";
document.getElementById('txtlarnp1').value="";
document.getElementById('txtlabrem').value="";
document.getElementById('txtEYE_NE_R').value="";
document.getElementById('txtEYE_NE_L').value="";
document.getElementById('txtEYE__R').value="";
document.getElementById('txtEYE__L').value="";
document.getElementById('txtYEAR_R').value="";
document.getElementById('txtYEAR_L').value="";
document.getElementById('txtbp').value="";
document.getElementById('txtheart').value="";
document.getElementById('txtlungs').value=""; 
document.getElementById('txtadb') .value="";
document.getElementById('txther').value=""; 
document.getElementById('txtvaric').value="";
document.getElementById('txtextrem').value="";
document.getElementById('txtskin').value="";
document.getElementById('txtHEM').value=""; 
document.getElementById('cmbmal').value="";
document.getElementById('txtcreat').value="";
document.getElementById('txturea').value=""; 
document.getElementById('txtlft').value="";
document.getElementById('cmbbg').value="";
document.getElementById('txtphyneuro').value=""; 
document.getElementById('txtal').value="";
document.getElementById('txtothe').value="";
document.getElementById('txtv_drlchest').value="";
document.getElementById('txt_xray').value=""; 
document.getElementById('txt_vacci').value=""; 
document.getElementById('txtvchol').value="";
document.getElementById('txthelmin').value="";
document.getElementById('txtbilhar2').value="";
document.getElementById('txtsalshei').value=""; 
document.getElementById('txtsug').value="";
document.getElementById('txtalbu').value="";
document.getElementById('txtbilhar1').value="";
document.getElementById('txtpreg').value="";
document.getElementById('cmbhiv').value=""; 
document.getElementById('cmbhbs').value="";
document.getElementById('antihcv').value="";
document.getElementById('msg_box').innerHTML = "";
getdt();
}


function getdt() {

   xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_print_data.php";
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
        document.getElementById('txt_ref').value = XMLAddress1[0].childNodes[0].nodeValue;
    
    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    document.getElementById('msg_box').innerHTML = "";


    if (document.getElementById('txt_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Ref No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_passno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No Is Not Enterd</span></div>";
        return false;
    }

    
    
var jmain2 = JSON.stringify({ 


         txt_ref : document.getElementById('txt_ref').value,
         txt_passno : document.getElementById('txt_passno').value,
         dtbdate : document.getElementById('dtbdate').value,
         txt_agname : document.getElementById('txt_agname').value,
         cmbhead : document.getElementById('cmbhead').value,
         txt_gccno : document.getElementById('txt_gccno').value,
         dtcdate : document.getElementById('dtcdate') .value,
         txtName : document.getElementById('txtName').value,
         txtheight : document.getElementById('txtheight').value, 
         txtweg : document.getElementById('txtweg').value,
         cmbsex : document.getElementById('cmbsex') .value,
         txt_ag_ye : document.getElementById('txt_ag_ye').value,
         cmbnat :document.getElementById('cmbnat').value, 
         dtisu :document.getElementById('dtisu').value,
         TXTREFNO :document.getElementById('TXTREFNO').value,
         txtPOS_APP :document.getElementById('txtPOS_APP').value,
         cmbstatus :document.getElementById('cmbstatus').value, 
         txt_serino :document.getElementById('txt_serino').value,
         txt_xrayno :document.getElementById('txt_xrayno').value,
         txtdarem1 :document.getElementById('txtdarem1').value, 
         txtdarem2 :document.getElementById('txtdarem2').value,
         txtdarem3 :document.getElementById('txtdarem3').value,
         txtrem1np :document.getElementById('txtrem1np').value,
         txtrem2np :document.getElementById('txtrem2np').value,
         txtxarem1 :document.getElementById('txtxarem1').value,
         txtaremnp :document.getElementById('txtaremnp').value,
         txtlarem1 :document.getElementById('txtlarem1').value,
         txtlarnp1 :document.getElementById('txtlarnp1').value,
         txtlabrem :document.getElementById('txtlabrem').value,
         txtEYE_NE_R :document.getElementById('txtEYE_NE_R').value,
         txtEYE_NE_L :document.getElementById('txtEYE_NE_L').value,
         txtEYE__R :document.getElementById('txtEYE__R').value,
         txtEYE__L :document.getElementById('txtEYE__L').value,
         txtYEAR_R :document.getElementById('txtYEAR_R').value,
         txtYEAR_L :document.getElementById('txtYEAR_L').value,
         txtbp :document.getElementById('txtbp').value,
         txtheart :document.getElementById('txtheart').value,
         txtlungs :document.getElementById('txtlungs').value, 
         txtadb :document.getElementById('txtadb') .value,
         txther :document.getElementById('txther').value, 
         txtvaric :document.getElementById('txtvaric').value,
         txtextrem :document.getElementById('txtextrem').value,
         txtskin :document.getElementById('txtskin').value,
         txtHEM :document.getElementById('txtHEM').value, 
         cmbmal :document.getElementById('cmbmal').value,
         txtcreat :document.getElementById('txtcreat').value,
         txturea :document.getElementById('txturea').value, 
         txtlft :document.getElementById('txtlft').value,
         cmbbg :document.getElementById('cmbbg').value,
         txtphyneuro :document.getElementById('txtphyneuro').value, 
         txtal :document.getElementById('txtal').value,
         txtothe :document.getElementById('txtothe').value,
         txtv_drlchest :document.getElementById('txtv_drlchest').value,
         txt_xray :document.getElementById('txt_xray').value, 
         txt_vacci :document.getElementById('txt_vacci').value, 
         txtvchol :document.getElementById('txtvchol').value,
         txthelmin :document.getElementById('txthelmin').value,
         txtbilhar2 :document.getElementById('txtbilhar2').value,
         txtsalshei :document.getElementById('txtsalshei').value, 
         txtsug :document.getElementById('txtsug').value,
         txtalbu :document.getElementById('txtalbu').value,
         txtbilhar1 :document.getElementById('txtbilhar1').value,
         txtpreg :document.getElementById('txtpreg').value,
         cmbhiv :document.getElementById('cmbhiv').value, 
         cmbhbs :document.getElementById('cmbhbs').value,
         antihcv :document.getElementById('antihcv').value



 

          });

   


// var jpar1;
// var jpar2;
// var jpar3;
// var jpar4;
    var para2 = "";
    para2 = para2 + "&MAIN2=" + jmain2;
  
   
    para2 = para2 + "&stname=" + "med_print";


    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("POST", "medical_save.php", true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(para2);
    

}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
            // setTimeout("location.reload(true);",500);
             
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
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

   if (document.getElementById('txt_ref').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Ref No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('txt_passno').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Passport No Is Not Enterd</span></div>";
        return false;
    }


    //  if (document.getElementById('agn_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Ref Not Enterd</span></div>";
    //     $("#msg_box").hide().slideDown(400).delay(2000);
    //         $("#msg_box").slideUp(400);
    //     return false;
    // }
    
    

    var url = "medical_print_data.php";
    url = url + "?Command=" + "update_items";


             url = url + "&txt_ref=" + document.getElementById('txt_ref').value;
             url = url + "&txt_passno=" + document.getElementById('txt_passno').value;
             url = url + "&dtbdate=" + document.getElementById('dtbdate').value;
             url = url + "&txt_agname=" + document.getElementById('txt_agname').value;
             url = url + "&cmbhead=" + document.getElementById('cmbhead').value;
             url = url + "&txt_gccno=" + document.getElementById('txt_gccno').value;
             url = url + "&dtcdate=" + document.getElementById('dtcdate').value;
             url = url + "&txtName=" + document.getElementById('txtName').value;
             url = url + "&txtheight=" + document.getElementById('txtheight').value;
             url = url + "&txtweg=" + document.getElementById('txtweg').value;
             url = url + "&cmbsex=" + document.getElementById('cmbsex').value;
             url = url + "&txt_ag_ye=" + document.getElementById('txt_ag_ye').value;
             url = url + "&cmbnat=" + document.getElementById('cmbnat').value;
             url = url + "&dtisu=" + document.getElementById('dtisu').value;
             url = url + "&TXTREFNO=" + document.getElementById('TXTREFNO').value;
             url = url + "&txtPOS_APP=" + document.getElementById('txtPOS_APP').value;
             url = url + "&cmbstatus=" + document.getElementById('cmbstatus').value;
             url = url + "&txt_serino=" + document.getElementById('txt_serino').value;
             url = url + "&txt_xrayno=" + document.getElementById('txt_xrayno').value;
             url = url + "&txtdarem1=" + document.getElementById('txtdarem1').value;
             url = url + "&txtdarem2=" + document.getElementById('txtdarem2').value;
             url = url + "&txtdarem3=" + document.getElementById('txtdarem3').value;
             url = url + "&txtrem1np=" + document.getElementById('txtrem1np').value;
             url = url + "&txtrem2np=" + document.getElementById('txtrem2np').value;
             url = url + "&txtxarem1=" + document.getElementById('txtxarem1').value;
             url = url + "&txtaremnp=" + document.getElementById('txtaremnp').value;
             url = url + "&txtlarem1=" + document.getElementById('txtlarem1').value;
             url = url + "&txtlarnp1=" + document.getElementById('txtlarnp1').value;
             url = url + "&txtlabrem=" + document.getElementById('txtlabrem').value;
             url = url + "&txtEYE_NE_R=" + document.getElementById('txtEYE_NE_R').value;
             url = url + "&txtEYE_NE_L=" + document.getElementById('txtEYE_NE_L').value;
             url = url + "&txtEYE__R=" + document.getElementById('txtEYE__R').value;
             url = url + "&txtEYE__L=" + document.getElementById('txtEYE__L').value;
             url = url + "&txtYEAR_R=" + document.getElementById('txtYEAR_R').value;
             url = url + "&txtYEAR_L=" + document.getElementById('txtYEAR_L').value;
             url = url + "&txtbp=" + document.getElementById('txtbp').value;
             url = url + "&txtheart=" + document.getElementById('txtheart').value;
             url = url + "&txtlungs=" + document.getElementById('txtlungs').value;
             url = url + "&txtadb=" + document.getElementById('txtadb').value;
             url = url + "&txther=" + document.getElementById('txther').value;
             url = url + "&txtvaric=" + document.getElementById('txtvaric').value;
             url = url + "&txtextrem=" + document.getElementById('txtextrem').value;
             url = url + "&txtskin=" + document.getElementById('txtskin').value;
             url = url + "&txtHEM=" + document.getElementById('txtHEM').value;
             url = url + "&cmbmal=" + document.getElementById('cmbmal').value;
             url = url + "&txtcreat=" + document.getElementById('txtcreat').value;
             url = url + "&txturea=" + document.getElementById('txturea').value;
             url = url + "&txtlft=" + document.getElementById('txtlft').value;
             url = url + "&cmbbg=" + document.getElementById('cmbbg').value;
             url = url + "&txtphyneuro=" + document.getElementById('txtphyneuro').value;
             url = url + "&txtal=" + document.getElementById('txtal').value;
             url = url + "&txtothe=" + document.getElementById('txtothe').value;
             url = url + "&txtv_drlchest=" + document.getElementById('txtv_drlchest').value;
             url = url + "&txt_xray=" + document.getElementById('txt_xray').value;
             url = url + "&txt_vacci=" + document.getElementById('txt_vacci').value;
             url = url + "&txtvchol=" + document.getElementById('txtvchol').value;
             url = url + "&txthelmin=" + document.getElementById('txthelmin').value;
             url = url + "&txtbilhar2=" + document.getElementById('txtbilhar2').value;
             url = url + "&txtsalshei=" + document.getElementById('txtsalshei').value;
             url = url + "&txtsug=" + document.getElementById('txtsug').value;
             url = url + "&txtalbu=" + document.getElementById('txtalbu').value;
             url = url + "&txtbilhar1=" + document.getElementById('txtbilhar1').value;
             url = url + "&txtpreg=" + document.getElementById('txtpreg').value;
             url = url + "&cmbhiv=" + document.getElementById('cmbhiv').value;
             url = url + "&cmbhbs=" + document.getElementById('cmbhbs').value;
             url = url + "&antihcv=" + document.getElementById('antihcv').value;



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







function delete1() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_print_data.php";
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

    var url = "medical_print_data.php";
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

    var url = "medical_print_data.php";
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

    var url = "medical_report_labform.php";
    url = url + "?txt_ref=" + document.getElementById('txt_ref').value;


    window.open(url, '_blank');



}

function print2() {

    var url = "medical_report_rform1.php";
    url = url + "?txt_ref=" + document.getElementById('txt_ref').value;


    window.open(url, '_blank');



}

function print3() {

    var url = "medical_report_rform2.php";
    url = url + "?txt_ref=" + document.getElementById('txt_ref').value;


    window.open(url, '_blank');



}

function print4() {

    var url = "medical_report_print4.php";
    url = url + "?txt_ref=" + document.getElementById('txt_ref').value;


    window.open(url, '_blank');



}
