<?php
include ('functions_for_getting_information_from_database.php');
$database = new PDO('mysql:host=localhost;dbname=database_for_zad2', 'root', '');
if (isset($_POST['edit']))
    $_POST['edit_car'] = 1;
if (isset($_POST['delete_car'])){
    $query = "delete from cars where ID = {$_POST['delete_car']}";
    $database->query($query);
    echo "The car has been deleted" . "<br>";
    echo "<a href='index.php'>return to main page</a>";
}else if (isset($_POST['edit_car'])){
    if (!isset($_POST['edit'])){
    $query = "select * from cars where ID = {$_POST['edit_car']}";
    $query_result = $database->query($query);
    $result = $query_result->fetch(PDO::FETCH_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h1>Edit this car</h1>
    <form method="post">
        <input type="text" name="model" placeholder="<?php echo $result['model']?>" required>
        <input type="text" name="price" placeholder="<?php echo $result['price']?>" required>
        <select name="person_ID" required>
            <option value="" selected disabled>Select Person</option>
            <?php print_options($database); ?>
        </select>
        <button value="<?php echo $result['ID'] ?>" name="edit" type="submit">Edit</button>
    </form>
    </body>
    </html>
<?php
    }else{
        $query = "update cars set model = '{$_POST['model']}', price = {$_POST['price']}, person_ID = {$_POST['person_ID']} where ID = {$_POST['edit']}";
        $database->query($query);
        header("Location:index.php");
    }
}
$database = null;