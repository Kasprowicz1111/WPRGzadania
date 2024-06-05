<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web poll</title>
</head>
<body>

<h1>The Witcher Novel Series</h1>

    <form action="manage.php" method="GET">
        <p>Which is one of the series of the novel?</p>
        <input type="checkbox" name="question1" value="fighters">Fighters of War<br>
        <input type="checkbox" name="question1" value="bloods">Bloods<br>
        <input type="checkbox" name="question1" value="lake">The Lady of the Lake<br>


        <p>Which of these is one of the series?</p>
        <input type="checkbox" name="question2" value="city">The Lost City<br>
        <input type="checkbox" name="question2" value="key">The Key<br>
        <input type="checkbox" name="question2" value="wish">The Last Wish<br>
        <input type="checkbox" name="question2" value="power">Power Magnet<br>


        <p>Geralt is also called</p>
        <input type="checkbox" name="question3" value="tier">The Tier<br>
        <input type="checkbox" name="question3" value="killer">The Killer<br>
        <input type="checkbox" name="question3" value="white_wolf">The While Wolf<br>
        <input type="checkbox" name="question3" value="butcher">The Butcher<br>

        <p><input type="submit" name="submit" value="Submit"></p>
    </form>

</body>
</html>