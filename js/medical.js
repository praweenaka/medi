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

    document.getElementById('msg_box').innerHTML = "";
    document.getElementById("medino").value="";   
    document.getElementById("pr").value=""; 
    document.getElementById("bp").value=""; 
    document.getElementById("weight").value=""; 
    document.getElementById("height").value=""; 
    document.getElementById("bgroup").value="";  
    document.getElementById('note').value="";

    $("#name").select2('val','');
    $("#treatment").select2('val','');
    $("#investi").select2('val','');
    $("#complain").select2('val','');
    $("#allergy").select2('val',''); 
    $("#bgroup").select2('val',''); 
    document.getElementById('container').innerHTML="";
    document.getElementById('itemdetails').innerHTML="";

    getdt();

}


var input = document.getElementById("nic");
input.addEventListener("keyup", function (event) {
   event.preventDefault();
   if (event.keyCode == 13) {
    document.getElementById("tel").focus();
}
});


function getdt() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = get_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}



function get_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    { 

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        var idno = XMLAddress1[0].childNodes[0].nodeValue;

        if (idno.length == 1) {
            idno = "TR/0000" + idno;
        } else if (idno.length == 2) {
           idno = "TR/000" + idno;
       } else if (idno.length == 3) {
         idno = "TR/00" + idno;
     } else if (idno.length == 4) {
        idno = "TR/0" + idno;
    } else if (idno.length == 5) {
     idno = "TR/" + idno;
 }

 document.getElementById("medino").value = idno;

 XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
 document.getElementById("uniq").value = XMLAddress1[0].childNodes[0].nodeValue;

}
}


var tt = 50;
// var en_data = [];

function histroy() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var obj = {
        "Main": "HISTORY",
        "Sub": "",
        "Flag": "",
        "Table": "Loan_ismas",
        "Num": 6,
        "Status": true,
        "Message": "Create Save",
        "Col": 
        { 
            "medino":document.getElementById("medino").value, 
            "name":document.getElementById("name").value,  
        }

    };

    document.getElementById('msg_box').innerHTML = "";
    var main = JSON.stringify(obj);
    var para = "";
    para = para + "main=" + main; 

    xmlHttp.onreadystatechange = re_history;
    xmlHttp.open("POST", "medical_data.php", true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(para);

}
 var en_data ;
function re_history()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
en_data=[];
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("json");
        for (var i = 0; i < XMLAddress1.length; i++) {
            var array = XMLAddress1[i].childNodes[0].nodeValue;
            var ar = JSON.parse(array);
             // console.log(typeof(en_data));
            en_data.push(ar);
           
            tt = ar[0];

        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("resu");
        var re = XMLAddress1[0].childNodes[0].nodeValue;
        if(re==1){
            go(en_data);
        }else{
            document.getElementById('container').innerHTML="";
        }
        
    }


    
}


function go() {

    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'WEIGHT Diagram'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.1f} Entries</b>'
        },
        series: [{
            name: 'Population',
            data: en_data,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
}


function save_inv() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('medino').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Click New..</span></div>";
        return false;
    }
    if (document.getElementById('name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Not Entered</span></div>";
        return false;
    }

    // var sex="";
    // if(document.getElementById("male").checked){
    //     sex="Male";
    // }else{
    //     sex="FeMale";
    // } 
    var treatment = $('#treatment').val();
    var investi = $('#investi').val();
    var complain = $('#complain').val();
    var allergy = $('#allergy').val();

    var obj = {
        "Main": "SAVE",
        "Sub": "",
        "Flag": "",
        "Table": "Loan_ismas",
        "Num": 6,
        "Status": true,
        "Message": "Create Save",
        "Col": 
        {
            "uniq":document.getElementById("uniq").value,
            "medino":document.getElementById("medino").value, 
            "name":document.getElementById("name").value,  
            "pr":document.getElementById("pr").value, 
            "bp":document.getElementById("bp").value, 
            "weight":document.getElementById("weight").value, 
            "height":document.getElementById("height").value, 
            "bgroup":document.getElementById("bgroup").value, 
            "sdate":document.getElementById("sdate").value, 
            "note":document.getElementById("note").value, 
            "treatment":treatment,  
            "investi":investi, 
            "complain":complain, 
            "allergy":allergy, 
            // "sex":sex,    
        }

    };

    document.getElementById('msg_box').innerHTML = "";
    var main = JSON.stringify(obj);
    var para = "";
    para = para + "main=" + main;
     alert(para);
    xmlHttp.onreadystatechange = re_save;
    xmlHttp.open("POST", "medical_data.php", true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(para);

}



function re_save() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.responseText == "Save") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Save</span></div>";
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
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


function custno(code)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "treatment_data.php";
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
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("invoiceno");
        opener.document.form1.invoiceno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sdate");
        opener.document.form1.sdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fname");
        opener.document.form1.fname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lname");
        opener.document.form1.lname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("nic");
        opener.document.form1.nic.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        if (XMLAddress1[0].childNodes[0].nodeValue == "male") {
            opener.document.getElementById('male').checked = true;
        } else {
            opener.document.getElementById('female').checked = true;
        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cancel");

        if (XMLAddress1[0].childNodes[0].nodeValue == "1") {
            opener.document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Canceled</span></div>";

        } else {

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
    var url = "treatment_data.php";
    url = url + "?Command=" + "search_custom";
    if (document.getElementById('cusno').value != "") {
        url = url + "&mstatus=cusno";
    } else if (document.getElementById('customername').value != "") {
        url = url + "&mstatus=customername";
    } else if (document.getElementById('nic').value != "") {
        url = url + "&mstatus=nic";
    }

    url = url + "&invoiceno=" + document.getElementById('cusno').value;
    url = url + "&fname=" + document.getElementById('customername').value;
    url = url + "&nic=" + document.getElementById('nic').value;
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



function print_inv() {

    var url = "invoice_print.php";
    url = url + "?invoiceno=" + document.getElementById('invoiceno').value;
    url = url + "&fname=" + document.getElementById('fname').value;
    url = url + "&address=" + document.getElementById('address').value;
    url = url + "&nic=" + document.getElementById('nic').value;
    url = url + "&sdate=" + document.getElementById('sdate').value;

    window.open(url, '_blank');

}



function cancel_inv() {
    var msg = confirm("Do you want to CANCEL this Invoice ! ");
    if (msg == true) {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null)
        {
            alert("Browser does not support HTTP Request");
            return;
        }
        if (document.getElementById('invoiceno').value == "") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>invoice Is Not Selected</span></div>";
            return false;
        }

        var url = "treatment_data.php";
        url = url + "?Command=" + "cancelItem";
        url = url + "&invoiceno=" + document.getElementById('invoiceno').value;

        xmlHttp.onreadystatechange = showarmyresult_can;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
}

function showarmyresult_can() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        if (xmlHttp.responseText == "Cancel") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Canceled</span></div>";
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }

}



