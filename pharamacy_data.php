<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT phara FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['phara'];
 
    $uniq = uniqid();

    $tmpinvno = "0000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("P/") . substr($tmpinvno, $lenth - 5);
 
    $ResponseXML .= "<code><![CDATA[$no]]></code>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
     $_SESSION['pharmcy']=$no;
     $_SESSION['uniq']=$uniq;

    $sql = "delete from tmp_pharmacy_item   where user='".$_SESSION['CURRENT_USER']."'";
            $result = $conn->query($sql);
            
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}
 


if ($_GET["Command"] == "pass_quot") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "Select * from pharamacy where cancel='0' and pharmcyno ='" . $cuscode . "'";
    $result = $conn->query($sql);

    if ($rowM = $result->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }
 
    $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\">    ";
      
     
      $sql1 = "Select * from pharmacy_item where pharmcyno ='" . $cuscode . "'"; 
      foreach ($conn->query($sql1) as $row1) {
        
        $ResponseXML .= "<tr>
                         <td style=\"width:200px;\">" . $row1['name'] . "</td>
                         <td style=\"width:200px;\">" . $row1['qty'] . "</td> 
                         <td style=\"width:200px;\">" . $row1['selling'] . "</td> 
                         <td style=\"width:200px;\">" . number_format($row1['qty']*$row1['selling'], 2, '.', ' ') . "</td> 
                         <td> 
                         </td>
                         </tr>";  
    }
    
     $ResponseXML .= "   </table>]]></sales_table>"; 
     
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "pass_quot1") {
    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["medino"];

    $sql = "Select * from medical where cancel='0' and pharamacy='0' and medino ='" . $cuscode . "'";  
    $sql = $conn->query($sql);

    if ($rowM = $sql->fetch()) {
        $ResponseXML .= "<id><![CDATA[" . json_encode($rowM) .  "]]></id>";
    }
 
    $sql = "delete from tmp_pharmacy_item where pharmcyno='" . $_SESSION['pharmcy'] . "' and tmp_no='".$_SESSION['uniq']."'";  
    $result = $conn->query($sql);
  
    $sql = "select * from medical_item where  medino='".$_GET["medino"] . "'"; 
        foreach ($conn->query($sql) as $rowtmp) {
            $sqlmas = "SELECT * FROM s_mas where code='".$rowtmp['item']."'";
            $resultmas = $conn->query($sqlmas);
            $rowmas = $resultmas->fetch();
            
            $sql = "Insert into tmp_pharmacy_item(pharmcyno,item,name,qty,tmp_no,selling,user) values
            ('".$_SESSION['pharmcy']."','".$rowtmp['item']."','".$rowtmp['name']."','".$rowtmp['qty']."','".$_SESSION['uniq']."','".$rowmas['selling']."','".$_SESSION['CURRENT_USER']."') ";
         
             $result = $conn->query($sql);
     }
     
 
    $ResponseXML .= "<sales_table><![CDATA[ <table class=\"table\">    ";
      
    

     $tot=0;
      $sql = "Select * from tmp_pharmacy_item where pharmcyno='".$_SESSION['pharmcy']."' and tmp_no='".$_SESSION['uniq']."'";
    foreach ($conn->query($sql) as $row) { 
        $bgcolour = "";
 
        $sqlmas = "SELECT * FROM s_mas where code='".$row['item']."' and qty<'".$row['qty']."'"; 
        $resultmas = $conn->query($sqlmas);
        if ($rowmas = $resultmas->fetch()) {
             $bgcolour = "#f2be3a";
        }    
            $ResponseXML .= "<tr>
                         <td style=\"width:200px;background-color:$bgcolour\">" . $row['name'] . "</td>
                         <td style=\"width:200px;background-color:$bgcolour\">" . $row['qty'] . "</td> 
                         <td style=\"width:200px;background-color:$bgcolour\">" . $row['selling'] . "</td> 
                         <td style=\"width:200px;background-color:$bgcolour\">" . str_replace(",", "", number_format($row['qty']*$row['selling'],2)) . "</td> 
                         <td><button   onClick=\"del_item('" . $row['id'] . "')\" type=\"button\" class=\"btn btn-danger btnDelete btn-sm\">Remove</button>
                         </td>
                         </tr>";
        
        
                         
        $tot = $tot +  $row['qty']*$row['selling'];
    }
    
     $ResponseXML .= "   </table>]]></sales_table>"; 
    $ResponseXML .= "<total><![CDATA[" . str_replace(",", "", number_format($tot,2)) .  "]]></total>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
 
 
 
if ($_POST["Command"] == "add_item") {


    header('Content-Type: text/xml'); 
    
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    
     if ($_POST['Command1'] == "add") {
        
            $sql3 = "delete from tmp_pharmacy_item   where pharmcyno='".$_POST['pharmcyno']."' and tmp_no='".$_POST['uniq']."' and item='".$_POST['item']."'";
            $result3 = $conn->query($sql3);
       		// $sql = "SELECT * FROM s_mas where code='" . $_POST['item'] . "' and qty>='".$_POST['qty']."'";  
            $sql = "SELECT * FROM s_mas where code='" . $_POST['item'] . "'";  
            $result = $conn->query($sql);
            if ($row = $result->fetch()) {
                 $sql2 = "Insert into tmp_pharmacy_item(pharmcyno,item,name,qty,tmp_no,selling,user) values
                ('".$_POST['pharmcyno']."','".$_POST['item']."','".$row['des']."','".$_POST['qty']."','".$_POST['uniq']."','".$row['selling']."','".$_SESSION['CURRENT_USER']."') ";
                
                 $result2 = $conn->query($sql2);
            }else{
                // exit("Under Stock...!!!");
            }
        
     }
    if ($_POST['Command1'] == "del") {

        $sql = "delete from tmp_pharmacy_item   where id='".$_POST['id']."'"; 
        $result = $conn->query($sql);
    }
    
    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">  ";

    $tot=0;
      $sql = "Select * from tmp_pharmacy_item where pharmcyno='".$_POST['pharmcyno']."' and tmp_no='".$_POST['uniq']."'";
    foreach ($conn->query($sql) as $row) {
        
        $ResponseXML .= "<tr>
                         <td style=\"width:200px;\">" . $row['name'] . "</td>
                         <td style=\"width:200px;\">" . $row['qty'] . "</td> 
                         <td style=\"width:200px;\">" . $row['selling'] . "</td> 
                         <td style=\"width:200px;\">" . str_replace(",", "", number_format($row['qty']*$row['selling'],2)) . "</td> 
                         <td><button   onClick=\"del_item('" . $row['id'] . "')\" type=\"button\" class=\"btn btn-danger btnDelete btn-sm\">Remove</button>
                         </td>
                         </tr>"; 
        $tot = $tot +  $row['qty']*$row['selling'];
    }

    $ResponseXML .= "</table>]]></sales_table>";  
     $ResponseXML .= "<total><![CDATA[" . str_replace(",", "", number_format($tot,2)) .  "]]></total>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

 

if ($_POST["Command"] == "save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql = "SELECT * from pharamacy where  pharmcyno  = '" . $_POST['pharmcyno'] . "'"; 
        $result = $conn->query($sql);
        if ($row = $result->fetch()) {
            exit("Already Saved Pharamcy No...!!!");
        }
        
         $sql1 = "SELECT * FROM customer where code='".$_POST['code']."'";
         $result1 = $conn->query($sql1);
         $row1= $result1->fetch();
       
           
         $sqlsave = "Insert into pharamacy(uniq,pharmcyno,sdate,cuscode,cusname,ordno,grandtot,dcharge,user,datetime,grandtot1) values
         ('".$_POST['uniq']."','".$_POST['pharmcyno']."','".$_POST['sdate']."','".$_POST['code']."','".$row1['name']."','".$_POST['ordno']."','".$_POST['gtot']."','".$_POST['dcharge']."','".$_SESSION['UserName']."','".date('Y-m-d H:i:s')."','".$_POST['gtot1']."') ";
        $resultsave = $conn->query($sqlsave);

        
         $sqltmp= "select * from tmp_pharmacy_item where pharmcyno='".$_POST['pharmcyno']."' and tmp_no='".$_POST['uniq']."'";
         foreach ($conn->query($sqltmp) as $rowtmp) {
            // $sqlmas = "SELECT * FROM s_mas where code='" . $rowtmp['item'] . "' and qty<'".$rowtmp['qty']."'";   
            // $resultmas = $conn->query($sqlmas);
            // if ($rowmas = $resultmas->fetch()) {
            //     exit("Under Stock  '".$rowtmp['name']."'");
            // }
            $sql2 = "Insert into pharmacy_item(pharmcyno,item,name,qty,tmp_no,selling) values
            ('".$_POST['pharmcyno']."','".$rowtmp['item']."','".$rowtmp['name']."','".$rowtmp['qty']."','".$_POST['uniq']."','".$rowtmp['selling']."') ";
             $result2 = $conn->query($sql2);
             
             $sql3 = "Insert into s_trn(refno,code,name,qty,selling,user,datetime,s_code) values
            ('".$_POST['pharmcyno']."','".$rowtmp['item']."','".$rowtmp['name']."','".$rowtmp['qty']."','".$rowtmp['selling']."','" . $_SESSION["CURRENT_USER"] . "','" . date("Y-m-d H:i:s") . "','".$_POST['code']."') ";
            $result3 = $conn->query($sql3);
             
             $sql4 = "update s_mas set qty=qty-'".$rowtmp['qty']."' where code='".$rowtmp['item']."'";
             $result4 = $conn->query($sql4);
             
             $sql5 = "update s_trn set cancel='1' where refno='".$_POST['pharmcyno']."'";
             $result5 = $conn->query($sql5);
        }
        
        $sql6 = "update invpara set phara=phara+1";
        $result6 = $conn->query($sql6);
        
        if($_POST['ordno']!=""){
             $sql7 = "update medical set pharamacy='" . $_POST['pharmcyno'] . "' where medino='".$_POST['ordno']."'";
             $result7 = $conn->query($sql7);
        }
        $sql8 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['pharmcyno'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Pharmcy', 'Save', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
       $result8 = $conn->query($sql8);

        $conn->commit();
        echo "Save";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_POST["Command"] == "cancel_inv") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "SELECT * from pharamacy where pharmcyno='" . $_POST['pharmcyno'] . "'";

        $result = $conn->query($sql);
        if ($row = $result->fetch()) {

            $sql = "UPDATE pharamacy set cancel='1' where pharmcyno='" . $_POST['pharmcyno'] . "'";
            $result = $conn->query($sql);
            
            $sql = "UPDATE pharmacy_item set cancel='1' where pharmcyno='" . $_POST['pharmcyno'] . "'";
            $result = $conn->query($sql);

            $sqltmp = "select * from pharmacy_item where pharmcyno='" . $_POST['pharmcyno'] . "' "; 
            $resulttmp = $conn->query($sqltmp);
            while ($rowtmp = $resulttmp->fetch()) {
                $sql = "update s_mas set qty=qty+'".$rowtmp['qty']."' where code='".$rowtmp['item']."'";
                $result = $conn->query($sql);
            }
            $sql2 = "insert into entry_log(refno, username, docname, trnType, stime, sdate) values ('" . $_POST['pharmcyno'] . "', '" . $_SESSION["CURRENT_USER"] . "', 'Pharmcy', 'Cancel', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d") . "')";
            $result2 = $conn->query($sql2);

            $conn->commit();
            echo "Cancel";
        } else {
            exit("Pharamacy Not Found...!!!");
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "calcu") {
   header('Content-Type: text/xml');
      
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $total = 0; 
    $total = $_GET["dcharge"] + $_GET["gtot"]; 
         
    $tot = str_replace(",", "", number_format($total,2));
    $ResponseXML .= "<tot><![CDATA[$tot]]></tot>";
 $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>