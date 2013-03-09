<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');
include_once('./common.php');

$up = '';
$u = $uh;

if(isset($_GET['up'])){
	$up = urldecode($_GET['up']);
	$u = $u.$up;
}

// Create DOM from URL or file
$html = file_get_html($u);

//$title = urldecode($_GET['t']);

include_once('./head.php');

$pad = $html->find('div[class=pad]',0);

foreach($pad->find('a') as $element){
	$element->href = './play.php?up='.urlencode($element->href).'&t='.urlencode($title);
}

echo $pad;

include_once('./ad_foot.ad');
include_once('./bottom.php');
?>