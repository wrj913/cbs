<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";
$client_type=$_POST['client_type'];

$db = new DB () ;
$sql = "SELECT type, COUNT( DISTINCT mac ) as client_exception_count
		FROM exceptions
		WHERE type=$client_type
		GROUP BY type ";
$data = $db -> select($sql);
$tpl->assign("data", $data);
//echo $sql;

$tpl -> display("exception_count.html");
?>