<?php
include_once('./common.php');

$u = $uh;


if(isset($_GET['up'])){
	$up = urldecode($_GET['up']);
	$u = $u.'/'.$up;
	$u = str_replace('http://','',$u);
	$u = str_replace('//','/',$u);
	$u = 'http://'.$u;
}

$html = file_get_html($u);

include_once('./head.php');
?>
<div class="main">
	<div class="twocolumns">
		<div class="content">
			<?php include_once('./list.php'); ?>
		</div>
		<?php include_once('./menu.php'); ?>
	</div>
</div>
<?php include_once('./foot.php');?>

