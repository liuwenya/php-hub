<?php

$con = file_get_contents("http://www.nuvid.com");

$preg="/¡¤<a href=(.*) target=_blank>(.*)<\/a>/U";
preg_match_all($preg,$con,$arr);

echo $con;

foreach($arr[1] as $id=>$v){
	echo "<a href=view.php?url=$v>".$arr[2][$id]."</a><br>";
}

?>