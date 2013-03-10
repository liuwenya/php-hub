<?php

	function replace_play_label($content,$dom,$img,$vtitle){
		$mp4 = $dom->find('div[class=pad]',0)->find('a',0)->href;
		$script = '<script>document.getElementById("mpurl").src="'.$mp4.'";</script>';

		$content = str_replace('{$img}',$img,$content);
		$content = str_replace('{$vtitle}',$vtitle,$content);
		$content = $content.$script;

		return $content;
	}

	$ft = fopen($play_temp_file,"r");
	if($ft){
		$ftr = fread($ft,filesize($play_temp_file));
		$ftr = replace_play_label($ftr,$mhtml,$img,$title);

		fclose ($ft);
		echo $ftr;
	}

?>