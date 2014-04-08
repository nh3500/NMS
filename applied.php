<?php
header('Content-Type:text/html; charset=utf-8');
include("sys/sqlconnect.inc.php");
//確認資料完整後，將資料匯入資料庫，預設使用DHCP發送IP
if($_POST['mac']!=''){
$sql='INSERT INTO `APPLIED_MAC` VALUES (\''.strtoupper($_POST['mac']).'\',\''.$_POST['name'].'\',\''.$_POST['department'].'\',\''.$_POST['degree'].'\',\''.$_POST['grade'].'\',\''.$_POST['phone'].'\', \''.$_POST['email'].'\',\''.$_POST['location'].'\',\'DHCP\',\'\',CURRENT_DATE,\'\',\'0\')';

mysql_query($sql) or die ("新增失敗");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="content_style.css" rel="stylesheet" type="text/css" />
<title>申請頁面</title>
</head>

<body>
<div align="center" id="sidebar">
<ul>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<h1 align="center">使用者資料登錄頁面</h1>
  <li>
	MAC:
  	<input maxlength="12" name="mac"/>
  </li>
  <br>
  <li>
	使用者姓名:
  	<input name="name"/>
  </li>
  <br>
  <li>  
 	所屬單位：
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
	<option value="94級">94級</option>
        <option value="95級">95級</option>
	<option value="96級">96級</option>
        <option value="97級">97級</option>
        <option value="98級">98級</option>
        <option value="99級">99級</option>
        <option value="100級">100級</option>
        <option value="101級">101級</option>
	</select>
  </li>
  <br>
  <li>
  	聯絡電話:
  	<input maxlength="10" name="phone"/>
  </li>
  <br>
  <li>
  E-mail:
  <input name="email"/>
  </li>
  <br>
  <input name="submit" type="submit" value="送出" />
</form>
<ul>
</div>
</body>
</html>
