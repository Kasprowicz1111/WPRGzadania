<?php
function create_database($database)
{
    $query = 'create table People
(
    ID          int primary key auto_increment,
    first_name  varchar(255) not null,
    second_name varchar(255) not null,
    email       varchar(255) not null
);
create table Cars
(
    ID    int primary key auto_increment,
    model varchar(255) not null,
    price decimal(10, 2) not null,
    date_of_buy datetime not null,
    person_ID int not null
);
alter table Cars add constraint foreign key (person_ID) references People(ID) on delete cascade;';
    try {
        $database->query($query);
        echo 'success';
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

function check_insert($database)
{
    if (isset($_POST['add_person'])) {
        $query_insert_into_people = "insert into People (first_name, second_name, email) VALUES ('{$_POST['first_name']}','{$_POST['second_name']}','{$_POST['email']}')";
        insert($database, $query_insert_into_people);
    } else if (isset($_POST['add_car'])) {
        $date_of_buy = strftime('%Y:%m:%d %H:%M:%S', time());
        $query_insert_into_cars = "insert into Cars (model, price, date_of_buy, person_ID) VALUES ('{$_POST['model']}','{$_POST['price']}', '$date_of_buy','{$_POST['person_ID']}');";
        insert($database, $query_insert_into_cars);
    }
}

function insert($database, $query)
{
    try {
        $database->query($query);
        header("Location:index.php");
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}
?>