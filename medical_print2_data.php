<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT labcode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['labcode'];

    //echo print_r($row);
//    uniq
    $uniq = uniqid();

    $tmpinvno = "000000" . $no;
    $lenth = strlen($tmpinvno);
    $no = trim("LAB/") . substr($tmpinvno, $lenth - 7);




    $ResponseXML .= "<id><![CDATA[$no]]></id>";
  


    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql1 = "select * from labresults1 where refno = '" . $_GET['refno_txt'] . "'";
        $result1 = $conn->query($sql1);
        //echo $sql;
        if ($row1 = $result1->fetch()) {
            exit("Duplicate ....!!!");
        }

        $sql1 = "Insert into labresults1(refno,pport,ldate,agency,ctry,gccno,v_cholerae,helminths,bilharziasis,sal_sheg,sugar,albumin,u_bilharziasis,pregnancy,HIVtest,HBsag,antiHCV)values
                      ('" . $_GET['refno_txt'] . "','" . $_GET['pport_txt'] . "','" . $_GET['ldate_txt'] . "','" . $_GET['agency_txt'] . "','" . $_GET['ctry_txt'] . "','" . $_GET['gccno_txt'] . "','" . $_GET['v_cholerae_txt'] . "','" . $_GET['helminths_txt'] . "','" . $_GET['bilharziasis_txt'] . "','" . $_GET['sal_sheg_txt'] . "','" . $_GET['sugar_txt'] . "','" . $_GET['albumin_txt'] . "','" . $_GET['u_bilharziasis_txt'] . "','" . $_GET['preg_txt'] . "','" . $_GET['hivtest_txt'] . "','" . $_GET['hbsag_txt'] . "','" . $_GET['antihcv_txt'] . "')";

        $result = $conn->query($sql1);
        $sql = "SELECT labcode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['labcode'];
        $no2 = $no + 1;
        $sql = "update invpara set labcode = $no2 where labcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "update") {
    try {
        $sql = "update customer set name = '" . $_GET['name'] . "' ,address = '" . $_GET['address'] . "' ,dob = '" . $_GET['dob'] . "'  where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
//        cid = '" . $_GET['cid'] . "',
        echo "update";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "delete") {

    $sql = "delete from labresults1 where refno = '" . $_GET['refno_txt'] . "'";
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