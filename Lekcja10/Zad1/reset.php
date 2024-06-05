<?php


setcookie("visits_count", 1, time() + (86400), "/");
header("Location: main.php");
exit;

?>
