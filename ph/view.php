<?php

$con = file_get_contents($_GET[url]);
$preg="/<h1>(.*)<\/h1>/";
preg_match($preg,$con,$arr);
echo "<h1>".$arr[1]."</h1>";
echo "<hr>";
$preg2="/<div class=\"text clear\" id=\"contentText\" collection=\"Y\">(.*)<\/div>/s";
preg_match($preg2,$con,$arr2);
echo $arr2[1];

?>