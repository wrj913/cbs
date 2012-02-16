<?php
header ( 'Content-Type:text/html; charset=utf-8' );
require "../config/db.class.php";
$id = $_GET ['id'];

$db = new DB ();
$sql = "delete from delivers where id='$id'";
$is_success = $db->delete ( $sql );

if ($is_success) {
	echo "<script language=javascript>alert('信息删除成功！');history.back();location.href='../deliver.php';</script>";
} else {
	echo "<script language=javascript>alert('信息删除失败！');history.back();window.opener.location.reload();</script>";
}
?>