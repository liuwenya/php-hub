<?php
	function get_list($dom,$i){
		$res = '';
		//if($i == 0 && get_holder_count($dom) == 3){
		//	$res = '<div class="first_index">';
		//}

		foreach($dom->find('div[class=holder]',$i)->find('div[class=box-tumb]') as $element){
			$src = $element->find('img',0)->src;
			$title = $element->find('a',0)->title;
			$remark = $element->find('div[class=box]',0);
			$href = $element->find('a',0)->href;
			$href = 'view.php?u='.urlencode($href).'&t='.urlencode($title).'&img='.$src;
			
			$res = $res.'<div class="box-tumb">';

			$res = $res.'<a href="'.$href
				.'" target="_blank" '
				.' title="'.$title
				.'" class=video-thumb>';

			$res = $res.'<img src="'.getimg($src)
				.'" '
				.' title="'
				.$title
				.'" width=240 height=147 class=image/><br>';

			$res = $res.'</a>';

			$res = $res.'<a href="'.$href
				.'" target="_blank" '
				.' title="'.$title
				.'"><strong>'
				.$title
				.'</strong></a><br>';

			$res = $res.'<div class="box">'.$remark.'</div>';
			$res = $res.'</div>';	
		}

		//if($i == 0 && get_holder_count($dom) == 3){
		//	$res = $res.'</div>';
		//}

		return $res;
	}

	function get_page($dom,$uhost){
		$pglist = $dom->find('ul[class=paging]',0);
		$pglist = str_replace($uhost.'/','?up=',$pglist);

		return $pglist;
	}
	
	function get_holder_count($dom){
		$res = 0;
		foreach($dom->find('div[class=holder]') as $element){
			$res ++;
		}

		return $res;
	}

	function replace_list_label($content,$dom,$uhost){
		if(get_holder_count($dom) == 3){
			$content = str_replace('{$list1}',get_list($dom,0),$content);
			$content = str_replace('{$list2}',get_list($dom,1),$content);
		}
		else{
			$script = 'document.getElementById("divMostViewTitle").style.display="none";';
			$script = $script.'document.getElementById("divMostViewList").style.display="none";';

			$content = str_replace('{$list1}','<script>'.$script.'</script>',$content);
			$content = str_replace('{$list2}',get_list($dom,0),$content);
		}

		$content = str_replace('{$page}',get_page($dom,$uhost),$content);

		return $content;
	}

	$ft = fopen($list_temp_file,"r");
	if($ft){
		$ftr = fread($ft,filesize($list_temp_file));
		$ftr = replace_list_label($ftr,$html,$uh);

		fclose ($ft);
		echo $ftr;
	}
?>