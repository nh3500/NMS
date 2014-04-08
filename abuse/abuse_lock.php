<?php
include_once("../sys/check_session.inc.php");
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

//如果以 GET 方式傳遞過來的 del 參數不是空字串
if($_GET['lock'] !=''){
  
  //將 del 參數所指定的編號的記錄刪除
  $sql="INSERT INTO `LOCK` VALUES (NULL,'{$_GET['lock']}','{$_GET['vlan']}',CURRENT_TIMESTAMP,'1','2','{$_SESSION['user_account']}')";
  mysql_query($sql);

  //取得被刪除的記錄筆數
  $rowDeleted=mysql_affected_rows();

  //如果刪除的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
  if ($rowDeleted >0){
    echo "封鎖成功";
  }
  else {
    echo "封鎖失敗";
  }
}
?>
<script language='javascript'>
setTimeout("location.href='abuse.php'",1000);
</script><title>執行封鎖頁面</title>
<p><a href="abuse.php">若無自動跳轉請按此連結</a></p>

