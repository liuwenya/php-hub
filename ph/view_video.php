<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');

$uh = 'http://www.pornhub.com/view_video.php?viewkey=';
$up = '';
$u = $uh;

if(isset($_GET['viewkey'])){
	$up = urldecode($_GET['viewkey']);
	$u = $u.$up;
}

// Create DOM from URL or file
$html = file_get_html($u);

$title = $html->find('h1',0)->plaintext;

//include_once('./viewhead.php');
?>

<?php
?>
<div id="playerDiv_1">
	<object type="application/x-shockwave-flash" data="http://cdn1.static.pornhub.phncdn.com/flash/player2012.swf?cache=2013021901" width="608" height="481" id="playerDiv_1" style="visibility: visible;"><param name="allowfullscreen" value="true"><param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="flashvars" value="pauseroll_url=http%3A%2F%2Fads.genericlink.com%2Fads%2Fsite%2Fpauseroll%2Fpornhub%2Fph_pauseroll.php&amp;autoplay=true&amp;autoreplay=false&amp;video_unavailable=&amp;link_url=http%3A%2F%2Fwww.pornhub.com%2Fview_video.php%3Fviewkey%3D1109998152&amp;image_url=http%3A%2F%2Fthumb2.cdn1a.image.pornhub.phncdn.com%2Fvideos%2F201209%2F27%2F5814842%2F180x135%2F4.jpg&amp;video_title=Nubile+Films+++My+Model&amp;related_url=http%3A%2F%2Fwww.pornhub.com%2Fvideo%2Fplayer_related_datas%3Fid%3D5814842&amp;video_url=CgCWdlPGJFHpcqIdgA0KS6zhakX%2FeNZR9qKDqYzm9c%2Bz4exFygEJ1zG5ZqNtwb0vWfIRv420i%2BOAnF69zHXUH7yGMUtBupVV6hsYpzy9TiSKWPX3Fy7mk2lUbkgylGYF6350ZBKXyyfe40kS0Ib3MQ7JydNrZNGiQctpIqzaIslD25PYPkEDujnSavNUMWcsUl3vdwhto7T3njA82nunQUlRjQsGysc8&amp;encrypted=true&amp;toprated_url=http%3A%2F%2Fwww.pornhub.com%2Fvideo%3Fo%3Dtr%26t%3Dm&amp;mostviewed_url=http%3A%2F%2Fwww.pornhub.com%2Fvideo%3Fo%3Dmv%26t%3Dm&amp;options=show&amp;postroll_url=http%3A%2F%2Fads.genericlink.com%2Fads%2Fsite%2Fpostroll%2Fpornhub%2Fph_postroll.php"></object>

	<div class="no-flash-js">
		<div id="underplayer">
			<noscript>
				<div id="playerfail-nojs">
					<a href="http://www.macromedia.com/go/getflashplayer/">
					</a>
				</div>
			</noscript>
			<div id="playerfail">
				<a href="http://www.macromedia.com/go/getflashplayer/">
				</a>
			</div>
		</div>
	</div>
</div>