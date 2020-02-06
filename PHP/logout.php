<?php

session_start();
session_unset();
session_destroy();
// setcookie('user_login', '',time() -7000000,'/');
// setcookie('userpassword', '',time() -7000000,'/');
header("Location:login.php");
exit();
