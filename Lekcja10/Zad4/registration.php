<?php

function validatePassword($password) {
    if (strlen($password) < 6) {
        return false;
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }

    if (!preg_match('/[\W_]/', $password)) {
        return false;
    }

    return true;
}

include_once "email_exists.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!validatePassword($password)) {
    echo "Invalid password.";
} else if (emailExists($email)) {
    echo "Email already taken.";
} else {
    $file = fopen("database.txt", "a");
    fwrite($file, "$fname,$lname,$email,$password\n");
    fclose($file);
    echo "Registration successful!<br>";
    echo "You can now log in:<br>";
    echo "<a href='login.html'>Log in here</a>";
}