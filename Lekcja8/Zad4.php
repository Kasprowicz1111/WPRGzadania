<?php

    $ciagZnakow = readline("Wpisz znaki:");
    $samogloski = 'aeiouAEIOU';
    $licznikSamoglosek = 0;

    //strlen dlugosc ciagu znakow
        for($i= 0 ; $i < strlen($ciagZnakow) ; $i++) {
            if (strpos($samogloski, $ciagZnakow[$i]) !== false) {
                $licznikSamoglosek++;
            }
        }
echo "Liczba samoglosek w ciagu "$ciagZnakow": $licznikSamoglosek\n";
?>