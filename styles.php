<?php
include_once("check_session.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中山大學管理學院資訊中心網路管理系統</title>
<link href="style3.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrap">
<div id="header">
<div id="topmenu">
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
<div class="clear"></div>
<h1 id="sitename"><a href="#">中山大學管院資訊中心</a><span class="desc">網路管理系統</span></h1>

</div>
<div id="content">
  <div class="clear"></div>
  
  <div id="rightcontent">
  <form action="#">
<div class="contactform">
<label for="name">Name:</label>
<input class="textfield" name="Nname" id="name" type="text" />
<label for="email">email:</label><input class="textfield" id="email" name="email" type="text" />
<label for="Age">age:</label>
<input class="textfield" name="Age" id="Age" type="text" />
<label for="Comments">Comments/Questions:</label>
<textarea class="textfield" id="Comments" name="Comments" cols="30" rows="8"></textarea>
<label for="Submit"><span class="hide">Submit</span></label>
<input name="Submit" type="button" id="Submit" class="button" value="Submit" />
</div>
</form>
  
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col">Lorem</th>
      <th scope="col">Ipsum</th>
      <th scope="col">Dolor</th>
    </tr>
    <tr>
      <td>Sit</td>
      <td>Ipsum</td>
      <td>Consectetuer</td>
    </tr>
    <tr>
      <td>Adipiscing elit</td>
      <td>Aliquam Negue mi</td>
      <td>Euismond vitae</td>
    </tr>
    <tr>
      <td>Morbi elit nulla</td>
      <td>Laoreet Vel</td>
      <td>Posuere et</td>
    </tr>
    <tr>
      <td>Sit</td>
      <td>Ipsum</td>
      <td>Consectetuer</td>
    </tr>
    <tr>
      <td>Adipiscing elit</td>
      <td>Aliquam Negue mi</td>
      <td>Euismond vitae</td>
    </tr>
    <tr>
      <td>Morbi elit nulla</td>
      <td>Laoreet Vel</td>
      <td>Posuere et</td>
    </tr>
  </table>
  

  </div>
</div>
<div class="clear">

</div>
<div id="footer">
<div id="btm_cont">


</div>
<div id="ft_btm"> Copyright &copy; YourSiteName.com  | <a href="#">Some</a> <a href="#">Links</a> <a href="#">Goes</a> <a href="#">Here</a><br />
<!--Credits -->
<a href="http://ramblingsoul.com">CSS Template</a> by Rambling Soul, Sponsored by <a href="http://www.webverzeichnis-online.de/" title="Webkatalog werbefrei">Webverzeichnis Online</a><br />
Images from<a href="http://sxc.hu"> sxc.hu</a>
<!--/Credits -->
</div>

</div>

</div>
</body>
</html>
