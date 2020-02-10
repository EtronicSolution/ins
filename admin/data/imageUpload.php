<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Amila
 */

// back ground functions image uploading 
function reSize($file, $var_file, $var_name,$folderPath)
{
	$sourceProperties = getimagesize($file);
	$fileNewName = time() . $var_name;
                
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

function imageResize($imageResourceId, $width, $height)
{
	$targetWidth = 500;
	$targetHeight = 500;

	$targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
	imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

	return $targetLayer;
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