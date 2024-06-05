<?php

$ciagZnakow = readline("Wpisz znaki:");

$ciag_bez_niepozadanych_znakow = preg_replace('/[\\/:*?"<>|+-.]/','',$ciagZnakow);

echo "ciag :" . ($ciag_bez_niepozadanych_znakow). "\n" ;


?>