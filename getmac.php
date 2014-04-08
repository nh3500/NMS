<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已申請mac列表</title>
<link href="content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<?php
$macstring=$_GET["mac"];
$mac=preg_replace('/-/', "", $macstring);
$match=preg_split('/,/', $mac);
include("sys/sqlconnect.inc.php");

echo "Here is the MAC address from your computer<br>";
for($i = 0; $i < sizeof($match); $i++){
	
	preg_match_all('/[0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f]/', $match[$i], $match2);
	$match[$i]=strtoupper($match2[0][0]);
	echo $match[$i]."<br>";
	if(!$match[$i]){
		echo "<script language='javascript'>";
		echo "window.alert('This is illegal MAC address!');";
		echo "location.href='http://www.cm.nsysu.edu.tw';";
		echo "</script>";
		exit();
	}
}

$sql="SELECT user,department,degree,grade,phone,email,location,description FROM ";
$sqla="SELECT * FROM APPLIED_MAC WHERE mac='$match[0]'";
$sqlb="SELECT mac as mac2 FROM APPLIED_MAC_UNCHECK WHERE mac='$match[0]'";
if(sizeof($match)>=1){
	for($i=1;$i<sizeof($match);$i++){
		$sqla=$sqla." or mac='$match[$i]'";
		$sqlb=$sqlb." or mac='$match[$i]'";}
}
$sql=$sql."(".$sqla.")"." AS A LEFT OUTER JOIN "."(".$sqlb.") AS B ON A.mac=B.mac2 WHERE mac2 is not NULL";

$result=mysql_query($sql);

$sql="SELECT DISTINCT user,department,degree,grade,phone,email,location,description FROM APPLIED_MAC_UNCHECK WHERE mac='$match[0]'";

if(sizeof($match)>=1){
	for($i=1;$i<sizeof($match);$i++){
		$sql=$sql." or mac='$match[$i]'";}
}

//echo $sql;
$result3=mysql_query($sql);
echo "Here is your profile<br>";

if(mysql_num_rows($result)>0){
while($result2=mysql_fetch_array($result)){
		echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
		echo "<table width=\"400\" border=\"1\">";
		echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
//		echo "<input type=\"hidden\" name=\"flag\" value=\"0\" >";
		echo "<tr><td>NAME</td><td><input type=\"hidden\" name=\"user\" value=\"$result2[0]\" >$result2[0]</td></tr>";
		echo "<tr><td>Department</td><td><input type=\"hidden\" name=\"department\" value=\"$result2[1]\" >$result2[1]</td></tr>";
		echo "<tr><td>Title</td><td><input type=\"hidden\" name=\"degree\" value=\"$result2[2]\" >$result2[2]</td></tr>";
		echo "<tr><td>Grade</td><td><input type=\"hidden\" name=\"grade\" value=\"$result2[3]\" >$result2[3]</td></tr>";
		echo "<tr><td>Phone</td><td><input type=\"hidden\" name=\"phone\" value=\"$result2[4]\" >$result2[4]</td></tr>";
		echo "<tr><td>EMAIL</td><td><input type=\"hidden\" name=\"email\" value=\"$result2[5]\" >$result2[5]</td></tr>";
		echo "<tr><td>Device Location</td><td><input type=\"hidden\" name=\"location\" value=\"$result2[6]\" >$result2[6]</td></tr>";
		echo "<tr><td>Other</td><td><input type=\"hidden\" name=\"description\" value=\"$result2[7]\" >$result2[7]</td></tr>";
		echo "<tr><td colspan=\"2\"><input name=\"submit\" type=\"submit\" value=\"Upload this data\" ></td>";
		echo "</table>";
		echo "</form>";
}
}
if(mysql_num_rows($result)>0){
while($result4=mysql_fetch_array($result3)){
		echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
		echo "<table width=\"400\" border=\"1\">";
		echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
//		echo "<input type=\"hidden\" name=\"flag\" value=\"1\" >";
		echo "<tr><td>NAME</td><td><input type=\"hidden\" name=\"user\" value=\"$result4[0]\" >$result4[0]</td></tr>";
		echo "<tr><td>Department</td><td><input type=\"hidden\" name=\"department\" value=\"$result4[1]\" >$result4[1]</td></tr>";
		echo "<tr><td>Title</td><td><input type=\"hidden\" name=\"degree\" value=\"$result4[2]\" >$result4[2]</td></tr>";
		echo "<tr><td>Grade</td><td><input type=\"hidden\" name=\"grade\" value=\"$result4[3]\" >$result4[3]</td></tr>";
		echo "<tr><td>Phone</td><td><input type=\"hidden\" name=\"phone\" value=\"$result4[4]\" >$result4[4]</td></tr>";
		echo "<tr><td>EMAIL</td><td><input type=\"hidden\" name=\"email\" value=\"$result4[5]\" >$result4[5]</td></tr>";
		echo "<tr><td>Device Location</td><td><input type=\"hidden\" name=\"location\" value=\"$result4[6]\" >$result4[6]</td></tr>";
		echo "<tr><td>Other</td><td><input type=\"hidden\" name=\"description\" value=\"$result4[7]\" >$result4[7]</td></tr>";
		echo "<tr><td colspan=\"2\"><input name=\"submit\" type=\"submit\" value=\"Upload this data\" ></td>";
		echo "</table>";
		echo "</form>";
}
}

if(mysql_num_rows($result)==0 && mysql_num_rows($result3)==0){
	echo "No data";
}
	echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
//	echo "<input type=\"hidden\" name=\"flag\" value=\"0\" >";
	echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
	echo "<input name=\"submit\" type=\"submit\" value=\"No data or Edit your profile\" >";
	echo "</form><br><br><br>";

// ====================================上面是英文版，下面是中文版====================================


$macstring=$_GET["mac"];
$mac=preg_replace('/-/', "", $macstring);
$match=preg_split('/,/', $mac);
include("sys/sqlconnect.inc.php");

echo "以下是在您電腦上取得的網路卡MAC資訊<br>";
for($i = 0; $i < sizeof($match); $i++){
	
	preg_match_all('/[0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f][0-9A-Fa-f]/', $match[$i], $match2);
	$match[$i]=strtoupper($match2[0][0]);
	echo $match[$i]."<br>";
	if(!$match[$i]){
		echo "<script language='javascript'>";
		echo "window.alert('不符合規定的MAC!');";
		echo "location.href='http://www.cm.nsysu.edu.tw';";
		echo "</script>";
		exit();
	}
}

$sql="SELECT user,department,degree,grade,phone,email,location,description FROM ";
$sqla="SELECT * FROM APPLIED_MAC WHERE mac='$match[0]'";
$sqlb="SELECT mac as mac2 FROM APPLIED_MAC_UNCHECK WHERE mac='$match[0]'";
if(sizeof($match)>=1){
	for($i=1;$i<sizeof($match);$i++){
		$sqla=$sqla." or mac='$match[$i]'";
		$sqlb=$sqlb." or mac='$match[$i]'";}
}
$sql=$sql."(".$sqla.")"." AS A LEFT OUTER JOIN "."(".$sqlb.") AS B ON A.mac=B.mac2 WHERE mac2 is not NULL";

$result=mysql_query($sql);

$sql="SELECT DISTINCT user,department,degree,grade,phone,email,location,description FROM APPLIED_MAC_UNCHECK WHERE mac='$match[0]'";

if(sizeof($match)>=1){
	for($i=1;$i<sizeof($match);$i++){
		$sql=$sql." or mac='$match[$i]'";}
}

//echo $sql;
$result3=mysql_query($sql);
echo "以下列出可能是您的個人資料<br>";

if(mysql_num_rows($result)>0){
while($result2=mysql_fetch_array($result)){
		echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
		echo "<table width=\"400\" border=\"1\">";
		echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
//		echo "<input type=\"hidden\" name=\"flag\" value=\"0\" >";
		echo "<tr><td>姓名</td><td><input type=\"hidden\" name=\"user\" value=\"$result2[0]\" >$result2[0]</td></tr>";
		echo "<tr><td>所屬單位</td><td><input type=\"hidden\" name=\"department\" value=\"$result2[1]\" >$result2[1]</td></tr>";
		echo "<tr><td>職稱</td><td><input type=\"hidden\" name=\"degree\" value=\"$result2[2]\" >$result2[2]</td></tr>";
		echo "<tr><td>級別</td><td><input type=\"hidden\" name=\"grade\" value=\"$result2[3]\" >$result2[3]</td></tr>";
		echo "<tr><td>電話</td><td><input type=\"hidden\" name=\"phone\" value=\"$result2[4]\" >$result2[4]</td></tr>";
		echo "<tr><td>EMAIL</td><td><input type=\"hidden\" name=\"email\" value=\"$result2[5]\" >$result2[5]</td></tr>";
		echo "<tr><td>設備位置</td><td><input type=\"hidden\" name=\"location\" value=\"$result2[6]\" >$result2[6]</td></tr>";
		echo "<tr><td>其他敘述</td><td><input type=\"hidden\" name=\"description\" value=\"$result2[7]\" >$result2[7]</td></tr>";
		echo "<tr><td colspan=\"2\"><input name=\"submit\" type=\"submit\" value=\"採用此筆資料進行編輯\" ></td>";
		echo "</table>";
		echo "</form>";
}
}
if(mysql_num_rows($result)>0){
while($result4=mysql_fetch_array($result3)){
		echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
		echo "<table width=\"400\" border=\"1\">";
		echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
//		echo "<input type=\"hidden\" name=\"flag\" value=\"1\" >";
		echo "<tr><td>姓名</td><td><input type=\"hidden\" name=\"user\" value=\"$result4[0]\" >$result4[0]</td></tr>";
		echo "<tr><td>所屬單位</td><td><input type=\"hidden\" name=\"department\" value=\"$result4[1]\" >$result4[1]</td></tr>";
		echo "<tr><td>職稱</td><td><input type=\"hidden\" name=\"degree\" value=\"$result4[2]\" >$result4[2]</td></tr>";
		echo "<tr><td>級別</td><td><input type=\"hidden\" name=\"grade\" value=\"$result4[3]\" >$result4[3]</td></tr>";
		echo "<tr><td>電話</td><td><input type=\"hidden\" name=\"phone\" value=\"$result4[4]\" >$result4[4]</td></tr>";
		echo "<tr><td>EMAIL</td><td><input type=\"hidden\" name=\"email\" value=\"$result4[5]\" >$result4[5]</td></tr>";
		echo "<tr><td>設備位置</td><td><input type=\"hidden\" name=\"location\" value=\"$result4[6]\" >$result4[6]</td></tr>";
		echo "<tr><td>其他敘述</td><td><input type=\"hidden\" name=\"description\" value=\"$result4[7]\" >$result4[7]</td></tr>";
		echo "<tr><td colspan=\"2\"><input name=\"submit\" type=\"submit\" value=\"採用此筆資料進行編輯\" ></td>";
		echo "</table>";
		echo "</form>";
}
}

if(mysql_num_rows($result)==0 && mysql_num_rows($result3)==0){
	echo "無任何資料";
}
	echo "<form action=\"applied_mac_check/applied_mac_check.php\" method=\"POST\" >";
//	echo "<input type=\"hidden\" name=\"flag\" value=\"0\" >";
	echo "<input type=\"hidden\" name=\"mac\" value=\"$mac\" >";
	echo "<input name=\"submit\" type=\"submit\" value=\"沒有查到舊資料或是以上資料皆不正確，進入新頁面填寫個人資料\" >";
	echo "</form>";

?>
</div>
</body>
</html>
