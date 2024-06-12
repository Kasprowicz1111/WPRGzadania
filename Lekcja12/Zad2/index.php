<?php
include ('functions_for_operating_on_database.php');
include ('functions_for_getting_information_from_database.php');
function cookie()
{
    setcookie('people_sort', $_POST['people_sort'], time() + 60*60*24);
    setcookie('cars_sort', $_POST['cars_sort'], time() + 60*60*24);
    header("Location:index.php");
}



$database = new PDO('mysql:host=localhost;dbname=database_for_zad2', 'root', '');
create_database($database);
check_insert($database);
if (isset($_POST['sorting_submit']))
    cookie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Manage MySQL Database</h1>
<form method="post">
    <h2>Add Person</h2>
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="second_name" placeholder="Second Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="submit" name="add_person" value="Add Person">
</form>
<form method="post">
    <h2>Add Car</h2>
    <input type="text" name="model" placeholder="Model" required>
    <input type="text" name="price" placeholder="Price" required>
    <select name="person_ID" required>
        <option value="" selected disabled>Select Person</option>
        <?php print_options($database); ?>
    </select>
    <input type="submit" name="add_car" value="Add Car">
</form>
<h2>People</h2>
<form method="post" action="delete_or_edit_person.php">
    <table class="container">
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Second Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        <?php print_people($database); ?>
    </table>
</form>
<h2>Cars</h2>
<form method="post" action="delete_or_edit_car.php">
    <table class="container">
        <tr>
            <td>ID</td>
            <td>Model</td>
            <td>Price</td>
            <td>Data of Bay</td>
            <td>person_ID</td>
            <td>Action</td>
        </tr>
        <?php print_cars($database); ?>
    </table>
</form>
<h2>Sorting</h2>
<form class="not_block" method="post">
    <select name="people_sort" required>
        <option value="" disabled selected>People</option>
        <option value="ID">ID</option>
        <option value="first_name">First name</option>
        <option value="second_name">Second name</option>
        <option value="email">Email</option>
    </select>
    <select name="cars_sort" required>
        <option value="" disabled selected>Cars</option>
        <option value="ID">ID</option>
        <option value="model">Model</option>
        <option value="price">Price</option>
        <option value="date_of_buy">Date of buy</option>
        <option value="person_ID">person_ID</option>
    </select>
    <br>
    <input name="sorting_submit" type="submit" value="sort">
</form>
<form action="search.php" method="post">
    <h2>Search in People</h2>
    <input type="text" name="searched" placeholder="Searched information" required>
    <select name="column" required>
        <option value="" disabled selected>People</option>
        <option value="ID">ID</option>
        <option value="first_name">First name</option>
        <option value="second_name">Second name</option>
        <option value="email">Email</option>
    </select>
    <input type="submit" value="search" name="people_search">
</form>
<form action="search.php" method="post">
    <h2>Search in Cars</h2>
    <input type="text" name="searched" placeholder="Searched information" required>
    <select name="column" required>
        <option value="" disabled selected>Cars</option>
        <option value="ID">ID</option>
        <option value="model">Model</option>
        <option value="price">Price</option>
        <option value="date_of_buy">Date of buy</option>
        <option value="person_ID">person_ID</option>
    </select>
    <input type="submit" value="search" name="cars_search">
</form>
</body>
</html>
<?php
$database = null;
?>