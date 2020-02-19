
<?php  
    include "data/all_functions.php";

    $value = $_GET['v_number'];

    $result= getVehicleUsers($value);

    $insurance = getInsuranceData($value);

    $features = allFeatures();

    $get_features = getFeatures($insurance['v_ins_id']);

    $active_features = getActiveFeatures($insurance['v_ins_id']);
   
    

?>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

h4 {
  text-align: center;  
  color: #fff;
}

/* Hide all steps by default: */
.tab {
  display: none;
  padding: 0px 20px;
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

.card-head {
    padding: 20px 50px;
    background-color: #1a7fb7; 
    color: white; 
    border-bottom: 10px solid rgba(0, 0, 0, 0.125);
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

/*checkbox css*/
/* Customize the label (the container) */
.check-div .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  /*font-size: 22px;*/
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  padding-top: 20px;
}

/* Hide the browser's default checkbox */
.check-div .container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.check-div .checkmark {
  position: absolute;
  top: 20px;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.check-div .container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.check-div .container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.check-div .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.check-div .container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.check-div .container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
/*checkbox css*/
</style>

<div class="container" id="regForm">

    <input type="hidden" id="ins_no" value="<?php echo $insurance['v_ins_id']; ?>">

    <div class="card-head"><h4>Informations</h4></div>
    <div class="tab">
    <div class="row">
    <?php if($result != null): ?>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">IC Number : <?php echo $result['m_nic'] != ''?$result['m_nic']:'Not Available'; ?></div>
        <div class="col-sm-12 col-12">Mobile Phone No. : <?php echo $result['m_phone'] != ''?$result['m_phone']:'Not Available'; ?></div>
        </div>
        <hr />
        <div class="row">
        <div class="col-sm-12 col-12">Next Effective Date : <?php echo $result['expire_date'] != ''?$result['expire_date']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">No-Claim Discount Rate: 55%</div>
        </div>
        <hr />
    <div class="row">
        <div class="col-sm-6 col-6">Vehicle No. : <?php echo $result['v_number'] != ''?$result['v_number']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Chassis No. : <?php echo $result['chassis'] != ''?$result['chassis']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Engine No. : <?php echo $result['engine_no'] != ''?$result['engine_no']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Car Location Postcode : <?php echo $result['postcode'] != ''?$result['postcode']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">NVIC : <?php echo $result['nvic'] != ''?$result['nvic']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Make : <?php echo $result['make'] != ''?$result['make']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Model : <?php echo $result['model'] != ''?$result['model']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Variant : <?php echo $result['variant'] != ''?$result['variant']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Seats : <?php echo $result['seats'] != ''?$result['seats']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Trans : <?php echo $result['trans'] != ''?$result['trans']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">CC : <?php echo $result['cc'] != ''?$result['cc']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Group : <?php echo $result['group'] != ''?$result['group']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Make Year : <?php echo $result['year'] != ''?$result['year']:'Not Available'; ?></div>

    <?php else: ?>
        <div class="col-sm-12 col-12">No Records Found on the Server...</div>
    <?php endif; ?>
    </div>
    </div>

  <div class="tab">
    <div class="row">
    <?php if($insurance != null): ?>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-6 col-6"><img src="uploads/ins/<?php echo $insurance['v_ins_main_img']; ?>" style="width:150px;"></div>
        <div class="col-sm-6 col-6">Agreed Value Range (<?php echo 'RM. '.$insurance['v_ins_price']; ?>)
          <br>  Sum Insured (SI):</div>
        </div>
        <hr />
        <div class="row">
        <div class="col-sm-12 col-12"><?php echo $insurance['v_ins_short_description']; ?></div>
        </div>
    <?php else: ?>
        <div class="col-sm-12 col-12">No Records Found on the Server...</div>
    <?php endif; ?>
  </div>

  <div class="tab">
    <div class="check-div">
        <?php 
            $arraySubId = array();
            if($active_features != null):
              while($f_data = mysqli_fetch_assoc($active_features)):
                array_push($arraySubId, $f_data['f_id']);
              endwhile;;
            endif;
        ?>
        <?php while($row = mysqli_fetch_assoc($features)):?>
            <label class="container"><?php echo $row['f_number']; ?>
              <input type="checkbox" id="fetaure_id_<?php echo $row['f_id']; ?>" onclick="changeFeatures(<?php echo $row['f_id']; ?>)" <?php echo (in_array($row['f_id'], $arraySubId))? "checked" : "" ?>>
              <span class="checkmark"></span>
            </label>
        <?php endwhile; ?>
    </div>
  </div>

  


  <div class="tab">
  
    <div class="row">
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">IC Number : <?php echo $result['m_nic'] != ''?$result['m_nic']:'Not Available'; ?></div>
        <div class="col-sm-12 col-12">Mobile Phone No. : <?php echo $result['m_phone'] != ''?$result['m_phone']:'Not Available'; ?></div>
        </div>
        <hr />
        <div class="row">
        <div class="col-sm-12 col-12">Next Effective Date : <?php echo $result['expire_date'] != ''?$result['expire_date']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">No-Claim Discount Rate: 55%</div>
        </div>
        <hr />
    <div class="row">
        <div class="col-sm-6 col-6">Vehicle No. : <?php echo $result['v_number'] != ''?$result['v_number']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Chassis No. : <?php echo $result['chassis'] != ''?$result['chassis']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Engine No. : <?php echo $result['engine_no'] != ''?$result['engine_no']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Car Location Postcode : <?php echo $result['postcode'] != ''?$result['postcode']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">NVIC : <?php echo $result['nvic'] != ''?$result['nvic']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Make : <?php echo $result['make'] != ''?$result['make']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Model : <?php echo $result['model'] != ''?$result['model']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Variant : <?php echo $result['variant'] != ''?$result['variant']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Seats : <?php echo $result['seats'] != ''?$result['seats']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Trans : <?php echo $result['trans'] != ''?$result['trans']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">CC : <?php echo $result['cc'] != ''?$result['cc']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Group : <?php echo $result['group'] != ''?$result['group']:'Not Available'; ?></div>
        <div class="col-sm-6 col-6">Make Year : <?php echo $result['year'] != ''?$result['year']:'Not Available'; ?></div>
    </div>
     <hr>
  <br>

    <div class="row">
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-12 col-12">&nbsp;</div>
        <div class="col-sm-6 col-6"><img src="uploads/ins/<?php echo $insurance['v_ins_main_img']; ?>" style="width:150px;"></div>
        <div class="col-sm-6 col-6">Agreed Value Range (<?php echo 'RM. '.$insurance['v_ins_price']; ?>)
          <br>  Sum Insured (SI):</div>
        </div>
        <hr />
        <div class="row">
        <div class="col-sm-12 col-12"><?php echo $insurance['v_ins_short_description']; ?></div>
        </div>
     <hr>
     <br>
       <div>
            <ul>
        <?php while($row = mysqli_fetch_assoc($get_features)):?>
              <li><?php echo $row['f_number']; ?></li>
        <?php endwhile; ?>
            </ul>
      </div>




  </div>


  <div style="overflow:auto; margin-top: 50px;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
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

function changeFeatures(data){

   var ins_id= $('#ins_no').val();
   if((document.getElementById("fetaure_id_"+data).checked) == true){
        $.ajax({ 
            url: "data/all_functions.php",
            type: "POST",
            data: {"ins_id": ins_id, "function_id": data, "ins_type": "add"},
            async: false,
            success: function (data_out) {
                
            }
        });
   }else{
        $.ajax({ 
            url: "data/all_functions.php",
            type: "POST",
            data: {"ins_id": ins_id, "function_id": data, "ins_type": "remove"},
            async: false,
            success: function (data_out) {
                
            }
        });
   }
}

</script>
