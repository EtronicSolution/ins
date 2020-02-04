<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/policy_add_data.php';
include_once 'data/functions.php';
include_once 'data/database.php';
if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
if (!empty($_GET['p_type'])) {
    $p_type = $_GET['p_type'];
} else {
    $p_type = '';
}
if ($error == 2) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}
if ($error == 4) {
    echo '<script>  swal("Policy code already registerd", "Please check", "error");</script>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">



    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary" style="text-transform: uppercase;">Car Policy</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Car</a></li>
                <li class="breadcrumb-item active">Policy</li>
            </ol>
        </div>
    </div>


    <div  class="col-lg-12">



        <div class="box-body">
            <div class="card">

                <div class="card-title">

                    <?php
                if ($p_id != '') {
                    echo '<h2>Update Policy ' . $row['p_name'] . '</h2>';
                } else {
                    echo '<h2>Add New Policy </h2>';
                }
                ?>


                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">


                            <div class="box-body">



                                        <?php if ($p_id == '') { ?>
                                        <form action="data/register_policy.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                        <input type="hidden" name="action" value="register">

                                         <?php} else { ?>
                                          <form action="data/register_members.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                                                                    <input type="hidden" name="action" value="register">
                                                                                    <input type="hidden" name="p_id" value="<?=$p_id?>">
                                        <?php } ?>



                                        <br>
                                        <div class="row form-group">
                                            
                                            <div class="col-lg-6 col-md-12 form-group">
                                                <label>Policy Code :</label>
                                                <input type="text" class="form-control" id="p_code" placeholder="Policy Name" name="p_code" value="<?php echo $row['p_code']; ?>" required>
                                            </div>



                                            <div class="col-lg-6 col-md-12 form-group">
                                                <label>Policy Name :</label>
                                                <input type="text" class="form-control" id="p_name" placeholder="Policy Name" name="p_name" value="<?php echo $row['p_name']; ?>" required>
                                            </div>



                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Company :</label>

                                                <select class="form-control" name="p_by_company" id="p_by_company" required>
                                                        <?php
                                                            $database->loadAllCompanies($row['p_by_company']);
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Price :</label>

                                                <input type="number" class="form-control" placeholder="Price" name="p_price" value="<?php echo $row['p_price']; ?>" required>

                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">
                                                <label>Register Date :</label>

                                                <input type="<?php if ($row['p_register_date'] == '') { echo "date"; } else { echo "text"; } ?>" class="form-control" placeholder="Registor Date" name="p_register_date" value="<?php echo $row['p_register_date']; ?>" required>

                                            </div>

                                            <div class="col-lg-12 col-md-12 form-group">
                                                <label>Content :</label>
                                                 <textarea class="form-control" rows="6" name="p_detail" id="p_detail" value="<?php echo $row['p_detail']; ?>"><?= $row['p_detail']; ?></textarea>
                                                </div>                  
                                        </div>


                                        <div  class="row form-group">
                                            <div class="col-lg-3 col-md-3 form-group"> 
                                                <?php if ($row['p_id'] != '') { ?>



                                                    <button type="submit" class="btn btn-block btn-success">Update Now</button>
                                                <?php } else { ?>


                                                    <button type="submit" class="btn btn-block btn-danger">Add New</button>

                                                <?php } ?>
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

                $('#user_profile_image').click();
            })
            $('#user_profile_image').on('change', function (e) {
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



</div>



<?php
require_once 'footer.php';
?>
