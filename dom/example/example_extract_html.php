<?php
include_once('../simple_html_dom.php');

echo file_get_html('http://www.yahoo.com/')->plaintext;
?>