<?php
include('index.html');
if (!isset($_COOKIE['deleted'])) {
    $database = new mysqli("localhost", 'root', '', 'database_for_zad1', 3306);
    $query = 'create table Student(
    StudentID int primary key,
    Firstname varchar(255),
    Secondname varchar(255),
    Salary int,
    DataOfBirth date
);';
    try {
        $database->query($query);
        echo 'database has been created';
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
    $database->close();
}
else{
    setcookie('deleted', true, time() - 60);
    echo 'database has been deleted';
}
