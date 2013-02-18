<?php
include_once('../dom/simple_html_dom.php');
include_once('../dom/cls_page.php');

$uh = 'http://www.nuvid.com/';
$up = '';
$u = $uh;

if(isset($_GET['u'])){
	$up = urldecode($_GET['u']);
	$u = $u.$up;
}
$p = explode('/',$up);
$p = $p[2];
$vu = $uh.'embed/'.$p;

$title = urldecode($_GET['t']);

// Create DOM from URL or file
$html = file_get_html($u);

include_once('./head.php');
?>



<?php
echo '<div class="main">';
echo '<div class="twocolumns">
	<div class="content">';

echo '<div class="top-heading"><h2>'.$title.$p.'</h2></div>';

$vhtml = file_get_html($vu);
echo $vhtml;
echo '</div>';

include_once('./menu.php');
?>
</div>