<?php
//資料庫登入設定
$dbserver="localhost";
$dbname="";
$dbuser="";
$dbpasswd="";

//連線到資料庫
if( ! @mysql_connect($dbserver,$dbuser,$dbpasswd) )
	die("無法連線到資料庫伺服器");

//設定連線的文字集與校對的編碼
mysql_query("SET NAMES utf8");

//選擇資料庫
if( ! @mysql_select_db($dbname) )
	die("無法使用資料庫");
?>
