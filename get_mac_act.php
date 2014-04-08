<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<?php
include("sys/sqlconnect.inc.php");
$mac=$_POST['mac'];
$count=0;
$match=preg_split('/,/', $mac);

for($i = 0; $i < sizeof($match); $i++){
	$match[$i]=preg_replace('/-/', "", $match[$i]);
	echo $match[$i]."<br>";
	$updateflag=0;
	
	$sql="select mac from APPLIED_MAC";
	$result=mysql_query("$sql") or die ("mac比對失敗");
	while($result2=mysql_fetch_array($result)){
		if($match[$i]==$result2[0]){
			echo "<script language='javascript'>";
			echo "window.alert('mac之前已經有登記紀錄，將已新資料為準！');";
			echo "</script>";
			$updateflag=1;
		}
	}

			$sql='INSERT INTO `APPLIED_MAC_UNCHECK` VALUES(\''.$match[$i].'\',\''.$_POST['name'].'\',\''.$_POST['department'].'\',\''.$_POST['degree'].'\',\''.$_POST['grade'].'\',\''.$_POST['phone'].'\', \''.$_POST['email'].'\',\''.$_POST['location'].'\',\''.$_POST['description'].'\',CURRENT_DATE,CURRENT_DATE,\''.$updateflag.'\')';
			$result3=mysql_query("$sql") or die ("資料正在審核中");
			
}	

?>
</body>
</html>
