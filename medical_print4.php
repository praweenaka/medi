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
                    <a onclick="NewWindow('search_medical_print4.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                   

                    <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-folder"></span> &nbsp; Print
                    </a>

                     <a onclick="cancel();" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-print"></span> &nbsp; CANCEL
                    </a>
                   <!--  <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn- btn-warning">
                        <span class="fa fa-edit"></span> &nbsp; Edit
                    </a>
                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <a onclick="NewWindow('search_medical_print.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="sess_chk('exit', 'crn');" class="btn btn-adn btn-sm">
                        <span class="fa fa-pause"></span> &nbsp; Exit
                    </a>

                    <a onclick="sess_chk('labform', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-folder"></span> &nbsp; Print
                    </a> -->

                </div>
                <div id="msg_box"  class="span12 text-center"  ></div>



                <div class="col-md-12">

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Ref No</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="refno_txt" class="form-control  input-sm" disabled="">
                        </div>

                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-1" for="invno">Passport No.</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"pport_txt\" class =\"form-control input-sm\">";
                            $sql = "select * from payment";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["pno"] . "'>" . $row["pno"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>
                        <label class="col-sm-1" for="invno">Date</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="" id="date_txt" class="form-control  input-sm">
                        </div>

                         <label class="col-sm-1" for="invno">Agency</label>

                        <div class="col-sm-2">
                            <?php
                            echo"<select id = \"agency_txt\" class =\"form-control input-sm\">";
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
                            echo"<select id = \"ctry_txt\" class =\"form-control input-sm\">";
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
                            echo"<select id = \"gccno_txt\" class =\"form-control input-sm\">";
                            $sql = "select * from rege";
                            foreach ($conn->query($sql) as $row) {
                                echo "<b><option value='" . $row["GCC_NO"] . "'>" . $row["GCC_NO"] . "</option></b>";
                            }
                            echo"</select>";
                            ?>
                        </div>

                         <label class="col-sm-1" for="invno">Medical Date</label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="" id="mdate_txt" class="form-control  input-sm">
                        </div>
                    </div>

                    
                    <div class="form-group"></div>
                    <div class="form-group">
                       
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <label class="col-sm-2" for="invno">X Ray</label>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group well">
                        <label class="col-sm-2" for="invno">VDRL CHEST</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="vdrlchest_txt" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">X-RAY</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="xray_txt" class="form-control  input-sm">
                        </div>



                        <label class="col-sm-2" for="invno">VACCINATION</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="" id="vacci_txt" class="form-control  input-sm">
                        </div>
                     
                    </div>

                   
                  

                </div>

            </div>

            </section>
            <script src="js/medical_print.js"></script>
            <script>newent();</script>





