<?php
	
	define(ROOT, "C:/AppServ/www/cbs/");
	include ROOT."libs/Smarty.class.php";
	
	date_default_timezone_set('Asia/Shanghai'); //设置时区
	$tpl=new Smarty;
	$tpl->template_dir=ROOT."tpl/";
	$tpl->compile_dir=ROOT."com";
	$tpl->left_delimiter="<{";
	$tpl->right_delimiter="}>";

