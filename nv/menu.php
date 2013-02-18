<?php
$menu = $html->find('div[class=sidebar]',0);
foreach($menu->find('a') as $element){
	$element->href = '?up='.$element->href;
}
echo $menu;
echo '</div></div>';
echo '<div class="footer"><p>Copyright ? 2011-2012 NuVid.com, All Rights Reserved.</p></div>';
?>