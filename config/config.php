<?php
	
	//常量参数
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','j');
	define('DB_NAME','data_center');
	
	//第一步，连接MYSQL服务器
	$conn = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());
	
	//第二步，选择指定的数据库，设置字符集
	mysql_select_db(DB_NAME) or die('数据库错误，错误信息：'.mysql_error());
	//第三步设置字符编码为：utf8
	mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());
?>
