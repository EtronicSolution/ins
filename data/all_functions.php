<?php
if(!isset($_SESSION)) { session_start(); }
@define('BASE_DIR', dirname(__FILE__));
include_once(BASE_DIR . '/../conn.php');


if(isset($_POST['username'])){
    loginFunction();
}

function getVehicleUsers($value)
{  
    global $conn;

    $sql = "SELECT * FROM vehicles INNER JOIN members ON members.m_id = vehicles.member_id WHERE vehicles.v_number ='" . $value . "'";
    $result   = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       return mysqli_fetch_assoc($result);
    }else{
        return null;
    }
   
}

function LoginFunction(){
    global $conn;
    $sqlcheck="SELECT * FROM members WHERE  m_username='".$_POST['username']."' AND m_status = 1";
               
       $result = mysqli_query($conn, $sqlcheck);
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
       
            if(password_verify($_POST['password'], $pw))
            {
            //    echo 'success';
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['delegator'] = $res['m_username'];
                
                // header('Location: ../index.php?');
                header('Location: ../page2.php?v_number=' . $_SESSION['v_no']);
 
            }       
            else{
                  header('Location: ../login_blade.php?error=2');
                
            }

            
        } else{
              header('Location: ../login_blade.php?error=1');
            
        }
}

?>