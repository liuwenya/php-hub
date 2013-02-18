<?php
include_once('../dom/simple_html_dom.php');
include_once('../dom/cls_page.php');
include_once('./imgcache.php');


$u = 'http://www.aili.com/akoy/phxgmt/index.html#one';
$pg = 1;
$epg = 50;

if(isset($_GET['pg'])){
	$pg = $_GET['pg'];

	if($pg != '1')
		$u = 'http://www.aili.com/akoy/phxgmt/index_'.($pg-1).'.html#one';
}

// Create DOM from URL or file
$html = file_get_html($u);

// Find all images 

echo '<table>';

$i = 0;

foreach($html->find('div[class=pdd]') as $element){
	if($i == 0){
		echo '<tr>';
	}

	$i ++;

	$src = $element->children[0]->children[0]->children[0]->src;
	$title = $element->children[0]->children[0]->title;
	$href = $element->children[0]->children[0]->href;

	$href = str_replace('http://www.aili.com/','view.php?u=',$href);

	echo '<td>';

	echo '<a href="'.$href
			.'" target="_blank" '
			.' title="'.$title
			.'">';

	echo '<img src="'.getimg($src)
			.'" '
			.' title="'
			.$title
			.'" /><br>';

	echo '</a>';

	echo '<a href="'.$href
			.'" target="_blank" '
			.' title="'.$title
			.'">'
			.$title
			.'</a>';
	echo '</td>';

	if($i == 5){
		echo '</tr>';
		$i = 0;
	}
}

//for(;$i<5;$++){
//	echo '<td></td>';
//}

echo '</table><br>';

  $page_size=1;   
  $nums=$epg;   
  $sub_pages=10;   
  $pageCurrent=$pg; 
 
  //if(!$pageCurrent) $pageCurrent=1;  
     
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,'index.php?pg=',2); 

?>
