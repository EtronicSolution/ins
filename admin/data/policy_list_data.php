<?php
include_once 'functions.php';

 


if($_SESSION['login']&& $_SESSION['admin'] != ''){

        $sql = "select po.*,cp.cp_name from policy po  left join company  cp on po.p_by_company=cp.cp_id ";
        $result = mysqli_query($conn, $sql);

		
}else{
    
    
} 



?>