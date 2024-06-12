<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liczę, ile tu już byłeś :-)</h1>
</body>
</html>

<?php
$file = fopen("licznik.txt", "c+");
$num = fgets($file) + 1;
fseek($file, SEEK_SET);
fwrite($file, $num);
ftruncate($file, ftell($file));
fclose($file);
?>