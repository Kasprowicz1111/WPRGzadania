<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
    <h2>Kalkulator prosty</h2>
    <form action="" method="post">
        <label for="num1">Liczba 1:</label>
        <input type="text" name="num1" id="num1"><br><br>
        <label for="num2">Liczba 2:</label>
        <input type="text" name="num2" id="num2"><br><br>
        <label for="operation">Wybierz operację:</label>
        <select name="operation" id="operation">
            <option value="+">Dodawanie</option>
            <option value="-">Odejmowanie</option>
            <option value="*">Mnożenie</option>
            <option value="/">Dzielenie</option>
        </select><br><br>
        <input type="submit" name="submitSimple" value="Oblicz">
    </form>
    
    <?php
    // Sprawdzenie czy formularz prosty został wysłany
    if (isset($_POST["submitSimple"])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $resultSimple = calculatorSimple($operation, $num1, $num2);
        echo "<br>Wynik: $resultSimple";
    }

    // Funkcja kalkulatora prostego
    function calculatorSimple($operation, $num1, $num2) {
        switch ($operation) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                // Sprawdzenie dzielenia przez zero
                if ($num2 != 0) {
                    return $num1 / $num2;
                } else {
                    return "Nie można dzielić przez zero!";
                }
            default:
                return "Nieznana operacja";
        }
    }
    ?>
    
    <h2>Kalkulator zaawansowany</h2>
    <form action="" method="post">
        <label for="num">Liczba:</label>
        <input type="text" name="num" id="num"><br><br>
        <label for="operationAdvanced">Wybierz operację:</label>
        <select name="operationAdvanced" id="operationAdvanced">
            <option value="cos">Cosinus</option>
            <option value="sin">Sinus</option>
            <option value="tan">Tangens</option>
            <option value="decToBin">Dziesiętne na binarne</option>
            <option value="binToDec">Binarne na dziesiętne</option>
            <option value="decToHex">Dziesiętne na szesnastkowe</option>
            <option value="hexToDec">Szesnastkowe na dziesiętne</option>
        </select><br><br>
        <input type="submit" name="submitAdvanced" value="Oblicz">
    </form>
    
    <?php
    // Sprawdzenie czy formularz zaawansowany został wysłany
    if (isset($_POST["submitAdvanced"])) {
        $num = $_POST['num'];
        $operationAdvanced = $_POST['operationAdvanced'];
        $resultAdvanced = calculatorAdvanced($operationAdvanced, $num);
        echo "<br>Wynik: $resultAdvanced";
    }

    // Funkcja kalkulatora zaawansowanego
    function calculatorAdvanced($operation, $num) {
        switch ($operation) {
            case 'cos':
                return cos($num);
            case 'sin':
                return sin($num);
            case 'tan':
                return tan($num);
            case 'decToBin':
                return decbin($num);
            case 'binToDec':
                return bindec($num);
            case 'decToHex':
                return dechex($num);
            case 'hexToDec':
                return hexdec($num);
            default:
                return "Nieznana operacja";
        }
    }
    ?>
</body>
</html>
