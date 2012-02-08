<?php 
require "config/smarty.inc.php";
require "config/db.class.php";

$db = new DB () ;
$data = $db -> select("select * from province");
$tpl->assign("data", $data);

$tpl -> display("tpl/test.html");
?>
