<?php
include_once 'functions.php';

if (isset($_GET['type'])) {
    $type = $_GET['type']; 
} else {
   $type = ''; 
}
 


if($_SESSION['login']&& $_SESSION['admin'] != ''){

        $sql = "select * from company";
        $result = mysqli_query($conn, $sql);


}else{
    
    
} 



?>