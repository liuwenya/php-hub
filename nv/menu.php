<?php
	function replace_menu_label($content,$dom){
		$menu = $dom->find('ul[class=menu]',0);
		foreach($menu->find('a') as $element){
			$element->href = '?up='.$element->href;
		}

		$content = str_replace('{$menu}',$menu,$content);

		return $content;
	}
	
	if(!cache_valid($menu_cache_file,$cache_valid_time)){
		$fc = fopen($menu_cache_file,"w");
		if($fc){
			$menu = '';
			$ft = fopen($menu_temp_file,"r");
			if($ft){
				$ftr = fread($ft,filesize($menu_temp_file));
				$ftr = replace_menu_label($ftr,$html);

				fclose($ft);
				$menu = $ftr;
			}
			fwrite($fc,$menu);
			fclose($fc);
		}
	}

	include_once($menu_cache_file);

?>