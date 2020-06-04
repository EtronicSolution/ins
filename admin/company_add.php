<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/functions.php';
include_once 'data/database.php';
include_once './data/company_add_data.php';
if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
if ($error == 1) {
    echo '<script>  swal("Sucessfully Added", "Please Navigate to Exit", "success");</script>';
}
if ($error == 2) {
    echo '<script>  swal("Please Eneter Company Name", "Try Agin!", "error");</script>';
}
if ($error == 3) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 4) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 5) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 6) {
    echo '<script>  swal("Company Name already taken", "Please try again !", "error");</script>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">



    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary" style="text-transform: uppercase;"><?= $row['cp_name'] ?> Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
                <li class="breadcrumb-item active"><?= $row['cp_name'] ?> Detail</li>
            </ol>
        </div>
    </div>


    <div class="col-lg-12">



        <div class="box-body">
            <div class="card">

                <div class="card-title">

                    <?php
                    if ($cp_id != '') {
                        echo '<h2>Update ' . $row['cp_name'] . '</h2>';
                    } else {
                        echo '<h2>Add New Comapany</h2>';
                    }
                    ?>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="box-body">

                                <?php if ($cp_id != '') { ?>
                                    <form action="data/register_company.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                        <input type="hidden" name="id" value="<?php echo $cp_id; ?>">
                                        <input type="hidden" name="action" value="update">

                                    <?php } else {
                                        ?>


                                        <form action="data/register_company.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                            <input type="hidden" name="action" value="register">

                                        <?php }
                                        ?>
                                        <div class="row form-group">
                                            <div class="col-lg-6 col-md-6 form-group">
                                                <div class="user_image">
                                                    <?php if ($row['cp_logo'] == '') { ?>
                                                        <img name="cp_logo" id="profile_image" src="../images/company.jpg" class="img-responsive profile_image" style="max-height:150px;width:auto">
                                                    <?php } else {
                                                        ?>
                                                        <img name="cp_logo" id="profile_image" src="<?= $row['cp_logo']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group">

                                            <input type="file" name="company_logo" id="company_logo" class="form-control" placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                            <input type="button" style="width: 100px" value="Browse" id="browse_image" class="btn btn-block btn-success" />

                                        </div>

                                        <br>

                                        <div class="row form-group">
                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company Name :</label>
                                                <input type="text" class="form-control" id="cp_name" placeholder="Company Name" name="cp_name" value="<?php echo $row['cp_name']; ?>" title="Enter a valid Name">
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company Address :</label>
                                                <input type="text" class="form-control" id="cp_address" placeholder="Address" name="cp_address" value="<?php echo $row['cp_address']; ?>" title="Enter a valid Address">
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company Registered Day :</label>
                                                <input type="<?php
                                                if ($row['cp_id'] == '') {
                                                    echo "date";
                                                } else {
                                                    echo "text";
                                                }
                                                ?>" class="form-control date" id="cp_registter_day" placeholder="YYYY-MM-DD" name="cp_registter_day" value="<?php echo $row['cp_registter_day']; ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company Phone :</label>

                                                <input type="text" class="form-control" id="cp_phone" placeholder="Phone" name="cp_phone" value="<?php echo $row['cp_phone']; ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company E-Mail :</label>

                                                <input type="email" class="form-control" id="cp_email" placeholder="E-mail" name="cp_email" value="<?php echo $row['cp_email']; ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company code :</label>

                                                <input type="text" class="form-control" id="cp_code" placeholder="Code" name="cp_code" value="<?php echo $row['cp_code']; ?>">
                                            </div>

                                            <div class="col-lg-12 col-md-6 form-group">
                                                <label>Short Description:</label>
                                                <textarea class="form-control" rows="6" name="cp_detail" id="cp_detail" value="<?php echo $row['cp_detail']; ?>"><?= $row['cp_detail']; ?></textarea>
                                            </div>

                                        </div>



                                        <div class="row form-group">
                                            <div class="col-lg-3 col-md-3 form-group">
                                                <?php if ($row['cp_id'] != '') { ?>
                                                    <button type="submit" class="btn btn-block btn-primary">Update Now</button>
                                                <?php } else {
                                                    ?>
                                                    <button type="submit" class="btn btn-block btn-danger">Add New</button>
                                                <?php }
                                                ?>

                                            </div>

                                            <div class="col-lg-3 col-md-3 form-group">
                                                <button type="reset" class="btn btn-block btn-warning">Reset</button>
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