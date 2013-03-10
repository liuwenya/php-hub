<?php
include_once('./common.php');
$u = $uh;


if(isset($_GET['u'])){
	$up = urldecode($_GET['u']);
	$u = $u.$up;
}

if(isset($_GET['t'])){
	$title = urldecode($_GET['t']);
}

if(isset($_GET['img'])){
	$img = urldecode($_GET['img']);
}

$p = explode('/',$up);
$p = $p[2];
$vu = $uh.'/embed/'.$p;
$mu = $mh.'/download/'.$p;



$html = file_get_html($u);
$mhtml = file_get_html($mu);

include_once('./head.php');
?>
<div class="main">
	<div class="twocolumns">
		<div class="content">
			<?php include_once('./play.php'); ?>
		</div>
		<?php include_once('./menu.php'); ?>
	</div>
</div>
<?php include_once('./foot.php');?>

