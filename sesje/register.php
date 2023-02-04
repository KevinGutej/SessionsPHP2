<?php

session_start();

if (isset($_POST['login']) && empty($_POST['login']) == false) {
    if (isset($_POST['password']) && empty($_POST['password']) == false) {
        if (isset($_POST['age']) && empty($_POST['age']) == false) {
            if (isset($_POST['re-password']) && empty($_POST['re-password']) == false) {
                if ($_POST['password'] != $_POST['re-password']) {
                    $_SESSION['error'] = 'Password does not match';
                    header('location:registrationForm.php');
                } else {
                    if ((int)$_POST['age'] < 18) {
                        $_SESSION['error'] = 'You are not old enough to register';
                        header('location:registrationForm.php');
                    } else {
                        $givenLogin = $_POST['login'];
                        $givenPassword = $_POST['password'];
                        $givenAge = (int)$_POST['age'];
                    }
                }
            }
        }
    }
}

if (isset($givenLogin)) {
    $connection = new mysqli("localhost", "Kevin", "Goodmorning2", "registration");

    if ($connection->errno == 0) {
        $sqlReq = "SELECT login FROM users WHERE login = '$givenLogin';";
        $result = $connection->query($sqlReq);

        if ($result->num_rows == 1) {
            $_SESSION['error'] = '[Error] - There is already a user with that login' .
                '<br>' .
                'Please Choose different login';
            header('location:registrationForm.php');
        } else if ($result->num_rows == 0) {
            $sqlReq = "INSERT INTO users (login, age, password) VALUES ('$givenLogin', $givenAge,  '$givenPassword');";
            $result = $connection->query($sqlReq);
            if ($result === false) {
                $_SESSION['error'] = 'Can\'t register another user with this login as it\'s already in use';
                header('location:registrationForm.php');
            } else {
                $_SESSION['error'] = 'You are registered';
                header('location:loginForm.php');
            }
        }
    } else {
        $_SESSION['error'] = 'Error with connecting to database, try again later';
        header('location:registrationForm.php');
    }
}
