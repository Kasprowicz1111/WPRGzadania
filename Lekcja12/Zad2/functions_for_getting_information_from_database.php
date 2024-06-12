<?php
function print_options($database)
{
    $result_query_select_people = get_people($database);
    while ($selected_person = $result_query_select_people->fetch(PDO::FETCH_ASSOC)) {
        printf('<option value="%d">%s</option>', $selected_person['ID'], $selected_person['first_name'] . " " . $selected_person['second_name']);
    }
}
function print_people($database)
{
    $result_query_select_people = get_people($database);
    while ($selected_person = $result_query_select_people->fetch(PDO::FETCH_ASSOC)) {
        printf('<tr>
                               <td>%d</td>
                               <td>%s</td>
                               <td>%s</td>
                               <td>%s</td>
                               <td>
                                   <table>
                                   <tr>
                                   <td><button value="%d" name="delete_person" type="submit">Delete</button></td>
                                   <td><button value="%d" name="edit_person" type="submit">Edit</button></td>
                                   </tr>
                               
</table></td>
                           </tr>',
            $selected_person['ID'], $selected_person['first_name'], $selected_person['second_name'], $selected_person['email'], $selected_person['ID'], $selected_person['ID']);
    }
}
function print_cars($database)
{
    $result_query_select_cars = get_cars($database);
    while ($selected_car = $result_query_select_cars->fetch(PDO::FETCH_ASSOC)){
        printf('<tr>
                               <td>%d</td>
                               <td>%s</td>
                               <td>%.2f</td>
                               <td>%s</td>
                               <td>%d</td>
                               <td>
                                   <table>
                                   <tr>
                                   <td><button value="%d" name="delete_car" type="submit">Delete</button></td>
                                   <td><button value="%d" name="edit_car" type="submit">Edit</button></td>
                                   </tr>
                               
</table></td>
                           </tr>',
            $selected_car['ID'], $selected_car['model'], $selected_car['price'], $selected_car['date_of_buy'], $selected_car['person_ID'], $selected_car['ID'], $selected_car['ID']);
    }
}
function get_people($database)
{
    if (isset($_COOKIE['people_sort'])){
        $query = "select * from people order by {$_COOKIE['people_sort']};";
        $result = $database->query($query);
        return $result;
    }else {
        $query = "select * from people;";
        $result = $database->query($query);
        return $result;
    }
}
function get_cars($database)
{
    if (isset($_COOKIE['cars_sort'])){
        $query = "select * from cars order by {$_COOKIE['cars_sort']};";
        $result = $database->query($query);
        return $result;
    }else {
        $query = "select * from cars;";
        $result = $database->query($query);
        return $result;
    }
}
?>