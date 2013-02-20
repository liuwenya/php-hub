<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');

$uh = 'http://www.nuvid.com';
$up = '';
$u = $uh;

if(isset($_GET['u'])){
	$up = urldecode($_GET['u']);
	$u = $u.$up;
}
$p = explode('/',$up);
$p = $p[2];
$vu = $uh.'/embed/'.$p;

$title = urldecode($_GET['t']);

// Create DOM from URL or file
$html = file_get_html($u);

include_once('./head.php');
?>

<?php
echo '<div class="main">';
echo '<div class="twocolumns">
	<div class="content">';

echo '<div class="top-heading"><h2>'.$title.'</h2></div>';
echo '<div class="left-holder" id="playerBy" height="300">';

$vhtml = file_get_html($vu);

$vhtml->find('object',0)->id='local_player';
$vhtml->find('object',0)->name='local_player';
$vhtml->find('object',0)->find('param[name=allowScriptAccess]',0)->value='never';

//use display:none
//$vhtml->find('object',0)->find('embed',0)->id='local_player';
//$vhtml->find('object',0)->find('embed',0)->name='local_player';
//$vhtml->find('object',0)->find('embed',0)->allowScriptAccess='never';

echo $vhtml->find('object',0);
echo '</div></div>';

include_once('./menu.php');
?>
</div>