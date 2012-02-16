<?php
require "../config/db.class.php";

$ipqam_ip=$_POST['ipqam_ip'];
$ipqam_port=$_POST['ipqam_port'];
$province_id=$_POST['province_id'];
$city_id=$_POST['city_id'];
$dis_id=$_POST['dis_id'];
$str_id=$_POST['str_id'];
$available=$_POST['available'];
$created_at=date("Y-m-d");

print_r($_POST);
	 $sql = "insert into ipqams (ip,port,pro_id,city_id,dis_id,str_id) 
		  		  values('$ipqam_ip','$ipqam_port','$province_id','$city_id','$dis_id','$str_id')";
	$db = new DB () ;
	$is_success = $db->insert($sql);
//	echo $sql;
	if ($is_success != 0 ) {
		echo "<script language=javascript>alert('信息添加成功！');history.back();location.href='../ipqam.php';</script>";
	} else {
		echo "<script language=javascript>alert('信息添加失败！');history.back();window.opener.location.reload();</script>";
	}
?>