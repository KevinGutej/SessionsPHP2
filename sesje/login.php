<?php

session_start();

if (isset($_POST['login']) && empty($_POST['login']) == false) {

    if (isset($_POST['password']) && empty($_POST['password']) == false) {

        $connection = new mysqli("localhost", "Kevin", "Goodmorning2", "registration");
        if ($connection->errno == 0) {

            $givenLogin = $_POST['login'];
            $givenPassword = $_POST['password'];
            $sqlReq = "SELECT login, password FROM users WHERE login = '$givenLogin' AND password = '$givenPassword';";
            $result = $connection->query($sqlReq);

            if ($result->num_rows == 0) {
                $_SESSION['error'] =  "Please try again with different login/password";
                header('location:loginForm.php');
            } else {
                $login = $givenLogin;
                $user = $result->fetch_assoc();
                $login = $user['login'];
                $password = $user['password'];
            }
        }
        if ($_POST['login'] == $login) {
            if ($_POST['password'] == $password) {
                unset($_SESSION['error']);
                $_SESSION['login'] = $login;
                header('location:index.php');
            } else {
                $_SESSION['error'] = 'The given password is not correct';
                header('location:loginForm.php');
            }
        } else {
            $_SESSION['error'] = 'User with this login cannot be fount';
            header('location:loginForm.php');
        }
    } else {
        $_SESSION['error'] = 'Please enter your password';
        header('location:loginForm.php');
    }
} else {
    $_SESSION['error'] = 'Please enter your login';
    header('location:loginForm.php');
}
