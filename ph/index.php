﻿<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');

$uh = 'http://www.pornhub.com';
$up = '';
$u = $uh;
$title = 'b2p';

if(isset($_GET['up'])){
	$up = urldecode($_GET['up']);
	$u = $u.$up;
}

// Create DOM from URL or file
$html = file_get_html($u);


include_once('./head.php');
?>

<?php
$html = str_replace('target=""','target="_blank"',$html);

echo '<h2>being_watched</h2>';
echo str_replace('http://www.pornhub.com','.',$html->find('ul[id=being_watched]',0));

echo '<h2>most_recent</h2>';
echo str_replace('http://www.pornhub.com','.',$html->find('ul[class=videos row-5-thumbs]',0));
?>


<?php
include_once('./index_foot_js.php');
?>