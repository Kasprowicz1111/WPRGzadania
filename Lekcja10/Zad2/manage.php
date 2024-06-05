<?php
include "main.php";
$name = "hasVoted";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_COOKIE[$name])) {
        echo "You have already voted.";
    } else {
        $vote = $_GET["submit"];
        setcookie("hasVoted", "true", time() + (7 * 24 * 60 * 60), "/");

        echo "Thank you for your vote.";
    }
} else {
    echo "Please answer questions first.";
}