<?php



  
    
    header('Location: ../page2.php?error=2');
        session_start();	
	include_once '../../conn.php';
	include_once 'functions.php';

	//Fetching Values from URL
	$login_pass = $_POST['password'];
	$hash = password_hash($login_pass, PASSWORD_DEFAULT);
	$login_user = $_POST['admin_id'];
	$captcha_code = $_POST["captcha_code"];
        $login_user_type= $_POST['user_type'];
   
      
	if($login_pass != '' && $login_user != '' && $login_user_type != ''){
            if ($captcha_code != $_SESSION["captcha_code"]) {
				header('Location: ../login.php?error=5');
				exit();
            }
	   
              if($login_user_type=='Supermaster'){
                          $sqlcheck="SELECT * FROM administrators WHERE  a_username='".$login_user."' AND a_status = 1 ";
                         $result = mysqli_query($conn, $sqlcheck);
 
       
                if(mysqli_num_rows($result) > 0){
                    $res = mysqli_fetch_assoc($result);
                    $pw = $res['a_password'];


                    if(password_verify($login_pass,$pw))
                    {

                        $_SESSION['login'] = $res['a_id'];
                        $_SESSION['supermaster'] = $res['a_username'];

                    header('Location: ../index.php?error=0');

                    }       
                    else{
                          header('Location: ../login.php?error=2');

                    }


                } else{

                      header('Location: ../login.php?error=1');

                }
      

          
      }elseif ($login_user_type=='Admin') {
          
       $sqlcheck="SELECT * FROM members WHERE  m_username='".$login_user."' AND m_status = 1 ";
               
       $result = mysqli_query($conn, $sqlcheck);
 
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
            if($res['m_type']!='Admin'){
                 header('Location: ../login.php?error=2');
                
            }
            if(password_verify($login_pass,$pw))
            {
               
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['Admin'] = $res['m_username'];
              
            header('Location: ../../Admin/index.php?error=0');
 
            }       
            else{
                  header('Location: ../login.php?error=2');
                
            }

            
        } else{
            
              header('Location: ../login.php?error=1');
            
        }
        
    }elseif ($login_user_type=='Distributor') {
             $sqlcheck="SELECT * FROM members WHERE  m_username='".$login_user."' AND m_status = 1 ";
               
       $result = mysqli_query($conn, $sqlcheck);
 
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
              if($res['m_type']!='Distributor'){
                 header('Location: ../login.php?error=2');
                
            }
            if(password_verify($login_pass,$pw))
            {
               
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['Distributor'] = $res['m_username'];
              
            header('Location: ../../Distributor/index.php?error=0');
 
            }       
            else{
                  header('Location: ../login.php?error=2');
                
            }

            
        } else{
            
              header('Location: ../login.php?error=1');
            
        }
        
        
    }elseif ($login_user_type=='Agency') {
             $sqlcheck="SELECT * FROM members WHERE  m_username='".$login_user."' AND m_status = 1 ";
               
       $result = mysqli_query($conn, $sqlcheck);
 
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
            if($res['m_type']!='Agency'){
                 header('Location: ../login.php?error=2');
                
            }
            if(password_verify($login_pass,$pw))
            {
               
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['Agency'] = $res['m_username'];
              
            header('Location: ../../Agency/index.php?error=0');
 
            }       
            else{
                  header('Location: ../login.php?error=2');
                
            }

            
        } else{
            
              header('Location: ../login.php?error=1');
            
        }
        
    }elseif ($login_user_type=='Member') {
             $sqlcheck="SELECT * FROM members WHERE  m_username='".$login_user."' AND m_status = 1 ";
               
       $result = mysqli_query($conn, $sqlcheck);
 
       
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $pw = $res['m_password'];
               
                 if($res['m_type']!='Member'){
                 header('Location: ../login.php?error=2');
                
            }
            
            
            
            if(password_verify($login_pass,$pw))
            {
               
                $_SESSION['login'] = $res['m_id'];
                $_SESSION['Member'] = $res['m_username'];
              
            header('Location: ../../Member/index.php?error=0');
 
            }       
            else{
                  header('Location: ../login.php?error=2');
                
            }

            
        } else{
            
              header('Location: ../index.php?error=1');
            
        }
        
    }
        
	
	} else {
		header('Location: ../login.php?error=1');
	}

?>