<?php
include_once("../sys/check_session.inc.php");
header('Content-Type:text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//先將密碼已md5加密
$passwd=md5($_POST['passwd']);

//將新使用者相關資料匯入資料庫
if($_POST['username']!='' && $_POST['passwd']!='' && $_POST['realname']!='' && $_POST['phone']!='' && $_POST['email']!=''){
$sql = 'INSERT INTO `ADMIN` VALUES(\''.$passwd.'\',\''.$_POST['username'].'\',\''.$_POST['realname'].'\', \''.$_POST['phone'].'\',\''.$_POST['email'].'\')';
mysql_query($sql) or die ("新增失敗");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中山大學管理學院資訊中心網路管理系統管理員列表</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<?php
//僅允許admin進行新增使用者的動作
if($_SESSION["user_account"]=="admin"){
//新增管理員介面
echo '<form id="form1" name="form1" method="post" action="'.$_SERVER['PHP_SELF'].'">';
echo '  <label for="textfield"></label>';
echo '  User:';
echo '    <input maxlength="15" name="username"/>';
echo '  Password:';
echo '  <input type="password" maxlength="12" name="passwd"/>';
echo '  Realname:';
echo '    <input name="realname" />';
echo '  Phone:';
echo '  <input name="phone" />';
echo '  E-mail:';
echo '  <input name="email" />';
echo '  <input name="submit" type="submit" value="新增使用者" />';
echo '</form>';
}

//建立SQL語句
$sql='SELECT * FROM `ADMIN`';
//執行SQL語句
$result=mysql_query("$sql") or die ("查詢失敗");
//印出管理者相關資料
echo '<table width="90%" border="1" id="search"><tr id="search_title" height="35px"><td>username</td><td>name</td><td>phone</td><td>E-mail</td>';

if($_SESSION["user_account"]=="admin"){
		echo "<td>刪除</td>";
}
echo "</tr>";
echo "一般使用者僅允許修改自己的資料，需要新增與刪除使用者帳戶需要使用admin帳號。";
//限制各使用者只擁有修改該使用者帳戶的相關資料
while($result2=mysql_fetch_array($result)){
        if($result2[1]==$_SESSION["user_account"]){
		$result2[1]="<a href='admin_edit.php?edit={$result2[1]}'>$result2[1]</a>";
		}
		echo "<tr><td>$result2[1]</td><td>$result2[2]</td><td>$result2[3]</td><td>$result2[4]</td>";
//admin有權利刪除其他使用者
		if($_SESSION["user_account"]=="admin"){
			//不可讓admin刪除自己的帳號
			if($result2[1]=="<a href='admin_edit.php?edit=admin'>admin</a>"){
						echo "<td></td>";
			}
			//其他帳號的刪除按鈕
			else{
						echo "<td><a href='admin_delete.php?del={$result2[1]}'>刪除</a></td>";
			}
		}
		echo "</tr>";
}
echo '</table>';
?>
</div>
<div id="footer">
	<p><span class="style2">Copyright (</span>c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
