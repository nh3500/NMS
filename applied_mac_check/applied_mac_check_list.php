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
<div align="center">
<?php
$sql="SELECT * FROM APPLIED_MAC_UNCHECK";
$result=mysql_query("$sql") or die ("查詢失敗");
echo '<table width="95%" border="1" id="search">
		<tr id="search_title" height="35px">
		<td >MAC</td>
		<td >姓名</td>
		<td >所屬單位</td>
		<td width="50px">身份</td>
		<td >級別</td>
		<td>聯絡電話</td>
		<td>EMAIL</td>
		<td >機器所在位置</td>
		<td>備註</td>
		<td >編輯</td>
		<td >刪除</td>
		</tr>';
while($result2=mysql_fetch_array($result)){
        echo "<tr height='30px'>
		<td>$result2[0]</td>
		<td>$result2[1]</td>
		<td>$result2[2]</td>
		<td>$result2[3]</td>
		<td>$result2[4]</td>
		<td>$result2[5]</td>
		<td>$result2[6]</td>
		<td>$result2[7]</td>
		<td>$result2[8]</td>
		<td><a href='applied_mac_check_ensure.php?mac=$result2[0]'>通過</a></td>
		<td><a href='applied_mac_check_del.php?del=$result2[0]'>不通過</a></td>
		</tr>";
}
echo '</table>';

?>
  
</div>
<div id="footer">
	<p>Copyright (c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
