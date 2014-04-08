<?php
include_once("../sys/check_session.inc.php");
include("../sys/sqlconnect.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已申請mac列表</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
$mac=$_GET['mac'];

$sql="SELECT * FROM APPLIED_MAC_UNCHECK WHERE MAC='$mac'";
$result=mysql_query($sql);
$result2=mysql_fetch_row($result);

$sql="SELECT * FROM APPLIED_MAC WHERE MAC='$mac'";
$result3=mysql_query($sql);
$rows=mysql_num_rows($result3);

if($rows == 0){
$sql="INSERT INTO APPLIED_MAC  VALUES('{$result2[0]}','{$result2[1]}','{$result2[2]}','{$result2[3]}','{$result2[4]}','{$result2[5]}','{$result2[6]}','{$result2[7]}','{$result2[8]}',CURRENT_DATE,CURRENT_DATE,'0')";
//echo $sql;
mysql_query($sql) or die ("新增失敗");

$sql="delete from APPLIED_MAC_UNCHECK where mac='{$result2[0]}'";
mysql_query($sql) or die ("刪除失敗");
}
if($rows == 1){
$sql = "UPDATE APPLIED_MAC SET mac='{$result2[0]}',user='{$result2[1]}',department='{$result2[2]}',degree='{$result2[3]}',grade='{$result2[4]}',phone='{$result2[5]}',email='{$result2[6]}',location='{$result2[7]}',description='{$result2[8]}' WHERE mac='{$result2[0]}'";
//echo $sql;
mysql_query($sql) or die ("更新失敗");

$sql="delete from APPLIED_MAC_UNCHECK where mac='{$result2[0]}'";
mysql_query($sql) or die ("刪除失敗");
}
if($rows >1){
echo "嚴重錯誤，單一mac有兩筆資料";
}


$to      = $result2[6];
$subject = '[cccm]您的網卡暨個人資料已通過審核';
$message = "親愛的使用者{$result2[1]}您好：

	您的網路使用權申請已由管理者審核通過，以下是您登記的資料：	

	網路卡號：{$result2[0]}
	所屬部門:：{$result2[2]} 系{$result2[3]} {$result2[4]}
	使用者：{$result2[1]}
	連絡電話：{$result2[5]}
	信箱：{$result2[6]}
	設備所在位置：{$result2[7]}
	其他敘述：{$result2[8]}
		
	祝您有個愉快的一天";
$headers = 'From: cccm@cm.nsysu.edu.tw';

mail($to, $subject, $message, $headers);

?>

<script language='javascript'>
setTimeout("location.href='applied_mac_check_list.php'",1000);
</script>
<p><a href="applied_mac_check_list.php">若無自動跳轉請按此連結</a></p>
</body>
</html>
