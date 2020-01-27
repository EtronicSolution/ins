<?php
include_once 'functions.php';

 


if($_SESSION['login']&& $_SESSION['admin'] != ''){

    
        
        $sql = "select * from vehicles";	
        $result = mysqli_query($conn, $sql);
        
        
 

		
}else{
    
    
} 



?>