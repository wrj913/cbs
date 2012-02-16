<?php

require "../config/db.class.php";
require "../config/smarty.inc.php";


$ipqam_id = $_POST ['deliver_id'];
print_r($_POST);
$db = new DB () ;
$data = $db -> select("SELECT *
						FROM delivers, area
						WHERE delivers.pro_id = area.pro_id
						AND delivers.city_id = area.city_id
						AND delivers.dis_id = area.dis_id
						AND delivers.str_id = area.str_id
						AND delivers.id = '$ipqam_id'
						ORDER BY ipqams.pro_id ASC , ipqams.city_id ASC , ipqams.dis_id ASC");
print_r($data);
$tpl->assign("data", $data);
print_r($data);
$tpl -> display("deliver_edit.html");

if(!empty($_POST['user_email'])){
	$ipqam_ip=$_POST['ipqam_ip'];
	$ipqam_port=$_POST['ipqam_port'];
	$province_id=$_POST['province_id'];
	$city_id=$_POST['city_id'];
	$dis_id=$_POST['dis_id'];
	$str_id=$_POST['str_id'];
	$available=$_POST['available'];
	$update_at=date("Y-m-d");
//	$sql = "update users set user_email='$user_email',user_password='$user_password',user_permission='$user_permission' where id='$id'";
//	$db = new DB () ;
//	$is_success = $db->update($sql);
//	
//if ($is_success ) {
//		echo "<script language=javascript>alert('信息修改成功！');history.back();location.href='../user.php';</script>";
//	} else {
//		echo "<script language=javascript>alert('信息修改失败！');history.back();window.opener.location.reload();</script>";
//	}
}
?>