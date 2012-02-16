<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";
$search_deliver_ip=$_POST['search_deliver_ip'];
$pro_id=$_POST['pro_id'];
$city_id=$_POST['city_id'];
$dis_id=$_POST['dis_id'];
$str_id=$_POST['str_id'];

$db = new DB () ;
$sql_province = "select pro_name from province where id=$pro_id";
$pro_data = $db -> select($sql_province);
$pro_name = $pro_data[0]['pro_name'];

$sql_city = "select city_name from city where id=$city_id";
$city_data = $db -> select($sql_city);
$city_name = $city_data[0]['city_name'];

$sql_dis = "select dis_name from district where id=$dis_id";
$dis_data = $db -> select($sql_dis);
$dis_name = $dis_data[0]['dis_name'];

$sql_dis = "select str_name from street where id=$str_id";
$str_data = $db -> select($sql_dis);
$str_name = $dis_data[0]['str_name'];

$sql = "SELECT *
		FROM delivers, area
		WHERE delivers.pro_id = area.pro_id
		AND delivers.city_id = area.city_id
		AND delivers.dis_id = area.dis_id
		AND ip like '%$search_deliver_ip%'
		AND area.pro_name like '%$pro_name%'
		AND area.city_name like '%$city_name%'
		AND area.dis_name like '%$dis_name%'
		AND area.str_name like '%$str_name%'
		ORDER BY delivers.pro_id ASC , delivers.city_id ASC , delivers.dis_id ASC ";
$data = $db -> select($sql);
$tpl->assign("data", $data);
//echo $sql;

$tpl -> display("deliver_search.html");
?>