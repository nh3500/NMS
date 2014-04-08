<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>This is not Windows series</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
Sorry, your operating system is not Windows series
<br />

<br />
<br />
此程式僅供Windows系列之作業系統使用，請您直接透過下面的表格輸入你的申請資料<br />
不便之處敬請見諒！<br />


<table border="1" width="400">
<form method="post" action="../applied_mac_check/applied_mac_check_act.php">
<tr><td colspan="2"><strong>粗體的部分為必填，若有所遺漏恐無法通過審核。</strong></td></tr>
	<tr><td><strong>MAC</strong></td>
	<td><input name="mac" value="<?php echo $_POST['mac']; ?>"/>
	 <a href="#an_anchor">mac查詢教學</a></td></tr>
	<tr><td><strong>NAME<br>
	  使用者姓名:</strong></td>
	<td><input name="user"/></td></tr>
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
	<td><input maxlength="10" name="phone" /></td></tr>
	<tr><td><strong>EMAIL</strong></td>
	<td><input name="email" /></td></tr>
	<tr><td>Device Location<br>機器所在位置</td>
	<td><input maxlength="10" name="location" /></td></tr>
	<tr><td>Other<br>備註</td>
	<td><input name="description"/></td></tr>
	<tr><td><input name="submit" type="submit" value="送出" /></td></tr>
</form>
</table>
<br />
<br />
<br />
<br />
<a id="an_anchor">如何查詢mac</a><br /><br />
*Linux作業系統<br /><br />

Step1.利用終端機或是進入文字命令模式。<br /><br />
Step2.利用su或是sudo指定取得root權限<br /><br />
Step3.輸入ifconfig eth0。<br /><br />
Step4.HWaddr <span class="style1">00:01:01:01:10:10</span>，紅色部分即為MAC位置，請將該字串輸入申請欄位中。<br />
<br />
</body>
</html>
