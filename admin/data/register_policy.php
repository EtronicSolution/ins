<?php
include_once '../../conn.php';
include_once 'functions.php';

//Fetching Values from URL
$company                     = $_POST['company'];
$content                    = $_POST['content'];
$topic        = $_POST['topic'];
$price                   = $_POST['price'];


//Action 
$action                     = $_POST['action'];


//Other Data 
if ($_SESSION['master'] != '') {
    $register_by = $_SESSION['master'];
} else if ($_SESSION['supermaster'] != '') {
    $register_by = $_SESSION['supermaster'];
} else if ($_SESSION['admin'] != '') {
    $register_by = $_SESSION['admin'];
} else {
    $register_by = $_SESSION['reseller'];
}

// image location 
$target_dir = "../uploads/logo/";

if ($action == 'register') {

    if ($topic != '') {
        
        $sqlcheck="SELECT * FROM policies WHERE topic='".$topic."'";

        $result = mysqli_query($conn, $sqlcheck);

        if(mysqli_num_rows($result) > 0){
            header('Location: ../policy_add.php?type=' . $m_type . '&error=4');
        }
        else{
            $sql = "INSERT INTO policies (comp_id,topic,content,price) VALUES ('" . $company . "','" . $topic . "','" . $content . "', '" . $price . "')";

            mysqli_query($conn, $sql);

            header('Location: ../policy_list.php?type=' . $m_type . '&error=5');
        }


        // header('Location: ../company_list.php?type=' . $m_type . '&error=5');
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

function UniqueRandomNumbersWithinRange($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}



function reSize($file, $var_file, $var_name)
{

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

    $file_save_as =  $fileNewName . "." . $ext;


    move_uploaded_file($folderPath.$file_save_as);

    return $file_save_as;
}





function imageResize($imageResourceId, $width, $height)
{


    $targetWidth = 500;
    $targetHeight = 500;


    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);


    return $targetLayer;
}
