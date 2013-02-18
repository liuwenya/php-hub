<?php

	function str_split_unicode($str, $l = 0) {
		 if ($l > 0) {
			 $ret = array();
			 $len = mb_strlen($str, "UTF-8");
			 for ($i = 0; $i < $len; $i += $l) {
				 $ret[] = mb_substr($str, $i, $l, "UTF-8");
			 }
			 return $ret;
		 }
		 return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	 }

	function mkdirs($dir, $mode = 0777)
	{
		if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
		if (!mkdirs(dirname($dir), $mode)) return FALSE;
		return @mkdir($dir, $mode);
	}

	function getimg($u){
		$ext = explode('.',$u);
		$ext = '.'.end($ext);

		$dir = './cache/'.implode('/',str_split_unicode(md5($u),8));
		mkdirs($dir);

		$fp = $dir.'/'.md5($u).$ext;

		//$fp = './cache/'.md5($u).$ext;

		if(file_exists($fp) && filesize($fp)==0){
			unlink($fp);
		}

		if(!file_exists($fp)){
			file_put_contents($fp,get_url_content($u));
		}

		if(file_exists($fp) && filesize($fp)<1024){
			unlink($fp);
			return $u;
		}
		else{
			return $fp;
		}
	}
?>