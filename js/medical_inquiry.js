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

    document.getElementById('refno_txt').value = "";
    document.getElementById('pportno_txt').value = "";
    document.getElementById('cou_name_txt').value = "";
    document.getElementById('gamca_txt').value = "";
    document.getElementById('eno_txt').value = "";
    document.getElementById('date_txt').value = "";
    document.getElementById('xrayno_txt').value = "";
    document.getElementById('subname_txt').value = "";
    document.getElementById('name_txt').value = "";
    document.getElementById('sex_txt').value = "";
    document.getElementById('status_txt').value = "";
    
    // document.getElementById('status_txt').value = "";
    // document.getElementById('agency_txt').value = "";
    document.getElementById('age_txt').value = "";
    document.getElementById('custrem_txt').value = "";
    document.getElementById('doctor1_txt').value = "";
    document.getElementById('doctor2_txt').value = "";
    document.getElementById('doctor3_txt').value = "";
    document.getElementById('doctor4_txt').value = "";
    document.getElementById('doctor5_txt').value = "";
    document.getElementById('lab1_txt').value = "";
    document.getElementById('lab2_txt').value = "";
    document.getElementById('lab3_txt').value = "";
    document.getElementById('xray1_txt').value = "";
    document.getElementById('xray2_txt').value = "";
    document.getElementById('msg_box').innerHTML = "";
    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_inquiry_data.php";
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
        document.getElementById('refno_txt').value = XMLAddress1[0].childNodes[0].nodeValue;





    }
}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    document.getElementById('msg_box').innerHTML = "";

    if (document.getElementById('refno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Ref No is Empty Please Click New</span></div>";
        return false;
    }
    if (document.getElementById('pportno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Enter Passport No</span></div>";
        return false;
    }
    if (document.getElementById('cou_name_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Enter Country</span></div>";
        return false;
    }


    var url = "medical_inquiry_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&pportno_txt=" + document.getElementById('pportno_txt').value;
    url = url + "&ctry_txt=" + document.getElementById('cou_name_txt').value;
    url = url + "&gamca_txt=" + document.getElementById('gamca_txt').value;
    url = url + "&eno_txt=" + document.getElementById('eno_txt').value;
    url = url + "&date_txt=" + document.getElementById('date_txt').value;
    url = url + "&xrayno_txt=" + document.getElementById('xrayno_txt').value;
    url = url + "&subname_txt=" + document.getElementById('subname_txt').value;
    url = url + "&name_txt=" + document.getElementById('name_txt').value;
    url = url + "&sex_txt=" + document.getElementById('sex_txt').value;
    url = url + "&status_txt=" + document.getElementById('status_txt').value;
    url = url + "&agency_txt=" + document.getElementById('agency_txt').value;
    url = url + "&age_txt=" + document.getElementById('age_txt').value;
    url = url + "&custrem_txt=" + document.getElementById('custrem_txt').value;
    url = url + "&doctor1_txt=" + document.getElementById('doctor1_txt').value;
    url = url + "&doctor2_txt=" + document.getElementById('doctor2_txt').value;
    url = url + "&doctor3_txt=" + document.getElementById('doctor3_txt').value;
    url = url + "&doctor4_txt=" + document.getElementById('doctor4_txt').value;
    url = url + "&doctor5_txt=" + document.getElementById('doctor5_txt').value;
    url = url + "&lab1_txt=" + document.getElementById('lab1_txt').value;
    url = url + "&lab2_txt=" + document.getElementById('lab2_txt').value;
    url = url + "&lab3_txt=" + document.getElementById('lab3_txt').value;
    url = url + "&xray1_txt=" + document.getElementById('xray1_txt').value;
    url = url + "&xray2_txt=" + document.getElementById('xray2_txt').value;

    
    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function salessaveresult() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Saved") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);
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

    if (document.getElementById('refno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Ref No is Empty Please Click New</span></div>";
        return false;
    }
    if (document.getElementById('pportno_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Enter Passport No</span></div>";
        return false;
    }
    if (document.getElementById('cou_name_txt').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Please Enter Country</span></div>";
        return false;
    }


    //  if (document.getElementById('agn_txt').value == "") {
    //     document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Ref Not Enterd</span></div>";
    //     $("#msg_box").hide().slideDown(400).delay(2000);
    //         $("#msg_box").slideUp(400);
    //     return false;
    // }
    
    

    var url = "medical_inquiry_data.php";
    url = url + "?Command=" + "update_item";

   
    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    url = url + "&pportno_txt=" + document.getElementById('pportno_txt').value;
    url = url + "&ctry_txt=" + document.getElementById('cou_name_txt').value;
    url = url + "&gamca_txt=" + document.getElementById('gamca_txt').value;
    url = url + "&eno_txt=" + document.getElementById('eno_txt').value;
    url = url + "&date_txt=" + document.getElementById('date_txt').value;
    url = url + "&xrayno_txt=" + document.getElementById('xrayno_txt').value;
    url = url + "&subname_txt=" + document.getElementById('subname_txt').value;
    url = url + "&name_txt=" + document.getElementById('name_txt').value;
    url = url + "&sex_txt=" + document.getElementById('sex_txt').value;
    url = url + "&status_txt=" + document.getElementById('status_txt').value;
    url = url + "&agency_txt=" + document.getElementById('agency_txt').value;
    url = url + "&age_txt=" + document.getElementById('age_txt').value;
    url = url + "&custrem_txt=" + document.getElementById('custrem_txt').value;
    url = url + "&doctor1_txt=" + document.getElementById('doctor1_txt').value;
    url = url + "&doctor2_txt=" + document.getElementById('doctor2_txt').value;
    url = url + "&doctor3_txt=" + document.getElementById('doctor3_txt').value;
    url = url + "&doctor4_txt=" + document.getElementById('doctor4_txt').value;
    url = url + "&doctor5_txt=" + document.getElementById('doctor5_txt').value;
    url = url + "&lab1_txt=" + document.getElementById('lab1_txt').value;
    url = url + "&lab2_txt=" + document.getElementById('lab2_txt').value;
    url = url + "&lab3_txt=" + document.getElementById('lab3_txt').value;
    url = url + "&xray1_txt=" + document.getElementById('xray1_txt').value;
    url = url + "&xray2_txt=" + document.getElementById('xray2_txt').value;


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


// function edit() {

//     xmlHttp = GetXmlHttpObject();
//     if (xmlHttp == null) {
//         alert("Browser does not support HTTP Request");
//         return;
//     }

//     document.getElementById('msg_box').innerHTML = "";

//     if (document.getElementById('sjrequestref_txt').value == "") {
//         document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";
//         return false;
//     }


//     var url = "medical_inquiry_data.php";
//     url = url + "?Command=" + "update";


//     url = url + "&sjrequestref=" + document.getElementById('sjrequestref_txt').value;
//     url = url + "&date_in=" + document.getElementById('date_txt').value;
//     url = url + "&customer=" + document.getElementById('customer_txt').value;
//     url = url + "&mkex=" + document.getElementById('mkex_txt').value;
//     xmlHttp.onreadystatechange = update;
//     xmlHttp.open("GET", url, true);
//     xmlHttp.send(null);
// }

// function update() {
//     var XMLAddress1;

//     if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

//         if (xmlHttp.responseText == "update") {
//             document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Updated</span></div>";

//         } else {
//             document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
//         }
//     }
// }





function print() {

    var url = "sample_jobrequest_data_print.php";
    url = url + "?aod_number=" + document.getElementById('aod_number').value;


    window.open(url, '_blank');



}

function cancel() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "medical_inquiry_data.php";
    url = url + "?Command=" + "cancel";


    url = url + "&refno_txt=" + document.getElementById('refno_txt').value;
    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Item Code Not Enterd</span></div>";

    xmlHttp.onreadystatechange = cancel_mi;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function cancel_mi() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "cancel") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Canceled</span></div>";
            $("#msg_box").hide().slideDown(400).delay(2000);
            $("#msg_box").slideUp(400);

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}


//////////////////////////////////////////////

          var secugen_lic = "";

            var template_1 = "";
            var template_2 = "";
            var isFound = false;

            function    succMatch(result, id)
            {
//                var threshold = $('#sl1').slider('getValue');
                var threshold = 100;
                if (result.ErrorCode == 0)
                {
                    if (result.MatchingScore >= threshold) {


                        isFound = true;
                        var isDisplay = confirm("MATCHED !!! with :" + id + ". Do you want to see the details?");
                        if(isDisplay)
                        yourCustomizedFunction(id);
                    }
                } else
                {
                    alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
                }
            }
            function    succTwo(result)
            {
                if (result.ErrorCode == 0)
                {
                    /*  Display BMP data in image tag
                     BMP data is in base 64 format 
                     */
                    if (result != null && result.BMPBase64.length > 0)
                    {
//                        document.getElementById("image2").src = "data:image/bmp;base64," + result.BMPBase64;
                    }
                    template_2 = result.TemplateBase64;
                } else
                {
                    alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
                }
            }

            function    succOne(result)
            {
                if (result.ErrorCode == 0)
                {
                    /*  Display BMP data in image tag
                     BMP data is in base 64 format 
                     */
                    if (result != null && result.BMPBase64.length > 0)
                    {
//                        document.getElementById("image1").src = "data:image/bmp;base64," + result.BMPBase64;
                    }
                    template_1 = result.TemplateBase64;
                    xmlHttp = GetXmlHttpObject();
                    if (xmlHttp == null) {
                        alert("Browser does not support HTTP Request");
                        return;
                    }
                    var url = "finger_data.php";
                    url = url + "?Command=" + "init";
                    url = url + "&template_1=" + encodeURIComponent(template_1);
                    url = url + "&drefno=" + document.getElementById("txtDREFNO").value;

                    xmlHttp.onreadystatechange = init_stuff;
                    xmlHttp.open("GET", url, true);
                    xmlHttp.send(null);
                } else
                {
                    alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
                }
            }

            function init_stuff() {

                var XMLAddress1;

                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

                    XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("success");
                    var successStatus = XMLAddress1[0].childNodes[0].nodeValue;
                    if (successStatus == "yes") {
                        alert("inserted!");
                    }
                }
            }

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

            function failureFunc(error)
            {
            }

            function matchScore(succFunc, failFunc)
            {

                xmlHttp = GetXmlHttpObject();
                if (xmlHttp == null) {
                    alert("Browser does not support HTTP Request");
                    return;
                }

                var url1 = "finger_data.php";
                url1 = url1 + "?Command=" + "getArray";

                xmlHttp.onreadystatechange = function () {


                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

                        var myArr = JSON.parse(xmlHttp.responseText);
                        for (var i in myArr)
                        {


                            var id = myArr[i].id;
                            var code = myArr[i].code;
                            var name = myArr[i].name;
                            var obj = myArr[i].obj;

////////////////////////////////////////////////////////////////////////////////////////


                            document.getElementById('pportno_txt').value = obj.passport;
                            document.getElementById('cou_name_txt').value = obj.country;
                            document.getElementById('date_txt').value = obj.date;
                            document.getElementById('subname_txt').value = obj.fname + " " +obj.lname;
                            document.getElementById('name_txt').value = obj.mediname;
                            document.getElementById('sex_txt').value = obj.sex;
                            document.getElementById('status_txt').value = obj.status;
                            document.getElementById('agency_txt').value = obj.agency;
                            document.getElementById('age_txt').value = obj.age;
                            document.getElementById('custrem_txt').value = obj.remark;


            opener.document.getElementById('getImg').innerHTML = "<img width=\"200\" src=\"img\/" + obj.img + "\" alt=\"\">";






//////////////////////////////////////////////////////////////////////////////////////////

                            var uri = "http://localhost:8000/SGIMatchScore";
                            var params = "template1=" + encodeURIComponent(code);
                            params += "&template2=" + encodeURIComponent(template_2);
                            params += "&licstr=" + encodeURIComponent(secugen_lic);
                            params += "&templateFormat=" + "ISO";
                            $.ajax(
                                    {url: uri,
                                        type: "POST",
                                        cache: false,
                                        data: params,
                                        dataType: "json",
                                        async: false,
                                        success: function (result) {
                                            succFunc(result, id);
                                        },
                                        error: function (xhr, status, error) {
                                            failFunc(error);
                                        }
                                    });
                        }
                        if (isFound == false) {
                            alert("NOT FOUND !!!!");
                        }
                        isFound = false;
                    }
                };
                xmlHttp.open("GET", url1, true);
                xmlHttp.send(null);
            }
 
            function    capture_img(succFunc, failFunc)
            {
                var uri = "http://localhost:8000/SGIFPCapture";
                var params = "Quality=" + "60";
                params += "&licstr=" + encodeURIComponent(secugen_lic);
                $.ajax(
                        {url: uri,
                            type: "POST",
                            data: params,
                            cache: false,
                            dataType: "json",
                            success: function (result) {
                                succFunc(result);
                            },
                            error: function (xhr, status, error) {
                                failFunc(error);
                            }
                        });
            }

            function yourCustomizedFunction(id){
       // alert ('perform your operations on ' + id);
            }


























