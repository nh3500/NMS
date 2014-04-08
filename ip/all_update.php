<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['ip']!=''){
$sql = 'UPDATE `GRANT` SET `mac`=\''.strtoupper($_POST['mac']).'\' WHERE `IP`=\''.$_POST['ip'].'\'';
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
setTimeout("location.href='all.php'",0000);
</script>
<p><a href="all.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
