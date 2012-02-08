<?php
require "config/smarty.inc.php";
require "config/db.class.php";

$db = new DB () ;
$data = $db -> select("select * from users");
$tpl->assign("data", $data);


$tpl -> display("tpl/user.html");
?>