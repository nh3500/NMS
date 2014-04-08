<?php
	include("sqlconnect.inc.php");
	$username = $_POST["username"];
	// md5 加密後比對
	$passwd =md5($_POST["passwd"]); 
	//跟SQL內的紀錄比對
	$sql = "SELECT username, passwd FROM ADMIN WHERE username = '".mysql_real_escape_string($username)."' AND passwd = '".mysql_real_escape_string($passwd)."'";
	$result = mysql_query($sql);
	// 有符合的資料(正確的帳號密碼)
	$row = mysql_fetch_object($result); 
	if($username == $row->username && $passwd == $row->passwd)
	{
		// 建立 session
		session_start();
		session_register('user_account'); 
		// 將使用者登入帳號存入 session
		$_SESSION["user_account"] = $row->username ; 
		// 將顯示網頁引導至post首頁
		echo "<script language='javascript'>";
		echo "location.href='nms.php';";
		echo "</script>";
		exit();
	}
	else
	{	
		//無正確資料則跳出警告訊息，跳回登入畫面
		echo "<script language='javascript'>";
		echo "window.alert('帳號或密碼錯誤!');";
		echo "location.href='../index.php';";
		echo "</script>";
		exit();
	}
?>