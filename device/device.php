<?php
include_once("../sys/check_session.inc.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網管系統設備頁面</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("../sys/sqlconnect.inc.php");

if($_POST['ip']!=''){
//新增資料到DEVICE
$sql = 'INSERT INTO `DEVICE` VALUES (NULL, \''.$_POST['ip'].'\', \''.strtoupper($_POST['mac']).'\', \''.$_POST['type'].'\', \''.$_POST['location'].'\',\''.$_POST['description'].'\', \'0\', \''.$_POST['lock'].'\', \''.$_POST['vlan'].'\');';
mysql_query($sql) or die ("新增設備失敗");

$sql = 'SELECT mac FROM `APPLIED_MAC`';
$list=mysql_query($sql);
$existflag=0;

while($exist=mysql_fetch_array($list)){
	if($exist==$_POST['mac'])
		$existflag=1;
}

if($existflag==0){
//新增mac到申請列表
$sql = 'INSERT INTO `APPLIED_MAC` VALUES (\''.strtoupper($_POST['mac']).'\', \'管電\', \'管電\',\'\',\'\',\'4510\',\'root@cm.nsysu.edu.tw\',\''.$_POST['location'].'\',\''.$_POST['description'].'\',CURRENT_DATE,\'0000-00-00\', \'0\');';
mysql_query($sql) or die ("新增設備mac到申請清單失敗");
}

}

?>

<div align="center">
	<div id="sidebar">
	<ul>
			
		<h2>設備頁面</h2>
		
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<label for="textfield"></label><div align="left" style="margin-left:40px; margin-bottom:10px;">
 	<li>		
	IP位置:
	<input maxlength="15" size="14" name="ip"/>
 	</li>
	<li>
	mac:
	<input maxlength="15" size="14" name="mac"/>
	</li>
<br />
<li> 設備型號:
	<select name="type" >
	<option value="HP2626">HP2626</option>
	<option value="3COM4400">3COM4400</option>
	<option VALUE="SMC">SMC series</option>
	<option VALUE="Dlink series">Dlink series</option>
	<option VALUE="WL500GP">WL500GP</option>
	</select></li>
	<li>
	所在位置:
	<input name="location" size="10" />
	</li>
	<br />
	<li>相關描述:
	<input name="description" size="14" /></li>
	<li>是否負責封鎖:
	<select name="lock">
	<option value="0">不負責封鎖MAC</option>
	<option value="1">負責封鎖MAC</option>
	</select></li><br>
	<li>所屬vlan：
	<select name="vlan">
	<?php
	$sql="SELECT DISTINCT vlan FROM IP ORDER BY vlan ASC";
	$temp=mysql_query("$sql") or die ("vlan查詢失敗");
	while($result=mysql_fetch_array($temp)){
	echo '<option value="'.$result[0].'">'.$result[0].'</option>';
	}
	?>
	</select>  </li>
	<input name="submit" type="submit" value="新增" />
</form></div>

</ul></div>
<?php
$sql='SELECT * FROM DEVICE ORDER BY inet_aton(ip)';
$result=mysql_query("$sql") or die ("查詢失敗");
echo '<table width="90%" border="1" id="search">
		<tr id="search_title" height="35px">
		<td>IP位置</td>
		<td>MAC</td>
		<td>設備型號</td>
		<td>所在位置</td>
		<td>相關描述</td>
		<td>是否負責封鎖</td>
		<td>所在vlan</td>
		<td>編輯</td>
		<td>刪除</td>
		</tr>';
while($result2=mysql_fetch_array($result)){
if($result2[6]==0){
	   echo "<tr height='30px'>
			<td>$result2[1]</td>
			<td>$result2[2]</td>
			<td>$result2[3]</td>
			<td>$result2[4]</td>
			<td>$result2[5]</td>";
	    	if($result2[7]==0){
				echo '<td>否</td>';}
			elseif($result2[7]==1){
				echo '<td>是</td>';}
	   echo "<td>$result2[8]</td>
	   		<td><a href='device_edit.php?edit={$result2[0]}'>編輯</a></td>
			<td><a href='device_delete.php?del={$result2[0]}'>刪除</a></td>
			</tr>";
}
elseif($result2[6]==1){
       echo "<tr bgcolor=\"#FF3333\" height='30px'>
			<td>$result2[1]</td>
			<td>$result2[2]</td>
			<td>$result2[3]</td>
			<td>$result2[4]</td>
			<td>$result2[5]</td>";
	   	    if($result2[7]==0){
				echo '<td>否</td>';}
			elseif($result2[7]==1){
				echo '<td>是</td>';}
	   echo "<td>$result2[8]</td>
	   		<td><a href='device_edit.php?edit={$result2[0]}'>編輯</a></td>
			<td><a href='device_delete.php?del={$result2[0]}'>刪除</a></td>
			</tr>";}
}
echo '</table>';
?>
  
</div>
<div id="footer">
	<p>Copyright (c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
