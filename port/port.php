<?php
//確認session
include_once("../sys/check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center" style="height:800px;" >
<?php
include("../sys/sqlconnect.inc.php");
//產生sql語法
if($_POST['search']!=''){
$sql = "SELECT mac,switch,port,MIN(time),MAX(time) FROM `MAC` WHERE `mac` LIKE '{$_POST['search']}' GROUP BY `mac`,`switch`,`port` ORDER BY MIN(time)";
//執行sql語法
$result=mysql_query($sql);

//echo $sql;
}
?>

<div id="sidebar">
        <ul><h2>輸入mac查詢</h2>
<form id="form1" name="form1" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <li> 目標:
        <input type="text" name="search" id="search" />
        <input name="submit" type="submit" value="查詢" /></li>
        </ul></div>
</form>


<?php
echo '<table align="center" border="1" id="search"><tr id="search_title" height="35px"><td>MAC</td><td>TIME</td><td>TIME</td><td>所在SWITCH</td><td>所在PORT</td></tr>';
if($_POST['search']!=''){
while($result2=mysql_fetch_array($result)){
	$sql="SELECT ip FROM DEVICE WHERE seq='{$result2[1]}'";
	$result3=mysql_query($sql);
	$result4=mysql_fetch_array($result3);
	echo "<tr><td>$result2[0]</td><td>$result2[3]</td><td>$result2[4]</td><td>$result4[0]</td><td>$result2[2]</td></tr>";}
}
echo '</table>';
?>
</div>
<div id="footer">
	<p>Copyright (c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
