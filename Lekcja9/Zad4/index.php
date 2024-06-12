<?php
$fd = fopen("links", "r");
while (($str = fgets($fd)) !== false){
    $strs = explode(';', $str);
    $array[$strs[0]] = $strs[1];
}
print_r($array);
fclose($fd);
?>