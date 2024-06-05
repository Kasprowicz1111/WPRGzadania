<?php
$liczba = readline("Wpisz liczbę: ");

//  czy podano liczbe zmiennoprzecinkowa
if (strpos($liczba, '.') !== false) {

    $czesci = explode('.', $liczba); // explode = "apple,banana" -> ["apple", "banana"]

    // isset -.  czy istnieje zmienna i czy nie jest pusta
    if (isset($czesci[1])) { // [liczba..] , [liczba po przeczinku] -> indeks wtedy jest [1]
        $dlugosc_po_przecinku = strlen($czesci[1]);
        echo "Liczba cyfr po przecinku: $dlugosc_po_przecinku";
    } else {
        echo "Podana liczba nie zawiera czesci dziesietnej.";
    }
} else {
    echo "Podana liczba nie jest zmiennoprzecinkowa.";
}
?>
