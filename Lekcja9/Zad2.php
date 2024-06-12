<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Działanie na kotalogach</h1>
<form method="POST">
    <label for="path">Ścieżka:</label>
    <input id="path" type="text" name="path" required>
    <br>
    <label for="name">Nazwa:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="operation">Operacja:</label>
    <select name="operation" id="operation">
        <option value="read">odczytanie wszystkich elementów w katalogu</option>
        <option value="delete">usunięcie wskazanego katalogu w podanej ścieżce</option>
        <option value="create">stworzenie katalogu w podanej ścieżce</option>
    </select>
    <br>
    <input type="submit">
</form>
</body>
</html>

<?php
function is_dir_empty($full_path){
    $dir = opendir($full_path);
    while (($file = readdir($dir)) !== false){
        if ($file != '.' && $file != '..') {
            closedir($dir);
            return false;
        }
    }
    closedir($dir);
    return true;
}
function directories($path, $directory, $operation) {
    $path = trim($path);
    $directory = trim($directory);
    if (substr($path, -1) !== "\\")
        $path = $path . "\\";
    $full_path = $path . $directory;
    switch ($operation){
        case "read":
            if (!file_exists($full_path))
                echo "Ten katakog nie istnieje!";
            else {
                $dir = opendir($full_path);
                while (($file = readdir($dir)) !== false) {
                    if ($file != '.' && $file != '..')
                        echo $file . "<br>";
                }
                closedir($dir);
            }
            break;
        case "delete":
            if (!file_exists($full_path))
                echo "Ten katakog nie istnieje!";
            else if (!is_dir_empty($full_path))
                echo "Katalog nie jest pusty!";
            else {
                rmdir($full_path);
                echo "katalog został usunięty";
            }
            break;
        case "create":
            mkdir($full_path);
            echo "katalog został stworzony";
            break;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    directories($_POST["path"], $_POST["name"], $_POST["operation"]);
}
?>