<?php
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

if($_POST['mac']!=''){
/*
	$_POST['mac']
	$_POST['user']
	$_POST['departmaent']
	$_POST['degree']
	$_POST['grade']
	$_POST['phone']
	$_POST['email']
	$_POST['location']
	$_POST['description']
	$_POST['flag']
*/

$mactemp1=preg_replace('/-/', "", $_POST['mac']);
$mactemp2=preg_replace('/:/', "",$mactemp1);
$mactemp3=strtoupper($mactemp2);
$match=preg_split('/,/', $mactemp3);

for($i = 0; $i < sizeof($match); $i++){


$sql="select mac from APPLIED_MAC_UNCHECK where mac='$match[$i]'";
//echo $sql;
$result2=mysql_query($sql);
$num2=mysql_num_rows($result2);

if($num2==0){
			$sql = "INSERT INTO APPLIED_MAC_UNCHECK VALUES('{$match[$i]}','{$_POST['user']}','{$_POST['department']}','{$_POST['degree']}','{$_POST['grade']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['location']}','{$_POST['description']}',CURRENT_TIMESTAMP)";
			//echo $sql."<br>";
			mysql_query($sql) or die ("更新失敗");
}			
else if($num2<>0){			
			$sql = "UPDATE APPLIED_MAC_UNCHECK SET mac='{$match[$i]}',user='{$_POST['user']}',department='{$_POST['department']}',degree='{$_POST['degree']}',grade='{$_POST['grade']}',phone='{$_POST['phone']}',email='{$_POST['email']}',location='{$_POST['location']}',description='{$_POST['description']}' WHERE mac='{$match[$i]}'";
			//echo $sql."<br>";
			mysql_query($sql) or die ("更新失敗");
}

}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>
<body>
<script language='javascript'>
setTimeout("location.href='http://cm.nsysu.edu.tw'",1000);
</script>
<p><a href="http://cm.nsysu.edu.tw">若無自動跳轉請按此連結</a></p>
</body>
</html>
