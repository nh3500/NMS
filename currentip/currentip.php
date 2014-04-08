<?php
include_once("../sys/check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>今日流動MAC</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {color: #416110}
-->
</style>
</head>
<body>
<div align="center">
<?php
//連結資料庫
include("../sys/sqlconnect.inc.php");
//建立SQL語句，取出現有的vlan及該vlan所流動的mac總數，時間限定為今日
$sql = 'SELECT vlan,COUNT(mac) FROM `IPNOW` WHERE `mac`!=\'\' GROUP BY `vlan`'; 
//執行SQL語句
$result=mysql_query($sql);
//已vlan分群將資料印出
while($vlan=mysql_fetch_array($result)){
	//印出目前vlan區塊
	echo $vlan[0].'段<br>';
	//建立SQL語句，取得目前vlan所有今日流動的mac

	$sql = "SELECT * FROM (SELECT * FROM (SELECT ip AS ip_a, mac AS mac_a FROM `IPNOW` WHERE mac != '' AND vlan='{$vlan[0]}' ) AS A LEFT OUTER JOIN `GRANT` ON `A`.`ip_a` = `GRANT`.`ip`) AS B LEFT OUTER JOIN `APPLIED_MAC` ON `B`.`mac_a` = `APPLIED_MAC`.`mac`"; 
	//執行SQL語句

	$result1=mysql_query($sql) or die ("查詢失敗");
	echo "目前{$vlan[0]}段共有{$vlan[1]}個MAC";

	//以table印出目前vlan所有mac
	echo '<table width="95%" border="1" id="search">';
	echo '<tr id="search_title" height="35px">
			<td>IP</td>
			<td>MAC</td>
			<td>user</td>
			<td>departmenr</td>
			<td>degree</td>
			<td>grade</td>
			<td>phone</td>
			<td>email</td>
			<td>location</td>
			<td>description</td>
			</tr>';
	while($result2=mysql_fetch_array($result1)){
		echo "<tr";
			if($result2[4]==''){
				echo " bgcolor=\"#FFFF99\"";//沒資料
			}
			elseif($result2[3]!='' && $result2[1]!=$result2[3] ){
				echo " bgcolor=\"#99FF99\"";
			}
		echo ">
				<td>$result2[0]</td>
				<td>$result2[1]</td>
				<td>$result2[5]</td>
				<td>$result2[6]</td>
				<td>$result2[7]</td>
				<td>$result2[8]</td>
				<td>$result2[9]</td>
				<td>$result2[10]</td>
				<td>$result2[11]</td>
				<td>$result2[12]</td>
				</tr>";

	}
echo '</table>';

}
?>
</div>
<div id="footer">
	<p><span class="style2">Copyright (</span>c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
