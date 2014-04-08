<?php
include_once("../sys/check_session.inc.php");
include("../sys/sqlconnect.inc.php");

if($_POST['ip']!=''){
$sql = 'UPDATE DEVICE SET mac=\''.strtoupper($_POST['mac']).'\',type=\''.$_POST['type'].'\', location=\''.$_POST['location'].'\',description=\''.$_POST['description'].'\',`lock`=\''.$_POST['lock'].'\',`vlan`=\''.$_POST['vlan'].'\' WHERE seq=\''.$_POST['seq'].'\'';
mysql_query($sql) or die ("修改失敗");

$sql="UPDATE `GRANT` SET `mac`='{$_POST['mac']}' WHERE `ip`='{$_POST['ip']}'";
mysql_query($sql) or die ("登錄mac在`IP分配表`資料失敗");

$sql="SELECT `mac` FROM `APPLIED_MAC`";
$result=mysql_query($sql) or die ("MAC列表查詢失敗");
while($temp=mysql_fetch_array($result)){
	if($temp==$_POST['mac']){
		$sql="UPDATE `APPLIED_MAC` SET description='{$_POST['description']}',location='{$_POST['location']}' WHERE mac='{$_POST['mac']}'";
		$result=mysql_query($sql) or die ("MAC列表資料更新失敗");
	}
}

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
setTimeout("location.href='device.php'",0000);
</script>
<p><a href="device.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
