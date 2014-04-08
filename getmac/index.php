<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Mac Address Register for NSYSU College of Management 中山大學管理學院網路使用註冊程式 </title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.browser.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#browserValue').val(navigator.userAgent);
	$('#browser').text($.browser.name.replace('msie', 'Internet Explorer') + ' ' + $.browser.version);
});
</script>
</head>

<body>
<p><em><strong>Welcome to Registration .....</strong></em></p>
<p>Online Network Card Mac Address Register for NSYSU College of Management .<br />
  中山大學管理學院網路使用客戶端註冊程式。<br />
  <br />
  
  <script>

if($.browser.name != "msie")
{
	if($.os.name == "win")
	{	
		alert("Your browser is " + $.browser.name + " version:" + $.browser.version + "!!");
		document.location.href="./notie.php";
	}
	else
	{
		alert("Warning!! your os is " + $.os.name);
		document.location.href="./notwin.php";
	}
}
else if ($.browser.name == "msie")
{
	if($.os.name != "win")
	{	
		alert("Warning!! your os is " + $.os.name);
		document.location.href="./notwin.php";
	}
}

  </script>
  <span id="result_box"><span title="自動偵測"><em><strong>Automatic detection Registration</strong></em></span></span><em><strong>:</strong></em><br />
  Please click <a href="ip.vbs">this</a> and open it to register MAC address<br />
請直接點選此連結 <a href="ip.vbs">註冊MAC位址</a> ，並點選開啟舊檔，以便讓程式自動收集你電腦的 mac address 完成註冊。</p>
<p><span id="result_box2"><span title="手動註冊"><em><strong>Manual Registration</strong></em></span></span><em><strong>:</strong></em><br />
如果你的系統不是 Windows 及 IE ，或是你的系統有問題無法註冊<br />
請你嘗試使用手動註冊--請點選<a href="http://nms.cm.nsysu.edu.tw/getmac/notie.php">Manual Registration MAC address</a>。</p>
<p><br />
          <em><strong>FAQ：</strong></em><br />
* 網卡註冊的好處：<br />
 網管人員可以透過個人的網卡得知網路上有哪些人再上網，並且當網路發生問題的時候可以很快速的發現是誰造成問題的，並可以快速的排除問題。<br />

(通常是中毒或被入侵，被檢舉為資安通報) , 保護你使用網路的安全。<br />
<br />
* 不註冊會怎樣？<br />
  管院網路目前為分層管理，如果當某層網路發生問題或由個人電腦所造成問題的時候，我門將會啟動封鎖機制將沒有註冊的網卡全部鎖定，以找出問題發生的原因，所以請各位仍需要註冊你的網卡以免造成雙方的困擾。<br />
  <br />
  * 樓層鎖定後臨時訪客該如何使用網路？<br />
臨時訪客現在限定每週可以使用 3HR 的管院網路，超過3HR後就會鎖定以該電腦。</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
</body>
</html>
