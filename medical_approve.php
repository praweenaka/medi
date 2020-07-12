<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Medical Approve</h3>
        </div>
        <form role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="uniq" class="form-control">

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Medical No</th>
                                <th>Customer</th>
                                <th>Nic</th>
                                <th>Treatment</th>  
                                <th></th>  
                            </tr>
                        </thead>
                        <p id="demo" ></p>
                        <tbody>
                            <?php
                            include './connection_sql.php';
                            $sql = "select * from medical where cancel='0' and flag='0' order by  sdate";
                            foreach ($conn->query($sql) as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['medino']; ?></td>
                                    <td><?php echo $row['cus_code']; ?></td> 
                                    <td><?php echo $row['nic']; ?></td> 
                                    <td><?php echo $row['treatment']; ?></td> 
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" onclick="itemapprove(<?php echo $row['id']; ?>);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Approve</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" onclick="itemdele(<?php echo $row['id']; ?>);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Cancel</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </form>
    </div>

</section>

<!--<script src="js/newitem.js"></script>-->
<script>

    function itemdele(cdate) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "newitem_data.php";
        url = url + "?Command=" + "itemdel";
        url = url + "&id=" + cdate;

        xmlHttp.onreadystatechange = item_del;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }
    function itemapprove(cdate) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "newitem_data.php";
        url = url + "?Command=" + "itemapprove";
        url = url + "&id=" + cdate;

        xmlHttp.onreadystatechange = item_del;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }

    function item_del() {

        var XMLAddress1;

        if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
            setTimeout("location.reload(true);", 500);
        }
    }
</script>