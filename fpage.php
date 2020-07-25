<!-- Main content -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<section class="content-header">

    <h1>

        Dashboard

        <small>Home Page</small>

        <b><p  style="float: right; color: black" id="time"></p></b> 

    </h1>



</section>



<section class="content">

    <div class="row">

<!--<div class="col-sm-9">-->

        <?php

        include './connection_sql.php';

        $sql = "select * from view_menu where username ='" . $_SESSION["CURRENT_USER"] . "' and doc_view='1'   order by docid";



        foreach ($conn->query($sql) as $row1) {

            echo"<div class=\"col-lg-4 col-xs-6\">";

            echo"<div class=\"" . $row1['color'] . "\">";

            echo"<div class=\"inner\">";

            echo"<h3 style=\"display: inline-block;
  width: 100%;\"><a href='home.php?url=" . trim($row1['name']) . "' style=\"color: white; font-size:30PX;font-family: Verdana,Sans-serif;\" class=\"small-box-footer\">" . trim($row1['docname']) . "</a></h3></font>";

            

            echo"</div>";

            echo"<div class=\"icon\">";

            echo"<i class=\"" . trim($row1['icon']) . "\"></i>";

            echo"</div>";

            echo"<a href='home.php?url=" . trim($row1['name']) . "'  class=\"small-box-footer\"><i class=\"fa fa-arrow-circle-right\"></i>" . trim($row1['docname']) . "</a>";

            echo"</div>";

            echo"</div>";

        }

        echo "</ul>";

        echo "</li>";

        ?>

    <!--</div>-->
    
    <!--=================-->

</div>
</section>



