<?php
include_once("../sys/check_session.inc.php");
header('Content-Type:text/html; charset=utf-8');
?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>網管系統IP分配編輯頁面</title>
</head>
<body>

<?php
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if ($_GET['edit1'] !=''){
	//查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
	$sql="SELECT * FROM `GRANT` WHERE `ip`='{$_GET['edit1']}' AND `mac`='{$_GET['edit2']}'";
	$result=mysql_query($sql);
	//將查詢到的資料放在 $row 陣列
	$row=mysql_fetch_array($result);
}
else {
	//如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
	header("Location: all.php");
}
?>

<form id="form1" name="form1" method="post" action="all_update.php">
	<label for="textfield"></label>
	<input name="ip" type="hidden" value="<?php echo $row[0]; ?>"/>
	mac:
	<input maxlength="12" name="mac" value="<?php echo $row[1]; ?>"/>
	<input name="submit" type="submit" value="修改" />
</form>
  <p><a href="all.php">回設備頁面</a></p>
</body>
