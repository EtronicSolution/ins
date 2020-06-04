<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/functions.php';
include_once 'data/database.php';
include_once './data/data_currency_list.php';

if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
if ($error == 1) {
    echo '<script>  swal("Sucessfully Added", "Please Navigate to Exit", "success");</script>';
}
if ($error == 2) {
    echo '<script>  swal("Please Eneter Currency Name", "Try Agin!", "error");</script>';
}
if ($error == 3) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 4) {
    echo '<script>  swal("Something Went Wrong", "Please Navigate to Exit", "Warning");</script>';
}
if ($error == 5) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 6) {
    echo '<script>  swal("Currency Name already taken", "Please try again !", "error");</script>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">



    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary" style="text-transform: uppercase;">Currency Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Currency Detail</li>
            </ol>
        </div>
    </div>

    <div class="col-lg-12">

        <div class="box-body">
            <div class="card">

                <div class="card-title">

                    <?php
                    if ($cp_id != '') {
                        echo '<h2>Update ' . $row['cu_name'] . '</h2>';
                    } else {
                        echo '<h2>Add New Comapany</h2>';
                    }
                    ?>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="box-body">

                                <form   action="data/register_currency.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="update_members" >

                                    <?php
                                    if ($cu_id == 0) {

                                        echo '<input type="hidden" name="action" value="register">';
                                        echo '<input type="hidden" name="cu_created_by" value="' . $_SESSION['login'] . '">';
                                    } else {

                                        echo ' <input type="hidden" name="action" value="update">';
                                        echo ' <input type="hidden" name="cu_id" value="' . $cu_id . '">';
                                        echo '<input type="hidden" name="cu_updated_by" value="' . $_SESSION['login'] . '">';
                                    }
                                    ?>

                                    <div class="form-group row">
                                        <label for="cu_name" class="col-sm-2 col-form-label">Currency Name</label>
                                        <div class="col-sm-10">
                                            <input type="text"    class="form-control" id="cu_name"  name="cu_name" placeholder="Currency Name" value="<?php echo $row['cu_name']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cu_rate" class="col-sm-2 col-form-label">Currency Rate</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="cu_rate"  name="cu_rate" placeholder="Currency Rate" value="<?php echo $row['cu_rate']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cu_withdraw_rate" class="col-sm-2 col-form-label">Withdraw Rate</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cu_withdraw_rate" name="cu_withdraw_rate" placeholder="Withdraw Rate" value="<?php echo $row['cu_withdraw_rate']; ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text"  id="cu_bank" name="cu_bank" class="form-control " placeholder="Bank" value="<?php echo $row['cu_bank'] ?>">
                                        </div>
                                    </div>

                                    <div  class="col-lg-12 col-md-12 form-group ">
                                        <div class="col-lg-6 col-md-6 form-group" >
                                            <br>
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group ">
                                            <div class="row">

                                                <?php if ($cu_id == 0) { ?>

                                                    <div class="col-lg-6 col-md-6 form-group">
                                                        <button type="submit" name="add_new_Submit" class="btn btn-block btn-danger">Add New</button>
                                                    </div>
                                                <?php } else { ?>

                                                    <div class="col-lg-6 col-md-6 form-group">
                                                        <button type="submit" class="btn btn-block btn-success">Update Now</button>
                                                    </div>

                                                <?php } ?>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <button type="reset" class="btn btn-block btn-warning">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#browse_image').on('click', function (e) {
                $('#company_logo').click();
            })
            $('#company_logo').on('change', function (e) {
                var fileInput = this;
                if (fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        </script>


        <script>
            $(document).ready(function () {
                tinymce.init({
                    selector: 'textarea',
                    plugins: "media",
                    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment ',

                });
            });
        </script>

    </div>



    <?php
    require_once 'footer.php';
    ?>
