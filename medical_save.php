<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');


$stname = $_POST['stname'];



//echo $PAR1->age_txt;

if ($stname == "med_ser_reg") {

$jmain = json_decode($_POST['MAIN']);

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        

  $sql1 = "Insert into sregdetails(refno,srdate,patientno,fname,lastname,age_years,age_months,bdate,sex,nation,country,countryname,no_chid,lastchildage,medicode,mediname,medistatus,meditype,dest,xrayno,serino,PLA_OF_IS,gno,POS_APP,gccno,address,dtisu,med_time,remaks,labref,newref,finger1,finger2,cheqno,cheq_amt,cheq_date,csh_amt,paid_amt,bank,refamt,dt_refund)values 
                      ('" . $jmain->txt_refno . "','" . $jmain->txt_srdate. "','" . $jmain->txt_patno . "','" . $jmain->txt_fname . "','" . $jmain->txt_lname . "','" . $jmain->txt_ageyrs . "','" . $jmain->txt_agemnths . "','" . $jmain->txt_dob . "','" . $jmain->txt_gender . "','" . $jmain->txt_nation . "','" . $jmain->txt_count . "','" . $jmain->txt_countname . "','" . $jmain->txt_nochld . "','" . $jmain->txt_lchldage . "','" . $jmain->txt_medicode . "','" . $jmain->txt_mediname . "','" . $jmain->txt_medistatus . "','" . $jmain->txt_type . "','" . $jmain->txt_dest . "','" . $jmain->txt_xrayno . "','" . $jmain->txt_serino . "','" . $jmain->txt_pla_of_iss . "','" . $jmain->txt_gno . "','" . $jmain->txt_posapp . "','" . $jmain->txt_gccno . "','" . $jmain->txt_cusadd . "','" . $jmain->txt_dtofissu . "','" . $jmain->txt_time . "','" . $jmain->txt_rem . "','" . $jmain->txt_labref . "','" . $jmain->txt_newref . "','" . $jmain->txt_fn1 . "','" . $jmain->txt_fn2 . "','" . $jmain->txt_cheqno . "','" . $jmain->txt_cheqamt . "','" . $jmain->txt_cheqdt . "','" . $jmain->txt_cash . "','" . $jmain->txt_bank . "','" . $jmain->txt_rfamt . "','" . $jmain->txt_rfdt . "')";


                        $result = $conn->query($sql1);                

                        $sql = "SELECT regicode FROM invpara";
                        $result = $conn->query($sql);
                        $row = $result->fetch();
                        $no = $row['regicode'];
                        $no2 = $no + 1;
                        $sql = "update invpara set regicode = $no2 where regicode = $no";
                        $result = $conn->query($sql);                

                        $conn->commit();
                        echo "Saved";
                    } catch (Exception $e) {
                        $conn->rollBack();
                        echo $e;
                    }
}


if ($stname == "med_print") {
$jmain2 = json_decode($_POST['MAIN2']);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

$sql1 = "Insert into mediprint(ref_no,passport_no,c_date,agency,country,gcc_no,medical_date,name,height,weight,
sex,age,nationality,date_of_issue,patients_ref_no,position_applied,status,serial_no,xray_no,remark1,remark2,
remark3,remark1_np,remark2_np,xray_remark1,xray_remark2,lab_remark1,lab_remark2,lab_remark3,vision_r_eye,
vision_l_eye,other_r_eye,l_eye,right_ear,left_ear,blood_pressure,heart,lungs,abdomen,hernia,varicosities,
extremities,skin,hemoglobin,maleria,creatinine,urea,l_f_t,blood_group,p_and_n_disorders,allegy,other, vdrl_chest,
x_ray,vaccination,v_cholerae,helminths,bilharziasiss,salmonella_shegella,sugar,albumin,bilharziasis
,pregnency_test,HIV,HBS,HCV,cancel)values 
                      ('" . $jmain2->txt_ref. "','" . $jmain2->txt_passno. "','" . $jmain2->dtbdate. "','" . $jmain2->txt_agname. "','" . $jmain2->cmbhead. "','" . $jmain2->txt_gccno. "','" . $jmain2->dtcdate. "','" . $jmain2->txtName. "','" . $jmain2->txtheight. "','" . $jmain2->txtweg. "','" . $jmain2->cmbsex. "','" . $jmain2->txt_ag_ye. "','" . $jmain2->cmbnat. "','" . $jmain2->dtisu. "','" . $jmain2->TXTREFNO. "','" . $jmain2->txtPOS_APP. "','" . $jmain2->cmbstatus. "','" . $jmain2->txt_serino. "','" . $jmain2->txt_xrayno. "','" . $jmain2->txtdarem1. "','" . $jmain2->txtdarem2. "','" . $jmain2->txtdarem3. "','" . $jmain2->txtrem1np. "','" . $jmain2->txtrem2np. "','" . $jmain2->txtxarem1. "','" . $jmain2->txtaremnp. "','" . $jmain2->txtlarem1. "','" . $jmain2->txtlarnp1. "','" . $jmain2->txtlabrem. "','" . $jmain2->txtEYE_NE_R. "','" . $jmain2->txtEYE_NE_L. "','" . $jmain2->txtEYE__R. "','" . $jmain2->txtEYE__L. "','" . $jmain2->txtYEAR_R. "','" . $jmain2->txtYEAR_L. "','" . $jmain2->txtbp. "','" . $jmain2->txtheart. "','" . $jmain2->txtlungs. "','" . $jmain2->txtadb. "','" . $jmain2->txther. "','" . $jmain2->txtvaric. "','" . $jmain2->txtextrem. "','" . $jmain2->txtskin. "','" . $jmain2->txtHEM. "','" . $jmain2->cmbmal. "','" . $jmain2->txtcreat. "','" . $jmain2->txturea. "','" . $jmain2->txtlft. "','" . $jmain2->cmbbg. "','" . $jmain2->txtphyneuro. "','" . $jmain2->txtal. "','" . $jmain2->txtothe. "','" . $jmain2->txtv_drlchest. "','" . $jmain2->txt_xray. "','" . $jmain2->txt_vacci. "','" . $jmain2->txtvchol. "','" . $jmain2->txthelmin. "','" . $jmain2->txtbilhar2. "','" . $jmain2->txtsalshei. "','" . $jmain2->txtsug. "','" . $jmain2->txtalbu. "','" . $jmain2->txtbilhar1. "','" . $jmain2->txtpreg. "','" . $jmain2->cmbhiv. "','" . $jmain2->cmbhbs. "','" . $jmain2->antihcv. "','0')";


        $result = $conn->query($sql1);

        $sql = "SELECT mpcode FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['mpcode'];
        $no2 = $no + 1;
        $sql = "update invpara set mpcode = $no2 where mpcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}



?>


