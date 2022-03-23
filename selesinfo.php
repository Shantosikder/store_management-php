<?php

session_start();
if ($_SESSION['login'] != true) {
    header("Location:login.php");
}


include('php/db_config.php');

$sql= "SELECT * FROM sales";
$data=$db->query($sql);



include('layout/header.php') ?>


<!-- Left side column. contains the logo and sidebar -->
<?php include('layout/sideber.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sales Product Info
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Customer Name </th>
                                <th>Product Name </th>
                                <th>Salling Price </th>
                                <th>Quantity </th>
                                <th>Total </th>
                                <th>Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $data->fetch_object()) {  ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>

                                    <?php
                                    $productData = $db->query("SELECT * FROM customar WHERE id = $row->customer_id LIMIT 1");
                                    while ($prow = $productData->fetch_object()) {
                                    ?>
                                        <td><?php echo $prow->name; ?></td>
                                    <?php } ?>

                                    <?php
                                    $productData = $db->query("SELECT * FROM product WHERE id = $row->product_id LIMIT 1");
                                    while ($prow = $productData->fetch_object()) {
                                    ?>
                                        <td><?php echo $prow->name; ?></td>
                                    <?php } ?>

                                   
                                    <td><?php echo $row->selling_price; ?></td>
                                    <td><?php echo $row->quantity; ?></td>
                                    <td><?php echo $row->total; ?></td>
                                    <td><?php echo $row->date; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('layout/footer.php'); ?>

<script>
    
    $(function () {



});

</script>