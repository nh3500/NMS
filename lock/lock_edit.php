<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if ($_GET['edit'] !=''){
  //查詢 edit 參數所指定編號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM `LOCK` WHERE seq='{$_GET['edit']}' ";
  $result=mysql_query($sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysql_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回主頁面
  header("Location: lock.php");
}
?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>網管系統封鎖MAC編輯頁面</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="lock_update.php">
  seq:
  <input maxlength="12" name="seq" value="<?php echo $row[0]; ?>"/>
  mac:
  <input maxlength="12" name="mac" value="<?php echo $row[1]; ?>"/>
  Reason:
  <select name="reason">
    <option value="1">侵權</option>
    <option value="2">搶IP</option>
    <option value="3">未申請</option>
  </select>
  Lock:
  <select name="lock" >
    <option value="2">待上鎖</option>
    <option value="3">上鎖中</option>
	<option value="4">待解鎖</option>
    <option value="5">封鎖完成</option>
  </select>

  <input name="submit" type="submit" value="更新" />
</form>
  <p><a href="lock.php">回封鎖頁面</a></p>
</body>
