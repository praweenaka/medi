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

function new_ent() {


  document.getElementById('pharmcyno').value = "";
  document.getElementById('ordno').value = "";   
  document.getElementById('c_code').value = "";   
  document.getElementById('qty').value = "";   
  document.getElementById('selling').value = "";   
  document.getElementById('gtot').value = "0.00";   
  document.getElementById('uniq').value = "";   
  document.getElementById('dcharge').value = "0.00";   
  document.getElementById('gtot1').value = "0.00";   
   
    
  document.getElementById('itemdetails').innerHTML = "";     
  document.getElementById('msg_box').innerHTML = "";     
   
    $("#item").select2('val','');  
     $("#c_code").select2('val',''); 
  getdt();
}



function getdt() {

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }

  var url = "pharamacy_data.php";
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

    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("code");
    document.getElementById('pharmcyno').value = XMLAddress1[0].childNodes[0].nodeValue;
//
    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
    document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

 
function save_inv()
{   
 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		 

                if (document.getElementById('pharmcyno').value == "") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Click New...</span></div>";
                    return false;
                }
                if (document.getElementById('c_code').value == "") {
    		         document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Select Patient</span></div>";
                    return;
                 }
               
                if (document.getElementById('gtot').value == "") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Add Item</span></div>";
                    return false;
                }
             
			 var url="pharamacy_data.php";  
			 
		     var params ="Command="+"save";   
             params=params+"&pharmcyno="+document.getElementById('pharmcyno').value;   
             params=params+"&uniq="+document.getElementById('uniq').value;     
             params=params+"&ordno="+document.getElementById('ordno').value;   
             params=params+"&gtot="+document.getElementById('gtot').value;   
             params=params+"&dcharge="+document.getElementById('dcharge').value; 
             params=params+"&sdate="+document.getElementById('sdate').value;
             params=params+"&code="+document.getElementById('c_code').value;
             params=params+"&gtot1="+document.getElementById('gtot1').value;
			   
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_save;
			
	xmlHttp.send(params);
			
}

function re_save() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Save") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Save</span></div>";
            print_inv();
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
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

			 var url="pharamacy_data.php"; 
			    var params ="Command="+"cancel_inv"; 
                params=params+"&pharmcyno="+document.getElementById('pharmcyno').value;   
			   
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
 
 

function add()
{   
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		 

			 var url="pharamacy_data.php"; 
              if (document.getElementById('pharmcyno').value == "") {
		         alert('Please Click New...');
                return;
             }
             if (document.getElementById('c_code').value == "") {
		         alert('Please Select Customer...');
                return;
             }
             if (document.getElementById('item').value == "") {
		         alert('Item is Empty...');
                return;
             } 
             if (document.getElementById('qty').value == "") {
		         alert('Qty is Empty...');
                return;
             } 
        //      if (document.getElementById('selling').value == "") {
		      //   alert('Selling is Empty...');
        //         return;
        //      } 
              
		     var params ="Command="+"add_item";   
		     params = params + "&Command1=add"; 
             params=params+"&item="+document.getElementById('item').value;   
             params=params+"&uniq="+document.getElementById('uniq').value;   
             params=params+"&qty="+document.getElementById('qty').value;     
             params=params+"&selling="+document.getElementById('selling').value;     
             params=params+"&pharmcyno="+document.getElementById('pharmcyno').value;    
			
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_add;
			
	xmlHttp.send(params);
			
}

 function re_add()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {  
        if(xmlHttp.responseText=="Under Stock...!!!"){
            alert('Under Stock...!!!');
        }
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
         document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("total");
        document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;
         
        
         document.getElementById('qty').value ="";
        calcu();
        self.close();
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
    var url = "pharamacy_data.php";
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
         
        opener.document.getElementById('ordno').value = obj.ordno;  
        opener.document.getElementById('pharmcyno').value = obj.pharmcyno;  
        opener.document.getElementById('dcharge').value = obj.dcharge;  
        opener.document.getElementById('gtot').value = obj.grandtot;   
        opener.document.getElementById('gtot1').value = obj.grandtot1;   
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
         
         
        self.close();
    }
 
}

 function custno1(code)
{
    //alert(code);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "pharamacy_data.php";
    url = url + "?Command=" + "pass_quot1";
    url = url + "&medino=" + code;

    xmlHttp.onreadystatechange = passcusresult_quot1;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function passcusresult_quot1()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
         
        opener.document.getElementById('ordno').value = obj.medino;  
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("total");
        opener.document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("total");
         opener.document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;
        
        opener.document.getElementById('dcharge').value ="0.00";
        self.close();
    }
 
}


function del_item(cdata)
{   
 
    
		xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 
			 
		         var url="pharamacy_data.php"; 
			    var params ="Command="+"add_item";  
    			params = params + "&Command1=del"; 
    			params=params+"&id="+cdata;
    			 params=params+"&pharmcyno="+document.getElementById('pharmcyno').value;    
    			  params=params+"&uniq="+document.getElementById('uniq').value;    
		  
	xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=re_del;
			
	xmlHttp.send(params);
			
}
 
function re_del() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue; 
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("total");
         document.getElementById('gtot').value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("total");
         document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;
        
        
        calcu();
        
    }
}

function print_inv() {

    var url = "pharamacy_print.php";
    url = url + "?pharmcyno=" + document.getElementById('pharmcyno').value;

    
    window.open(url, '_blank');
      
}


function calcu() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "pharamacy_data.php";
    url = url + "?Command=" + "calcu";

    url = url + "&dcharge=" + document.getElementById('dcharge').value; 
    url = url + "&gtot=" + document.getElementById('gtot').value; 


    xmlHttp.onreadystatechange = calq;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function calq() {


    var XMLAddress1;

    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tot");
    document.getElementById('gtot1').value = XMLAddress1[0].childNodes[0].nodeValue;

}