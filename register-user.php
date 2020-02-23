<?php 
session_start();
include_once './top_header.php';
include_once './header.php';
include "data/all_functions.php";

?>

	
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input  {
  margin-bottom: 10px;
}

textarea {
	margin-bottom: 10px;
}
</style>



    <?php       
        if (isset($_GET['error'])) {
            $error = $_GET['error']; 
        } else {
        $error = ''; 
        }
    ?>

<div class="container" style="margin-bottom: 50px">

    <div id="error_display" class="text-center text-danger">
      <?php
        if($error){
            echo "There is an error in Registering the User";
        } 
      ?>
    </div>
  <div class="text-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create New User</button>
      <a href="./page2new.php" class="btn btn-warning">Existing User</a>
  </div>
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Register User</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="data/all_functions.php">
            <input type="hidden" name="reffer_by" value="<?php echo $_SESSION['login']; ?>">
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Username" name="m_username" value="" required="" required="">
              </div>
              <div class="col-md-6">
                <input type="password" class="form-control" placeholder="Password" name="m_password">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" placeholder="Email" name="email" value="" required="">
              </div>
              <div class="col-md-6">
                <input type="date" class="form-control" placeholder="DOB" name="dob" value="" required="">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control"  placeholder="Phone No" name="phone" value="" required="">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control"  placeholder="NIC" name="nic" value="" required="">
              </div>
            </div>
            <div class="mr-auto">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<!-- footer -->
<?php include_once './footer.php';?>  
<!-- End footer -->
</div>


</body>
</html>