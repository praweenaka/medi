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

 

function add(cdata)
{   
 
			 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		
			
		 

			 var url="category_master_data.php";
			 if(cdata=="investi"){
			      if (document.getElementById('investi_name').value == "") {
			         alert('Investion Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addinvesti";  
    			params=params+"&investi_name="+document.getElementById('investi_name').value;  
    			
			 }else if(cdata=="allergy"){
			     if (document.getElementById('allergy_name').value == "") {
			         alert('Allergy Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addallergy"; 
                params=params+"&allergy_name="+document.getElementById('allergy_name').value;   
                
			 }else if(cdata=="complain"){
			     if (document.getElementById('complain_name').value == "") {
			         alert('Complain Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addcomplain"; 
                params=params+"&complain_name="+document.getElementById('complain_name').value;   
                
			 }else if(cdata=="s_diag"){
			     if (document.getElementById('s_diag').value == "") {
			         alert('Diagnosis Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addsdiag"; 
                params=params+"&s_diag="+document.getElementById('s_diag').value;   
                
			 }else if(cdata=="general"){
			     if (document.getElementById('general_name').value == "") {
			         alert('General Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addgeneral"; 
                params=params+"&general_name="+document.getElementById('general_name').value;   
                
			 }else if(cdata=="lungs"){
			     if (document.getElementById('lungs_name').value == "") {
			         alert('Lungs Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addlungs"; 
                params=params+"&lungs_name="+document.getElementById('lungs_name').value;   
                
			 }else if(cdata=="abdomen"){
			     if (document.getElementById('abdomen_name').value == "") {
			         alert('Abdomen Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addabdomen"; 
                params=params+"&abdomen_name="+document.getElementById('abdomen_name').value;   
                
			 }else if(cdata=="cns"){
			     if (document.getElementById('cns_name').value == "") {
			         alert('Cns Name is Empty...');
                    return;
                 }
			    var params ="Command="+"addcns"; 
                params=params+"&cns_name="+document.getElementById('cns_name').value;   
                
			 }
             
		 
			xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=assign_proces;
			
	xmlHttp.send(params);
			
}

function remove_add(id,cdata)
{   
 
			 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request");
				return;
			} 		
			
		  var msg = confirm("Do you want to CANCEL this ! ");
        if (msg == true) {

			 var url="category_master_data.php";
			 if(cdata=="investi"){ 
			    var params ="Command="+"removeinvesti";  
    			params=params+"&id="+id;   
			 }else if(cdata=="allergy"){ 
			    var params ="Command="+"removeallergy"; 
                params=params+"&id="+id;   
			 }else if(cdata=="complain"){ 
			    var params ="Command="+"removecomplain"; 
                params=params+"&id="+id;   
			 }else if(cdata=="s_diag"){ 
			    var params ="Command="+"removes_diag"; 
                params=params+"&id="+id;   
			 }else if(cdata=="general"){ 
			    var params ="Command="+"removegeneral"; 
                params=params+"&id="+id;   
			 }else if(cdata=="lungs"){ 
			    var params ="Command="+"removelungs"; 
                params=params+"&id="+id;   
			 }else if(cdata=="abdomen"){ 
			    var params ="Command="+"removeabdomen"; 
                params=params+"&id="+id;   
			 }else if(cdata=="cns"){ 
			    var params ="Command="+"removecns"; 
                params=params+"&id="+id;   
			 }
             
		 
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
