<?php
$database = new PDO('mysql:host=localhost;dbname=database_for_zad2', 'root', '');
if (isset($_POST['edit']))
    $_POST['edit_person'] = 1;
if (isset($_POST['delete_person'])){
    $query = "delete from people where ID = {$_POST['delete_person']}";
    $database->query($query);
    $database = null;
    echo "The person has been deleted" . "<br>";
    echo "<a href='index.php'>return to main page</a>";
}else if (isset($_POST['edit_person'])){
    if (!isset($_POST['edit'])){
        $query = "select * from people where ID = {$_POST['edit_person']}";
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
            <input type="text" name="first_name" placeholder="<?php echo $result['first_name']?>" required>
            <input type="text" name="second_name" placeholder="<?php echo $result['second_name']?>" required>
            <input type="email" name="email" placeholder="<?php echo $result['email']?>" required>
            <button value="<?php echo $result['ID'] ?>" name="edit" type="submit">Edit</button>
        </form>
        </body>
        </html>
        <?php
        $database = null;
    }else{
        $query = "update people set first_name = '{$_POST['first_name']}', second_name = '{$_POST['second_name']}', email = '{$_POST['email']}' where ID = {$_POST['edit']}";
        $database->query($query);
        $database = null;
        header("Location:index.php");
    }
}