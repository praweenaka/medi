<?php
ini_set('session.gc_maxlifetime', 30 * 60 * 60 * 60);
session_start();
// $_SESSION["brand"] = "";
// if ($_SESSION["dev"] == "") {
//     echo "Invalid User Session";
//     exit();
// }
?>

<link rel="stylesheet" href="css/themes/redmond/jquery-ui-1.10.3.custom.css" />

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Medical List</h3>


            <form role="form" name ="form1" action="medical_list_data_dev.php"  target="_blank" method="GET" class="form-horizontal">
                  <div class="form-group-sm">

                <div class="form-check">
                  <label class="form-check-label" for="check1">
                    <input type="checkbox" class="form-check-input" id="option1" name="option1" value="1" checked>Cash Summery
                  </label>
                </div>
                <div class="form-group-sm">
                <div class="form-check">
                  <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="option2" name="option2" value="1">Remedical
                  </label>
                </div>
            </div>
            <div class="form-group-sm">
                <div class="form-check">
                  <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="option6" name="option6" value="1">New Medical
                  </label>
                </div>
            </div>
            <div class="form-group-sm">
                <div class="form-check">
                  <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="option7" name="option7" value="1">MMR
                  </label>
                </div>
            </div>
                
                </div>
                 <div class="form-group-sm">
                        <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="option3" name="option3"  value="1" >cash Summery Non VAT
                  </label>
                </div>
                <div class="form-group-sm">
                <div class="form-check">
                  <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="option4" name="option4" value="1">Remedical Non VAT
                  </label>

                <div class="form-group-sm">
                                                    
                    <label class="col-sm-1" for="invno">Date</label>
                        <div class="col-sm-2">

                        <input type="date" value="<?php echo date("Y-m-d"); ?>" placeholder="Date" name="from_date" id="from_date"    class="form-control  input-sm">
                        </div>
                    <label class="col-sm-1" for="invno">To</label>
                    <div class="col-sm-2">
                    <input type="date"   value="<?php echo date("Y-m-d"); ?>" placeholder="To"  name="to_date" id="to_date"  class="form-control  input-sm">


                        </div>
                         <input type="checkbox" class="form-check-input" id="option5" name="option5" value="1">
                    </div>
                                                
            </div>
                <div  class='space' >
                    <br>&nbsp;
               
                </div>
                 <input style="margin-left: 500px;" type="submit" name="button" id="button" value="View"   class="btn btn-primary">

            </form>
        </div>
    </div>
</section>
<script>
function myFunction() {
  location.reload();
}
</script>

<script >
    <script type="text/javascript">
        var now = new Date();
        document.write(now.toLocaleString());
    </script> 

}
</script>
