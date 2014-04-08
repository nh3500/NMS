<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>今日流動MAC</title>
</head>
<body>
<div align="center">
<h4>今日流動MAC</h4>
<?php
//連結資料庫
include("../sys/sqlconnect.inc.php");
//建立SQL語句，取出現有的vlan及該vlan所流動的mac總數，時間限定為今日
$sql=' SELECT DISTINCT vlan,COUNT(*) FROM (SELECT DISTINCT mac,vlan FROM IP WHERE `time` LIKE \''.date("Y").'-'.date("m").'-'.date("d").' %\') AS A GROUP BY vlan ORDER BY `vlan` ASC ';
//執行SQL語句
$result=mysql_query($sql);
//已vlan分群將資料印出
while($vlan=mysql_fetch_array($result)){
//印出目前vlan區塊
echo $vlan[0].'段<br>';
//建立SQL語句，取得目前vlan所有今日流動的mac
$sql= 'SELECT DISTINCT mac FROM `IP` WHERE vlan=\''.$vlan[0].'\' AND `time` LIKE \''.date("Y").'-'.date("m").'-'.date("d").' %\' ORDER BY mac ASC';
//執行SQL語句
$result1=mysql_query($sql) or die ("查詢失敗");
//迴圈變數，控制印出的欄位
$j=0;
echo '<table width="80%" border="1">';
echo '<tr>
		<td>MAC</td>
		<td>使用者</td>
		<td>所屬單位</td>
		<td>聯絡電話</td>
		<td>e-mail</td>
		<td>主機位置</td>
		<td>分配ip</td>
		</tr>';

while($result2=mysql_fetch_array($result1)){
echo "<tr>
		<td>$result2[0]</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>";
}
//目前vlan所流動mac印出完畢
echo '</table>';
}
?>
</div>
</body>
</html>