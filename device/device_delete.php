<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 del 參數不是空字串
if ($_GET['del'] !=''){
  //將 del 參數所指定的編號的記錄刪除
  $sql="DELETE FROM DEVICE WHERE seq='{$_GET['del']}'";
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
setTimeout("location.href='device.php'",1000);
</script><title>網管系統設備刪除頁面</title>
<p><a href="device.php">若無自動跳轉請按此連結</a></p>

