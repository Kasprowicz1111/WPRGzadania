<?php
$database = new PDO("mysql:host=localhost;dbname=database_for_zad2", 'root', '');
if (isset($_POST['people_search'])){
    if ($_POST['column'] == 'first_name' || $_POST['column'] == 'second_name' || $_POST['column'] == 'email')
        $query = "select * from people where {$_POST['column']} = '{$_POST['searched']}';";
    else
        $query = "select * from people where {$_POST['column']} = {$_POST['searched']};";
    $query_result = $database->query($query);
    echo "<table style='border-collapse: collapse'>
<tr>
            <td style='border: 1px solid black'>ID</td>
            <td style='border: 1px solid black'>First Name</td>
            <td style='border: 1px solid black'>Second Name</td>
            <td style='border: 1px solid black'>Email</td>
</tr>";
    while ($result = $query_result->fetch(PDO::FETCH_ASSOC)){
        printf('<tr>
                               <td style="border: 1px solid black">%d</td>
                               <td style="border: 1px solid black">%s</td>
                               <td style="border: 1px solid black">%s</td>
                               <td style="border: 1px solid black">%s</td>
                           </tr>',
            $result['ID'], $result['first_name'], $result['second_name'], $result['email']);
    }
    echo "</table>";
}else{
    if ($_POST['column'] == 'model' || $_POST['column'] == 'date_of_buy')
        $query = "select * from cars where {$_POST['column']} = '{$_POST['searched']}';";
    else
        $query = "select * from cars where {$_POST['column']} = {$_POST['searched']};";
    $query_result = $database->query($query);
    echo "<table style='border-collapse: collapse'>
<tr>
            <td style='border: 1px solid black'>ID</td>
            <td style='border: 1px solid black'>Model</td>
            <td style='border: 1px solid black'>Price</td>
            <td style='border: 1px solid black'>Date of buy</td>
            <td style='border: 1px solid black'>person_ID</td>
</tr>";
    while ($result = $query_result->fetch(PDO::FETCH_ASSOC)){
        printf('<tr>
                               <td style="border: 1px solid black">%d</td>
                               <td style="border: 1px solid black">%s</td>
                               <td style="border: 1px solid black">%.2f</td>
                               <td style="border: 1px solid black">%s</td>
                               <td style="border: 1px solid black">%d</td>
                           </tr>',
            $result['ID'], $result['model'], $result['price'], $result['date_of_buy'], $result['person_ID']);
    }
    echo "</table>";
}
echo "<a href='index.php'>return</a>";
$database = null;