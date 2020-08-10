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


  document.getElementById('s_code').value = "";
  document.getElementById('uniq').value = "";
  document.getElementById('cost').value = "";
  document.getElementById('selling').value = ""; 
  document.getElementById('qty').value = "";   
  document.getElementById('item').value = "";    
   document.getElementById('code').value = "";    
  document.getElementById('des').value = "";   
  document.getElementById('cost1').value = "";   
  document.getElementById('selling1').value = "";   
  document.getElementById('qty1').value = "";    
    
  document.getElementById('msg_box').innerHTML = "";    
   $("#brand1").select2('val','');  
   $("#country").select2('val','');  
    $("#s_code").select2('val','');  
    $("#item").select2('val','');  
  getdt();
}



function getdt() {

  xmlHttp = GetXmlHttpObject();
  if (xmlHttp == null) {
    alert("Browser does not support HTTP Request");
    return;
  }

  var url = "mediitemmas_data.php";
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
    document.getElementById('code').value = XMLAddress1[0].childNodes[0].nodeValue;
//
    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
    document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;
    
     XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sdate");
        document.getElementById('sdate').value = XMLAddress1[0].childNodes[0].nodeValue;
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

                if (document.getElementById('code').value == "") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Click New...</span></div>";
                    return false;
                }
                if (document.getElementById('des').value == "") {
                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Enter Description</span></div>";
                    return false;
                }
                // if (document.getElementById('brand1').value == "") {
                //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Select Brand</span></div>";
                //     return false;
                // }
                // if (document.getElementById('country').value == "") {
                //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Plz Select Country</span></div>";
                //     return false;
                // }
			 var url="mediitemmas_data.php";  
			 
		     var params ="Command="+"save";   
             params=params+"&code="+document.getElementById('code').value;   
             params=params+"&uniq="+document.getElementById('uniq').value;   
             params=params+"&des="+document.getElementById('des').value;   
             params=params+"&brand1="+document.getElementById('brand1').value;   
             params=params+"&country="+document.getElementById('country').value;
             params=params+"&cost1="+document.getElementById('cost1').value;  
             params=params+"&selling1="+document.getElementById('selling1').value;  
             params=params+"&qty1="+document.getElementById('qty1').value;  
			   
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

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
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

			 var url="mediitemmas_data.php"; 
			    var params ="Command="+"cancel_inv"; 
                params=params+"&code="+document.getElementById('code').value;   
			   
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

			 var url="mediitemmas_data.php"; 
			 
		     if (document.getElementById('s_code').value == "") {
		         alert('Supplier Name is Empty...');
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
             if (document.getElementById('cost').value == "") {
		         alert('Cost is Empty...');
                return;
             } 
             if (document.getElementById('selling').value == "") {
		         alert('Selling is Empty...');
                return;
             } 
              
		     var params ="Command="+"addorder";   
             params=params+"&s_code="+document.getElementById('s_code').value;   
             params=params+"&uniq="+document.getElementById('uniq').value;   
             params=params+"&cost="+document.getElementById('cost').value;   
             params=params+"&selling="+document.getElementById('selling').value;   
             params=params+"&qty="+document.getElementById('qty').value;     
             params=params+"&item="+document.getElementById('item').value;    
			   
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=assign_proces;
			
	xmlHttp.send(params);
			
}

function assign_proces(){
	
	
	var XMLAddress1;
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            setTimeout("location.reload(true);", 500);
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
		
	}
}


function remove_add(id)
{   
 
			 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		
			
		  var msg = confirm("Do you want to CANCEL this ! ");
        if (msg == true) {

			 var url="mediitemmas_data.php"; 
			    var params ="Command="+"removetreat"; 
                params=params+"&id="+id;   
			   
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=assign_proces;
			
	xmlHttp.send(params);
        }  
			
}



function assign_proces(){
	
	
	var XMLAddress1;
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
        alert(xmlHttp.responseText);
        location.reload();
		
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
    var url = "mediitemmas_data.php";
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
         
        opener.document.getElementById('code').value = obj.code;
        opener.document.getElementById('des').value = obj.des;
        // opener.document.getElementById('country').value = obj.country; 
        //  opener.document.getElementById('brand').value = obj.brand1;
        opener.document.getElementById('cost1').value = obj.cost; 
         opener.document.getElementById('selling1').value = obj.selling;
        opener.document.getElementById('qty1').value = obj.qty;  
        
        self.close();
    }



}