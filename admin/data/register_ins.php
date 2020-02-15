<?php
       
        include_once 'functions.php';
       
        
        //Fetching Values from URL
        
        
        $v_ins_id                   = $_POST['v_ins_id'];
	    $v_ins_number               = $_POST['v_ins_number'];
        $v_ins_policy               = $_POST['v_ins_policy'];
        $v_ins_short_description    = $_POST['v_ins_short_description'];
        $v_ins_member_id            = $_POST['v_ins_member_id'];
        $v_ins_agent_id             = $_POST['v_ins_agent_id'];
        $v_ins_main_img             = $_POST['v_ins_main_img'];
        $v_ins_price                = $_POST['v_ins_price'];
        $status                     = $_POST['status'];
        $v_ins_car_no               = $_POST['v_ins_car_no'];
        $expire_date                = $_POST['expire_date'];
        $v_ins_comapany             = $_POST['v_ins_comapany'];
       
        
        //Action
        $action = $_POST['action'];

        // Other
        $created_by = $_SESSION['login'];
        $today = date('Y-m-d');

        
if ($action == 'register')
{

    if ($v_ins_number != '')
    {

        $sqlcheck = "SELECT * FROM v_ins WHERE v_ins_number='" . $v_ins_number . "'";
        $result = mysqli_query($conn, $sqlcheck);

        if (mysqli_num_rows($result) > 0)
        {
            header('Location: ../ins_add.php?error=2');
        }
        else
        {
            $sql = "INSERT INTO `v_ins` ( `v_ins_number`, `v_ins_policy`, `v_ins_short_description`, `v_ins_member_id`, `v_ins_agent_id`, `v_ins_main_img`, `v_ins_price`, `status`, `register_date`, `expire_date`, `created_by`, `v_ins_comapany`, `v_ins_car_no`) VALUES ( '" . $v_ins_number . "', '" . $v_ins_policy . "', '" . $v_ins_short_description . "', '" . $v_ins_member_id. "','" . $v_ins_agent_id. "', '" . $v_ins_main_img. "', '" . $v_ins_price . "', '". $today ."', '" . $expire_date . "', '" . $created_by . "', '" . $v_ins_comapany . "', '" . $v_ins_car_no . "')";

        
            if(mysqli_query($conn, $sql))
            {
                 header('Location: ../ins_list.php?error=1');
            }else
            {
                 header('Location: ../ins_list.php?error=2');
            }

           
        }

    }
    else
    {
        header('Location: ../members_add.php?error=3');
    }

}
elseif ($action == 'update')
{

    //=================================================================================================
    
        

    //===================================================================================================
    

    if ($m_username != '')
    {

        $sql = "update members set  m_username='" . $m_username . "'where m_id='" . $user_id . "'";
        mysqli_query($conn, $sql);

    }

    if ($user_otp != '')
    {

        $sql = "update members set  m_otp='" . $user_otp . "'where m_id='" . $user_id . "'";
        mysqli_query($conn, $sql);

    }

    if ($user_member_reference != '')
    {

        $sql = "update members set  m_upline='" . $user_member_reference . "'where m_id='" . $user_id . "'";
        mysqli_query($conn, $sql);

    }

    if ($new_ref != '')
    {

        $sql = "update members set m_new_ref ='" . $new_ref . "'where m_id='" . $user_id . "'";

        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($user_type != '')
    {

        $sql = "update members set m_type='" . $user_type . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($user_level != '')
    {

        $sql = "update members set m_level='" . $user_level . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($m_name != '')
    {

        $sql = "update members set m_name='" . $m_name . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        };

    }

    if ($user_email != '')
    {

        $sql = "update members set m_email='" . $user_email . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($user_dob != '')
    {

        $sql = "update members set m_dob='" . $user_dob . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }
    if ($user_phone != '')
    {

        $sql = "update members set m_phone='" . $user_phone . "'where m_id='" . $user_id . "'";
        mysqli_query($conn, $sql);

    }
    if ($m_lineid != '')
    {

        $sql = "update  members set  m_lineid='" . $m_lineid . "'where m_id='" . $user_id . "'";

        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }
    if ($m_whatsapp != '')
    {

        $sql = "update  members set m_whatsapp='" . $m_whatsapp . "'where m_id='" . $user_id . "'";

        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }
    if ($user_address != '')
    {

        $sql = "update  members set m_address='" . $user_address . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($m_bank_name != '')
    {

        $sql = "update  members set m_bank_name='" . $m_bank_name . "'where m_id='" . $user_id . "'";

        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($m_bank_account_no != '')
    {

        $sql = "update  members set m_bank_account_no='" . $m_bank_account_no . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 1;
        }

    }

    if ($m_bank_branch != '')
    {

        $sql = "update  members set m_bank_branch='" . $m_bank_branch . "'where m_id='" . $user_id . "'";
        if (mysqli_query($conn, $sql))
        {

            $error = 2;

        }
        else
        {

            $error = 0;
        }

    }

    if ($error == '')
    {
        $error = 4;
    }

    header('Location: ../members_add.php?user_id=' . $user_id . '&error=' . $error);

}
