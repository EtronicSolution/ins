<?php
include_once './header.php';
include_once './sidebar.php';
include_once 'data/members_add_data.php';
include_once 'data/functions.php';
include_once 'data/database.php';


if (!empty($_GET['error'])) {
    $error = $_GET['error']; 
} else {
    $error = '';
}

if (!empty($_GET['type'])) {
    $type = $_GET['type'];
} else {
    $type = '';
}

if($error==2){
   echo '<script>  swal("Sucessfully Updated", "Please Navigate to Exit", "success");</script>';
    
}

if($error==4){
   echo '<script>  swal("Nothing  Updated", "Please check", "warning");</script>';
    
}


?>

  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
    
    
    
     <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary" style="text-transform: uppercase;"><?=$m_type?> Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?=$m_type?> Group</a></li>
                        <li class="breadcrumb-item active"><?=$row['m_type']?>  Detail</li>
                    </ol>
                </div>
            </div>
    
    
 <div  class="col-lg-12">
     
 

<div class="box-body">
<div class="card">
    
        <div class="card-title">
            
                                <?php if($user_id!=''){
                                    
                                    
                                    echo '<h2>Update '.$row['m_type'].'</h2>';
                                    
                                    
                                }else{
                                    
                                     echo '<h2>Add New '.$m_type.'</h2>';
                                }
                               
                                ?>

        
        </div>
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
            
        
            <div class="box-body">
			
			<?php if($error != '') { ?>
			<div class="row">
                <div class="col-md-12 col-md-12" id="error_display">
                    <?php
                    
                    if($error == '2'){
                        echo "Please fill-in all the required fields";
                    } else if($error == '1'){
                       echo "Username already registered "; 
                    } else if($error == '3'){
					  echo "Username can only be alphabets & numbers "; 
					} else if($error == '4'){
					  echo "Please upload only image file";	
					}
                    
                    ?>
                </div>
              </div>  
            <?php } ?>
			
			<?php
 if($type == 'new'){ ?>
                <form action="data/register_policy.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="action" value="register">
                                
            <?php }else{  ?>
                
                
                <form action="data/register_members.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="m_type" value="<?=$m_type?>">
            <?php }?>

                

                    <br>
				<div class="row form-group">
                                    
                                    
					<div class="col-lg-12 col-md-12 form-group">
						<label>Policy Topic :</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Topic" name="topic" value="<?php echo $row['m_username']; ?>" required>
					</div>

                    <div class="col-lg-12 col-md-12 form-group">
						<label>Content :</label>
                        <textarea class="form-control" name="content" autocomplete="off" required></textarea>
				     </div>

                    <div class="col-lg-6 col-md-6 form-group">
                        <label>Company :</label>

                        <select class="form-control" name="company" id="user_member_reference">
                            <?php
                            $database->loadAllCompanies($row['m_upline']);
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <label>Price :</label>

                        <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $row['m_username']; ?>" required>

                    </div>
				</div>
                                    

              <div  class="row form-group">
                <div class="col-lg-3 col-md-3 form-group"> 
                <?php if($row['m_id']!=''){?>
                    
                    
                
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
    $('#browse_image').on('click', function(e){
        
        $('#user_profile_image').click();
    })
    $('#user_profile_image').on('change', function(e){
        var fileInput = this;
        if(fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#profile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

</script>      
      
  
  </div>

 

 <?php

require_once 'footer.php';
 

?>
 