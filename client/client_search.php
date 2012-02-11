<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";
$user_name=$_POST['user_name'];
$pro_id=$_POST['pro_id'];
$city_id=$_POST['city_id'];
$dis_id=$_POST['dis_id'];
//$pro_id=8;
//$search_ipqam_ip=64;
//print_r($_POST);
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

$sql = "SELECT vip, client_type, clients.status, login_at, logout_at, username, is_online, mac, 
			clients.ip AS client_ip, 
			ipqams.ip AS ipqam_ip, 
			delivers.ip AS deliver_ip, 
			channels.freq, area.pro_name, area.city_name, area.dis_name
			FROM clients, ipqams, channels, delivers, area
			WHERE clients.ipqam_id = ipqams.id
			AND clients.channel_id = channels.id
			AND clients.deliver_id = delivers.id
			AND ipqams.pro_id = area.pro_id
			AND ipqams.city_id = area.city_id
			AND ipqams.dis_id = area.dis_id
			AND username like '%$user_name%'
			AND area.pro_name like '%$pro_name%'
			AND area.city_name like '%$city_name%'
			AND area.dis_name like '%$dis_name%'
			ORDER BY ipqams.pro_id ASC , ipqams.city_id ASC , ipqams.dis_id ASC ";
$data = $db -> select($sql);
$tpl->assign("data", $data);
//echo $sql;

$tpl -> display("client_search.html");
?>