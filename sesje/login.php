<?php

session_start();


$login = 'kevin';
$password = '1234';

if(isset($_POST['login']) && empty($_POST['login']))
{
    if(isset($_POST['password']) && empty($_POST['password']))
    {
        
    }
    else {
        echo "Please enter your password";
    }
}
else {
    echo "Please enter your login";
}


?>