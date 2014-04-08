<?php
include_once("../sys/check_session.inc.php");
header('Content-Type:text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

$sql="INSERT INTO `GRANT` VALUES ('{$_POST['ip']}','{$_POST['mac']}') ";
mysql_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>封鎖列表</title>
<link href="../content_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center" style="height:600px; overflow:scroll">

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <li> IP:
        <input maxlength="15" name="ip" size="15"/></li>
	<li> MAC:
        <input maxlength="12" name="mac" size="12"/></li>
	<input name="submit" type="submit" value="新增" />
</form>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  <select name="sel">
  <option value="69">69</option>
  <option value="70">70</option>
  <option value="71">71</option>
  <option value="72">72</option>
  <option value="73">73</option>
  <option value="74">74</option>
  <option value="75">75</option>
  <option value="76">76</option>
  <option value="77">77</option>
  <option value="78">78</option>
  <option value="79">79</option>
  </select>
  <input name="submit" type="submit" value="分類查詢" />
</form>
<br>
<?php
if($_POST['sel']!=NULL){
$sql="SELECT * FROM (SELECT `ip`,`mac` FROM `GRANT` WHERE `ip` LIKE '140.117.{$_POST['sel']}.%') AS A LEFT OUTER JOIN (SELECT `mac`,`user`,`phone` FROM `APPLIED_MAC`) AS B ON A.`mac`=B.`mac` ORDER BY inet_aton(ip)";
$temp=mysql_query("$sql") or die ("查詢失敗");
		echo '<table width="60%" border="1" id="search">
				<tr id="search_title" height="35px">
				<td>ip</td>
				<td>mac</td>
				<td>user</td>
				<td>phone</td>
				<td>edit</td>
				</tr>';
while($result=mysql_fetch_array($temp)){
		echo "<tr>
				<td width=\"20%\">{$result[0]}</td>
				<td width=\"20%\">{$result[1]}</td>
				<td width=\"20%\">{$result[3]}</td>
				<td width=\"20%\">{$result[4]}</td>
				<td width=\"20%\"><a href=all_edit.php?edit1={$result[0]}&edit2={$result[1]}>編輯</a></td>	
				</tr>";
}
		echo '</table>';
}
?>
</div>
<div id="footer">
	<p>Copyright (c) 2008 cm.nsysu.edu.tw <a href="http://cc.cm.nsysu.edu.tw">管理學院資訊中心</a>.</p>
</div>
</body>
</html>
