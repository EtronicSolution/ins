<?php
session_start();
include_once '../../conn.php';
include_once 'functions.php';

//Fetching Values from URL
$v_id              = $_POST['v_id'];
$v_number          = $_POST['v_number'];
$member_id         = $_POST['member_id'];
$make              = $_POST['make'];
$model             = $_POST['model'];
$make_date         = $_POST['make_date'];
$color             = $_POST['color'];
$cc                = $_POST['cc'];
$short_description = $_POST['short_description'];
$v_price           = $_POST['v_price'];

$today             = date('Y-m-d');



//Action 
$action = $_POST['action'];




// pass 

$register_by = $_SESSION['login'];
$update_by   = $_SESSION['login'];




// image location 
$target_dir = "../../uploads/cars/";

$image1 = uploadPic("image1_file", $target_dir);

 
$image2 = uploadPic("image2_file", $target_dir);

$image3 = uploadPic("image3_file", $target_dir);

$image4 = uploadPic("image4_file", $target_dir);

if ($action == 'register') {
	if ($v_number != '') {
		$sqlcheck = "select * from vehicles where v_number='" . $v_number . "'";
		$result   = mysqli_query($conn, $sqlcheck);

		if (mysqli_num_rows($result) > 0) {
			header('Location: ../car_add.php?error=1');
		} else {
			$sql = "INSERT INTO `vehicles` ( `v_number`, `v_type`, `v_code`, `short_description`, `member_id`, `image1`, `image2`, `image3`, `image4`, `image5`, `v_price`, `video_description`, `status`, `register_date`, `expire_date`, `created_by`, `updated_by`, `color`, `make`, `model`, `make_date`, `cc`) VALUES ( '" . $v_number . "', '1', '1002','" . $short_description . "',  '" . $member_id . "','" . $image1 . "','" . $image2 . "', '" . $image3 . "', '" . $image4 . "', NULL, '" . $v_price . "', NULL, '1', '" . $today . "', NULL, '" . $register_by . "','" . $update_by . "', '" . $color . "', '" . $make . "', '" . $model . "', '" . $make_date . "', '" . $cc . "')";

                       
                        
			if (mysqli_query($conn, $sql)) {
				header('Location: ../car_list.php?error=1');
			} else {
				header('Location: ../car_add.php?error=3');
			}
		}
	} else {
		header('Location: ../members_add.php?error=2');
	}
} elseif ($action == 'update') {
    
    
    
    //=================================================================================================
    
    
    
    
    
    //===================================================================================================

	if ($v_number != '') {
		$sql = "update vehicles set  v_number='" . $v_number . "'where v_id='" . $v_id. "'";
		mysqli_query($conn, $sql);
	}

	if ($short_description != '') {
		$sql = "update vehicles set  short_description='" . $short_description . "'where v_id='" . $v_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($member_id != '') {
		$sql = "update vehicles set  member_id='" . $member_id . "'where v_id='" . $v_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($image1 != '') {
		$sql = "update vehicles set image1 ='" . $image1 ."'where v_id='" . $v_id . "'";
                mysqli_query($conn, $sql);    
	}
        if ($image2 != '') {
		$sql = "update vehicles set image2 ='" . $image2 ."'where v_id='" . $v_id . "'";
                mysqli_query($conn, $sql);

		 
	}
        if ($image3 != '') {
		$sql = "update vehicles set image3 ='" . $image3 ."'where v_id='" . $v_id . "'";
                mysqli_query($conn, $sql);
		 
	}
        if ($image4 != '') {
		$sql = "update vehicles set image4 ='" . $image4 ."'where v_id='" . $v_id . "'";
                 mysqli_query($conn, $sql);
 
	}

	if ($v_price != '') {
		$sql = "update vehicles set v_price='" . $v_price ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}

	if ($status != '') {
		$sql = "update vehicles set status='" . $status ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}
        
        if ($color != '') {
		$sql = "update vehicles set color='" . $color ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}

        if ($make != '') {
		$sql = "update vehicles set make='" . $make ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}
        
        if ($model != '') {
		$sql = "update vehicles set model='" . $model ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}
        
        if ($make_date != '') {
		$sql = "update vehicles set make_date='" . $make_date ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}
        
         if ($cc != '') {
		$sql = "update vehicles set cc='" . $cc ."'where v_id='" . $v_id . "'";
		 mysqli_query($conn, $sql);
	}
        
	if ($error == '') {
		$error = 2;
	}

	header('Location: ../car_add.php?v_id=' . $v_id . '&error=' . $error);
}

function uploadPic($file_name,$target_dir){

    	if (($_FILES[$file_name]["name"]) != '') {
		$target_user_image = $target_dir . basename($_FILES[$file_name]["name"]);
		$uploadFileType_user_image = pathinfo($target_user_image, PATHINFO_EXTENSION);
		$newfilename_user_image = round(microtime(true)) . UniqueRandomNumbersWithinRange(0, 100, 1)[0] . '.' . $uploadFileType_user_image;

		if (basename($_FILES[$file_name]["name"]) != '') {
			if ($uploadFileType_user_image != "jpg" && $uploadFileType_user_image != "png" && $uploadFileType_user_image != "jpeg" && $uploadFileType_user_image != "gif" && $uploadFileType_user_image != "JPG" && $uploadFileType_user_image != "PNG" && $uploadFileType_user_image != "JPEG" && $uploadFileType_user_image != "GIF") {
				return '';
			} else {

                            if(move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_dir . $newfilename_user_image)){

                                 return  $newfilename_user_image;
                            }else{

                                return '';
                            }



			}
		}





	}else{

            return '';
        }

}
function UniqueRandomNumbersWithinRange($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
