<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT mdcode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['mdcode'];

    $tmpinvno = "000000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("MD/") . substr($tmpinvno, $lenth - 7);




    $ResponseXML .= "<id><![CDATA[$no]]></id>";
   


    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {
// print_r($_GET);

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();


         $sql = "SELECT mdcode FROM invpara";
         $result = $conn->query($sql);
         $row = $result->fetch();
         $no = $row['mdcode'];     

         $tmpinvno = "000000" . $no;
         $lenth = strlen($tmpinvno);
         $no = trim("MD/") . substr($tmpinvno, $lenth - 7);
        
        // $sql1 = "select * from med_dele where refno = '" . $_GET['refno'] . "'";
        // $result1 = $conn->query($sql1);
        // //echo $sql;
        // if ($row1 = $result1->fetch()) {
        //     exit("Duplicate ....!!!");
        // }
        
         

        //$ResponseXML .= "<id><![CDATA[" . json_encode($row) . "]]></id>";
         $sql1 = "Insert into med_dele(refno,serino,mdate,passportno,dele,mtime,name_1,name_2,ourref,remarks,med_amount,paid_amount,balpay)values 
                      ('" .$no . "','" . $_GET['serino_txt'] . "','" . $_GET['mdate_txt'] . "','" . $_GET['pno_txt'] . "','" . $_GET['dele_txt'] . "','" . $_GET['time_txt'] . "','" . $_GET['name1_txt'] . "','" . $_GET['name2_txt'] . "','" . $_GET['ourref_txt'] . "','" . $_GET['remarks_txt'] . "','" . $_GET['medamt_txt'] . "','" . $_GET['paidamt_txt'] . "','" . $_GET['balpay_txt'] . "')";

        $result = $conn->query($sql1);
        $sql = "SELECT mdcode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['mdcode'];
        $no2 = $no + 1;
        $sql = "update invpara set mdcode = $no2 where mdcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "cancel") {
    try {
        $sql = "update med_dele set cancel = '1'  where refno = '" . $_GET['refno'] . "'";
        $result = $conn->query($sql);
        echo "Canceled";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "deliver") {
    try {
        $sql = "update med_dele set deliver = 'Delivered'  where refno = '" . $_GET['refno'] . "'";
        $result = $conn->query($sql);
        $sql1 = "update inqurey_med set delivery = 'Delivered'  where pportno = '" . $_GET['pno_txt'] . "'";
        $result1 = $conn->query($sql1);

       // echo  $sql1;
        echo "Delivered";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
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