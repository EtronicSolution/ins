<?php

include_once 'functions.php';
session_start();

//Fetching Values from URL


$f_id              = $_POST['f_id'];
$f_number          = $_POST['f_number'];
$short_description = $_POST['short_description'];
$f_name            = $_POST['f_name'];
$v_ins_member_id   = $_POST['v_ins_member_id'];
$v_ins_agent_id    = $_POST['v_ins_agent_id'];
$v_ins_main_img    = $_POST['v_ins_main_img'];
$f_price           = $_POST['f_price'];
$status            = $_POST['status'];
$v_ins_car_no      = $_POST['v_ins_car_no'];
$expire_date       = $_POST['expire_date'];

 
//Action
$action = $_POST['action'];

// Other
$created_by = $_SESSION['login'];
$updated_by = $_SESSION['login'];
$today      = date('Y-m-d');



if ($action == 'register') {
    
    if ($f_number != '') {
        
        $sqlcheck = "SELECT * FROM features WHERE f_number='". $f_number ."'";
 
        $result   = mysqli_query($conn, $sqlcheck);
        
        if (mysqli_num_rows($result) > 0) {
            header('Location: ../features_add.php?error=3');
        } else {
            $sql = "INSERT INTO `features` (`f_number`, `short_description`, `f_price`, `status`, `register_date`, `expire_date`, `created_by`, `updated_by`, `f_name`) VALUES ( '" . $f_number . "', '" . $short_description . "', '" . $f_price . "', '1', '" . $today . "', '" . $expire_date . "', '" . $created_by . "', '" . $updated_by . "', '" . $f_name . "')";
            
           
            if (mysqli_query($conn, $sql)) {
                header('Location: ../features_list.php?error=1');
            } else {
                header('Location: ../features_list.php?error=2');
            }
            
            
        }
        
    } else {
        header('Location: ../features_add.php?error=3');
    }
    
} elseif ($action == 'update') {
    
    //=================================================================================================
    
    
    
    //===================================================================================================
    
    
    if ($f_number != '') {
        
        $sql = "update features set  f_number ='" . $f_number . "'where f_id='" . $f_id . "'";
        mysqli_query($conn, $sql);
        
    }
    
    if ($short_description != '') {
        
        $sql = "update features set  short_description='" . $short_description . "'where f_id='" . $f_id . "'";
        mysqli_query($conn, $sql);
        
    }
    
     if ($f_name!= '') {
        
        $sql = "update features set  f_name='" . $f_name . "'where f_id='" . $f_id . "'";
        mysqli_query($conn, $sql);
        
    }
    
     if ($f_price != '') {
        
        $sql = "update features set  f_price='" . $f_price . "'where f_id='" . $f_price . "'";
        mysqli_query($conn, $sql);
        
    }
    
  
 
    if ($error == '') {
        $error = 4;
    }
    
    header('Location: ../features_add.php?error=' . $error);
    
}