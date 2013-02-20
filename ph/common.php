<?php

	function change_href($html) {
		foreach($html->find('a') as $element){
			$element->href	= str_replace('http://www.pornhub.com','.',$element->href);
		}
		return $html;
	}
?>