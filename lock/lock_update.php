<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['mac']!=''){
$sql = 'UPDATE `LOCK` SET `mac`=\''.strtoupper($_POST['mac']).'\',`reason`=\''.$_POST['reason'].'\',`unlock`=\''.$_POST['lock'].'\' WHERE `seq`=\''.$_POST['seq'].'\'';
mysql_query($sql) or die ("新增失敗");
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
setTimeout("location.href='lock.php'",1000);
</script>
<p><a href="lock.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
