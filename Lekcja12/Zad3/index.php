<?php
include ('registration.html');
$database = new mysqli('localhost', 'root', '', 'zad3');
$query = "create table if not exists Users(
    ID int primary key auto_increment,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    phone varchar(20) not null,
    email varchar(255) not null unique,
    password varchar(255) not null
);";
$database->query($query);
if (isset($_POST['registration'])){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = $database->prepare("insert into Users (first_name, last_name, phone, email, password) value (?,?,?,?,?)");
    $query->bind_param('sssss',$_POST['first_name'],$_POST['last_name'],$_POST['phone'],$_POST['email'], $password);
    $query->execute();
    header('Location:index.php');
}
$query = "select count(ID) as users_amount from Users";
$query_result = $database->query($query);
$result = $query_result->fetch_assoc();
if ($result['users_amount'] > 0){
    printf("There are %d registered users", $result['users_amount']);
}
$database->close();