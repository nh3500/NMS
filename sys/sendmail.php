<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<?php
$to      = 'nh3500@gmail.com';
$subject = '測試信';
$message = "使用者xxx您好：
	您的網路使用權申請已由管理者審核通過，以下是您登記的資料：	

	網路卡號：'.$row->mac.'
	使用者：'.$row->user.'
	信箱：'.$row->email.'
		
	祝您有個愉快的一天";
$headers = 'From: nh3500@cm.nsysu.edu.tw';

mail($to, $subject, $message, $headers);
?>
</body>
</html>
