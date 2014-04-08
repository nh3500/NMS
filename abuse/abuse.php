<?php
//確認session
include_once("../sys/check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>侵權處理</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
//連結資料庫
include("../sys/sqlconnect.inc.php");

//補齊用字元
$help="140.117.";

//防呆設計
if($_POST['search']!=''){
	//若是只輸入ip後面兩個的數值，自動補齊。
	if(strlen($_POST['search'])<=7){
		$_POST['search']=$help.$_POST['search'];
	}
}

//查詢ip與mac對應的sql語法，
if($_POST['search']!=''){
	$sql = "SELECT mac,ip,start,least,vlan,user,department,degree,grade,phone FROM (SELECT DISTINCT mac,ip,MIN(time) AS start,MAX(time) AS least,vlan FROM `IP` WHERE `ip` LIKE '{$_POST['search']}' GROUP BY `mac`,`ip` ) AS A LEFT OUTER JOIN (SELECT user,department,degree,grade,phone,mac AS mac_b FROM `APPLIED_MAC` ) AS B ON A.`mac`=B.`mac_b` order by `start`";
}
//執行sql語法
$result=mysql_query($sql);
?>


<div align="center" style="height:800px;"  >

<div id="sidebar">
	<ul><h2>輸入ip查詢</h2>
	ip可以只打後面兩個數值（ex:69.1)。
<form id="form1" name="form1" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
	<li> 目標:
	<input type="text" name="search" id="search" />	
  	<input name="submit" type="submit" value="查詢" /></li>
	</ul></div>
</form>


<?php
//印出查詢結果mac
echo '<table align="center" border="1" id="search"><tr id="search_title" height="35px">
		<td>IP</td>
		<td>MAC</td>
		<td>STARTTIME</td>
		<td>LEASTTIME</td>
		<td>VLAN</td>
		<td>USER</td>
		<td>BELONG</td>
		<td>PHONE</td>
		<td>execute</td>
	</tr>';
	
	if($_POST['search']!=0){
	while($result2=mysql_fetch_array($result)){
		echo "<tr>
			<td>$result2[1]</td>
			<td>$result2[0]</td>
			<td>$result2[2]</td>
			<td>$result2[3]</td>
			<td>$result2[4]</td>
			<td>$result2[5]</td>
			<td>$result2[6]$result2[7]$result2[8]</td>
			<td>$result2[9]</td>
			<td><a href='abuse_lock.php?lock={$result2[0]}&vlan={$result2[4]}'>封鎖</a></td>
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
