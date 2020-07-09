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

//var secugen_lic = "+tXNY2wsDw5PMbob13c8bCRQ35WW+3q0pyVyRM7h4cI="; //can be edited
    var template_1 = "";
    var template_2 = "";
    var isFound = false;

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
            
    function capture_img(succFunc, failFunc)
    {

        var uri = "http://localhost:8000/SGIFPCapture"; //can be edited
        var params = "Quality=" + "60";
       // params += "&licstr=" + encodeURIComponent(secugen_lic);
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
    
    function    matchScore(succFunc, failFunc)
    {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url1 = "matching_data.php";
        url1 = url1 + "?Command=" + "getArray";

        xmlHttp.onreadystatechange = function () {


            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                var myArr = JSON.parse(xmlHttp.responseText);
                console.log(myArr);
                // for (var i in myArr)
                // {
                //     var id = myArr[i].id;
                //     var code = myArr[i].code;
                //     var uri = "http://localhost:8000/SGIMatchScore";
                //     var params = "template1=" + encodeURIComponent(code);
                //     params += "&template2=" + encodeURIComponent(template_2);
                //   //  params += "&licstr=" + encodeURIComponent(secugen_lic);
                //     params += "&templateFormat=" + "ISO";
                //     $.ajax(
                //             {url: uri,
                //                 type: "POST",
                //                 cache: false,
                //                 data: params,
                //                 dataType: "json",
                //                 async: false,
                //                 success: function (result) {
                //                     succFunc(result, id);
                //                 },
                //                 error: function (xhr, status, error) {
                //                     failFunc(error);
                //                 }
                //             });
                // }
                if (isFound == false){
                    alert ("NOT FOUND !!!!");
                }
                isFound = false;
            }
        };
        xmlHttp.open("GET", url1, true);
        xmlHttp.send(null);
    }

    function    succTwo(result)
    {
        if (result.ErrorCode == 0)
        {
            /*  Display BMP data in image tag
             BMP data is in base 64 format 
             */
            if (result != null && result.BMPBase64.length > 0)
            {//can be commented
                document.getElementById("FPImage1").src = "data:image/bmp;base64," + result.BMPBase64;
            }
            template_2 = result.TemplateBase64;
        }
        else
        {
            alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
        }
    }

    function succMatch(result, id)
    {
        //var threshold = $('#sl1').slider('getValue');
        var threshold = 1000; // refer the view-source:https://webapi.secugen.com/Demo3
        if (result.ErrorCode == 0)
        {
            if (result.MatchingScore >= threshold) {
                isFound = true;
                var isDisplay = confirm("MATCHED !!! with :" + id + ". Do you want to see the details?");
                if(isDisplay)
                yourCustomizedFunction(id);
            }
        }
        else
        {
            alert("Error Scanning Fingerprint ErrorCode = " + result.ErrorCode);
        }
    }

    function    failureFunc(error)
    {
    }
    function yourCustomizedFunction(id){
        document.getElementById("FPImage2").src = "data:image/bmp;base64," + result.BMPBase64;
    }







