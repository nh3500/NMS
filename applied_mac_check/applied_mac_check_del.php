<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

$mac=$_GET['del'];

$sql="SELECT * FROM APPLIED_MAC_UNCHECK WHERE MAC='$mac'";
$result=mysql_query($sql);
$result2=mysql_fetch_row($result);

$to      = $result2[6];
$subject = '[cccm]您的網卡暨個人資料未通過審核';
$message = "親愛的使用者{$result2[1]}您好：

	您的網路使用權申請因為資料不完整或是資料型態異常導致無法通過審核，以下是您登記的資料：	

	網路卡號：{$result2[0]}
	所屬部門:：{$result2[2]} 系{$result2[3]} {$result2[4]}
	使用者：{$result2[1]}
	連絡電話：{$result2[5]}
	信箱：{$result2[6]}
	設備所在位置：{$result2[7]}
	其他敘述：{$result2[8]}
		
	煩請你再次申請。
	申請連結:http://nms.cm.nsysu.edu.tw/getmac";

$headers = 'From: cccm@cm.nsysu.edu.tw';

mail($to, $subject, $message, $headers);

//如果以 GET 方式傳遞過來的 del 參數不是空字串
if ($_GET['del'] !=''){
  //將 del 參數所指定的編號的記錄刪除
  $sql="DELETE FROM APPLIED_MAC_UNCHECK WHERE mac='{$_GET['del']}'";
  mysql_query($sql);

  //取得被刪除的記錄筆數
  $rowDeleted=mysql_affected_rows();

  //如果刪除的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
  if ($rowDeleted >0){
    echo "刪除成功";
  }
  else {
    echo "刪除失敗";
  }

}
?>
<script language='javascript'>
setTimeout("location.href='applied_mac_check_list.php'",1000);
</script>
<p><a href="applied_mac_check_list.php">若無自動跳轉請按此連結</a></p>

