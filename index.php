<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>


  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="./img/login.jpg" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="POST" action="">
          <span class="login100-form-title">
            Login
          </span>

          <div class="wrap-input100 validate-input">
            <!-- Username-->
            <input class="input100" type="text" name="email" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <!-- Password-->
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
         <!-- Button -->
            <button class="login100-form-btn" name="but_login">
              Login
            </button>
          </div>


          <div class="text-center p-t-136">
            <a class="txt2" href="#">
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/tilt/tilt.jquery.min.js"></script>

  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  
 

</body>

</html>

<?php
include "./PHP/dbConn.php";
session_start();
if (isset($_SESSION['loggedin'])) {
  if($_SESSION["role"]=="Administratie"){
    header("Location:administratie.php");
    exit();
  }

  if($_SESSION["role"]=="Financieel"){
    header("Location:blank_finan.html");
    exit();
  }

  if($_SESSION["role"]=="Beheerder"){
    header("Location:blank_beheer.html");
    exit();
  }
}

if (isset($_POST['but_login'])) {

  $uname=$_POST["email"];
  $pwd=$_POST["pass"];

    if (empty($uname) || empty($pwd)) {
        header("Location:index.php?error=emptyfields");
        exit();
    } else {
        $sql  = "SELECT * FROM gebruikers WHERE User_Email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
               $passwd= $row["User_Password"];
               $role=$row["User_Rollen"];

                if ($pwd !== $passwd) {
                    header("Location:index.php?error=wrongpwd");
                    exit();
                } elseif ($pwd == $passwd) {
                  $_SESSION['loggedin'] = true;
                  $_SESSION["name"] = $row["User_Naam"];
                  $_SESSION["role"] = $row["User_Rollen"];
                  
                  if($role=="Administratie"){
                    header("Location:administratie.php");
                    exit();
                  }

                  if($role=="Financieel"){
                    header("Location:blank_finan.html");
                    exit();
                  }

                  if($role=="Beheerder"){
                    header("Location:blank_beheer.html");
                    exit();
                  }

                } else {
                    header("Location:index.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location:index.php?error=nouser");
                exit();
            }
        }
    }
}

?>

