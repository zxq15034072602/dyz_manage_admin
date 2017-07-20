<?php
if (!defined('IN_MADM')) exit();

//$config['user'] = "admin"; // your username
//$config['passwd'] = "huachengchuanglian1"; // your password
$config['user'] = "root"; // your username
$config['passwd'] = "abc..123##@)5"; // your password


















// set the font and font-size in different languages
function set_font($t) {
	if ($t == 'body') {
		if ($_SESSION["MADM_SESSION_KEY"]['lang'] == 'zh-cn') {
			echo "font:'Courier New',Arial,sans-serif;font-size:13px;";
		} else {
			echo "font:'Courier New',Arial,sans-serif;font-size:13px;";
		} 
	} 
	if ($t == 'title') {
		if ($_SESSION["MADM_SESSION_KEY"]['lang'] == 'zh-cn') {
			echo "font:'Courier New',Arial,sans-serif;font-size:20px;font-weight:bold;";
		} else {
			echo "font:'Courier New',Arial,sans-serif;font-size:20px;font-weight:bold";
		} 
	} 
	if ($t == 'h1') {
		if ($_SESSION["MADM_SESSION_KEY"]['lang'] == 'zh-cn') {
			echo "font:'Courier New',Arial,sans-serif;font-size:14px;";
		} else {
			echo "font:'Courier New',Arial,sans-serif;font-size:14px;";
		} 
	} 
	if ($t == 'menu') {
		if ($_SESSION["MADM_SESSION_KEY"]['lang'] == 'zh-cn') {
			echo "font:'Courier New',Arial,sans-serif;font-size:14px;";
		} else {
			echo "font:'Courier New',Arial,sans-serif;font-size:14px;";
		} 
	} 
} 
$config['version'] = "1.0.12"; // MemAdmin version
?>
