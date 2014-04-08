<?php
header('Content-Type: text/html; charset=utf-8');
include("../sys/sqlconnect.inc.php");

?>
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>個人資料編輯頁面</title>
</head>
<body>
<!個人資料編輯頁面>
<table border="1" width="400">

<form method="post" action="../applied_mac_check/applied_mac_check_act.php">
<tr><td colspan="2"><strong>粗體的部分為必填，若有所遺漏恐無法通過審核。</strong></td></tr>
	<tr><td>MAC</td><td colspan="2"><input name="mac" value="<?php echo $_POST['mac']; ?>" readonly="ture"/></tr>
	<tr><td><strong>NAME<br>
	  使用者姓名:</strong></td>
	<td><input name="user" value="<?php echo $_POST['user']; ?>" /></td></tr>
	<tr><td>Department<br>所屬單位：</td>
	<td><select name="department">
		<option value="管電" <? if($_POST['department']=="")echo "selected";  ?> ></option>
		<option value="管電" <? if($_POST['department']=="管電")echo "selected";  ?> >Computer Center 管電</option>
      	<option value="資管" <? if($_POST['department']=="資管")echo "selected";  ?> >Information Management 資管</option>
		<option value="財管" <? if($_POST['department']=="財管")echo "selected";  ?> >Finance 財管</option>
		<option value="企管" <? if($_POST['department']=="企管")echo "selected";  ?> >Business Management 企管</option>
        <option value="不分系" <? if($_POST['department']=="不分系")echo "selected";  ?> >UM 不分系</option>	
		<option value="人管" <? if($_POST['department']=="人管")echo "selected";  ?> >Human Resource 人管</option>
        <option value="電子商務中心" <? if($_POST['department']=="電子商務中心")echo "selected";  ?> >EC 電子商務中心</option>
        <option value="公管" <? if($_POST['department']=="公管")echo "selected";  ?> >Public Affairs Management 公管</option>
        <option value="院辦" <? if($_POST['department']=="院辦")echo "selected";  ?> >Management Office院辦</option>
        <option value="醫管" <? if($_POST['department']=="醫管")echo "selected";  ?> >Health Care Management 醫管</option>
		<option value="EMBA" <? if($_POST['department']=="EMBA")echo "selected";  ?> >EMBA</option>
        <option value="IBMBA" <? if($_POST['department']=="IBMBA")echo "selected";  ?> >IBMBA</option>
    </select>
	<select name="degree">
        <option value="" <? if($_POST['degree']="");echo "selected";  ?>></option>
		<option value="教職員" <? if($_POST['degree']=="教職員")echo "selected";  ?>>Staff 教職員</option>
        <option value="博士班" <? if($_POST['degree']=="博士班")echo "selected";  ?>>Doctor 博士班</option>
		<option value="碩士班" <? if($_POST['degree']=="碩士班")echo "selected";  ?>>Master 碩士班</option>
		<option value="學士班" <? if($_POST['degree']=="學士班")echo "selected";  ?>>Undergraduate 學士班</option>
	</select> 
    <select name="grade">
        <option value="" <? if($_POST['grade']=="")echo "selected";  ?>></option>
		<option value="95級" <? if($_POST['grade']=="95級")echo "selected";  ?>>95級</option>
		<option value="96級" <? if($_POST['grade']=="96級")echo "selected";  ?>>96級</option>
        <option value="97級" <? if($_POST['grade']=="97級")echo "selected";  ?>>97級</option>
        <option value="98級" <? if($_POST['grade']=="98級")echo "selected";  ?>>98級</option>
        <option value="99級" <? if($_POST['grade']=="99級")echo "selected";  ?>>99級</option>
        <option value="100級" <? if($_POST['grade']=="100級")echo "selected";  ?>>100級</option>
        <option value="101級" <? if($_POST['grade']=="101級")echo "selected";  ?>>101級</option>
		<option value="102級" <? if($_POST['grade']=="102級")echo "selected";  ?>>102級</option>
	</select></td></tr>
	<tr><td><strong>Phone<br>
	  聯絡電話</strong></td>
	<td><input maxlength="10" name="phone" value="<?php echo $_POST['phone']; ?>"/></td></tr>
	<tr><td><strong>EMAIL</strong></td>
	<td><input name="email" value="<?php echo $_POST['email']; ?>"/></td></tr>
	<tr><td>Device Location<br>機器所在位置</td>
	<td><input maxlength="10" name="location" value="<?php echo $_POST['location']; ?>"/></td></tr>
	<tr><td>Other<br>備註</td>
	<td><input name="description" value="<?php echo $_POST['description']; ?>"/></td></tr>
	<tr><td><input name="submit" type="submit" value="送出" /></td></tr>
</form>
</table>
</body>
</html>
