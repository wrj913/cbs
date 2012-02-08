<?php
session_start();
require "config/smarty.inc.php";
require "config/db.class.php";

 
if(!empty($_POST['submit'])){
		
	$db = new DB () ;
	$sql = "select * from users 
					 where user_email='$_POST[user_email]' and user_password='$_POST[user_password]'";
	$data = $db -> select($sql);

		if($data){
//			print_r($result);
			$_SESSION["user_email"]=$_POST["user_email"];
		//	$_SESSION["premission"]=$result["is_permissions"];
			$_SESSION["isLogin"]=1;

			//登陆成功，进入主页
			echo '<script>';
			echo "location='index.php'";
			echo '</script>';
		}else {
		//	print_r($_SESSION);
		$tpl->assign("check","0");
		}
}

$tpl->display("tpl/login.html");

?>