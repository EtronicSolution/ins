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
            
                                <?php if($ins_no!=''){
                                    
                                    
                                    echo '<h2>Update '.$ins_no.'</h2>';
                                    
                                    
                                }else{
                                    
                                     echo '<h2>Add New  insurance </h2>';
                                }
                               
                                ?>

        
        </div>
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">
            
        
            <div class="box-body">
	
			
<?php
 if($ins_no != ''){ ?>
                <form action="data/register_ins.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="id" value="<?php echo $ins_no; ?>">
                <input type="hidden" name="action" value="update">
                                
            <?php }else{  ?>
                
                
                <form action="data/register_ins.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_members">
                <input type="hidden" name="action" value="register">
                
            <?php }?>
			
                
                  
                 
				<div class="row form-group">
                                    
                                    
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
                                                                       $database->loadAllCompanies($row['v_ins_policy']);
                                                                    ?>
                                                         </select>
                                          </div>
                                  
                                     
                                    
                                    <?php if($row['m_type']=='user'){ ?>
                                            <div class="col-lg-6 col-md-6 form-group">                  
                                                          <label>Refer By :</label>

                                                          <select class="form-control" name="user_member_reference" id="user_member_reference">
                                                                    <?php                                                             
                                                                       $database->loadAllUsers($row['m_upline']);
                                                                    ?>
                                                         </select>
                                          </div>
                                    <?php }?>
				</div>
                                    
                                <hr>
				
				<div class="row form-group">
                                       
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Full Name :</label>
						<input type="text" class="form-control" id="m_name" placeholder="First Name" name="m_name" value="<?php echo $row['m_name'] ; ?>" title="Enter a valid Name">                            
					</div>
                               
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Email :</label>
						<input type="text" class="form-control" id="m_email" placeholder="Email" name="m_email" value="<?php echo $row['m_email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter a valid email">                            
					</div>
                                    
                                   <div class="col-lg-6 col-md-6 form-group">                  
						<label>Date of Birth :</label>
                                                <input type="<?php if($row['m_id']==''){echo "date";}else{echo "text";} ?>" class="form-control date" id="m_dob" placeholder="YYYY-MM-DD" name="m_dob" value="<?php echo $row['m_dob']; ?>" >                            
					</div>
                                    
                                    <div class="col-lg-6 col-md-6 form-group">                  
						<label >Mobile Number :</label>
						
						<input type="text" class="form-control" id="m_phone" placeholder="Phone" name="m_phone" value="<?php echo $row['m_phone']; ?>"> 						
					</div>

				</div>
				
				<div class="row form-group">
					
					<div class="col-lg-6 col-md-6 form-group">                  
						<label>Line ID :</label>
						<input type="text" id="m_lineid" autocomplete="off" name="m_lineid" class="form-control" placeholder="Line ID"  value="<?php echo $row['m_lineid']; ?>" >                            
					</div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                                 <label>WhatsApp Number :</label>
						 <input type="text" id="m_whatsapp" name="m_whatsapp"  class="form-control" placeholder="WhatsApp ID" value="<?php echo $row['m_whatsapp'] ?>">
                                     </div>
				</div>
				 
								<hr /> 
				
				<div class="row form-group">
					
				    <div class="col-lg-6 col-md-6 form-group">
                                         <label>Address :</label>
                                          <input type="text"  id="m_address" name="m_address" class="form-control " placeholder="Your Address" value="<?php echo $row['m_address'] ?>">
                                    </div><!-- End .input-group -->
                                 
				</div>
				
                                 
				<div class="row form-group">
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Name :</label>
						<input type="text" class="form-control" id="m_bank_name" placeholder="Bank Name" name="m_bank_name" value="<?php echo $row['m_bank_name']; ?>">                            
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Account No :</label>
                                                <input type="number" class="form-control" id="m_bank_account_no" placeholder="Account No" name="m_bank_account_no" 
						value="<?php echo  $row['m_bank_account_no']; ?>">                             
					</div>
					
					<div class="col-lg-4 col-md-4 form-group">                  
						<label>Bank Branch :</label>
						<input type="text" class="form-control" id="m_bank_branch" placeholder="Bank Branch" name="m_bank_branch" 
						value="<?php echo  $row['m_bank_branch']; ?>">                             
					</div>
				</div>	                               

	
				
				<hr />
                                
                       


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
 