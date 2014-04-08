<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 edit 參數不是空字串
if ($_GET['edit'] !=''){
  //查詢 edit 參數所指定帳號的記錄, 從資料庫將原有的資料取出
  $sql="SELECT * FROM `APPLIED_MAC` WHERE mac='{$_GET['edit']}'";
  $result=mysql_query($sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysql_fetch_array($result);
}
else {
  //如果沒有 edit 參數, 表示此為錯誤執行, 所以轉向回原頁面
  header("Location: applied_mac.php");
}
$oldip=$row[8];
?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>網管系統個人資料編輯頁面</title>
</head>
<body>
<!個人資料編輯頁面>
<form id="form1" name="form1" method="post" action="applied_mac_update.php">
	MAC:
	<input maxlength="12" name="mac" type="hidden" value="<?php echo $row[0]; ?>"/>
	使用者姓名:
	<input name="name" value="<?php echo $row[1]; ?>" />
	所屬單位：
	<select name="department">
	<option value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?></option>
	<option value="管電">管電</option>
        <option value="資管">資管</option>
	<option value="財管">財管</option>
	<option value="企管">企管</option>
        <option value="不分系">不分系</option>	
	<option value="人管">人管</option>
        <option value="電子商務中心">電子商務中心</option>
        <option value="工管">工管</option>
        <option value="院辦">院辦</option>
        <option value="醫管">醫管</option>
	<option value="EMBA">EMBA</option>
        <option value="IBMBA">IBMBA</option>
    	</select>
	<select name="degree">
    	<option value="<?php echo $row[3]; ?>"><?php echo $row[3]; ?></option>
        <option value=""></option>
	<option value="教職員">教職員</option>
        <option value="碩士班">碩士班</option>
	<option value="學士班">學士班</option>
	</select>    
    	<select name="grade">
    	<option value="<?php echo $row[4]; ?>"><?php echo $row[4]; ?></option>
        <option value=""></option>
	<option value="95級">95級</option>
	<option value="96級">96級</option>
        <option value="97級">97級</option>
        <option value="98級">98級</option>
        <option value="99級">99級</option>
        <option value="100級">100級</option>
        <option value="101級">101級</option>
	</select>
	聯絡電話:
	<input maxlength="10" name="phone" value="<?php echo $row[5]; ?>"/>
	<br>
	EMAIL:
	<input name="email" value="<?php echo $row[6]; ?>"/>
	機器所在位置:
	<input maxlength="10" name="location" value="<?php echo $row[7]; ?>"/>
	備註：
	<input name="description" value="<?php echo $row[8]; ?>"/>
	<input name="submit" type="submit" value="修改" />
</form>
<p><a href="applied_mac.php">回mac申請列表</a></p>
</body>
</html>
