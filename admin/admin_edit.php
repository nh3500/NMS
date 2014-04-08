<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if ($_GET['edit'] !=''){
  //查詢 edit 參數所指定帳號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM `ADMIN` WHERE username='{$_GET['edit']}' ";
  $result=mysql_query($sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysql_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回原頁面
  header("Location: admin.php");
}

?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>網管系統個人資料編輯頁面</title>
</head>
<body>
<!個人資料編輯頁面>
<form id="form1" name="form1" method="post" action="admin_update.php">
	<label for="textfield"></label>
	User:
	<input maxlength="15" name="username" value="<?php echo $row[1]; ?>"/>
	Password:
	<input type="password" maxlength="12" name="passwd" value="<?php echo $row[0]; ?>"/>
	Realname:
	<input name="realname" value="<?php echo $row[2]; ?>"/>
	Phone:
	<input name="phone" value="<?php echo $row[3]; ?>"/>
	E-mail:
	<input name="email" value="<?php echo $row[4]; ?>"/>
	<input name="submit" type="submit" value="修改" />
</form>
<p><a href="admin.php">回管理員清單</a></p>
</body>
</html>