<?php
include_once("../sys/check_session.inc.php")
?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>網管系統設備編輯頁面</title>
</head>
<body>

<?php
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if ($_GET['edit'] !=''){
	//查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
	$sql="SELECT * FROM DEVICE WHERE seq='{$_GET['edit']}' ";
	$result=mysql_query($sql);
	//將查詢到的資料放在 $row 陣列
	$row=mysql_fetch_array($result);
	$oldmac=$row[2];
}
else {
	//如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
	header("Location: device.php");
}
?>

<form id="form1" name="form1" method="post" action="device_update.php">
	<label for="textfield"></label>
	<input name="seq" type="hidden" value="<?php echo $row[0]; ?>"/>
	<input maxlength="15" name="ip" type="hidden" value="<?php echo $row[1]; ?>"/>
	<input maxlength="15" name="oldmac" type="hidden" value="<?php echo $oldmac; ?>"/>
	mac:
	<input maxlength="12" name="mac" value="<?php echo $row[2]; ?>"/>
	設備型號:
	<select name="type">
	<option value="<?php echo $row[3]; ?>"><?php echo $row[3]; ?></option>
	<option value="HP2626">HP2626</option>
	<option value="3COM4400">3COM4400</option>
	<option VALUE="SMC">SMC series</option>
	<option VALUE="Dlink series">Dlink series</option>
	<option VALUE="WL500GP">WL500GP</option>
	</select>
	所在位置:
	<input name="location" value="<?php echo $row[4]; ?>"/>
	相關描述:
	<input name="description" value="<?php echo $row[5]; ?>"/>
	<br>是否負責封鎖:
	<select name="lock" >
	<?php
		if($row[7]==1){
		echo "<option value=\"1\">負責封鎖MAC</option>";
		echo "<option value=\"0\">不負責封鎖MAC</option>";
		}
		elseif($row[7]==0){
		echo "<option value=\"0\">不負責封鎖MAC</option>";
		echo "<option value=\"1\">負責封鎖MAC</option>";
		}
	?>
	</select>
	所屬vlan：
	<select name="vlan" >
	<?php
	$sql="SELECT DISTINCT vlan FROM IP ORDER BY vlan ASC";
	$temp=mysql_query("$sql") or die ("vlan查詢失敗");	
	while($result=mysql_fetch_array($temp)){
		if($result[0]==$row[8]){
		echo "<option value=\"$result[0]\" selected>{$result[0]}</option>"; 
		}
		else{
		echo "<option value=\"{$result[0]}\">{$result[0]}</option>";
		}
	}
	?>
	</select>  
	<input name="submit" type="submit" value="修改" />
</form>
  <p><a href="device.php">回設備頁面</a></p>
</body>
