<?php
try {
    @$connection = new mysqli("localhost1", "Kevin", "Goodmorning2", "registration");

    $sesLogin = $_SESSION['login'] ;

    if($connection->errno == 0)
    {
        $sqlReq = "SELECT login, age FROM users WHERE login = '$sesLogin';";
        $result = $connection->query($sqlReq);
        $userData = $result->fetch_assoc();

        echo '<div>';
        echo 'Your login is: ' . $userData["login"];
        echo '</div>';

        echo '<div>';
        echo 'You are: ' . $userData["age"] . ' years old';
        echo '</div>';
    }
}catch(Exception $exception) 
{
    echo 'Connection with database cannot be established';
}
?>