<?php
function is_allowed($user_ip){
    $fd = fopen("ip", "r");
    while (($str = fgets($fd)) !== false){
        if ($user_ip == $str)
            fclose($fd);
            return false;
    }
    fclose($fd);
    return true;

}
$user_ip = $_SERVER["REMOTE_ADDR"];
if (is_allowed($user_ip))
    include("strona1.html");
else
    include("strona2.html");
?>