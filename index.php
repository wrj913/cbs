<?php
session_start();
require "config/smarty.inc.php";
//print_r($_SESSION);

$tpl->assign("user_email","$_SESSION[user_email]");
$tpl->display("index.html");
?>