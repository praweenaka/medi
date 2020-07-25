function GetXmlHttpObject()
{
    var xmlHttp = null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
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

function new_ent() {

    document.getElementById('msg_box').innerHTML = "";
    document.getElementById("medino").value="";    
    document.getElementById('note').value=""; 
    document.getElementById('ndate').value="";   
    document.getElementById('qty').value="";   
    document.getElementById('fbc').value="";   
    document.getElementById('wbc').value="";   
    document.getElementById('hb').value="";   
    document.getElementById('plt').value="";   
    document.getElementById('pcv').value="";   
    document.getElementById('esp').value="";   
    document.getElementById('crp').value="";   
    document.getElementById('ufr').value="";   
    document.getElementById('screa').value="";   
    document.getElementById('bu').value="";   
    document.getElementById('se').value="";   
    document.getElementById('psa').value="";   
    document.getElementById('total').value="";   
    document.getElementById('tg').value="";   
    document.getElementById('hdl').value="";   
    document.getElementById('ldl').value="";   
    document.getElementById('vldl').value="";   
    document.getElementById('ratio').value="";
    document.getElementById('fbs').value="";
    document.getElementById('rbs').value="";
    document.getElementById('hbalc').value="";
    document.getElementById('uma').value="";
    document.getElementById('sgpt').value="";
    document.getElementById('sgop').value="";
    document.getElementById('ggt').value="";
    document.getElementById('sbili').value="";
    document.getElementById('salmu').value="";
    document.getElementById('tsh').value="";
    document.getElementById('t4').value="";
    document.getElementById('ecg').value="";
    document.getElementById('weight').value="";
    document.getElementById('height').value="";
    document.getElementById('pr').value="";
    document.getElementById('bp').value="";
    document.getElementById('to').value="";
    // $("#name").select2('val','');
    // $("#item").select2('val','');
    // $("#investi").select2('val','');
    // $("#complain").select2('val','');
    
    document.getElementById('container').innerHTML="";
    document.getElementById('itemdetails').innerHTML="";
    document.getElementById('itemdetails1').innerHTML="";
    document.getElementById('itemdetails2').innerHTML="";
    document.getElementById('myTable').innerHTML="";
    getdt();

}


// var input = document.getElementById("nic");
// input.addEventListener("keyup", function (event) {
//   event.preventDefault();
//   if (event.keyCode == 13) {
//     document.getElementById("tel").focus();
// }
// });


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
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table1");
        document.getElementById('itemdetails1').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table2");
        document.getElementById('itemdetails2').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

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
            text: 'PRESHER DIAGRAM'
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
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Pation Not Selected</span></div>";
        return false;
    }

    // var sex="";
    // if(document.getElementById("male").checked){
    //     sex="Male";
    // }else{
    //     sex="FeMale";
    // }  
    var investi = $('#investi').val();
    var complain = $('#complain').val();
    

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
            "code":document.getElementById("name").value,   
            "sdate":document.getElementById("sdate").value, 
            "note":document.getElementById("note").value,  
            "ndate":document.getElementById('ndate').value, 
            "fbc":document.getElementById('fbc').value,
            "wbc":document.getElementById('wbc').value,
            "hb":document.getElementById('hb').value,
            "plt":document.getElementById('plt').value,
            "pcv":document.getElementById('pcv').value,
            "esp":document.getElementById('esp').value,
            "crp":document.getElementById('crp').value,
            "ufr":document.getElementById('ufr').value,
            "screa":document.getElementById('screa').value,
            "bu":document.getElementById('bu').value,
            "se":document.getElementById('se').value,
            "psa":document.getElementById('psa').value,
            "total":document.getElementById('total').value,
            "tg":document.getElementById('tg').value,
            "hdl":document.getElementById('hdl').value,
            "ldl":document.getElementById('ldl').value,
            "vldl":document.getElementById('vldl').value,
            "ratio":document.getElementById('ratio').value,
            "fbs":document.getElementById('fbs').value,
            "rbs":document.getElementById('rbs').value,
            "hbalc":document.getElementById('hbalc').value,
            "uma":document.getElementById('uma').value,
            "sgpt":document.getElementById('sgpt').value,
            "sgop":document.getElementById('sgop').value,
            "ggt":document.getElementById('ggt').value,
            "sbili":document.getElementById('sbili').value,
            "salmu":document.getElementById('salmu').value,
            "tsh":document.getElementById('tsh').value,
            "t4":document.getElementById('t4').value,
            "ecg":document.getElementById('ecg').value,
            "weight":document.getElementById('weight').value,
            "height":document.getElementById('height').value,
            "pr":document.getElementById('pr').value,
            "bp":document.getElementById('bp').value,
            "to":document.getElementById('to').value,
            "investi":investi, 
            "complain":complain,  
            // "sex":sex,    
        }

    };

    document.getElementById('msg_box').innerHTML = "";
    var main = JSON.stringify(obj);
    var para = "";
    para = para + "main=" + main;
    
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
 
 function custno(code)
{
    //alert(code);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "medical_data.php";
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
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
         
        opener.document.getElementById('medino').value = obj.medino;
        // opener.document.getElementById('name').value = obj.name; 
        opener.document.getElementById('sdate').value = obj.sdate; 
        opener.document.getElementById('ndate').value = obj.ndate;  
        // opener.document.getElementById('note').innerHTML. = obj.note; 
         // opener.document.getElementById('investi').innerHTML. = obj.investi; 
          // opener.document.getElementById('complain').innerHTML. = obj.complain; 
        
        opener.document.getElementById('fbc').value = obj.fbc;
        opener.document.getElementById('wbc').value = obj.wbc;
        opener.document.getElementById('hb').value = obj.hb;
        opener.document.getElementById('plt').value = obj.plt;
        opener.document.getElementById('pcv').value = obj.pcv;
        opener.document.getElementById('esp').value = obj.esp;
        opener.document.getElementById('crp').value = obj.crp;
        opener.document.getElementById('ufr').value = obj.ufr;
        opener.document.getElementById('screa').value = obj.screa;
        opener.document.getElementById('bu').value = obj.bu;
        opener.document.getElementById('se').value = obj.se;
        opener.document.getElementById('psa').value = obj.psa;
        opener.document.getElementById('total').value = obj.total;
        opener.document.getElementById('tg').value = obj.tg;
        opener.document.getElementById('hdl').value = obj.hdl;
        opener.document.getElementById('ldl').value = obj.ldl;
        opener.document.getElementById('vldl').value = obj.vldl;
        opener.document.getElementById('ratio').value = obj.ratio;
        opener.document.getElementById('fbs').value = obj.fbs;
        opener.document.getElementById('rbs').value = obj.rbs;
        opener.document.getElementById('hbalc').value = obj.hbalc;
        opener.document.getElementById('uma').value = obj.uma;
        opener.document.getElementById('sgpt').value = obj.sgpt;
        opener.document.getElementById('sgop').value = obj.sgop;
        opener.document.getElementById('ggt').value = obj.ggt;
        opener.document.getElementById('sbili').value = obj.sbili;
        opener.document.getElementById('salmu').value = obj.salmu;
        opener.document.getElementById('tsh').value = obj.tsh;
        opener.document.getElementById('t4').value = obj.t4;
        opener.document.getElementById('ecg').value = obj.ecg;
        opener.document.getElementById('weight').value = obj.weight;
        opener.document.getElementById('height').value = obj.height;
        opener.document.getElementById('pr').value = obj.pr;
        opener.document.getElementById('bp').value = obj.bp;
        opener.document.getElementById('to').value = obj.to1;
        
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        opener.document.getElementById('myTable').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        
        
        self.close();
    }
  
}

function add()
{   
 
			 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		 

			 var url="medical_data.php"; 
              if (document.getElementById('item').value == "") {
		         alert('Item is Empty...');
                return;
             } 
             if (document.getElementById('qty').value == "") {
		         alert('Qty is Empty...');
                return;
             } 
              
		     var params ="Command="+"addtreat";   
		     params = params + "&Command1=add"; 
             params=params+"&item="+document.getElementById('item').value;   
             params=params+"&uniq="+document.getElementById('uniq').value;   
             params=params+"&qty="+document.getElementById('qty').value;     
             params=params+"&medino="+document.getElementById('medino').value;    
			
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_treat;
			
	xmlHttp.send(params);
			
}

 

function del_item(cdata)
{   
 
    
		xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 
			 
		        var url="medical_data.php"; 
			    var params ="Command="+"addtreat";  
    			params=params+"&Command1=del"; 
    			params=params+"&id="+cdata; 
    			params=params+"&medino="+document.getElementById('medino').value;    
    		    params=params+"&uniq="+document.getElementById('uniq').value;    
		  
	xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_treat;
			
	xmlHttp.send(params);
			
}
 
function re_treat() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('myTable').innerHTML = XMLAddress1[0].childNodes[0].nodeValue; 
         
        
         document.getElementById('qty').value ="";
    }
}


function cancel_inv()
{   
 
			 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		
			
		  var msg = confirm("Do you want to CANCEL this ! ");
        if (msg == true) {

			 var url="medical_data.php"; 
			    var params ="Command="+"cancel_inv"; 
                params=params+"&medino="+document.getElementById('medino').value;   
			   
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_cancel;
			
	xmlHttp.send(params);
        }  
			
}

function re_cancel() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Cancel") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Cancel</span></div>";
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }

}
 