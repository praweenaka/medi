<?php
session_start();
?> 
<style type="text/css">
	@import url(https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css);

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script> 
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	$(function () {
		$("select").select2();
	});

</script>
<section class="content" >
	<div class="box box-primary"  >
		<div class="box-header with-border">
			<h3 class="box-title"><b>NEW MEDICAL CREATE</b></h3>
			<h4 style="float: right;height: 3px;"><b id="time"></b></h4>

		</div>
		<form name= "form1" role="form" class="form-horizontal">
			<div class="box-body">
				<input type="hidden" id="uniq" class="form-control">
				<input type="hidden" id="item_count" class="form-control">
				<div class="form-group">
					<div class="col-sm-9">
						<a onclick="new_ent();" class="btn btn-default  ">
							<span class="fa fa-user-plus"></span> &nbsp; NEW
						</a>
						<a onclick="save_inv();" class="btn btn-success  ">
							<span class="fa fa-save"></span> &nbsp; SAVE
						</a>
						<!--<a onclick="print_inv();" class="btn btn-primary  ">-->
							<!--	<span class="fa fa-print"></span> &nbsp; PRINT-->
							<!--</a>-->
							<a onclick="cancel_inv();" class="btn btn-danger  ">
								<span class="fa fa-trash"></span> &nbsp; CANCEL
							</a>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label class="col-md-5" for="txt_usernm">DATE</label>
								<div class="col-md-6">
									<input type="text"   value="<?php echo date('Y-m-d'); ?>"   id="sdate" class="form-control dt input-sm">
								</div>
							</div>
						</div>

					</div>
					<div class="form-group"></div>
					<div class="form-group"></div>
					<div id="msg_box"  class="span12 text-center"  ></div>
					<div class="form-group col-sm-4">
						<!-- //////////////////////////////// -->
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-md-3" for="txt_usernm">MEDICAL NO</label>
								<div class="col-md-6">
									<input type="text" placeholder="MEDICAL NO" disabled="" id="medino" name="medino" class="form-control">
								</div>
								<div class="col-md-1">
									<a href="medical_search.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
									return false" onfocus="this.blur()">
									<input type="button" name="searchitem" id="searchitem" value="..." class="btn btn-primary btn-sm">
								</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3" for="txt_usernm">PATIENT</label>
							<div class="col-md-6">
								<select name="name" id="name" class="selectpicker form-control select2"  onchange="histroy();" data-show-subtext="true" data-live-search="true" style="width: 100%">
									<option value="">SELECT PATIENT</option> 
									<?php
									require_once("./connection_sql.php");
									$sql = "Select * from customer  where cancel ='0'";
									foreach ($conn->query($sql) as $row) {
										echo "<option value='" . $row["code"] . "'>" . $row["name"] . "-" . $row["tel"] . "</option>";
									}
									?>
								</select>
							</div> 
							<div class="col-md-1">
								<a href="home.php?url=Customer"  target="_blank">
									<input type="button" name="searchitem" id="searchitem" value="New" class="btn btn-primary btn-sm">
								</a>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-md-3" for="c_code">COMPLAIN</label>
							<div class="col-md-9">
								<select name="complain" id="complain" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
									<?php
									require_once("./connection_sql.php");
									$sql = "Select * from complain  where cancel ='0'";
									foreach ($conn->query($sql) as $row) {
										echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3" for="c_code">DIAGNOSIS</label>
							<div class="col-md-9">
								<select name="investi" id="investi" style="width: 100%" multiple="multiple" class="form-control input-sm"> 
									<?php
									require_once("./connection_sql.php");
									$sql = "Select * from investigation  where cancel ='0'";
									foreach ($conn->query($sql) as $row) {
										echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3" for="txt_usernm">NEXT VISIT</label>
							<div class="col-md-9">
								<input type="text" placeholder="Next Date" id="ndate" value="<?php echo date('Y-m-d'); ?>"  class="form-control dt">
							</div>
						</div> 
						<div class="form-group">
							<label class="col-md-3" for="txt_usernm">NEXT VISIT NOTE</label>
							<div class="col-md-9">
								<textarea id="note"  rows="4" cols="10" class="form-control  input-sm" placeholder="Next Visit Note"></textarea>
							</div>
						</div>
					</div>
					<!--================================-->
					<div class="col-md-5  ">
						<!--===================-->

						
						<div class="tab-content">
							<div id="invoices" class="tab-pane fade in active">
								<h3>TREATMENT</h3>
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group"> 
											<div class="col-md-6">
												<select name="item" id="item" class="form-control input-sm" >
													<?php
													require_once("./connection_sql.php");
													$sql = "Select * from s_mas  where cancel ='0'";
													foreach ($conn->query($sql) as $row) {
														echo "<option value='" . $row["code"] . "'>" . $row["des"] . "-" . $row["selling"] . "-" . $row["qty"] . "</option>";
													}
													?> 
												</select>  
											</div> 
											<div class="col-md-3">
												<input   type="number" id="qty"   name="qty" class="form-control  "  placeholder="Qty"> 
											</div> 
											<div class="col-sm-2">
												<button class="btn btn-primary btn-block" type="button" onclick="add()">
													Add
												</button> 
											</div>

										</div>

										<div class="row">
											<div class="table-responsive " style="  height:220px; width: 100%;overflow:auto;">          
												<div id="myTable" >

												</div>
											</div>
										</div> 
									</div>
								</form>
							</div>
						</div>    

					</div>
					<!--========================================-->
					<!-- ====================================== -->


					<div class="col-md-3">
						<div id="itemdetails1" style="height: 80px;"></div>  
						<div id="itemdetails2" style="height: 80px;"></div>  

					</div>
					<!--=====================-->

					<!-- ////////////////////////////////////////// -->
					<div class="container col-md-9">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#report7">EXAMINATION</a></li>
							<li><a data-toggle="tab" href="#report">GENERAL</a></li>
							<li><a data-toggle="tab" href="#report1">RENAL/UROLOGY</a></li>
							<li><a data-toggle="tab" href="#report2">CHOLESTEROL</a></li>
							<li><a data-toggle="tab" href="#report3">DIABETES</a></li>
							<li><a data-toggle="tab" href="#report4">LIVER FUNCTION</a></li>
							<li><a data-toggle="tab" href="#report5">ENDOCRINOLOGY</a></li>
							<li><a data-toggle="tab" href="#report6">SPECIAL</a></li>
						</ul>
						<div class="tab-content ">
							<div id="report7" class="tab-pane fade in active">
								<!--<h3>Report</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body"> 
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-3" for="c_code">GENERAL</label>
												<div class="col-md-9">
													<select name="general" id="general" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
														<?php
														require_once("./connection_sql.php");
														$sql = "Select * from general  where cancel ='0'";
														foreach ($conn->query($sql) as $row) {
															echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
														}
														?>
													</select>
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="c_code">CVS</label>
												<div class="form-row">
													<div class="form-group col-md-5">
														<label for="inputEmail4">HR</label>
														<input type="number" class="form-control" id="hr" placeholder="HR">
													</div>
													<div class="form-group col-md-5">
														<label for="inputPassword4">BP</label>
														<input type="number" class="form-control" id="bp1" placeholder=" BP">
													</div>
												</div> 
											</div>
											<div class="form-group">
												<label class="col-md-3" for="c_code"> </label>
												<div class="form-row">
													<div class="form-group col-md-5">
														<label for="inputEmail4">DR</label>
														<input type="radio" class="form-check-label" id="dr"   name="cvscheck" placeholder="DR">
													</div>
													<div class="form-group col-md-5">
														<label for="inputPassword4">MURMER</label>
														<input type="radio" class="form-check-label" id="mumber" name="cvscheck" placeholder="MURMER">
													</div>
												</div> 
											</div>
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">RESPINATORY</label>
												<div class="col-md-9">
													<input type="text" placeholder="RESPINATORY" id="respina" class="form-control">
												</div>
											</div> 
											<div class="form-row">
												<label class="col-md-3" for="txt_usernm"></label>
												<div class="form-group col-md-3">
													<label for="inputEmail4">SCR</label>
													<input type="radio" class="form-check-label" id="scr" name="respinacheck" placeholder="SCR">
												</div>
												<div class="form-group col-md-4">
													<label for="inputPassword4">DYSPNEA</label>
													<input type="radio" class="form-check-label" id="dyspnea"  name="respinacheck"placeholder="DYSPNEA">
												</div>
												<div class="form-group col-md-2">
													<label for="inputPassword4">ICR</label>
													<input type="radio" class="form-check-label" id="icr" name="respinacheck" placeholder="ICR">
												</div>
											</div> 

										</div>
										<!-- ======== -->
										<div class="col-md-6  ">
											<div class="form-group">
												<label class="col-md-3" for="c_code">LUNGS</label>
												<div class="col-md-9">
													<select name="lungs" id="lungs" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
														<?php
														require_once("./connection_sql.php");
														$sql = "Select * from lungs  where cancel ='0'";
														foreach ($conn->query($sql) as $row) {
															echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
														}
														?>
													</select>
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="c_code">ABDOMEN</label>
												<div class="col-md-9">
													<select name="abdomen" id="abdomen" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
														<?php
														require_once("./connection_sql.php");
														$sql = "Select * from abdomen  where cancel ='0'";
														foreach ($conn->query($sql) as $row) {
															echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
														}
														?>
													</select>
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="c_code">CNS</label>
												<div class="col-md-9">
													<select name="cns" id="cns" style="width: 100%"  multiple="multiple"  class="form-control input-sm"> 
														<?php
														require_once("./connection_sql.php");
														$sql = "Select * from cns  where cancel ='0'";
														foreach ($conn->query($sql) as $row) {
															echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
														}
														?>
													</select>
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">THROAT</label>
												<div class="col-md-9">
													<input type="text" placeholder="THROAT" id="throat" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="c_code">EAR</label>
												<div class="form-row">
													<div class="form-group col-md-5">
														<label for="inputEmail4">L</label>
														<input type="number" class="form-control" id="ear_l" placeholder="L">
													</div>
													<div class="form-group col-md-5">
														<label for="inputPassword4">R</label>
														<input type="number" class="form-control" id="ear_r" placeholder="R">
													</div>
												</div> 
											</div>
										</div>
										<!-- ========= -->
									</div>
								</form>
							</div>

							<!-- ===================================================== -->
							<div id="report" class="tab-pane fade in ">
								<!--<h3>Report</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										
										
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">FBC</label>
												<div class="col-md-6">
													<input type="number" placeholder="FBC" id="fbc" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">WBC</label>
												<div class="col-md-6">
													<input type="number" placeholder="WBC" id="wbc" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">HB</label>
												<div class="col-md-6">
													<input type="number" placeholder="HB" id="hb" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">PLT</label>
												<div class="col-md-6">
													<input type="number" placeholder="PLT" id="plt" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">PCV</label>
												<div class="col-md-6">
													<input type="number" placeholder="PCV" id="pcv" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">ESR</label>
												<div class="col-md-6">
													<input type="number" placeholder="ESR" id="esp" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">CRP</label>
												<div class="col-md-6">
													<input type="number" placeholder="CRP" id="crp" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3" for="txt_usernm">UFR</label>
												<div class="col-md-6">
													<input type="number" placeholder="UFR" id="ufr" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!--=============-->

							<div id="report1" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">S.CREATINNINE</label>
											<div class="col-md-3">
												<input type="number" placeholder="S.CREATINNINE" id="screa" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">BU</label>
											<div class="col-md-3">
												<input type="number" placeholder="BU" id="bu" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">SE</label>
											<div class="col-md-3">
												<input type="number" placeholder="SE" id="se" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">PSA</label>
											<div class="col-md-3">
												<input type="number" placeholder="PSA" id="psa" class="form-control">
											</div>
										</div> 
									</div>
								</form>
							</div>
							<!--=======================-->
							<div id="report2" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">TOTAL</label>
											<div class="col-md-3">
												<input type="number" placeholder="TOTAL" id="total" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">TG</label>
											<div class="col-md-3">
												<input type="number" placeholder="TG" id="tg" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">HDL</label>
											<div class="col-md-3">
												<input type="number" placeholder="HDL" id="hdl" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">LDL</label>
											<div class="col-md-3">
												<input type="number" placeholder="LDL" id="ldl" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">VLDL</label>
											<div class="col-md-3">
												<input type="number" placeholder="VLDL" id="vldl" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">RATIO</label>
											<div class="col-md-3">
												<input type="number" placeholder="RATIO" id="ratio" class="form-control">
											</div>
										</div> 
									</div>
								</form>
							</div>
							<!--=====================-->
							<div id="report3" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">FBS</label>
											<div class="col-md-3">
												<input type="number" placeholder="FBS" id="fbs" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">RBS</label>
											<div class="col-md-3">
												<input type="number" placeholder="RBS" id="rbs" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">HBA LC</label>
											<div class="col-md-3">
												<input type="number" placeholder="HBA LC" id="hbalc" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">UMA</label>
											<div class="col-md-3">
												<input type="number" placeholder="UMA" id="uma" class="form-control">
											</div>
										</div> 
									</div>
								</form>
							</div>
							<!--================-->
							<div id="report4" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">SGPT</label>
											<div class="col-md-3">
												<input type="number" placeholder="SGPT" id="sgpt" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">SGOP</label>
											<div class="col-md-3">
												<input type="number" placeholder="SGOP" id="sgop" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">GGT</label>
											<div class="col-md-3">
												<input type="number" placeholder="GGT" id="ggt" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">S.BILIRUBIN</label>
											<div class="col-md-3">
												<input type="number" placeholder="S.BILIRUBIN" id="sbili" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">S.ALBUMIN</label>
											<div class="col-md-3">
												<input type="number" placeholder="S.ALBUMIN" id="salmu" class="form-control">
											</div>
										</div> 
									</div>
								</form>
							</div> 
							<!--================-->
							<div id="report5" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">TSH</label>
											<div class="col-md-3">
												<input type="number" placeholder="TSH" id="tsh" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-md-2" for="txt_usernm">T4</label>
											<div class="col-md-3">
												<input type="number" placeholder="T4" id="t4" class="form-control">
											</div>
										</div>  
									</div>
								</form>
							</div>
							<!--======================-->
							
							<!--================-->
							<div id="report6" class="tab-pane fade">
								<!--<h3>GL Posting</h3>-->
								<input type="hidden" value="3"  id="count" >
								<form role="form" class="form-horizontal">
									<div id='invdt' class="box-body">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">ECG</label>
												<div class="col-md-6">
													<input type="number" placeholder="ECG" id="ecg" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">WEIGHT</label>
												<div class="col-md-6">
													<input type="number" placeholder="WEIGHT" id="weight" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">HEIGHT</label>
												<div class="col-md-6">
													<input type="number" placeholder="HEIGHT" id="height" class="form-control">
												</div>
											</div> 
										</div>	
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">PR</label>
												<div class="col-md-6">
													<input type="number" placeholder="PR" id="pr" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">BP</label>
												<div class="col-md-6">
													<input type="number" placeholder="BP" id="bp" class="form-control">
												</div>
											</div> 
											<div class="form-group">
												<label class="col-md-2" for="txt_usernm">TO</label>
												<div class="col-md-6">
													<input type="number" placeholder="TO" id="to" class="form-control">
												</div>
											</div>
										</div>	
									</div>
								</form>
							</div>
							<!--======================-->
							
							
						</div>
					</div>  
					<div class="col-md-3">
						<figure class="highcharts-figure" >
							<div id="container" style="height: 350px;"></div>
							<p class="highcharts-description">

							</p>
						</figure>
					</div>
					<!-- ////////////////////////////////////////// -->


				</div>
				<!--==========================================================================================-->
				<div class="form-group"> 
					<div class="col-md-12"> 
						<div id="itemdetails" style="overflow-x:auto; width:100%; height: 500px;"></div>  
					</div> 

				</div>



			</form>
		</div>
	</section>
	<script src="js/medical.js" type="text/javascript"></script>
	<script>setTimeout(function(){ new_ent(); }, 1700);</script>