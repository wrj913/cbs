<?php
	require "../config/db.class.php";
	require "../config/smarty.inc.php";
	print_r($_POST);
	$user_id = $_POST ['user_id'];

	$sql = "select * from users where id='$user_id'";
	$db = new DB () ;
	$data = $db -> select($sql);
//	echo $sql;
//	print_r($data);
	$tpl->assign("data", $data);

$tpl -> display("user_edit.html");

if(!empty($_POST['user_email'])){
	$id=$_POST['id'];
	$user_email  =$_POST['user_email'];
	$user_password = $_POST['user_password'];
	$user_permission = $_POST['user_permission'];
	
	$sql = "update users set user_email='$user_email',user_password='$user_password',user_permission='$user_permission' where id='$id'";
	$db = new DB () ;
	$is_success = $db->update($sql);
	
if ($is_success ) {
		echo "<script language=javascript>alert('信息修改成功！');history.back();location.href='../user.php';</script>";
	} else {
		echo "<script language=javascript>alert('信息修改失败！');history.back();window.opener.location.reload();</script>";
	}
}
?>