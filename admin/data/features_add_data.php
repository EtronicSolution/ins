<?php


include_once 'functions.php';

 

if (isset($_GET['f_id'])) {
    $f_id = $_GET['f_id'];
} else {
    $f_id = '';
} 



if($f_id != ''){
    
$sql="select * from features where f_id ='".$f_id."'";

 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
    
}






