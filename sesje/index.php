<?php

session_start();

if(isset($_SESSION['login']))
{
    echo "Hello ". $_SESSION['login'] . " you are logged in.";
    echo '<a href="logout.php">Click here to logout</a>';
}
else {
    echo "You are not logged in";
    echo '<a href="loginForm.php">Click here to login</a>';
}
include('userData.php');
?>
