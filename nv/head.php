<?php
	function replace_head_label($content,$dom,$host,$title){
		$content = str_replace('{$title}',$title,$content);
		$content = str_replace('{$hostName}',$title,$content);
		$content = str_replace('{$videoCount}',$dom->find('strong',0),$content);

		return $content;
	}
	
	if(!cache_valid($head_cache_file,$cache_valid_time)){
		$fc = fopen($head_cache_file,"w");
		if($fc){
			$head = '';
			$ft = fopen($head_temp_file,"r");
			if($ft){
				$ftr = fread($ft,filesize($head_temp_file));
				$ftr = replace_head_label($ftr,$html,$lu,$lt);

				fclose ($ft);

				$head = $ftr;
			}
			fwrite($fc,$head);
			fclose($fc);
		}
	}

	include_once($head_cache_file);
?>