<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/vehicles_add_data.php';
include_once 'data/functions.php';
include_once 'data/database.php';


if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

if($error==1){
   echo '<script>  swal("vehicles Number already exist", "Try Agin", "errror");</script>';
    
}
if($error==2){
   echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
    
}

if($error==3){
   echo '<script>  swal("Something Went wrong", "Please Try again", "error");</script>';
    
}

if($error==4){
   echo '<script>  swal("Nothing  Updated", "Please check", "warning");</script>';
    
}


?>

  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    
    
    
     <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary" style="text-transform: uppercase;">Car details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Motor</a></li>
                        <li class="breadcrumb-item active">Cars</li>
                    </ol>
                </div>
            </div>
    
    
 <div  class="col-lg-12">
     
 

<div class="box-body">
<div class="card">
    
        <div class="card-title">
            
                                <?php if($v_id!=''){
                                    
                                    
                                    echo '<h2>Update '.$row['v_number'].'</h2>';
                                    
                                    
                                }else{
                                    
                                     echo '<h2>Add New  Car </h2>';
                                }
                               
                                ?>

        
        </div>
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
            
        
            <div class="box-body">
	
			
<?php
 if($v_id != ''){ ?>
                <form action="data/register_vehicles.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="v_id" value="<?php echo $v_id; ?>">
                <input type="hidden" name="action" value="update">
                                
            <?php }else{  ?>
                
                
                <form action="data/register_vehicles.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="action" value="register">
                
            <?php }?>
			
                
                  
                 
				<div class="row form-group">
                                    
                                    
                                     <div class="col-lg-6 col-md-6 form-group">                  
						<label>Car Number :</label>
                                                <input type="text" class="form-control" id="v_number"  name="v_number" autocomplete="on"  value="<?php echo $row['v_number'] ; ?>" required>                            
				     </div>
					
                                     <div class="col-lg-6 col-md-6 form-group">                  
                                                          <label>Owner :</label>

                                                          <select class="form-control" name="member_id" id="member_id">
                                                                    <?php                                                             
                                                                       $database->loadUsers($row['member_id']);
                                                                    ?>
                                                         </select>
                                     </div>
                                 
				</div>
                                    
                                <hr>
				
				<div class="row form-group">
                                       
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Make :</label>
						<input type="text" class="form-control" id="make" placeholder="Make" name="make" value="<?php echo $row['make'] ; ?>" required>                            
					</div>
                               
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Model :</label>
                                                <input type="text" class="form-control" id="model" placeholder="Model" name="model" value="<?php echo $row['model']; ?>" required>                            
					</div>
                                    
                                   <div class="col-lg-6 col-md-6 form-group">                  
						<label>Date of Manufacture :</label>
                                                <input type="<?php if($row['m_id']==''){echo "date";}else{echo "text";} ?>" class="form-control date" id="make_date" placeholder="YYYY-MM-DD" name="make_date" value="<?php echo $row['make_date']; ?>" >                            
					</div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label >color :</label>
						
                                                <input type="color" class="form-control" id="color" placeholder="Phone" name="color" value="<?php echo $row['color']; ?>"> 						
					</div>

				</div>
				
				<div class="row form-group">
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>CC :</label>
						<input type="text" id="cc" autocomplete="off" name="cc" class="form-control" placeholder="Capacity"  value="<?php echo $row['cc']; ?>" >                            
					</div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label>Market Value :</label>
                                                <input type="number" id="v_price" autocomplete="off" name="v_price" class="form-control" placeholder="Markert Value"  value="<?php echo $row['v_price']; ?>" >                            
					</div>
                                    
				</div>
				 
                                <hr style="color: white" /> 
				
				  <div class="row form-group">
                                         <div class="col-lg-12 col-md-6 form-group">
                                                <label>Short Description:</label>
                                                <textarea class="form-control" rows="6" name="short_description" id="short_description" value="<?php echo $row['short_description']; ?>"><?= $row['short_description']; ?></textarea>
                                            </div>
                                    
                                </div>	 
				
                                 <div class="row form-group">						
				<div class="col-lg-6 col-md-6 form-group align-self-center">
                                    
                                    <label>Image 1 :</label>
					<div class="user_image">
					<?php if($row['image1'] == ''){ ?>
                                            <img name="image1" id="image1"  src="../images/car1.png" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } else { ?>
                                                <img name="image1" id="image1"  src="../uploads/cars/<?= $row['image1']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } ?>
					</div>
                                    
                                    <br>
                                    
                                    <input type="file" name="image1_file" id="image1_file" class="form-control"   aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                     <input type="button" style="width: 100px"value="Browse" id="browse_image1" class="btn btn-block btn-success"/>

					
				</div>
                                     
                                     <div class="col-lg-6 col-md-6 form-group align-self-center">
                                          <label>Image 2 :</label>
					<div class="user_image">
					<?php if($row['image2'] == ''){ ?>
                                            <img name="image2" id="image2"  src="../images/car2.png" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } else { ?>
                                                <img name="image2" id="image2"  src="../uploads/cars/<?= $row['image2']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } ?>
					</div>
                                    
                                    <br>
                                    
                                    <input type="file" name="image2_file" id="image2_file" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                     <input type="button" style="width: 100px"value="Browse" id="browse_image2" class="btn btn-block btn-success"/>

					
				</div>
                                     
                                       <div class="col-lg-6 col-md-6 form-group align-self-center">
                                            <label>Image 3 :</label>
					<div class="user_image">
					<?php if($row['image3'] == ''){ ?>
                                            <img name="image3" id="image3"  src="../images/car3.png" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } else { ?>
                                                <img name="image3" id="image3"  src="../uploads/cars/<?= $row['image3']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } ?>
					</div>
                                    
                                    <br>
                                    
                                    <input type="file" name="image3_file" id="image3_file" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                     <input type="button" style="width: 100px"value="Browse" id="browse_image3" class="btn btn-block btn-success"/>

					
				</div>
                                     
                                          <div class="col-lg-6 col-md-6 form-group align-self-center">
                                               <label>Image 4 :</label>
					<div class="user_image">
					<?php if($row['image4'] == ''){ ?>
                                            <img name="image4" id="image4"  src="../images/car4.png" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } else { ?>
                                                <img name="image4" id="image4"  src="../uploads/cars/<?= $row['image4']; ?>" class="img-circle profile_image" style="max-height:150px;width:auto">
					<?php } ?>
					</div>
                                    
                                    <br>
                                    
                                     <input type="file" name="image4_file" id="image4_file" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend" style="display: none;align-content: center" />
                                     <input type="button" style="width: 100px"value="Browse" id="browse_image4" class="btn btn-block btn-success"/>

					
				</div>
                                     
                                   
			    </div>                               
                                 
                                                             
                      
	
				
				<hr />
                                
                       


              <div  class="row form-group">
                <div class="col-lg-3 col-md-3 form-group"> 
                <?php if($v_id!=''){?>
                    
                    
                
                <button type="submit" class="btn btn-block btn-success">Update Now</button>
                <?php }else{?>
                
                
                <button type="submit" class="btn btn-block btn-danger">Add New</button>
                
                <?php }?>
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
    $('#browse_image1').on('click', function(e){
        
        $('#image1_file').click();
    })
    $('#image1_file').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image1').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

</script>

  <script>
    $('#browse_image2').on('click', function(e){
        
        $('#image2_file').click();
    })
    $('#image2_file').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image2').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

</script>    
  <script>
    $('#browse_image3').on('click', function(e){
        
        $('#image3_file').click();
    })
    $('#image3_file').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image3').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

</script>

  <script>
    $('#browse_image4').on('click', function(e){
        
        $('#image4_file').click();
    })
    $('#image4_file').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image4').attr('src', e.target.result);
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
 