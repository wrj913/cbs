<?php
require "config/smarty.inc.php";
require "config/db.class.php";

$db = new DB () ;
$data = $db -> select("select * from ipqams");
$tpl->assign("data", $data);


$province_data = $db -> select("select * from province");
$tpl->assign("province_data", $province_data);

$tpl -> display("tpl/ipqam.html");
?>