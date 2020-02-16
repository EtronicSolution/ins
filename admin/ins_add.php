<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/ins_add_data.php';
include_once 'data/functions.php';
include_once 'data/database.php';


if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}


if ($error == 2) {
    echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
}

if ($error == 4) {
    echo '<script>  swal("Nothing  Updated", "Please check", "warning");</script>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">



    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary" style="text-transform: uppercase;">motor insurance details</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Motor</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </div>
    </div>


    <div  class="col-lg-12">



        <div class="box-body">
            <div class="card">

                <div class="card-title">

                        <?php
                        if ($ins_no != '') {
                            echo '<h2>Update ' . $ins_no . '</h2>';
                        } else {

                            echo '<h2>Add New  insurance </h2>';
                        }
                        ?>


                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">


                            <div class="box-body">


                                <?php if ($ins_no != '') { ?>
                                    <form action="data/register_ins.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                        <input type="hidden" name="id" value="<?php echo $iv_ins_id; ?>">
                                        <input type="hidden" name="action" value="update">

                                <?php } else { ?>


                                        <form action="data/register_ins.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                                            <input type="hidden" name="action" value="register">

                                <?php } ?>


                                        <div class="row form-group">                        
                                            <div class="col-lg-6 col-md-6 form-group">
                                                <div class="user_image">
                                        <?php if ($row['v_ins_main_img'] == '') { ?>
                                                        <img name="v_ins_main_img" id="profile_image"  src="../uploads/profile/avt.png" class="img-circle profile_image" style="max-height:150px;width:auto">
                                        <?php } else { ?>
                                                        <img name="v_ins_main_img" id="profile_image"  src="../uploads/profile/<?= $row['v_ins_main_img']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
                                        <?php } ?>
                                                </div>



                                            </div>
                                        </div>

                                        <div class="input-group">

                                            <input type="file" name="v_ins_main_img" id="user_profile_image" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                            <input type="button" style="width: 100px"value="Browse" id="browse_image" class="btn btn-block btn-success"/>

                                        </div> 
                                        <br>

                                        <div class="row form-group">

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label>Code :</label>
                                                <input type="text" class="form-control" id="v_ins_number" placeholder="insxxxx" name="v_ins_number" value="<?php echo $row['v_ins_number']; ?>" required>                            
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label>Expire Date :</label>
                                                <input type="date" class="form-control" id="expire_date" placeholder="YYY-DD-MM" name="expire_date" value="<?php echo $row['expire_date']; ?>" required>                            
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label> insurance company :</label>

                                                <select class="form-control" name="v_ins_comapany" id="v_ins_comapany">
                                                    <?php
                                                    $database->loadAllCompanies($row['v_ins_comapany']);
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label> Select Policy :</label>

                                                <select class="form-control" name="v_ins_policy" id="v_ins_policy">
                                                    <?php
                                                         $database->loadAllPolicy($row['v_ins_policy']);
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label> Select Customer :</label>

                                                <select class="form-control" name="v_ins_member_id" id="v_ins_policy" required> 
                                                    <?php
                                                            $database->loadUsers($row['v_ins_member_id']);
                                                    ?>
                                                </select>
                                            </div>


                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label> Select Car :</label>

                                                <select class="form-control" name="v_ins_car_no" id="v_ins_policy">
                                                        <?php
                                                                 $database->loadAllCars($row['v_ins_car_no']);
                                                        ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                <label> Price :</label>
                                                 <input type="text" class="form-control" id="v_ins_price" placeholder="Price" name="v_ins_price" value="<?php echo $row['v_ins_price']; ?>" required>  
                                            </div>


                                        </div>



                                        </div>


                                        <div class="row form-group">

                                            <div class="col-lg-12 col-md-6 form-group">
                                                <label>Short Description:</label>
                                                <textarea class="form-control" rows="6" name="v_ins_short_description" id="v_ins_short_description" value="<?php echo $row['v_ins_short_description']; ?>"><?= $row['v_ins_short_description']; ?></textarea>
                                            </div>

                                        </div>	                               



                                        <hr />




                                        <div  class="row form-group">
                                            <div class="col-lg-3 col-md-3 form-group"> 
<?php if ($row['m_id'] != '') { ?>



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



<?php
require_once 'footer.php';
?>
 