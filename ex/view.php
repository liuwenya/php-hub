<?php
include_once('../dom/simple_html_dom.php');
include_once('../dom/cls_page.php');
include_once('./imgcache.php');

$up = $_GET['u'];
$u = 'http://www.aili.com/'.$up;
$pg = 1;
$epg = 1;

if(isset($_GET['pg'])){
	$pg = $_GET['pg'];

	if($_GET['pg'] != '1')
		$u = str_replace('.html','_'.($pg-1).'.html',$u);
}

// Create DOM from URL or file
$html = file_get_html($u);

$title = $html->find('title',0);
$epg = $html->find('div[class=Ben_box Ben_bg BS2]',0)->children[0]->children[1]->plaintext;
$epg = substr($epg,1);

echo '<head><title>'.$title->plaintext.'</title></head>';
echo $title->plaintext.$epg.'<br>';

foreach($html->find('img[id=showBigPic]') as $element){

	$src = $element->src;
	//$alt = $element->alt;

	echo '<img src="'.getimg($src)
			.'"/><br>';
}

echo '</table><br>';


  $page_size=1;   
  $nums=$epg;   
  $sub_pages=10;   
  $pageCurrent=$pg; 
 
  //if(!$pageCurrent) $pageCurrent=1;  
     
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,'view.php?u='.$up.'&pg=',2); 
?>