<?php

include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');

$lt = 'Fresh';
$lu = 'b2p.com';

$uh = 'http://www.nuvid.com';
$mh = 'http://m.nuvid.com';

$up = '';
$title = '';
$img = '';

$cache_valid_time = 5;
$head_cache_file = './cache/head.htm';
$menu_cache_file = './cache/menu.htm';
$list_cache_file = './cache/list.htm';

$head_temp_file = './temp/head.htm';
$menu_temp_file = './temp/menu.htm';
$list_temp_file = './temp/list.htm';
$play_temp_file = './temp/play.htm';

function cache_valid($file_name,$valid_time=300) {
	$last_modified = filemtime($file_name);
	$timediff = time() - $last_modified;
	if($timediff > $valid_time){
		return false;
	}  
	else{
		return true;
	}
}

?>