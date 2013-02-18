<?php
include_once('../dom/simple_html_dom.php');
include_once('../dom/cls_page.php');

$uh = 'http://www.nuvid.com/';
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
echo '<div class="main">';
echo '<div class="twocolumns">
	<div class="content">';

echo '<div class="top-heading"><h2>Most Viewed Videos</h2></div>';

$ad_i =1;

foreach($html->find('div[class=block-tumb]',0)->find('div') as $belement){

	//echo '<div class="block-tumb">';

	if($belement->class == 'holder'){
	    echo '<div class="holder">';
	    echo '<div class="first_index">';

	    foreach($belement->find('div[class=box-tumb]') as $element){
	
	        echo '<div class="box-tumb">';

		$src = $element->find('img',0)->src;
		$title = $element->find('a',0)->title;
		$remark = $element->find('div[class=box]',0);
		$href = $element->find('a',0)->href;
		$href = 'view.php?u='.urlencode($href).'&t='.urlencode($title);
		

		echo '<a href="'.$href
			.'" target="_blank" '
			.' title="'.$title
			.'" class=video-thumb>';

		echo '<img src="'.$src
			.'" '
			.' title="'
			.$title
			.'" width=240 height=147 class=image/><br>';

		echo '</a>';

		echo '<a href="'.$href
			.'" target="_blank" '
			.' title="'.$title
			.'"><strong>'
			.$title
			.'</strong></a><br>';

		echo '<div class="box">'.$remark.'</div>';
		echo '</div>';		
	   }	
	   echo '</div>';
	   echo '<div class="holder-banner">xxx '.$ad_i.'</div></div>';
	   $ad_i++;

	}

	if($belement->class == 'top-heading'){
		echo '<div class="top-heading"><h2>Most recent videos</h2></div>';
	}
}

$pglist = $html->find('ul[class=paging]',0);
$pglist = str_replace('http://www.nuvid.com/','?up=',$pglist);
echo $pglist;

echo '</div>';

include_once('./menu.php');
/*
  $page_size=1;   
  $nums=$epg;   
  $sub_pages=10;   
  $pageCurrent=$pg; 
 
  //if(!$pageCurrent) $pageCurrent=1;  
     
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,'index.php?pg=',2); 
*/
?>
</div>