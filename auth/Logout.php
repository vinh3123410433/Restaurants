<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['username']);
header("Location: http://localhost/restaurants/auth/login.php");
exit();