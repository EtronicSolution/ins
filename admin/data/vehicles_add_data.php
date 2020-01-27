<?php


include_once 'functions.php';

if (isset($_GET['v_id'])) {
    $v_id = $_GET['v_id']; 
} else {
   $v_id = ''; 
} 

if($v_id!=''){
    
$sql="select * from vehicles where v_id='".$v_id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
    
}






