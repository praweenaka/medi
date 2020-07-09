<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Nationality</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <a onclick="edit();" class="btn btn-warning hidden btn-sm ">
                        <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                    </a>       
                    <a onclick="delete1();" class="btn btn-danger hidden btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>
                    <a onclick="NewWindow('search_item_master_file.php?stname=Master', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="print();" class="btn btn-primary hidden btn-sm" >
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


                <div class="col-md-12">
                   <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Item Ref</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="item_ref" class="form-control  input-sm" disabled="">
                        </div>

                    </div>
                   
                   
                   
                   
                  
                     
                   
                   <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Item Name</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder=""  id="item_name" class="form-control  input-sm">
                        </div>

                    </div>
                   
                   
                   
                   <div class="form-group"></div>
                       <div class="col-sm-3">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                            <!--hidden-->
                        </div>
                   
                   
<!--                         <div class="col-sm-12">
                    <div id="itemdetails" >
                        <div id="getTable">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Rec No</th>
                                        <th style="width: 20%;">Product Code</th>
                                        <th style="width: 40%;">Product Description</th>
                                        <th style="width: 20%;">Quantity</th>
                                        <th style="width: 10%;">UOM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Rec No" id="rec_no" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Product Code"  id="product_code" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="Product Description"  id="product_description" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="Quantity"  id="quantity" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="UOM"  id="umo" class="form-control input-sm">
                                        </td>
                                        <td><a onclick="add_tmp();" class="btn btn-default btn-sm"> <span class="fa fa-plus"></span> &nbsp; </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>-->
                   
                   
<!--                   <div>
                   

<div class="form-group">

                    <label class="col-sm-2 labelColour input-sm" >Supplier</label>
                    <div class="col-sm-2 form-group-sm">
                        //<?php
//                        echo"<select id = \"supplier\" class =\"form-control input-sm\">";
//                        $sql = "select * from good_return_note_entry";
//                        foreach ($conn->query($sql) as $row) {
//                            echo "<b><option value='" . $row["supplier"] . "'>" . $row["supplier"] . "</option></b>";
//                        }
//                        echo"</select>";
//                        ?>
                    </div>
                </div>


                </div>    -->

<!--  <div class="col-sm-12">
                    <div id="itemdetails" >
                        <div id="getTable">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Rec No</th>
                                        <th style="width: 20%;">Product Code</th>
                                        <th style="width: 40%;">Product Description</th>
                                        <th style="width: 20%;">Quantity</th>
                                        <th style="width: 10%;">UOM</th>
                                        <th style="width: 10%;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Rec No" id="rec_no" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Product Code"  id="product_code" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="Product Description"  id="product_description" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="Quantity"  id="quantity" class="form-control input-sm">
                                        </td>
                                        <td>
                                            <input  type="text" placeholder="UOM"  id="umo" class="form-control input-sm">
                                        </td>
                                        <td><a onclick="add_tmp();" class="btn btn-default btn-sm"> <span class="fa fa-plus"></span> &nbsp; </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>-->

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/nationality.js"></script>


<script>newent();</script>




