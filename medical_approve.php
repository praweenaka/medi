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
                                <th>MEDICAL NO</th>
                                <th>PATIENT</th>  
                                <th>COMPALIN</th>
                                <th>DIAGNOSIS</th> 
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
                                    <td><?php echo $row['cusname']; ?></td>    
                                    <td><input type="text" class="form-control" disabled value="<?php echo $row['complain']; ?>"/></td>
                                    <td><input type="text" class="form-control" disabled value="<?php echo $row['investi']; ?>"/></td> 
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="edit(<?php echo $row['id']; ?>,$ab);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" onclick="approve(<?php echo $row['id']; ?>);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Approve</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" onclick="dele(<?php echo $row['id']; ?>);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Cancel</button>
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

<!--<script src="js/medical_approve.js"></script>-->
<script>

    function edit(cdate,ab) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        var url = "medical_approve_data.php";
        var params ="Command="+"edit";    
        params = params + "&id=" + cdate;
        // alert(ab);
         xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=item_del;
			
	xmlHttp.send(params);  

    }
    
    function dele(cdate) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        
        var msg = confirm("Do you want to CANCEL this ! ");
        if (msg == true) {
        var url = "medical_approve_data.php";
        var params ="Command="+"del";    
        params = params + "&id=" + cdate;
        
         xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=item_del;
			
	xmlHttp.send(params);  

    }
    }
    function approve(cdate) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "medical_approve_data.php";
        var params ="Command="+"approve";    
        params = params + "&id=" + cdate;
        
         xmlHttp.open("POST", url, true);

	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	
	xmlHttp.onreadystatechange=item_del;
			
	xmlHttp.send(params); 

    }

    function item_del() {

        var XMLAddress1;

        if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
            alert(xmlHttp.responseText);
            setTimeout("location.reload(true);", 500);
        }
    }
</script>

<script>
    // setTimeout(function () {
    //     location.reload()
    // }, 9000);

</script>