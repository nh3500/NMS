<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://cc.cm.nsysu.edu.tw/main.css" media="screen,projection" />
<link rel="stylesheet" type="text/css" href="http://cc.cm.nsysu.edu.tw/print.css" media="print" />
<title>申請查詢頁面</title>
</head>
<body>
<?php
//連結資料庫
include("sys/sqlconnect.inc.php");

//產生sql語法
if($_POST['query']!=''){
//$sql="SELECT * FROM `APPLIED_MAC` WHERE `email`='{$_POST['query']}' OR `mac`='{$_POST['query']}'OR `user`='{$_POST['query']}'";
$sql="SELECT * FROM `APPLIED_MAC` WHERE `mac`='{$_POST['query']}' OR `user`='{$_POST['query']}'";
};

//執行sql語法
$result=mysql_query($sql);
?>

<br>
請輸入申請的MAC格式如右列(a1b2c3d4e5f6)全部小寫
<br>

<form id="form1" name="form1" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
	查詢:
    <input type="text" name="query" />
  	<input name="submit" type="submit" value="查詢" />
</form>

<?php
//印出查詢結果mac
// 2008.10.17 修改 mtchang

echo '<table border="1">
		<tr>
		<td>mac</td>
		<td>機器位置</td>
		<td>分配IP</td>
		<td>是否被管制</td>
		</tr>';

if($_POST['query']!=""){		
while($result2=mysql_fetch_array($result)){
	echo "<tr>
		<td>$result2[0]</td>
		<td>$result2[7]</td>
		<td>$result2[8]</td>
		<td>&nbsp;</td>
		</tr>";
}
}
echo '</table>';
?>
</body>
</html>
