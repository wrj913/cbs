<?php
//print_r($_POST);
//Array ( [user_email] => qqqqqqq [user_password] => qq [ user_permission] => 0 ) 
require "../config/db.class.php";

	$user_email = $_POST ['user_email'];
	$user_password = sha1($_POST ['user_password']);
	$user_permission = $_POST ['user_permission'];
	
	$sql = "insert into users (user_email,user_password,user_permission) 
		  		  values('$user_email','$user_password','$user_permission')";
	$db = new DB () ;
	$is_success = $db->insert($sql);
//	echo $sql;
	if ($is_success != 0 ) {
		echo "<script language=javascript>alert('信息添加成功！');history.back();location.href='../user.php';</script>";
	} else {
		echo "<script language=javascript>alert('信息添加失败！');history.back();window.opener.location.reload();</script>";
	}

?>