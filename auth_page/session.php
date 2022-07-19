<?php

require 'db.php';
require 'function.inc.php';
date_default_timezone_set("Asia/Calcutta");

if(isset($_SESSION['id'])){
	$sql = "SELECT * FROM users where id = '".$_SESSION['id']."'";
	$res = mysqli_query($conn,$sql);
	$user = mysqli_fetch_assoc($res);
	if ($user['user_img'] != '') {
		$user_img = $user['user_img'];
	}else {
		$user_img = 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png';
	}
}