<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');
include_once('./common.php');


$up = 'Free Fresh Mobile Mobile Porn Videos & Sex Movies - B2P.com';
$u = $uh;


if(isset($_GET['up'])){
	$up = urldecode($_GET['up']);
	$u = $u.'/'.$up;
}

// Create DOM from URL or file
$html = file_get_html($u);

include_once('./head.php');

$ct = $html->find('h2',0)->plaintext;
?>

<div class="title">
                        <h2><?php echo $ct; ?></h2>
            <div class="clear"></div>
        </div>

<?php

$i =1;

foreach($html->find('div[class=tumb]') as $element){	
	foreach($element->find('a') as $aelement){
		if($aelement->title == 'Play 3gp' || $aelement->title =='Play MP4'){
			$aelement->href = './play.php?up='.urlencode($aelement->href).'&t='.urlencode($aelement->title);
		}
		else{
			$aelement->href = './view.php?up='.urlencode($aelement->href).'&t='.urlencode($aelement->title);
		}
	}
	echo $element;

	$i++;

	if($i==5){
		include_once('./ad_mid.ad');
	}
}

include_once('./foot.php');
include_once('./bottom.php');
?>