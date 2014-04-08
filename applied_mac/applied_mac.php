<?php
include_once("../sys/check_session.inc.php");
header('Content-Type:text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['mac']!=''){
$sql='INSERT INTO `APPLIED_MAC` VALUES(\''.strtoupper($_POST['mac']).'\',\''.$_POST['name'].'\',\''.$_POST['department'].'\',\''.$_POST['degree'].'\',\''.$_POST['grade'].'\',\''.$_POST['phone'].'\', \''.$_POST['email'].'\',\''.$_POST['location'].'\',\''.$_POST['description'].'\',CURRENT_DATE,CURRENT_DATE,\'0\')';
mysql_query($sql) or die ("新增失敗");

}

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
<div id="sidebar">
	<ul>
	<h2>申請列表</h2><div align="left" style=" margin-left:10px">
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<li> MAC:
	<input maxlength="12" name="mac" size="12"/></li>
	<li>使用者姓名:
	<input name="name" size="8"/></li>
	<br>	
	<li> 所屬單位：
		<? include_once("../sys/department.php"); ?></li>
	<br>
	<li>聯絡電話:
	<input maxlength="10" name="phone" size="10"/></li>
	<li>EMAIL:
	<input name="email"/></li>
	<br />
	<li>機器所在位置:
	<input maxlength="10" name="location" size="10"/></li>
	</li>
	<li>備註：
	<input name="description"/></li>
	<input name="submit" type="submit" value="新增" />
</form></div>
</ul>
</div>
<?php
$sql="SELECT * FROM `APPLIED_MAC`";
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
		<td><a href='applied_mac_edit.php?edit={$result2[0]}'>編輯</a></td>
		<td><a href='applied_mac_delete.php?del={$result2[0]}&ip={$result2[8]}'>刪除</a></td>
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
