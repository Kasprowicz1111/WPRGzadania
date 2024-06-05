<?php

function emailExists($email) {
    $file = fopen("database.txt", "r");

    while (($line = fgets($file)) !== false) {
        $parts = explode(",", trim($line));

        if (count($parts) >= 3 && strtolower(trim($parts[2])) === strtolower(trim($email))) {
            fclose($file);
            return true;
        }
    }

    fclose($file);

    return false;
}