<?php 
session_start();
include_once './top_header.php';
include_once './header.php';
include "data/all_functions.php";

$members = getAllMembers();
$delegators = getAllDelegators();
$company = getAllCompany();
$policy = getAllPolicies();

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

input {
  /*padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;*/
  margin-bottom: 10px;
}

textarea {
	margin-bottom: 10px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>

  <?php       
        if (isset($_GET['error'])) {
            $error = $_GET['error']; 
        } else {
        $error = ''; 
        }
    ?>
<div class="container">

    <div id="error_display" class="text-center text-danger">
      <?php
        if($error){
            echo "There is an error in Register the Data";
        } 
      ?>
    </div>

<form id="regForm" action="./data/all_functions.php" method="POST">
  <!-- One "tab" for each step in the form: -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> -->
  <div class="tab">
  	<h3>Register Vehicle:</h3>
  	<div class="row">
  		<div class="col-md-6">
		 	<div class="form-group">
		    <label for="exampleInputPassword1">Member</label>
  			<select type="text" class="form-control" name="owner" required>
  				<?php while($row = mysqli_fetch_assoc($members)):?>
              		<option value="<?php echo $row['m_id']; ?>"><?php echo $row['m_username']; ?></option>
        		<?php endwhile; ?>
  			</select>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		    <label for="exampleInputPassword1">Vehicle No</label>
  			<input type="text" class="form-control" placeholder="Vehicle No" name="v_no" value="<?php echo $_SESSION['v_no']; ?>" required readonly>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Make</label>
  			<input type="text" class="form-control" placeholder="Make" name="make" required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Model</label>
  			<input type="text" class="form-control" placeholder="Model" name="model" required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Password</label>
  			<input type="color" class="form-control"  placeholder="Color" name="color"  required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">CC</label>
  			<input type="text" class="form-control"  placeholder="CC" name="cc" required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Market Value</label>
  			<input type="number" class="form-control"  placeholder="Market Value" name="value" required>
  			</div>
  		</div>
  	</div>
  </div>
  <div class="tab">
  	<h3>Register Vehicle:</h3>
  	<div class="row">
  		<div class="col-md-6">
		 	<div class="form-group">
		    <label for="exampleInputPassword1">Code</label>
  			<input type="text" class="form-control" placeholder="Code" name="code" required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Expiry Date</label>
  			<input type="date" class="form-control" placeholder="Expiry Date" name="expiry" required>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		    <label for="exampleInputPassword1">Company</label>
  			<select type="text" class="form-control" name="company" required>
  				<option value="">select a company</option>
  				<?php while($row = mysqli_fetch_assoc($company)):?>
              		<option value="<?php echo $row['cp_id']; ?>"><?php echo $row['cp_name']; ?></option>
        		<?php endwhile; ?>
  			</select>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		    <label for="exampleInputPassword1">Policy</label>
  			<select type="text" class="form-control" name="policy" required>
  				<option value="">select a policy</option>
  				<?php while($row = mysqli_fetch_assoc($policy)):?>
              		<option value="<?php echo $row['m_id']; ?>"><?php echo $row['p_name']; ?></option>
        		<?php endwhile; ?>
  			</select>
  			</div>
  		</div>
  		<div class="col-md-6">
		 	<div class="form-group">
		   	<label for="exampleInputPassword1">Amount</label>
  			<input type="number" class="form-control"  placeholder="Amount" name="amount" value="" required>
  			</div>
  		</div>
  		<div class="col-md-6">
  			&nbsp;
  		</div>
  		
  		<div class="container">
  		<div class="col">
			<textarea  class="form-control" name="v_description" placeholder="Description"></textarea>
  		</div>
  		</div>
  	</div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
	
</div>


<!-- footer -->
<?php include_once './footer.php';?>  
<!-- End footer -->
</div>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</body>
</html>