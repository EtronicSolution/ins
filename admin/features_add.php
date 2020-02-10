

<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/features_add_data.php';
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

if ($error == 3) {
    echo '<script>  swal("Feature id is already asigned", "Please try agin", "warning");</script>';
}

if ($error == 4) {
    echo '<script>  swal("Nothing  Updated", "Please check", "warning");</script>';
}
?>

<div class="page-wrapper">



    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary" style="text-transform: uppercase;">features</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Motor</a></li>
                <li class="breadcrumb-item active">features</li>
            </ol>
        </div>
    </div>


    <div  class="col-lg-12">



        <div class="box-body">
            <div class="card">

                <div class="card-title">

                    <?php
                    if ($if_id != '') {
                        echo '<h2>Update features ' . $f_id . '</h2>';
                    } else {

                        echo '<h2>Add New  features </h2>';
                    }
                    ?>


                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">


                            <div class="box-body">
                                <form action="data/register_features.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">

                                    <?php if ($f_id != '') { ?>

                                        <input type="hidden" name="id" value="<?php echo $f_id; ?>">
                                        <input type="hidden" name="action" value="update">

                                    <?php } else { ?>
 
                                        <input type="hidden" name="action" value="register">

                                    <?php } ?>




                                    <div class="row form-group">

                                        <div class="col-lg-6 col-md-6 form-group">                  
                                            <label>Code :</label>
                                            <input type="text" class="form-control" id="f_number" placeholder="fexxxx" name="f_number" value="<?php echo $row['f_number']; ?>" required>                            
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group">                  
                                            <label>Expire Date :</label>
                                            <input type="date" class="form-control" id="expire_date" placeholder="YYY-DD-MM" name="expire_date" value="<?php echo $row['expire_date']; ?>" required>                            
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group">                  
                                            <label>Feature Name :</label>
                                            <input type="text" class="form-control" id="f_name" placeholder="Name" name="f_name" value="<?php echo $row['f_name']; ?>" required>                            
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group">                  
                                            <label>Feature Price :</label>
                                            <input  type="number" min="0.00" max="10000.00" step="0.01"  class=" form-control" id="f_price" placeholder="0.00" name="f_price" value="<?php echo $row['f_price']; ?>" required>                            
                                        </div>


                                    </div>



                            </div>


                            <div class="row form-group">

                                <div class="col-lg-12 col-md-6 form-group">
                                    <label>Short Description:</label>
                                    <textarea class="form-control" rows="6" name="short_description" id="short_description" value="<?php echo $row['short_description']; ?>"><?= $row['short_description']; ?></textarea>
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
