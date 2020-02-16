<?php
if(!isset($_SESSION)) { session_start(); }
@define('BASE_DIR', dirname(__FILE__));
include_once(BASE_DIR . '/../conn.php');


if(isset($_POST['username'])){
    loginFunction();
}

if(isset($_POST['ins_type'])){
    if($_POST['ins_type'] == 'add'){
        addFeatures();   
    }else{
        removeFeatures(); 
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

function getVehicleUsers($value){  
    global $conn;

    $sql = "SELECT * FROM vehicles INNER JOIN members ON members.m_id = vehicles.member_id WHERE vehicles.v_number ='" . $value . "'";
    $result   = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       return mysqli_fetch_assoc($result);
    }else{
        return null;
    }
   
}

function getInsuranceData($value){
    global $conn;

    $sql = "SELECT v_ins.* FROM vehicles INNER JOIN v_ins ON v_ins.v_ins_car_no = vehicles.v_number WHERE vehicles.v_number ='" . $value . "' ORDER BY v_ins.v_ins_id DESC LIMIT 1";
    $result   = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       return mysqli_fetch_assoc($result);
    }else{
        return null;
    }

}

function allFeatures(){
    global $conn;

    $sql = "SELECT * FROM features";
    $result   = mysqli_query($conn, $sql);
    return $result;
    // return mysqli_fetch_all( $result, MYSQLI_ASSOC);

}

function getActiveFeatures($value){
    global $conn;

    $sql = "SELECT * FROM features_for_ins WHERE ins_id ='" . $value . "' AND status= '1'";
    $result   = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
        // return mysqli_fetch_all( $result, MYSQLI_ASSOC);
    }else{
        return null;
    }

}

function addFeatures(){
   global $conn;

    $sql = "SELECT * FROM features_for_ins WHERE ins_id ='" . $_POST['ins_id'] . "' AND f_id='".$_POST['function_id']."'";
    $result   = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        $query= "UPDATE features_for_ins SET status = '1' WHERE ins_id ='" . $_POST['ins_id'] . "' AND f_id='".$_POST['function_id']."'";
        mysqli_query($conn, $query);
    }else{

        $query= "INSERT INTO `features_for_ins` ( `f_id`, `ins_id`, `status`) VALUES ( '" . $_POST['function_id'] . "', '" . $_POST['ins_id'] . "', '1')";
        mysqli_query($conn, $query);

    }
}

function removeFeatures(){
   
    global $conn;

    $query= "UPDATE features_for_ins SET status = '0' WHERE ins_id ='" . $_POST['ins_id'] . "' AND f_id='".$_POST['function_id']."'";
    mysqli_query($conn, $query);
}

?>