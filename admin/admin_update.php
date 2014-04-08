<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//將修改過的passwd以md5加密
$passwd=md5($_POST['passwd']);
//確認必要資料都填寫後，更新資料
if($_POST['username']!='' && $_POST['passwd']!='' && $_POST['realname']!='' && $_POST['phone']!='' && $_POST['email']!=''){
$sql = 'UPDATE `ADMIN` SET `passwd`=\''.$passwd.'\',`username`=\''.$_POST['username'].'\',`realname`=\''.$_POST['realname'].'\',`phone`=\''.$_POST['phone'].'\',`email`=\''.$_POST['email'].'\' WHERE `username`=\''.$_POST['username'].'\'';
mysql_query($sql) or die ("新增失敗");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin_update</title>
</head>

<body>
<script language='javascript'>
setTimeout("location.href='admin.php'",1000);
</script>
<p><a href="admin.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
