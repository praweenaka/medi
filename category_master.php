<?php  
session_start();
?> 
<!--<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />-->
<!--<meta http-equiv="Pragma" content="no-cache" />-->
<!--<meta http-equiv="Expires" content="0"/>-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<section class="content"  >
 <!--style="background-color: #b5ebff;"-->
 <div class="box box-primary" >
    <div class="box-header with-border">
        <h3 class="box-title"><b>ADD LIST</b></h3>
        <h3 class="box-title" style="float: right"><b><p id="time"></p></b></h3>
    </div>
    <form name= "form1" role="form" class="form-horizontal" >

        <div class="box-body" >

            <input type="hidden" id="tmpno" class="form-control">

            <input type="hidden" id="item_count" class="form-control">

            <div class="row">


             <!--======================-->

             <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD DIAGNOSIS</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="investi_name" list="myBrand" name="investi_name" class="form-control marg" required="" placeholder="ADD DIAGNOSIS"> 

                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('investi')">
                                ADD
                            </button> 
                        </div>

                    </div>

                    <div class="row" >

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>DIAGNOSIS</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "select * from investigation where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {

                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  

                                                <td><input value="<?php echo $row["name"] ?>" type="text" id="name"   disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>

                                                <td>
                                                    <button   onclick="remove_add('<?php echo $row["id"]; ?>','investi')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                </td> 
                                            </tr> 

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>


            <!--========================-->
            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD COMPLAIN</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="complain_name" list="myBrand" name="complain_name" class="form-control marg" required="" placeholder="ADD COMPLAIN"> 

                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('complain')">
                                ADD
                            </button> 
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>COMPLAIN</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "select * from complain where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {

                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  

                                                <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>

                                                <td>
                                                    <button   onclick="remove_add('<?php echo $row["id"]; ?>','complain')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                </td> 
                                            </tr> 

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>

            <!--===============================-->

        </div>


        <!--===========================================================================-->


        <div class="row">

            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD ALLERGY</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="allergy_name" list="myBrand" name="allergy_name" class="form-control marg" required="" placeholder="Allergy Name"> 

                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('allergy')">
                                Add
                            </button> 
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>ALLERGY</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "select * from allergy where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {

                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  

                                                <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>

                                                <td>
                                                    <button   onclick="remove_add('<?php echo $row["id"]; ?>','allergy')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                </td> 
                                            </tr> 

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
            <!--================-->
            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD MEDICAL/SERGICAL HISTORY</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="s_diag" list="myBrand" name="s_diag" class="form-control marg" required="" placeholder="ADD MEDICAL/SERGICAL HISTORY"> 
                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('s_diag')">
                                Add
                            </button> 
                        </div>
                    </div>

                    <div class="row">

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>MEDICAL/SERGICAL HISTORY</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "select * from s_diagnosis where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {
                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  
                                             <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>
                                             <td>
                                                <button   onclick="remove_add('<?php echo $row["id"]; ?>','s_diag')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                            </td> 
                                        </tr> 
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <!--======================-->
    </div>
    
    <!--===========================================================================-->


        <div class="row">

            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD GENERAL</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="general_name" list="myBrand" name="general_name" class="form-control marg" required="" placeholder="ADD GENERAL"> 

                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('general')">
                                Add
                            </button> 
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>GENERAL</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "select * from general where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {

                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  

                                                <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>

                                                <td>
                                                    <button   onclick="remove_add('<?php echo $row["id"]; ?>','general')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                </td> 
                                            </tr> 

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
            <!--================-->
            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD LUNGS</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="lungs_name" list="myBrand" name="lungs_name" class="form-control marg" required="" placeholder="ADD LUNGS"> 
                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('lungs')">
                                Add
                            </button> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          
                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>LUNGS</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "select * from lungs where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {
                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  
                                               <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>
                                               <td>
                                                <button   onclick="remove_add('<?php echo $row["id"]; ?>','lungs')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                            </td> 
                                        </tr> 
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <!--======================-->
    </div>
    
    
    
    <!--===========================================================================-->


        <div class="row">

            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">ADD ABDOMEN</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="abdomen_name" list="myBrand" name="abdomen_name" class="form-control marg" required="" placeholder="ADD ABDOMEN"> 

                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('abdomen')">
                                Add
                            </button> 
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          

                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>ABDOMEN</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "select * from abdomen where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {

                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  

                                                <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>

                                                <td>
                                                    <button   onclick="remove_add('<?php echo $row["id"]; ?>','abdomen')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                                </td> 
                                            </tr> 

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
            <!--================-->
            <div class="col-sm-5"  >
                <div id="msg_box"  class="span12 text-center"  ></div>
                <h4 style="margin-top: 30px; ">CNS</h4>
                <div id="msg_box"  class="span12 text-center"  ></div>
                <br> 
                <center>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input value="" type="text" id="cns_name" list="myBrand" name="cns_name" class="form-control marg" required="" placeholder="CNS"> 
                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="add('cns')">
                                Add
                            </button> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" style="margin-top: 45px; height:300px; width: 90%;overflow:auto;">          
                            <div id="table_row">
                                <!--table data--> 
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr> 

                                            <th>CNS</th>  
                                            <th>#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "select * from cns where cancel='0' order by id desc";
                                        foreach ($conn->query($sql) as $row) {
                                            $tb_row++;
                                            ?>  
                                            <tr id="row">  
                                               <td><input value="<?php echo $row["name"] ?>" type="text" id="name"  disabled  name="name" class="form-control marg" required placeholder="Category Name" ></td>
                                               <td>
                                                <button   onclick="remove_add('<?php echo $row["id"]; ?>','cns')"type="button" class="btn btn-danger btnDelete btn-sm">Remove</button>
                                            </td> 
                                        </tr> 
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <!--======================-->
    </div>
</div>
</div>
</form>
</div>

</section> 

<script src="js/category_master.js" type="text/javascript"></script>

<script>
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {

        var d = new Date();
//        var dd = d.toLocaleDateString();
var tt = d.toLocaleTimeString();
document.getElementById("time").innerHTML = tt;
}

</script>
