<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";

$user_email=$_POST['user_email'];
$db = new DB () ;



$data = $db -> select("select * from users where user_email like '%$user_email%'");
$tpl->assign("data", $data);
$tpl->assign("user_email", $user_email);

$tpl -> display("user_search.html");
//echo dirname(__FILE__);
?>

