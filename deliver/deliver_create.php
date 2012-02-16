<?php
require "../config/db.class.php";
$deliver_ip=$_POST['deliver_ip'];
$vpn_port=$_POST['vpn_port'];
$province_id=$_POST['province_id'];
$city_id=$_POST['city_id'];
$dis_id=$_POST['dis_id'];
$str_id=$_POST['str_id'];
$available=$_POST['available'];
$created_at=date("Y-m-d");

print_r($_POST);
$sql = "insert into delivers (ip,vpn_port,pro_id,city_id,dis_id,str_id,available) 
		  		  values('$deliver_ip','$vpn_port','$province_id','$city_id','$dis_id','$str_id','$available')";
$db = new DB ();
$is_success = $db->insert ( $sql );
//	echo $sql;
if ($is_success != 0) {
	echo "<script language=javascript>alert('信息添加成功！');history.back();location.href='../deliver.php';</script>";
} else {
	echo "<script language=javascript>alert('信息添加失败！');history.back();window.opener.location.reload();</script>";
}

?>