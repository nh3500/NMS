' MAC �۰ʦ����{��
' �۰ʰ����A���D�� MAC ��T�A�æ^����ް|��T����
' write by mtchang@cm.nsysu.edu.tw

' Read program output into a variable line by line
Dim ObjExec
Dim strFromProc
Dim MyString, MyArray, MacString

Set WshShell = WScript.CreateObject("WScript.Shell")
Set ObjExec = WshShell.Exec("cmd /c getmac | findstr /C:- ")

' �զ� explorer �I�s�ۦ�,�N������ mac �Ǩ컷�ݪ��D��
MacStringcmd="cmd /c explorer "
MacString="http://nms.cm.nsysu.edu.tw/getmac.php?mac="

' ���쪺 mac �X�֦���U�r��,�Hget �覡�ǻ�����ިt��
Do
   strFromProc = ObjExec.StdOut.ReadLine()
	if i >= 1 then 
		MacString = MacString & ","
	end if
	'WScript.Echo "ABC " & strFromProc & " DEF"
    ' ���e�����r��
    MyArray=Split(strFromProc, " ", -1, 1)
    'WScript.Echo MyArray(0)
    ' �զX getstring
    MacString = MacString & MyArray(0)
	i=i+1 
  'MsgBox(i)
Loop While Not ObjExec.Stdout.atEndOfStream


'MsgBox(MacString)
MacStringcmd = MacStringcmd & """" & MacString & """"


'MsgBox(MacStringcmd)


MsgBox("��Ʀ�������,�Ы����@�䦹�{���|�I�sIE,�ñN�A������mac��T�W�Ǩ���ިt��.�p�G�����D�ζ�g���~�ЦA���s����@���Y�i!!�p��Email:cccm@cm.nsysu.edu.tw �դ������G4510")

' �e�Xmac���
WshShell.Exec(MacStringcmd)
