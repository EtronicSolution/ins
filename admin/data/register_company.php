<?php
session_start();
include_once '../../conn.php';
include_once 'functions.php';
//Fetching Values from URL
$cp_id = $_POST['cp_id'];
$cp_name = $_POST['cp_name'];
$cp_registter_day = $_POST['cp_registter_day'];
$cp_phone = $_POST['cp_phone'];
$updated_id = $_SESSION['login'];
$cp_status = $_POST['cp_status'];
$cp_address = $_POST['cp_address'];
$cp_detail = $_POST['cp_detail'];
$register_by =$_SESSION['login'];
$cp_email= $_POST['cp_email'];
$cp_code= $_POST['cp_code'];
$today = date('Y-m-d');


//Action
$action = $_POST['action'];
// image location
$target_dir = "../uploads/logo/";
if ($action == 'register') {
    if ($cp_name != '') {
        
        
        if (basename($_FILES["company_logo"]["name"]) != '') {
            $cp_logo = $target_dir . reSize($_FILES['company_logo']['tmp_name'], $_FILES['company_logo']['name'], 1);
        } else {
            $cp_logo = '';
        }
        
        
        $sqlcheck = "SELECT * FROM company WHERE cp_name='" . $cp_name . "'";
        $result = mysqli_query($conn, $sqlcheck);
        if (mysqli_num_rows($result) > 0) {
        
            header('Location: ../company_add.php?error=2');
        } else {
            $sql = "INSERT INTO `company` ( `cp_name`,`cp_code`, `cp_logo`, `cp_registter_day`, `cp_phone`, `cp_address`, `updated_id`, `created_dt`, `updated_dt`, `cp_status`, `cp_detail`, `cp_email`) VALUES ( '" . $cp_name . "','" . $cp_code . "', '" . $cp_logo . "', '" . $cp_registter_day . "', '".$cp_phone."', '".$cp_address."', '".$updated_id."', '".$today."', NULL, '1', '".$cp_detail."', '".$cp_email."')";
         
            
            if (mysqli_query($conn, $sql)) {
                header('Location: ../company_list.php?error=1');
            } else {
                header('Location: ../company_add.php?error=2');
            }
        }
        
        
    } else {
        header('Location: ../company_add.php?error=2');
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
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
function reSize($file, $var_file, $var_name) {
    $sourceProperties = getimagesize($file);
    $fileNewName = time() . $var_name;
    $folderPath = "../../uploads/logo/";
    $ext = pathinfo($var_file, PATHINFO_EXTENSION);
    $imageType = $sourceProperties[2];
    switch ($imageType) {
        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
            imagepng($targetLayer, $folderPath . $fileNewName . "." . $ext);
        break;
        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
            imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
        break;
        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
            imagejpeg($targetLayer, $folderPath . $fileNewName . "." . $ext);
        break;
        default:
            echo "Invalid Image type.";
            exit;
        break;
    }
    $file_save_as = $fileNewName . "." . $ext;
    move_uploaded_file($folderPath . $file_save_as);
    return $file_save_as;
}
function imageResize($imageResourceId, $width, $height) {
    $targetWidth = 500;
    $targetHeight = 500;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    return $targetLayer;
}
