<?php


include_once 'functions.php';

if (isset($_GET['ins_no'])) {
    $ins_no = $_GET['ins_no']; 
} else {
   $ins_no = ''; 
} 




if($user_id!=''){
    
$sql="select * from v_ins where v_ins_number='".$ins_no."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
    
}






