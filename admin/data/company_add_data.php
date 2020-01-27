<?php


include_once 'functions.php';

 

if (isset($_GET['cp_id'])) {
    $cp_id = $_GET['cp_id'];
} else {
    $cp_id = '';
} 



if($cp_id != ''){
    
$sql="select * from company where cp_id='".$cp_id."'";

 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
    
}






