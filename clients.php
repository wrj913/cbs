<?php
	require_once(  "config/db.class.php" );
	$db = new DB () ;
	print_r($db -> select("select * from ipqams"));
?>