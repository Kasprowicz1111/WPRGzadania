<?php

include_once "email_exists.php";

$email = $_POST['email'];
$password = $_POST['password'];

function passwordExists($password) {
    $file = fopen("database.txt", "r");

    while (($line = fgets($file)) !== false) {
        $parts = explode(",", trim($line));

        if (count($parts) >= 4 && strtolower(trim($parts[3])) === strtolower(trim($password))) {
            fclose($file);
            return true;
        }
    }

    fclose($file);

    return false;
}

if (!passwordExists($password)) {
    echo "Wrong password.";
} else if (!emailExists($email)) {
    echo "Wrong email.";
} else {
    echo "You have successfully logged in!<br>";
    echo "You can now log out:<br>";
    echo "<a href='logout.php'>Log out here</a>";
}