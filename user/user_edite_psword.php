<?php
	require "../config/db.class.php";

	$user_email = $_POST ['user_email'];
	$user_password = sha1($_POST ['user_password']);
	
	$sql = "update users set user_password='$user_password' where user_email='$user_email'";
	$db = new DB () ;
	$is_success = $db->update($sql);
//	echo $sql;
	if ($is_success ) {
		echo "<script language=javascript>alert('信息添加成功！');history.back();location.href='../user.php';</script>";
	} else {
		echo "<script language=javascript>alert('信息添加失败！');history.back();window.opener.location.reload();</script>";
	}

?>