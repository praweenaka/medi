<!-- Main content -->
<?php
require_once './connection_sql.php';
?>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Medical Print</h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="tmpno" value="" class="form-control">
                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group">
                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <a onclick="NewWindow('search_medical_print.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                    <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-folder"></span> &nbsp; Print
                    </a>

                     <a onclick="cancel();" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-print"></span> &nbsp; CANCEL
                    </a>

                     <!--   <a onclick="save_inv();" class="btn btn- btn-warning">
                        <span class="fa fa-edit"></span> &nbsp; Edit
                    </a> -->

                   <!--   <a onclick="sess_chk('exit', 'crn');" class="btn btn-adn btn-sm">
                        <span class="fa fa-pause"></span> &nbsp; Exit
                    </a> -->

                </div>
                <div id="msg_box"  class="span12 text-center"  ></div>



                <div class="col-md-12">

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Ref No</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txt_ref" class="form-control  input-sm" disabled="">
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Passport No.</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_passno\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["PA_NO"] . "'>" . $row["PA_NO"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                        <label class="col-sm-1" for="invno">Date</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"dtbdate\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["dob"] . "'>" . $row["dob"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                         <label class="col-sm-1" for="invno">Agency</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_agname\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["AGNAME"] . "'>" . $row["AGNAME"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                    </div>

                   

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Country</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"cmbhead\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["country"] . "'>" . $row["country"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                         <label class="col-sm-1" for="invno">G.C.C. No</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_gccno\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["G_NO"] . "'>" . $row["G_NO"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                         <label class="col-sm-1" for="invno">Medical Date</label>
                       <div class="col-sm-2">
                            <?php
                            echo"<select id = \"dtcdate\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["MDATE"] . "'>" . $row["MDATE"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                    </div>


<br><br>

 
  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Patient Details</a></li>
    <li><a data-toggle="pill" href="#menu1">Doctor</a></li>
    <li><a data-toggle="pill" href="#menu2">X-Ray</a></li>
    <li><a data-toggle="pill" href="#menu3">Lab</a></li>
  </ul>
  
  <div class="tab-content">

<!-- tab 1 -->
    <div id="home" class="tab-pane fade in active">
         <div class="form-group"></div>
                    <div  class="form-group">
                        <label class="col-sm-1" for="invno">Name</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txtName\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["Lastname"] . "'>" . $row["Lastname"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                        <label class="col-sm-1" for="invno">Height</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtheight" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-1" for="invno">Weight</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtweg" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div  class="form-group">
                        <label class="col-sm-1" for="invno">Sex</label>
                        <div class="col-sm-2">
                             <?php
                            echo"<select id = \"cmbsex\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["SEX"] . "'>" . $row["SEX"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                        <label class="col-sm-1" for="invno">Age</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_ag_ye\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["AGE_Y"] . "'>" . $row["AGE_Y"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>




                        <label class="col-sm-1" for="invno">Nationality</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"cmbnat\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["NATIONL"] . "'>" . $row["NATIONL"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Date of Issue</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="" id="dtisu" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-1" for="invno">Patient's &nbsp; Ref No.</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"TXTREFNO\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["refno"] . "'>" . $row["refno"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                         <label class="col-sm-1" for="invno">Position Applied</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txtPOS_APP\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["POS_APP"] . "'>" . $row["POS_APP"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                       
                        <label class="col-sm-1" for="invno">Status</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"cmbstatus\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["medStatus"] . "'>" . $row["medStatus"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                         <label class="col-sm-1" for="invno">Serial No.</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_serino\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["seri_no"] . "'>" . $row["seri_no"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                        <label class="col-sm-1" for="invno">XRAY NO.</label>
                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"txt_xrayno\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["XRAYNO"] . "'>" . $row["XRAYNO"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
					
				
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Doctor</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Add Remark1</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtdarem1" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">Add Remark2</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtdarem2" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">Add Remark3</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtdarem3" class="form-control  input-sm">
                        </div>
                        <br><br>
                        <label class="col-sm-2" for="invno">Remark 1(NP)</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtrem1np" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Remark 2(NP)</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtrem2np" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">X-ray</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Add Remark</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtxarem1" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Remarks Addrem</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtaremnp" class="form-control  input-sm">
                        </div>
                    </div>
                    
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Lab</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Add Remark</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtlarem1" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Remarks Addrem</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtlarnp1" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Lab Remark</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtlabrem" class="form-control  input-sm">
                        </div>
                    </div>

                </div>



    </div>

       

<!-- tab 2 -->
    <div id="menu1" class="tab-pane fade">
         <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Eye Vision</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Vision R. Eye</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtEYE_NE_R" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">Vision L. Eye</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtEYE_NE_L" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">Others R. Eye</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtEYE__R" class="form-control  input-sm">
                        </div>
                        <br><br>
                        <label class="col-sm-2" for="invno">L. Eye</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtEYE__L" class="form-control  input-sm">
                        </div>

                        
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Ear</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Right Ear</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtYEAR_R" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Left Ear</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtYEAR_L" class="form-control  input-sm">
                        </div>
                    </div>
                    
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Systemic Exam</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Blood Presure</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtbp" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Heart</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtheart" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Lungs</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtlungs" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Abdomen</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtadb" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Hernia</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txther" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Varicosities</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtvaric" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Extremities</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtextrem" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Skin</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtskin" class="form-control  input-sm">
                        </div>
                    </div>


                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Blood</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Hemolglobin</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtHEM" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Malaria</label>
                        <div class="col-sm-2">
                            <select id="cmbmal" class="form-control  input-sm">
                                <option value="TESTED">TESTED</option>
                                <option value="NT_TESTED">NT TESTED</option>
                            </select>
                        </div>
                        <label class="col-sm-2" for="invno">Creatinine</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtcreat" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Urea</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txturea" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">L.F.T.</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtlft" class="form-control  input-sm">
                        </div>
                         <label class="col-sm-2" for="invno">Blood Group</label>
                        <div class="col-sm-2">
                            
                             <select id="cmbbg" class="form-control  input-sm">
                                <option value="TESTED">TESTED</option>
                                <option value="NT_TESTED">NT TESTED</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-group"></div>
                   
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Psychiatric And Neurological Disorders</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtphyneuro" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Allergy</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtal" class="form-control  input-sm">
                        </div>
                        <label class="col-sm-2" for="invno">Other</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtothe" class="form-control  input-sm">
                        </div>
                       
                        
                    </div>











    </div>
      


<!-- tab 3 -->
    <div id="menu2" class="tab-pane fade">
        <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">X Ray</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">VDRL CHEST</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txtv_drlchest" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">X-RAY</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txt_xray" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">VACCINATION</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="txt_vacci" class="form-control  input-sm">
                        </div>
                     
                    </div>


      
    </div>

<!-- tab 4 -->
    <div id="menu3" class="tab-pane fade">

        <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Stool</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">V. Cholerae</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtvchol" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Helminths</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txthelmin" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">Bilharziasis</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtbilhar2" class="form-control  input-sm">
                        </div>
                        <br><br>
                        <label class="col-sm-2" for="invno">Salmonella/Shegella</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtsalshei" class="form-control  input-sm">
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Urine</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">Sugar</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtsug" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Albumin</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtalbu" class="form-control  input-sm">
                        </div>

                        <label class="col-sm-2" for="invno">Bilharziasis</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtbilhar1" class="form-control  input-sm">
                        </div>
                        <br><br>
                        <label class="col-sm-2" for="invno">Pregnancy Test</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="NT TESTED" id="txtpreg" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">Serology</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">HIV Test</label>
                        <div class="col-sm-2">
                            
                            <select id="cmbhiv" class="form-control  input-sm">
                                <option value="TESTED">TESTED</option>
                                <option value="NT_TESTED">NT TESTED</option>
                            </select>
                        </div>
                        <label class="col-sm-2" for="invno">HBsAg</label>
                        <div class="col-sm-2">
                           
                             <select id="cmbhbs" class="form-control  input-sm">
                                <option value="TESTED">TESTED</option>
                                <option value="NT_TESTED">NT TESTED</option>
                            </select>
                        </div>
                        <label class="col-sm-2" for="invno">Anti HCV</label>
                        <div class="col-sm-2">
                           
                             <select id="antihcv" class="form-control  input-sm">
                                <option value="TESTED">TESTED</option>
                                <option value="NT_TESTED">NT TESTED</option>
                            </select>
                        </div>
                    </div>
      

    </div>

</div>
</div>
</div>

 
            </section>
            <script src="js/medical_print.js"></script>
            <script>newent();</script>





