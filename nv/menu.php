<?php
	function replace_menu_label($content,$dom){
		$menu = $dom->find('ul[class=menu]',0);
		foreach($menu->find('a') as $element){
			$element->href = '?up='.$element->href;
		}

		$content = str_replace('{$menu}',$menu,$content);

		return $content;
	}

	$ft = fopen($menu_temp_file,"r");
	if($ft){
		$ftr = fread($ft,filesize($menu_temp_file));
		$ftr = replace_menu_label($ftr,$html);

		fclose ($ft);
		echo $ftr;
	}
?>