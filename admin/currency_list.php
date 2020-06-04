<?php
include_once './header.php';
include_once './sidebar.php';
include_once './data/data_currency_list.php';
?>

<?php
if (isset($_GET['error'])) {
    $error = base64_decode($_GET['error']);
    echo '<script>  error_by_code(' . $error . ');</script>';
}
?>    
<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    <!-- Main content -->

    <!-- /.Tab content -->
    <section >
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary" style="text-transform: uppercase;">CURRENCY LIST</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Currency List</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-transform: uppercase;">Currency LIST</h4>

                            <div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block  btn-danger" onclick="location.href = 'currency.php'">Add New Currency</button>
                                </div>
                            </div>

                            <div class="table-responsive m-t-40">
                                
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name </th>
                                        <th>Rate</th>
                                        <th>Withdrawal Rate </th>
                                        <th style="width:3%; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name </th>
                                        <th>Rate</th>
                                        <th>Withdrawal Rate </th>
                                        <th style="width:3%; text-align: center;">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><a href="currency.php?cu_id=<?php echo $row['cu_id']; ?>"><?php echo $row['cu_name']; ?></a></td>
                                            <td><?php echo $row['cu_rate']; ?></td>
                                            <td><?php echo $row['cu_withdraw_rate']; ?></td>
                                            <td>
                                                <?php if ($row['cu_status'] == '1') { ?><button type="button" id="btnm<?php echo $row['cu_id']; ?>" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?php echo $row['cu_id']; ?>', 'cu', 'cu_id', '0');"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                <?php } else { ?>
                                                    <button type="button" id="btnm<?php echo $row['cu_id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?php echo $row['cu_id']; ?>', 'cu', 'cu_id', '0');"><i class="fa fa-check "  ></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                            </td>   
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
<!-- ./wrapper -->
</body>
</html>
