<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANS Motor Insurance</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <style>
                html,
                body {
                height: 100%;
                }

                body {
                display: -ms-flexbox;
                display: -webkit-box;
                display: flex;
                -ms-flex-align: center;
                -ms-flex-pack: center;
                -webkit-box-align: center;
                align-items: center;
                -webkit-box-pack: center;
                justify-content: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #ededed;
                }

                .form-signin {
                width: 100%;
                max-width: 450px;
                padding: 2.5rem;
                margin: 0 auto;
                }

                .form-signin img {
                width: 300px;
                }
                .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
                }
                .form-signin .form-control:focus {
                z-index: 2;
                }
                .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                }
                .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                }
        </style>

    <?php       
        if (isset($_GET['error'])) {
            $error = $_GET['error']; 
        } else {
        $error = ''; 
        }
    ?>
</head>

<body class="text-center">
     
    <div id="error_display" class="text-center text-danger">
        <?php

            if($error == '0'){
                echo "Please fill-in the Username and Password";
            } else if($error == '1'){
            echo "Invalid Username /Password/User Type or Account not Active. Please contact the Administrator"; 
            } else if($error == '3'){
                echo "Users loging restricted"; 
            } else if($error == '2'){
                echo "Incorrect Password"; 
            } 

        ?>
    </div>
    <form class="form-signin"  action="data/all_functions.php" method="POST">
      <img class="mb-4" src="./images/logo.png" alt="" width="100%">
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" name="username" class="form-control my-3" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      
      <button class="btn btn-lg btn-primary btn-block mb-5" type="submit">Sign in</button>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

</html>