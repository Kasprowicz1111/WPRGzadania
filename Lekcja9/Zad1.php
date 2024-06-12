<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="get">
    <label for="date">Wpisz datę</label>
    <input type="date" name="user_date" id="date" required>
    <input type="submit">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["user_date"])){
    function jaki_dzien_tygodnia($time) {
        echo strftime("Urodziłeś się w %A." ,$time). "<br>";

    }
    function ukonczone_lata($time){
        echo "Masz ";
        $age = date("Y") - date("Y", $time);
        if (date("m") > date("m", $time))
            echo $age;
        else if (date("m") < date("m", $time))
            echo --$age;
        else if (date("d") > date("d", $time) || date("z") == date("z", $time)) // załóżmy, że, jeżeli użytkownik ma urodziny dzisiaj, to już beżący rok też się liczy
            echo $age;
        else
            echo --$age;
        echo " ukońconych lat. <br>";
    }
    function dni_do_uridzin($time) {
        echo "Do następntch urodzin jest ";
        if (date("z") < date("z", $time) || date("z") == date("z", $time)){
            $a = strtotime(substr_replace($_GET['user_date'], strftime("%Y"), 0 , 4)); //// dla uwzględnienia lat, które mają 366 dni
            echo date("z", $a) - date("z");
            }
        else{
            $a = strtotime(substr_replace(strftime("%Y-%m-%d", time()), "12-31", 5, 5)); // dla uwzględnienia lat, które mają 366 dni
            echo date("z", $a) - date("z") + date("z", $time) + 1;
        }
        echo " dni.";
    }
    $data_urodzenia = strtotime($_GET["user_date"]);
    jaki_dzien_tygodnia($data_urodzenia);
    ukonczone_lata($data_urodzenia);
    dni_do_uridzin($data_urodzenia);
}
?>