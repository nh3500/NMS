<?php
include_once("check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中山大學管理學院資訊中心網路管理系統</title>
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id="header">
	<div id="logo">
		<h1>中山大學管電網路管理系統</h1>
	</div>
</div>
<div id="menu">
	<ul>
		<li class="current_page_item">
			<li><a href="../device/device.php" target="content">設備</a></li> 
			<li><a href="../server/server.php" target="content">SERVER</a> </li>
			<li><a href="../ipandmac/ipandmac.php" target="content"> IP&MAC </a></li>
			<li><a href="../port/port.php" target="content">PORT查詢</a></li>
		<li><a href="../ip/all.php" target="content">IP分配狀態</a> </li>
<li><a href="../applied_mac/applied_mac.php" target="content">申請列表</a></li>
<li> <a href="../applied_mac_check/applied_mac_check_list.php" target="content">審核mac</a> </li>
<li><a href="../currentip/currentip.php" target="content">目前流動MAC</a></li>
<li> <a href="../lock/lock.php" target="content">封鎖列表</a> </li>
<li><a href="../admin/admin.php" target="content">管理者</a> </li>
<li><a href="logout.php" target="_top">登出</a></li>
</ul>
</div>
</body>



</html>
