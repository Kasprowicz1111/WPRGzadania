<?php

$visit_limit = 13;

if (isset($_COOKIE["visits_count"])) {
    $visits_count = $_COOKIE["visits_count"];
    if (isset($_POST["reset"])) {
        header("Location: reset.php");
        exit;
    } else {
        setcookie("visits_count", $visits_count + 1, time() + (86400), "/");
    }
} else {
    $visits_count = 1;
    setcookie("visits_count", $visits_count, time() + (86400), "/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>

<body>

<p>You have visited this page <?php echo $visits_count ?> times.</p>

<?php

if ($visits_count >= $visit_limit) {
    echo "You have reached the limit of $visit_limit.";
}

?>

<form action="reset.php" method="POST">
    <input type="submit" name="reset" value="Reset">
</form>

</body>
</html>
