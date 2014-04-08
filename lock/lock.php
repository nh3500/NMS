<?php
include_once("../sys/check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>封鎖列表</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("../sys/sqlconnect.inc.php");

if($_POST['mac']!=''){
$sql = 'INSERT INTO `LOCK` VALUES (NULL,\''.strtoupper($_POST['mac']).'\',\''.$_POST['vlan'].'\',CURRENT_TIMESTAMP,\''.$_POST['reason'].'\', \'2\',\''.$_SESSION['user_account'].'\')';
mysql_query($sql) or die ("新增失敗");
}
?>

<div align="center">
<div id="sidebar">
	<ul>
新增封鎖mac，輸入目標mac、原因、指定網段後即可封鎖。
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  	<li>mac:
	<input maxlength="12" name="mac"/></li>
	<li> Reason:
	<select name="reason">
 		<option value="1">侵權</option>
		<option value="2">搶IP</option>
    	</select>
	所屬vlan：
	<select name="vlan">
	<?php
		$sql="SELECT DISTINCT vlan FROM IP ORDER BY vlan ASC";
		$temp=mysql_query("$sql") or die ("vlan查詢失敗");
		while($result=mysql_fetch_array($temp)){
			echo '<option value="'.$result[0].'">'.$result[0].'</option>';
		}
	?>
	</select></li>
	<input name="submit" type="submit" value="新增封鎖" />
</form>
<br />
查詢各網段的mac的封鎖列表
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"> 
	<li><input name="sel" type="radio" value="1" />
	尚未封鎖</li>
	<li><input name="sel" type="radio" value="2" />
	待封鎖</li>
	<li><input name="sel" type="radio" value="3" />
	封鎖中</li>
	<li><input name="sel" type="radio" value="4" />
	待解鎖</li>
	<li><input name="sel" type="radio" value="5" />
	封鎖結束</li>
	<input name="submit" type="submit" value="分類查詢" />
</form></ul></div>
<br />

<?php

$sql="SELECT DISTINCT vlan FROM IP ORDER BY vlan ASC";
$temp=mysql_query("$sql") or die ("vlan查詢失敗");
while($result=mysql_fetch_array($temp)){
$sql="SELECT * FROM `LOCK` WHERE `unlock`='{$_POST['sel']}' AND vlan='".$result[0]."'";
$result2=mysql_query("$sql") or die ("查詢失敗");
		if(mysql_num_rows($result2)!=0){
		echo $result[0]."段<br>";
		echo '<table width="90%" border="1" id="search">
				<tr id="search_title" height="35px">
				<td>MAC</td>
				<td>Time</td>
				<td>Reason</td>
				<td>lock</td>
				<td>executer</td>
				<td>編輯</td>
				</tr>';
		while($result3=mysql_fetch_array($result2)){
				//將數字轉換為容易理解的文字
				if($result3[4]==1){
				$result3[4]="侵權";
				}
				elseif($result3[4]==2){
				$result3[4]="搶IP";
				}
				elseif($result3[4]==3){
				$result3[4]="未申請";
				}
				if($result3[5]==1){
				$result3[5]="尚未封鎖";
				}
				elseif($result3[5]==2){
				$result3[5]="待封鎖";
				}
				elseif($result3[5]==3){
				$result3[5]="封鎖中";
				}
				elseif($result3[5]==4){
				$result3[5]="待解鎖";
				}
				elseif($result3[5]==5){
				$result3[5]="封鎖結束";
				}
				echo "<tr>
				<td>$result3[1]</td>
				<td>$result3[3]</td>
				<td>$result3[4]</td>
				<td>$result3[5]</td>
				<td>$result3[6]</td>
				<td><a href='lock_edit.php?edit={$result3[0]}'>編輯</a></td>
				</tr>"
		;}
		echo '</table>';
	}
}

?>
</div>
</body>
</html>
