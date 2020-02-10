<?php
session_start();
include_once '../conn.php';
include_once 'admin/data/functions.php';

//Fetching Values from URL
$v_number           = $_POST['v_number'];
$postcode        = $_POST['postcode'];
$m_nic          = $_POST['m_nic'];
$m_phone    = $_POST['m_phone'];
$m_marriage_status           = $_POST['m_marriage_status'];
$ic_type           = $_POST['ic_type'];



// first check 

$sql_v_check = "SELECT * FROM vehicles WHERE v_number ='" . $v_number . "'";
$resultv_check   = mysqli_query($conn, $sql_v_check);
 if (mysqli_num_rows($resultv_check) > 0) {
     
     header('Location: ../page2.php?v_number=' . $v_number);
     
 }


echo $ic_type;
exit();

//Action
 
if ($action == 'register') {
  
        $sqlcheck = "SELECT * FROM policies WHERE p_code='" . $p_code . "'";
        $result   = mysqli_query($conn, $sqlcheck);
        if (mysqli_num_rows($result) > 0) {
            header('Location: ../policy_add.php?rror=4');
        } else {
            $sql = "INSERT INTO `policy` ( `p_name`, `p_type`, `p_register_date`, `p_end_date`, `p_by_company`, `p_delegator_by`, `p_status`, `p_currency`, `p_loc`, `p_price`, `p_detail`, `p_code`) VALUES ('".$p_name."', 'Car', '".$p_register_date."', NULL, '".$p_by_company."', NULL, '1', '0', '0', '".$p_price."','".$p_detail."', '".$p_code."')";
             
            if(mysqli_query($conn, $sql)){
                
                 header('Location: ../policy_list.php?error=1');
                
            }
           
        }
      
   
} elseif ($action == 'update') {
    if (($_FILES["company_logo"]["name"]) != '') {
        if (basename($_FILES["company_logo"]["name"]) != '') {
            $m_img = $target_dir . reSize($_FILES['company_logo']['tmp_name'], $_FILES['company_logo']['name'], 1);
        } else {
            $m_img = '';
        }
        $sql = "UPDATE company SET cp_logo ='" . $m_img . "' WHERE id='" . $company_id . "'";
        if (mysqli_query($conn, $sql)) {
            $error = 2;
        } else {
            $error = 1;
        }
    }
    if ($company_name != '') {
        $sql = "update company set  cp_name='" . $company_name . "'where id='" . $company_id . "'";
        mysqli_query($conn, $sql);
    }
    if ($company_registered_day != '') {
        $sql = "update company set  cp_register_date='" . $company_registered_day . "'where id='" . $company_id . "'";
        mysqli_query($conn, $sql);
    }
    if ($company_phone != '') {
        $sql = "update company set  cp_phone='" . $company_phone . "'where id='" . $company_id . "'";
        mysqli_query($conn, $sql);
    }
    if ($company_address != '') {
        $sql = "update company set  cp_address='" . $company_address . "'where id='" . $company_id . "'";
        mysqli_query($conn, $sql);
    }
    if ($company_status != '') {
        $sql = "update company set  cp_status='" . $company_status . "'where id='" . $company_id . "'";
        mysqli_query($conn, $sql);
    }
    if ($error == '') {
        $error = 5;
    }
    header('Location: ../company_list.php?error=' . $error);
}
