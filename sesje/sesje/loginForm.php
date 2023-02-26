<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <div class="<?php
                if (isset($_SESSION['error'])) {
                    echo 'message-error';
                } else if (isset($_SESSION['message'])) {
                    echo 'message-prompt';
                }

                ?>">
        <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } else if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
    </div>

    <form action="login.php" method="post">
        <div>
            Login: <input name="login" type="text" required>
        </div>
        <div>
            Password: <input name="password" type="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>



</html>