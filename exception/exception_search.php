<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";

$mac=$_POST['mac'];
$client_type=$_POST['client_type'];
//$mac=3;
//$client_type=1;

$db = new DB () ;
$data = $db -> select("select * from exceptions where mac like '%$mac%' and type like '%$client_type%'");
$tpl->assign("data", $data);
$tpl->assign("user_email", $user_email);

$tpl -> display("exception_search.html");
//echo dirname(__FILE__);
?>
