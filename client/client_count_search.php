<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";

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

$sql = "SELECT ipqams.ip, pro_name, city_name, dis_name, 
		COUNT( DISTINCT clients.mac ) as client_count
		FROM ipqams, clients, area
		WHERE ipqams.id = clients.ipqam_id
		AND area.pro_id = ipqams.pro_id
		AND area.city_id = ipqams.city_id
		AND area.dis_id = ipqams.dis_id 
		AND area.pro_name like '%$pro_name%'
		AND area.city_name like '%$city_name%'
		AND area.dis_name like '%$dis_name%'
		GROUP BY ipqams.ip ";
$data = $db -> select($sql);
$tpl->assign("data", $data);

//echo $sql;
$tpl -> display("client_count_search.html");
?>