<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
  include 'config.php';
	$sql="select * from ipqams ";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	print_r($row);
	print_r($result);
?>