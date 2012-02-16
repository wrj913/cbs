<?php
	define('ROOT_PATH',substr(dirname(__FILE__),0,-6));
	print_r(ROOT_PATH);
	if(!isset($_SESSION["isLogin"])){
	header("Location:/data/login.php");
	echo "<script language='javascript'>window.location.href='login.php';</script>";
	}

	function check_permissions($value,$permissions=0){
	for($i=0; $i<count($value); $i++){
		if($permissions==$value[$i])
	 		break;
	 	if(($i+1)==count($value))
	 	echo "<script language='javascript'>alert('提示：你没有权限!');history.go(-1);</script>";	
	  }
	}
?>