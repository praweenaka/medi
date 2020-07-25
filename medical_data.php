<?php

session_start();


require_once ("connection_sql.php");
header('Content-Type: text/xml'); 

date_default_timezone_set('Asia/Colombo');

$main = array($_POST['main']);
$obj  = json_decode($main[0], true);
$operation = $obj[Main];
$cols = $obj[Col];



if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT medino FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['medino']; 
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    $sql = "delete from tmp_treat   where user='".$_SESSION['CURRENT_USER']."'";
            $result = $conn->query($sql);
            
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($operation == "SAVE") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from medical where  medino  = '" . $cols[medino] . "'"; 
        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {
            exit("Already Saved Medical No...!!!");
        }
        
         $sql1 = "SELECT * FROM customer where code='".$cols[code]."'";
         $result1 = $conn->query($sql1);
         $row1= $result1->fetch();
         if($_SESSION['User_Type']=="ADMIN"){
             $flg=1;
         }else{
             $flg=0;
         }
           
         $sqlsave = "Insert into medical(uniq,medino,cuscode,cusname,sdate,investi,complain,note,user,datetime,flag,ndate,fbc,wbc,hb,plt,pcv,esp,crp,ufr,screa,bu,se,psa,total,tg,hdl,ldl,vldl,ratio,fbs,rbs,hbalc,uma,sgpt,sgop,ggt,sbili,salmu,tsh,t4,ecg,weight,height,pr,bp,to1) values
         ('".$cols[uniq]."','".$cols[medino]."','".$cols[code]."','".$row1['name']."','".$cols[sdate]."','".implode(", ", $cols[investi])."','".implode(", ", $cols[complain])."','".$cols[note]."','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','".$flg."','".$cols[ndate]."','".$cols[fbc]."','".$cols[wbc]."','".$cols[hb]."','".$cols[plt]."','".$cols[pcv]."','".$cols[esp]."','".$cols[crp]."','".$cols[ufr]."','".$cols[screa]."','".$cols[bu]."','".$cols[se]."','".$cols[psa]."','".$cols[total]."','".$cols[tg]."','".$cols[hdl]."','".$cols[ldl]."','".$cols[vldl]."','".$cols[ratio]."','".$cols[fbs]."','".$cols[rbs]."','".$cols[hbalc]."','".$cols[uma]."','".$cols[sgpt]."','".$cols[sgop]."','".$cols[ggt]."','".$cols[sbili]."','".$cols[salmu]."','".$cols[tsh]."','".$cols[t4]."','".$cols[ecg]."','".$cols[weight]."','".$cols[height]."','".$cols[pr]."','".$cols[bp]."','".$cols[to]."') ";
       $resultsave = $conn->query($sqlsave);

        
         $sql = "select * from tmp_treat where tmp_no='" . $cols[uniq] . "' and medino='".$cols[medino]."'";
        foreach ($conn->query($sql) as $rowtmp) {
            $sql = "Insert into medical_item(medino,item,name,qty,tmp_no,user) values
            ('".$cols[medino]."','".$rowtmp[item]."','".$rowtmp[name]."','".$rowtmp[qty]."','".$cols[uniq]."','" . $_SESSION["CURRENT_USER"] . "') ";
             $result = $conn->query($sql);
        }
        
        $sql8 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $cols[medino] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Medical', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
       $result8 = $conn->query($sql8);
        
        $sql = "update invpara set medino=medino+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Save";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($operation == "HISTORY") { 

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    
    $sql = "Select * from medical where cuscode ='" . $cols[name] . "'";  
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {
        $sql = "Select * from medical where cuscode ='" . $cols[name] . "'";  
        foreach ($conn->query($sql) as $row) {  
            $myArr = array($row['sdate'],floatval($row['pr'])); 
            $myJSON = json_encode($myArr); 
            $ResponseXML .= "<json><![CDATA[$myJSON]]></json>"; 
        }
        $ResponseXML .= "<resu><![CDATA[1]]></resu>"; 
    }else {
       $ResponseXML .= "<resu><![CDATA[0]]></resu>"; 
   }
   
   if($_SESSION['User_Type']=="ADMIN"){
       $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\">     
   <tr class=\"info\">
   <th style=\"width: 300px;\">DATE</th> 
   <th style=\"width: 400px;\">COMPLAIN</th> 
   <th style=\"width: 400px;\">DIAGNOSIS</th> 
   <th style=\"width: 400px;\">NEXT DATE</th> 
   <th style=\"width: 400px;\">NEXT DATE NOTE</th> 
   <th style=\"width: 400px;\">FBC</th> 
   <th style=\"width: 400px;\">WBC</th> 
   <th style=\"width: 400px;\">HB</th> 
   <th style=\"width: 400px;\">PLT</th> 
   <th style=\"width: 400px;\">PCV</th> 
   <th style=\"width: 400px;\">ESR</th> 
   <th style=\"width: 400px;\">CRP</th> 
   <th style=\"width: 400px;\">UFR</th> 
   <th style=\"width: 400px;\">S.CREATINNINE</th> 
   <th style=\"width: 400px;\">BU</th> 
   <th style=\"width: 400px;\">SE</th> 
   <th style=\"width: 400px;\">PSA</th> 
   <th style=\"width: 400px;\">TOTAL</th> 
   <th style=\"width: 400px;\">TG</th> 
   <th style=\"width: 400px;\">HDL</th> 
   <th style=\"width: 400px;\">LDL</th> 
   <th style=\"width: 400px;\">VLDL</th> 
   <th style=\"width: 400px;\">RATIO</th> 
   <th style=\"width: 400px;\">FBS</th> 
   <th style=\"width: 400px;\">RBS</th> 
   <th style=\"width: 400px;\">HBA LC</th> 
   <th style=\"width: 400px;\">UMA</th> 
   <th style=\"width: 400px;\">SGPT</th> 
   <th style=\"width: 400px;\">SGOP</th> 
   <th style=\"width: 400px;\">GGT</th> 
   <th style=\"width: 400px;\">S.BILIRUBIN</th> 
   <th style=\"width: 400px;\">S.ALBUMIN</th> 
   <th style=\"width: 400px;\">TSH</th> 
   <th style=\"width: 400px;\">T4</th> 
   <th style=\"width: 400px;\">ECG</th> 
   <th style=\"width: 400px;\">WEIGHT</th> 
   <th style=\"width: 400px;\">HEIGHT</th> 
   <th style=\"width: 400px;\">PR</th> 
   <th style=\"width: 400px;\">BP</th> 
   <th style=\"width: 400px;\">TO</th>   
   </tr>";


    $sql = "Select * from medical where cuscode ='" . $cols[name] . "' order by id desc";  
   foreach ($conn->query($sql) as $row) {
     $ResponseXML .= "<tr>                              
     <td >" . $row['sdate'] . "</td>
     <td >" . $row['complain'] . "</td>
      <td style=\"background-color: #f5ea84;\"><b>" . $row['treatment'] . "</b></td>
     <td >" . $row['ndate'] . "</td>
     <td >" . $row['note'] . "</td>
     <td >" . $row['fbc'] . "</td>
     <td >" . $row['wbc'] . "</td>
     <td >" . $row['hb'] . "</td>
     <td >" . $row['plt'] . "</td>
     <td >" . $row['pcv'] . "</td>
     <td >" . $row['esp'] . "</td>
     <td >" . $row['crp'] . "</td>
     <td >" . $row['ufr'] . "</td>
     <td >" . $row['screa'] . "</td>
     <td >" . $row['bu'] . "</td>
     <td >" . $row['se'] . "</td>
     <td >" . $row['psa'] . "</td>
     <td >" . $row['total'] . "</td>
     <td >" . $row['tg'] . "</td>
     <td >" . $row['hdl'] . "</td>
     <td >" . $row['ldl'] . "</td>
     <td >" . $row['vldl'] . "</td>
     <td >" . $row['ratio'] . "</td>
     <td >" . $row['fbs'] . "</td>
     <td >" . $row['rbs'] . "</td>
     <td >" . $row['hbalc'] . "</td>
     <td >" . $row['uma'] . "</td>
     <td >" . $row['sgpt'] . "</td>
     <td >" . $row['sgop'] . "</td>
     <td >" . $row['ggt'] . "</td>
     <td >" . $row['sbili'] . "</td>
     <td >" . $row['salmu'] . "</td>
     <td >" . $row['tsh'] . "</td>
     <td >" . $row['t4'] . "</td>
     <td >" . $row['ecg'] . "</td>
     <td >" . $row['weight'] . "</td>
     <td >" . $row['Height'] . "</td>
     <td >" . $row['pr'] . "</td>
     <td >" . $row['bp'] . "</td>
     <td >" . $row['to'] . "</td> ";
     $ResponseXML .= "</tr>";
 }

 $ResponseXML .= "   </table>]]></sales_table>"; 
 
   }else{
        $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\"> ";
        
        $ResponseXML .= "   </table>]]></sales_table>"; 
   }

   
//  =======================
 
 $ResponseXML .= "<sales_table1><![CDATA[ <table class=\"table\">     
   <tr class=\"info\">
   <th style=\"width: 300px;\">AGE</th>
   <th style=\"width: 400px;\">BGROUP</th>
   <th style=\"width: 500px;\">ALLERGY</th>  
   </tr>";


    $sql = "Select * from customer where code ='" . $cols[name] . "' order by id desc";  
   foreach ($conn->query($sql) as $row) {
     $date1 = strtotime($row['age']);  
    $date2 = strtotime(date("Y-m-d"));   
    $diff = abs($date2 - $date1);  
    $diff = floor($diff / (365*60*60*24));  
     $ResponseXML .= "<tr style=\"width:100%\">                              
     <td style=\"background-color: #ff5151;font-size: 15px;\"><b>" . $diff . "</b></td>
     <td style=\"background-color: #ff5151;font-size: 15px;\"><b>" . $row['bgroup'] . "</b></td>
     <td style=\"background-color: #ff5151;font-size: 15px;\"><b>" . $row['allergy'] . "</b></td>";
     $ResponseXML .= "</tr>";
 }

 $ResponseXML .= "   </table>]]></sales_table1>"; 
 
  $ResponseXML .= "<sales_table2><![CDATA[ <table class=\"table\">     
   <tr class=\"info\" >
   <th ><b>DIAGNOSIS HISTORY</b></th>  
   </tr>";


    $sql = "Select * from customer where code ='" . $cols[name] . "' order by id desc";  
   foreach ($conn->query($sql) as $row) { 
     $ResponseXML .= "<tr>  
     <td style=\"background-color: #ff5151;\"><b>" . $row['s_diag'] . "</b></td>";
     $ResponseXML .= "</tr>";
 }

 $ResponseXML .= "   </table>]]></sales_table2>"; 

 
 $ResponseXML .= "</salesdetails>";
 echo $ResponseXML;
}

 if ($_GET["Command"] == "pass_quot") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "Select * from medical where cancel='0' and flag='1' and medino ='" . $cuscode . "'";
    $sql = $conn->query($sql);

    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }
    
    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\"><tr>
                        <th style=\"width: 120px;\">Name</th>
                        <th style=\"width: 60px;\">Qty</th> 
                    </tr>";
 
    $sql = "Select * from medical_item where   medino='" . $cuscode . "'";
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr> 
                         <td>" . $row['name'] . "</td> 
                         <td>" . $row['qty'] . "</td>   
                         </tr>";  
    }

    $ResponseXML .= "</table>]]></sales_table>";  

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}



if ($_POST["Command"] == "cancel_inv") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from medical where medino='" . $_POST['medino'] . "'";

        $sql = $conn->query($sql);
        if ($row = $sql->fetch()) {

            $sql = "UPDATE medical set cancel='1' where medino='" . $_POST['medino'] . "'";
            $result = $conn->query($sql);
            
            $sql = "UPDATE medical_item set cancel='1' where medino='" . $_POST['medino'] . "'";
            $result = $conn->query($sql);
            

            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['medino'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Medical', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Medical Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_POST["Command"] == "addtreat") {

    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    
     if ($_POST['Command1'] == "add") {
         
         $sql3 = "delete from tmp_treat   where medino='".$_POST['medino']."' and tmp_no='".$_POST['uniq']."' and item='".$_POST['item']."'";
         $result3 = $conn->query($sql3);
         
        $sql = "SELECT * FROM s_mas where code='" . $_POST['item'] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch();
        
        $sql = "Insert into tmp_treat (item,name,qty,tmp_no,medino,user)values
    			('" . $_POST['item'] . "','" . $row['des'] . "', '" . $_POST['qty'] . "', '" . $_POST['uniq'] . "','" . $_POST['medino'] . "','" . $_SESSION["CURRENT_USER"] . "') ";
     
        $result = $conn->query($sql);
 
     }
    if ($_POST['Command1'] == "del") {

        $sql = "delete from tmp_treat where id='" . $_POST['id'] . "'";  
        $result = $conn->query($sql);
    }
    
    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\"><tr>
                        <th style=\"width: 170px;\">Name</th>
                        <th style=\"width: 60px;\">Qty</th>
                        <th style=\"width: 10px;\">#</th> 
                    </tr>";

    $i = 1;
    $mtot = 0;
    $sql = "Select * from tmp_treat where tmp_no='" . $_POST['uniq'] . "' and medino='" . $_POST['medino'] . "'";
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr>
                         <td>" . $row['name'] . "</td>
                         <td>" . $row['qty'] . "</td> 
                         <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['id'] . "')\"> <span class='fa fa-remove'></span></a></td>
                         </tr>"; 
        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";  
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

?>