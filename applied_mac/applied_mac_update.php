<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['mac']!=''){
$sql = 'UPDATE `APPLIED_MAC` SET `mac`=\''.strtoupper($_POST['mac']).'\',`user`=\''.$_POST['name'].'\',`department`=\''.$_POST['department'].'\',`degree`=\''.$_POST['degree'].'\',`grade`=\''.$_POST['grade'].'\',`phone`=\''.$_POST['phone'].'\',`email`=\''.$_POST['email'].'\',`location`=\''.$_POST['location'].'\',description=\''.$_POST['description'].'\' WHERE `mac`=\''.$_POST['mac'].'\'';

mysql_query($sql) or die ("更新失敗");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>
<body>
<script language='javascript'>
setTimeout("location.href='applied_mac.php'",1000);
</script>
<p><a href="applied_mac.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
