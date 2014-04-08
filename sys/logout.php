<?
	session_start();
	session_destroy();
	// 將顯示網頁引導至post首頁
	echo "<script language='javascript'>";
	echo "location.href='../index.php';";
	echo "</script>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">