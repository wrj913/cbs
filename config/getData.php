<?php

header("Content-Type: text/xml; charset=utf-8");//必须设置，否则浏览器会以html输出，这样前台无法接到xml对象数据
header ("Cache-Control: no-cache, must-revalidate");//每次都是最新
header ("Pragma: no-cache");
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','j');
define('DB_NAME','data_center_test');
	
//第一步，连接MYSQL服务器
$conn = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());
	
//第二步，选择指定的数据库，设置字符集
mysql_select_db(DB_NAME) or die('数据库错误，错误信息：'.mysql_error());
//第三步设置字符编码为：utf8
mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());


//接收
//$sid=$_GET["sid"];
//$type = $_GET["type"];//类型 :1 城市 2地区 3街区 

$sid=1;
$type =2;//类型 :1 城市 2地区 3街区 

 //设定为XML文件
 print_r($_GET["sid"]);
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

switch($type){
	case 1:
		get_citys_xml_data($sid);
		break;
	case 2:
		get_districts_xml_data($sid);
		break;
	case 3:
		get_street_xml_data($sid);
		break;
}
//获取数据，生成XML格式
function get_citys_xml_data($sid){
	$strCitySql = "select city_name,id from city WHERE provinceid ='".$sid."'";
	
	$res = mysql_query($strCitySql);
	//输出根标记
	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
	    echo "<City>";
	    //输出子元素 
	    echo "<Name>".$myrow["city_name"]."</Name>";
			echo "<ID>".$myrow["id"]."</ID>";
		  echo "</City>";
	}
	echo "</Item>";
}

function get_districts_xml_data($sid){
	$sqlSqlArea = "select dis_name,id from district WHERE city_id =$sid";
	$res = mysql_query($sqlSqlArea);
	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
	   echo "<District>";
	   echo "<Name>".$myrow["dis_name"]. "</Name>";
	   echo "<ID>".$myrow["id"]."</ID>";
	   echo "</District>";
	}
	echo "</Item>";
}

function get_street_xml_data($sid){
	$sqlSqlZipCode = "select str_name,id FROM zipcode WHERE dis_id ='".$sid."'";
	$res = mysql_query($sqlSqlZipCode);
	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
    echo "<Steeet>";
    echo "<Name>".$myrow["zip"]."</Name>";
    echo "<ID>".$myrow["code"]."</ID>";
    echo "</Steeet>";
	echo "</Item>";
}
}
?>