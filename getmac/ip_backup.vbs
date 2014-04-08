' MAC 自動收集程式
' 自動偵測你的主機 MAC 資訊，並回報到管院資訊中心
' write by mtchang@cm.nsysu.edu.tw

' Read program output into a variable line by line
Dim ObjExec
Dim strFromProc
Dim MyString, MyArray, MacString

Set WshShell = WScript.CreateObject("WScript.Shell")
Set ObjExec = WshShell.Exec("cmd /c getmac | findstr /C:- ")

' 組成 explorer 呼叫自串,將本機的 mac 傳到遠端的主機
MacStringcmd="cmd /c explorer "
MacString="http://nms.cm.nsysu.edu.tw/getmac.php?mac="

' 把找到的 mac 合併成衣各字串,以get 方式傳遞到網管系統
Do
   strFromProc = ObjExec.StdOut.ReadLine()
	if i >= 1 then 
		MacString = MacString & ","
	end if
	'WScript.Echo "ABC " & strFromProc & " DEF"
    ' 取前面的字串
    MyArray=Split(strFromProc, " ", -1, 1)
    'WScript.Echo MyArray(0)
    ' 組合 getstring
    MacString = MacString & MyArray(0)
	i=i+1 
  'MsgBox(i)
Loop While Not ObjExec.Stdout.atEndOfStream


'MsgBox(MacString)
MacStringcmd = MacStringcmd & """" & MacString & """"


'MsgBox(MacStringcmd)


MsgBox("資料收集完成,請按任一鍵此程式會呼叫IE,並將你的本機mac資訊上傳到網管系統.如果有問題或填寫錯誤請再重新執行一次即可!!聯絡Email:cccm@cm.nsysu.edu.tw 校內分機：4510")

' 送出mac資料
WshShell.Exec(MacStringcmd)
