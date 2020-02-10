<?php
include_once '../../conn.php';
include_once 'functions.php';
include_once './imageUpload.php';

//Fetching Values from URL
$user_id           = $_POST['id'];
$m_username        = $_POST['user_name'];
$m_password        = $_POST['password'];
$m_reseller_by     = $_POST['m_reseller_by'] == '' ? 0 : $_POST['m_reseller_by'];
$m_email           = $_POST['m_email'];
$m_name            = $_POST['m_name'];
$m_dob             = $_POST['m_dob'];
$m_phone           = $_POST['m_phone'];
$m_lineid          = $_POST['m_lineid'];
$m_whatsapp        = $_POST['m_whatsapp'];
$m_address         = $_POST['m_address'];
$m_bank_name       = $_POST['m_bank_name'];
$m_bank_account_no = $_POST['m_bank_account_no'];
$m_bank_branch     = $_POST['m_bank_branch'];
$m_phone_country   = $_POST['m_phone_country'];
$m_admin_by        = $_POST['m_admin_by'];
$m_master_by       = $_POST['m_master_by'];
$m_upline          = $_POST['m_upline'];
 
$m_status          = $_POST['m_status'];
$m_otp             = $_POST['m_otp'];
$m_bitcoin         = $_POST['m_bitcoin'];
$m_litecoin        = $_POST['litecoin'];
$m_wechatid        = $_POST['m_wechat_id'];
$m_type            = $_POST['m_type'];
$m_currency        = $_POST['m_currency'];
$m_loc             = $_POST['m_loc'];
$m_nic             = $_POST['m_nic']; 
$m_brid             = $_POST['m_brid']; 

//Action 
$action = $_POST['action'];               
    
        

        
        // pass 

$register_by_id = getUseridbyUsername($register_by, $conn);
$hash_password = password_hash($m_password, PASSWORD_DEFAULT);
$hash_otp = password_hash($m_otp, PASSWORD_DEFAULT);
	
	
        
        // image location 
$target_dir = "../../uploads/profile/";

if ($action == 'register') {
        $m_img =uploadPic("user_profile_image",$target_dir);
        
       
         
       
                
	if ($m_username != '' && $m_password != '') {
		if (preg_match('/[^a-z_\-0-9]/i', $m_username)) {
			header('Location: ../members_add.php?error=3');
		} else {
			$sqlcheck = "SELECT * FROM members WHERE m_username='" . $m_username . "'";
			$result = mysqli_query($conn, $sqlcheck);

			if (mysqli_num_rows($result) > 0) {
				header('Location: ../members_add.php?error=1');
			} else {
				$sql = "INSERT INTO members (m_address,m_username, m_password, m_name, m_email, m_dob, m_phone,m_type,m_pic,m_upline,m_loc,m_reseller_by) VALUES ('" . $m_address . "','" . $m_username . "', '" . $hash_password . "', '" . $m_fullname . "', '" . $m_email . "', '" . $m_dob . "', '" . $m_phone . "', '" . $m_type . "', '" . $m_img . "', '" . $user_member_reference . "','" . $m_loc . "','" . $m_reseller_by . "')";
                               
				if(mysqli_query($conn, $sql)){
                                    
                                    header('Location: ../members_list.php?type=' . $m_type . '&error=1');
                                    
                                }else{
                                    header('Location: ../members_list.php?type=' . $m_type . '&error=2');
                                }

				
			}
		}
	} else {
		header('Location: ../members_add.php?error=1');
	}
} elseif ($action == 'update') {
        
        
               
//=================================================================================================

	
		$m_pic = uploadPic("user_profile_image",$target_dir);
                
                if($m_pic!=''){

		$sql = "UPDATE members SET m_pic='" . $m_pic . "' WHERE m_id='" . $user_id . "'";

		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
                
                }
         
//===================================================================================================

	if ($m_username != '') {
		$sql = "update members set  m_username='" . $m_username . "'where m_id='" . $user_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($user_otp != '') {
		$sql = "update members set  m_otp='" . $user_otp . "'where m_id='" . $user_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($user_member_reference != '') {
		$sql = "update members set  m_upline='" . $user_member_reference . "'where m_id='" . $user_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($m_loc != '') {
		$sql = "update members set  m_loc='" . $m_loc . "'where m_id='" . $user_id . "'";
		mysqli_query($conn, $sql);
	}

	if ($new_ref != '') {
		$sql = "update members set m_new_ref ='" . $new_ref . "'where m_id='" . $user_id . "'";

		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($user_type != '') {
		$sql = "update members set m_type='" . $user_type . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($user_level != '') {
		$sql = "update members set m_level='" . $user_level . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($m_name != '') {
		$sql = "update members set m_name='" . $m_name . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		};
	}

	if ($m_email != '') {
		$sql = "update members set m_email='" . $m_email . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($m_dob != '') {
		$sql = "update members set m_dob='" . $m_dob . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}
	if ($m_phone != '') {
		$sql = "update members set m_phone='" . $m_phone . "'where m_id='" . $user_id . "'";
		mysqli_query($conn, $sql);
	}
	if ($m_lineid != '') {
		$sql = "update  members set  m_lineid='" . $m_lineid . "'where m_id='" . $user_id . "'";

		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}
	if ($m_whatsapp != '') {
		$sql = "update  members set m_whatsapp='" . $m_whatsapp . "'where m_id='" . $user_id . "'";

		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}
	if ($m_address != '') {
		$sql = "update  members set m_address='" . $m_address . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($m_bank_name != '') {
		$sql = "update  members set m_bank_name='" . $m_bank_name . "'where m_id='" . $user_id . "'";

		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($m_bank_account_no != '') {
		$sql = "update  members set m_bank_account_no='" . $m_bank_account_no . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 1;
		}
	}

	if ($m_brid != '') {
		$sql = "update  members set m_brid='" . $m_brid . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 0;
		}
	}

	if ($m_passport != '') {
		$sql = "update  members set m_passport ='" . $m_passport . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 0;
		}
	}
        
        if ($m_passport != '') {
		$sql = "update  members set m_passport ='" . $m_passport . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 0;
		}
	}
        
        if ($m_nic != '') {
		$sql = "update  members set m_nic ='" . $m_nic . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 0;
		}
	}
        
        if ($m_mil_id != '') {
		$sql = "update  members set m_mil_id ='" . $m_mil_id . "'where m_id='" . $user_id . "'";
		if (mysqli_query($conn, $sql)) {
			$error = 2;
		} else {
			$error = 0;
		}
	}

	if ($error == '') {
		$error = 4;
	}

	header('Location: ../members_add.php?user_id=' . $user_id . '&error=' . $error);
}



