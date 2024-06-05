<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Please log in</h1>

<form action="login.php" method="POST">
    <label for="username">Enter your username: </label><br>
    <input type="text" id="username" name="username" placeholder="Username" required><br><br>
    <label for="password">Enter your password: </label><br>
    <input type="text" id="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" id="submit" name="submit" value="Log in">
</form>

</body>
</html>