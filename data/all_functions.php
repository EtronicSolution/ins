<?php
if(!isset($_SESSION)) { session_start(); }
@define('BASE_DIR', dirname(__FILE__));
include_once(BASE_DIR . '/../conn.php');
include_once(BASE_DIR . '/../dompdf/autoload.inc.php');

use Dompdf\Dompdf; 

if(isset($_POST['username'])){
    loginFunction();
}

if(isset($_POST['reffer_by'])){
    registerFunction();
}

if(isset($_POST['owner'])){
    vehicleRegisterFunction();
}



if(isset($_POST['ins_id'])){
    pdfFunction();
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
    $sqlcheck="SELECT * FROM members WHERE  m_username='".$_POST['username']."' AND m_status = 1 AND m_type='delegator'";
               
       $result = mysqli_query($conn, $sqlcheck);
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
       
            if(password_verify($_POST['password'], $pw))
            {
            //    echo 'success';
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['delegator'] = $res['m_username'];


                $sql_v_check = "SELECT * FROM vehicles WHERE v_number ='" . $_SESSION['v_no'] . "'";
                $resultv_check   = mysqli_query($conn, $sql_v_check);
                 if (mysqli_num_rows($resultv_check) > 0) {
                     
                    header('Location: ../page2.php?v_number=' . $_SESSION['v_no']);
                     
                 }else {

                    header('Location: ../register-user.php');
                 }
 
            }       
            else{
                  header('Location: ../login_blade.php?error=2');
                
            }

            
        } else{
              header('Location: ../login_blade.php?error=1');
            
        }
}

function registerFunction(){
    global $conn;


    $hash_password = password_hash($_POST['m_password'], PASSWORD_DEFAULT);
    $sqlcheck = "SELECT * FROM members WHERE m_username='" . $_POST['m_username'] . "'";
    $result = mysqli_query($conn, $sqlcheck);

    if (mysqli_num_rows($result) > 0) {
        header('Location: ../register-user.php?error=1');
    } else {
        $sql = "INSERT INTO members (m_username, m_password, m_name, m_email, m_address, m_phone,m_type, m_dob,m_reseller_by) VALUES ('" . $_POST['m_username'] . "','" . $hash_password . "', '" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['address'] . "', '" . $_POST['phone'] . "', 'user', '" . $_POST['dob'] . "', '" . $_POST['reffer_by'] . "')";
                       
        if(mysqli_query($conn, $sql)){
            header('Location: ../page2new.php');
        }else{
            header('Location: ../register-user.php?error=1');
        }

        
    }
}

function vehicleRegisterFunction(){
    global $conn;

    $sql = "INSERT INTO `vehicles` ( `v_number`,  `member_id`, `v_price`, `status`, `register_date`,  `created_by`,  `color`, `make`, `model`, `cc`, `v_type`) VALUES ( '" . $_POST['v_no'] . "', '" . $_POST['owner'] . "', '" . $_POST['value'] . "', '1', '" . date('Y-m-d') . "', '" . $_SESSION['login'] . "', '" . $_POST['color'] . "', '" . $_POST['make'] . "', '" . $_POST['model'] . "',  '" . $_POST['cc'] . "', '1')";         
                        
            if (mysqli_query($conn, $sql)) {

                $sql2 = "INSERT INTO `v_ins` ( `v_ins_number`, `v_ins_policy`, `v_ins_short_description`, `v_ins_member_id`, `v_ins_agent_id`,  `v_ins_price`, `status`, `register_date`, `expire_date`, `created_by`, `v_ins_comapany`, `v_ins_car_no`) VALUES ( '" . $_POST['code'] . "', '" . $_POST['policy'] . "', '" . $_POST['v_description'] . "', '" . $_POST['owner']. "','" . $_SESSION['login']. "', '" . $_POST['amount']. "', '1' ,'". date('Y-m-d') ."', '" . $_POST['expiry'] . "', '" . $_SESSION['login'] . "', '" . $_POST['company'] . "', '" . $_POST['v_no'] . "')";
           
                
                if(mysqli_query($conn, $sql2))
                {
                     $ins_id= $conn->insert_id;
                     $zone= $conn->query("SELECT `m_loc` FROM members WHERE m_id = '" . $_SESSION['login']. "' ");
                     $loc = $zone->fetch_assoc();
                     $precentage= '';
                     $commission= '';

                     if($loc["m_loc"] == '1'){
                        $precentage= 10;
                        $commission= $_POST['amount'] * ($precentage/100);
                     }elseif ($loc["m_loc"] == '2') {
                        if($_POST['amount'] > '16000'){
                            $precentage= 12;
                            $commission= $_POST['amount'] * ($precentage/100);
                        }elseif ($_POST['amount'] > '11000') {
                            $precentage= 11.5;
                            $commission= $_POST['amount'] * ($precentage/100);
                           
                        }elseif ($_POST['amount'] > '7000') {
                            $precentage= 11;
                            $commission= $_POST['amount'] * ($precentage/100);
                           
                        }elseif ($_POST['amount'] > '3000') {
                            $precentage= 10.5;
                            $commission= $_POST['amount'] * ($precentage/100);
                           
                        }else{
                            $precentage= 10;
                            $commission= $_POST['amount'] * ($precentage/100);
                        }
                     }
                     
                     $conn->query("INSERT INTO `commission`(`agent_id`, `ins_id`, `ins_amount`, `commission`, `%`) VALUES ('" . $_SESSION['login']. "', '" . $ins_id. "', '" . $_POST['amount']. "', '" . $commission. "','" . $precentage. "')");

                     header('Location: ../page2.php?v_number='.$_POST['v_no']);
                }else
                {
                     header('Location: ../page2new.php?error=2');
                }
            } else {
                header('Location: ../page2new.php?error=1');
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

function getFeatures($value){
    global $conn;

    $sql = "SELECT `f_number` FROM `features` LEFT JOIN features_for_ins ON features.f_id = features_for_ins.f_id  WHERE features_for_ins.ins_id ='" . $value . "' AND features_for_ins.status = '1'";
    $result   = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
        // return mysqli_fetch_all( $result, MYSQLI_ASSOC);
    }else{
        return null;
    }

}

function pdfFunction(){
    ob_start();
    include "vehiclePdf.php";
    $html = ob_get_clean();
    ob_end_clean();


    $dompdf = new DOMPDF();

    // Load content from html file 
    // $html = file_get_contents("vehiclePdf.php"); 
    $dompdf->loadHtml($html); 
     
    // (Optional) Setup the paper size and orientation 
    $dompdf->setPaper('A4'); 
     
    // Render the HTML as PDF 
    $dompdf->render(); 
     
    // Output the generated PDF (1 = download and 0 = preview) 
    $dompdf->stream("invoice", array("Attachment" => 1));
}

function getAllDelegators(){
    global $conn;

    $sql = "SELECT * FROM members WHERE m_type='delegator'";
    $result   = mysqli_query($conn, $sql);
    return $result;

}

function getAllMembers(){
    global $conn;

    $sql = "SELECT * FROM members WHERE m_type='user'";
    $result   = mysqli_query($conn, $sql);
    return $result;

}

function getAllCompany(){
    global $conn;

    $sql = "SELECT * FROM company";
    $result   = mysqli_query($conn, $sql);
    return $result;

}

function getAllPolicies(){
    global $conn;

    $sql = "SELECT * FROM policy";
    $result   = mysqli_query($conn, $sql);
    return $result;

}

?>