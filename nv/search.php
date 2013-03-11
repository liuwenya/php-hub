<?php
include_once('./common.php');

$u = $sh;
$key = '';

if(isset($_GET['search_query'])){
	$key = urldecode($_GET['search_query']);
	$up = str_replace(' ','-',urldecode($_GET['search_query']));
	$u = $u.'/'.$up;
}

$html = file_get_html($u);

include_once('./head.php');
?>
<div class="main">
	<div class="twocolumns">
		<div class="content">
			<?php include_once('./slist.php'); ?>
		</div>
		<?php include_once($menu_cache_file); ?>
	</div>
</div>
<?php include_once('./foot.php');?>

