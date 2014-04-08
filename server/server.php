<?php
include_once("../sys/check_session.inc.php");
include("../sys/sqlconnect.inc.php");

if($_POST['ip']!=''){
$sql = 'INSERT INTO `nms`.`SERVER` VALUES (NULL, \''.$_POST['ip'].'\', \''.strtoupper($_POST['mac']).'\',\''.$_POST['admin'].'\',\''.$_POST['department'].'\',\''.$_POST['degree'].'\',\''.$_POST['grade'].'\',\''.$_POST['email'].'\',\''.$_POST['phone'].'\', \''.$_POST['location'].'\',\''.$_POST['description'].'\', \'0\', \''.$_POST['dn'].'\');';
mysql_query($sql) or die ("新增失敗");

$sql = 'INSERT INTO `APPLIED_MAC` VALUES (\''.strtoupper($_POST['mac']).'\',\''.$_POST['admin'].'\',\''.$_POST['department'].'\',\''.$_POST['degree'].'\',\''.$_POST['grade'].'\',\''.$_POST['phone'].'\',\''.$_POST['email'].'\',\''.$_POST['location'].'\',\''.$_POST['ip'].'\',\''.$_POST['description'].'\',CURRENT_DATE,\'0000-00-00\', \'0\');';
mysql_query($sql) or die ("新增設備mac到申請清單失敗");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網管系統伺服器頁面</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<div id="sidebar">
	<ul><h2>新增server資料</h2>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <li>IP位置:
    <input maxlength="15" size="12" name="ip"/></li>
  <li>mac:
  <input maxlength="12" size="12" name="mac"/></li>
  <li>admin:
  <input maxlength="10" size="10" name="admin"/></li>

  <br /><li> 所屬單位：
	<select name="department">
		<option value="管電">管電</option>
        <option value="資管">資管</option>
		<option value="財管">財管</option>
		<option value="企管">企管</option>
        <option value="不分系">不分系</option>	
		<option value="人管">人管</option>
        <option value="電子商務中心">電子商務中心</option>
        <option value="工管">工管</option>
        <option value="院辦">院辦</option>
        <option value="醫管">醫管</option>
		<option value="EMBA">EMBA</option>
        <option value="IBMBA">IBMBA</option>
    </select>
	<select name="degree">
    	<option value=""></option>
		<option value="教職員">教職員</option>
        <option value="博士班">博士班</option>
        <option value="碩士班">碩士班</option>
		<option value="學士班">學士班</option>
	</select>    
    <select name="grade">
    	<option value=""></option>
        <option value="93級">93級</option>
        <option value="94級">94級</option>
		<option value="95級">95級</option>
		<option value="96級">96級</option>
        <option value="97級">97級</option>
        <option value="98級">98級</option>
        <option value="99級">99級</option>
        <option value="100級">100級</option>
        <option value="101級">101級</option>
	</select></li>
<li> phone
  <input maxlength="10" size="12" name="phone"/></li>   
<br><li>email:
  <input name="email"/></li>  
  <li>所在位置:
  <input name="location" /></li>
 <br><li> 相關描述:
  <input name="description" /></li>
  <li>dn：
  <input name="dn" /></li>
  <input name="submit" type="submit" value="新增" />
</form>
</ul></div>
<?php
$sql='SELECT * FROM `SERVER`';
$result=mysql_query("$sql") or die ("查詢失敗");

echo '<table width="95%" border="1" id="search">
		<tr id="search_title" height="35px">
		<td>IP位置</td>
		<td>MAC</td>
		<td>負責人</td>
		<td>所屬單位</td>
		<td>身份</td>
		<td>級別</td>
		<td>email</td>
		<td>聯絡電話</td>
		<td>所在位置</td>
		<td>相關描述</td>
		<td>網域名稱</td>
		<td>編輯</td>
		<td>刪除</td>
		</tr>';

while($result2=mysql_fetch_array($result)){
if($result2[11]==0){
	   echo "<tr>
	   		<td>$result2[1]</td>
			<td>$result2[2]</td>
			<td>$result2[3]</td>
			<td>$result2[4]</td>
			<td>$result2[5]</td>
			<td>$result2[6]</td>
			<td>$result2[7]</td>
			<td>$result2[8]</td>
			<td>$result2[9]</td>
			<td>$result2[10]</td>
			<td><a target=\"_top\" href='http://{$result2[12]}'>{$result2[12]}</a></td>
	   		<td><a href='server_edit.php?edit={$result2[0]}'>編輯</a></td>
			<td><a href='server_delete.php?del={$result2[0]}'>刪除</a></td>
			</tr>";
}
elseif($result2[11]==1){
	   echo "<tr bgcolor=\"#FF3333\">
	   		<td>$result2[1]</td>
			<td>$result2[2]</td>
			<td>$result2[3]</td>
			<td>$result2[4]</td>
			<td>$result2[5]</td>
			<td>$result2[6]</td>
			<td>$result2[7]</td>
			<td>$result2[8]</td>
			<td><a target=\"_top\" href='http://{$result2[10]}'>$result2[10]</a></td>
	   		<td><a href='server_edit.php?edit={$result2[0]}'>編輯</a></td>
			<td><a href='server_delete.php?del={$result2[0]}'>刪除</a></td>
			</tr>";
}
}
echo '</table>';

?>
  
</div>
<div id="footer">
	<p>Copyright (c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
