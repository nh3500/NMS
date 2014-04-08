<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['ip']!=''){
$belong=$_POST['department'].$_POST['degree'].$_POST['grade'];
$sql = 'UPDATE SERVER SET ip=\''.$_POST['ip'].'\',mac=\''.strtoupper($_POST['mac']).'\',admin=\''.$_POST['admin'].'\',`department`=\''.$_POST['department'].'\',`degree`=\''.$_POST['degree'].'\',`grade`=\''.$_POST['grade'].'\',email=\''.$_POST['email'].'\',phone=\''.$_POST['phone'].'\', location=\''.$_POST['location'].'\',description=\''.$_POST['description'].'\',`dn`=\''.$_POST['dn'].'\' WHERE seq=\''.$_POST['seq'].'\'';
mysql_query($sql) or die ("新增失敗");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網管系統設備更新頁面</title>
</head>
<body>
<script language='javascript'>
setTimeout("location.href='server.php'",0000);
</script>
<p><a href="../device/server.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
