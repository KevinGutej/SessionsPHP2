<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="register.php" method="post">
        <div>
            Login: <input name="login" type="text" required>
        </div>
        <div>
            age: <input name="age" type="number" required>
        </div>
        <div>
            Password: <input name="password" type="password" required>
        </div>
        <div>
            Re-Password: <input name="re-password" type="password" required>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</body>

</html>