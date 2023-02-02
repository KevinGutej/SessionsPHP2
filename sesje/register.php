<?php

if (isset($_POST['login']) && empty($_POST['login']) == false) {
    if (isset($_POST['password']) && empty($_POST['password']) == false) {
        if (isset($_POST['age']) && empty($_POST['age']) == false) {
            if (isset($_POST['re-password']) && empty($_POST['re-password']) == false) {
                if (isset($_POST['password']) != ($_POST['re-password'])) {
                    echo 'Password does not match';
                } else {
                    if ((int)$_POST['age'] < 18) {
                        echo 'You are not old enough to register';
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
            echo '[Error] - There is already a user with that login';
            echo '<br>';
            echo 'Please Choose different login';
        } else if ($result->num_rows == 0) {
            $sqlReq = "INSERT INTO users (login, age, password) VALUES ('$givenLogin', $givenAge,  '$givenPassword');";
            $result = $connection->query($sqlReq);
            //Handle error while inserting it NEXT LESSON!
        }
    } else {
        echo 'Error with connecting';
    }
}
