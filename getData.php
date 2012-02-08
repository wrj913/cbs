<?php

header("Content-Type: text/xml; charset=utf-8");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','j');
	define('DB_NAME','data_center_test');
	
	//第一步，连接MYSQL服务器
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败，错误信息：'.mysql_error());
	
	//第二步，选择指定的数据库，设置字符集
	mysql_select_db(DB_NAME) or die('数据库错误，错误信息：'.mysql_error());
	//第三步设置字符编码为：utf8
	mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());

$sid=$_GET["sid"];
//$sid=3;
$type = $_GET["type"];
//$type = 1;

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

switch($type){
	case 1:
		getCitysXMLData($sid);
		break;
	case 2:
		getAreasXMLData($sid);
		break;
	case 3:
		getStreetXMLData($sid);
		break;
}

function getCitysXMLData($sid){
	$strCitySql = "select * from city WHERE pro_id =$sid";
	
	$res = mysql_query($strCitySql);

	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
	    echo "<City>";
	 
	    echo "<Name>".$myrow["city_name"]."</Name>";
			echo "<ID>".$myrow["id"]."</ID>";
		  echo "</City>";
	}
	echo "</Item>";
}

function getAreasXMLData($sid){
	$sqlSqlArea = "select dis_name,id FROM district WHERE city_id ='".$sid."'";
	$res = mysql_query($sqlSqlArea);
	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
	   echo "<Area>";
	   echo "<Name>".$myrow["dis_name"]. "</Name>";
	   echo "<ID>".$myrow["id"]."</ID>";
	   echo "</Area>";
	}
	echo "</Item>";
}

function getStreetXMLData($sid){
	$sqlSqlZipCode = "select str_name,id FROM street WHERE dis_id ='".$sid."'";
	$res = mysql_db_query($sqlSqlZipCode);
	echo "<Item>";
	while ($myrow = mysql_fetch_array($res)){
    echo "<Street>";
    echo "<Name>".$myrow["str_name"]."</Name>";
    echo "<ID>".$myrow["id"]."</ID>";
    echo "</Street>";
	echo "</Item>";
}
}
?>