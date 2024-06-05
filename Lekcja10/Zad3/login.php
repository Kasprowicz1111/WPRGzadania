<?php
 session_start();

 $username = "username";
 $password = "1234abcd";

 if ($_POST["username"] == $username && $_POST["password"] == $password) {
     $_SESSION["loggen_in"] = true;
     header("location: logged_in.html");
 } else {
     $SESSION["loggen_in"] = false;
     header("location: not_logged_in.html");
 }