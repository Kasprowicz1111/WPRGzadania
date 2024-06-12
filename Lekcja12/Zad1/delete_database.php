<?php
include ('index.html');
$database = new mysqli("localhost", 'root', 'Skyrim.8051', 'database_for_zad1', 3306);
try {
    $database->query('drop table student;');
    $database->close();
    echo 'database has been deleted';
}catch (Exception $exception){
    setcookie('deleted', true, time() + 60 * 60 * 24);
    $database->close();
    header('Location:index.php');
}
