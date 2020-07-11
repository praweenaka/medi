<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT ctmcode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['ctmcode'];

    //echo print_r($row);
//    uniq
    $uniq = uniqid();

    $tmpinvno = "0000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("CUS/") . substr($tmpinvno, $lenth - 5);




    $ResponseXML .= "<cust_txt><![CDATA[$no]]></cust_txt>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    



    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql1 = "select * from customer where code = '" . $_GET['cust_txt'] . "'";
        $result1 = $conn->query($sql1);
        //echo $sql;
        if ($row1 = $result1->fetch()) {
            exit("Duplicate ....!!!");
        }

        $sql1 = "Insert into customer(code,uniq,name,add1,tel)values
        ('" . $_GET['cust_txt'] . "','" . $_GET['uniq'] . "','" . $_GET['name_txt'] . "','" . $_GET['addr1_txt'] . "','" . $_GET['contact_txt'] . "')";
 
        $result = $conn->query($sql1);
        $sql = "SELECT ctmcode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch(); 
        
        $sql = "update invpara set ctmcode=ctmcode+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

// if ($_GET["Command"] == "update") {

//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $conn->beginTransaction();
//     try {
//         $sql = "update customer set custcode ='".$_GET['cust_txt']."',name='".$_GET['name_txt']."',address1='".$_GET['addr1_txt']."',address2='".$_GET['addr2_txt']."', contact='".$_GET['contact_txt']."',opening_bal='".$_GET['openbal_txt']."',opening_dt= '".$_GET['opdate_txt']."',current_bal= '". $_GET['currbal_txt']."', credit_lmt='".$_GET['crlimit_txt']."',telno='".$_GET['telno_txt']."',fax= '".$_GET['fax_txt']."',labourno= '". $_GET['labourno_txt']."' where custcode = '" . $_GET['cust_txt'] . "'";



//         $result = $conn->query($sql);

//         $conn->commit();
//         echo "Updated";
//     } catch (Exception $e) {
//         $conn->rollBack();
//         echo $e;
//     }
// }



















if ($_GET["Command"] == "delete") {

    $sql = "delete from customer where custcode = '" . $_GET['cust_txt'] . "'";
    $result = $conn->query($sql);
    //  echo $sql;
    echo "delete";
}


if ($_GET["Command"] == "setitem") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";



    if ($_GET["Command1"] == "add_tmp") {


        $sql = "Insert into treatments_temp(t_refno,uniq,av_trments)values 
        ('" . $_GET['refno_txt'] . "','" . $_GET['uniq'] . "','" . $_GET['av_treat'] . "')";

        $result = $conn->query($sql);
        // echo $sql;
    }

    $ResponseXML .= "<sales_table><![CDATA[<table id='myTable' class='table table-bordered'>
    <thead>
    <tr>

    <th style='width: 70%;'>Available Treatments</th>

    </tr>
    <tr>
    <th style='width: 10%;'>Add/Remove</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    <input type='text' placeholder=''  id='av_treat' class='form-control input-sm'>
    </td>


    <td><a onclick='add_tmp();' class='btn btn-default btn-sm'> <span class='fa fa-plus'></span> &nbsp; </a></td>


    </tr>";




    $sql1 = "SELECT * from treatments_temp where uniq = '" . $_GET['uniq'] . "'";


    foreach ($conn->query($sql1) as $row2) {

        $ResponseXML .= "<tr><td>" . $row2['av_trments'] . "</td><td><a onclick='remove_tmp(" . $row2['id'] . ");' class='btn btn-default btn-sm'><span class=''></span> &nbsp; REMOVE</a></td></tr>";
    }

    $ResponseXML .= "</tbody></table>";
    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "removerow") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "delete from treatments_temp where id = '" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    $ResponseXML .= "<sales_table><![CDATA[<table id='myTable' class='table table-bordered'>
    <thead>

    <tr>
    <th style='width: 70%;'>Available Treatments</th>
    </tr>
    <tr>
    <th style='width: 10%;'>Add/Remove</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    <input type='text' placeholder=''  id='av_treat' class='form-control input-sm'>
    </td>



    <td><a onclick='add_tmp();' class='btn btn-default btn-sm'> <span class='fa fa-plus'></span> &nbsp; </a></td>


    </tr>";




    $sql1 = "SELECT * FROM treatments_temp where uniq = '" . $_GET['uniq'] . "'";


    foreach ($conn->query($sql1) as $row2) {

        $ResponseXML .= "<tr><td>" . $row2['av_trments'] . "</td><td><a onclick='remove_tmp(" . $row2['id'] . ");' class='btn btn-default btn-sm'><span class=''></span> &nbsp; REMOVE</a></td></tr>";
    }

    $ResponseXML .= "</tbody></table>";
    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>