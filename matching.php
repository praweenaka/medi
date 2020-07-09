<!-- Main content -->
<?php
require_once './connection_sql.php';
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-40240032-1', 'secugenindia.com');
  ga('send', 'pageview');
</script> <script type="text/javascript">
  <!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript">
  <!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
  }

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
    if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
      if(!x && d.getElementById) x=d.getElementById(n); return x;
  }

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
  if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<section class="content">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Matching</h3>
    </div>
    <form name= "form1" role="form" class="form-horizontal">
      <div class="box-body">
        <input type="hidden" id="tmpno" value="" class="form-control">
        <input type="hidden" id="item_count" class="form-control">

        <div class="form-group">
         <img border="2" id="FPImage1" alt="Fingerpint Image" height=100 width=100 src="images\finger.png" > <br>
         <a onclick="capture_img(succTwo, failureFunc)" class="btn btn-default btn-sm">
          <span class="fa fa-user-plus"></span> &nbsp; Finger 1
        </a>                    
      </div>
      <div class="form-group">
       <img border="2" id="FPImage2" alt="Fingerpint Image" height=100 width=100 src="images\finger.png" > <br>
       <a onclick= "matchScore(succMatch, failureFunc)" class="btn btn-default btn-sm">
        <span class="fa fa-user-plus"></span> &nbsp; Finger 1
      </a>
    </div>
    <div id="msg_box"  class="span12 text-center"  ></div>


    



    

    
    

    
    




    
  </div>

</div>

</section>
<script src="js/matching.js"></script>
<script>newent();</script>