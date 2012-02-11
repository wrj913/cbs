<?php
require "../config/db.class.php";
print_r($_POST);
//Array ( [provinc_id] => [city_id] => [dis_id] => [street] => ) 
$dis_id = $_POST ['dis_id'];
$ustr_name = $_POST ['street'];

$sql = "insert into street (str_name,dis_id) 
		  		  values('$ustr_name','$dis_id')";
$db = new DB () ;
$is_success = $db->insert($sql);
if ($is_success != 0) {
	echo "<script language=javascript>alert('信息添加成功！');history.back();location.href='../user.php';</script>";
} else {
	echo "<script language=javascript>alert('信息添加失败！');history.back();window.opener.location.reload();</script>";
}	
?>