<%@ LANGUAGE="VBScript" %>
<% Response.Expires = 0 %>
<% Session.Abandon %>
<HTML>
<HEAD>
<TITLE>�n���򥻸��</TITLE>
</HEAD>
<BODY>
<CENTER>
<FONT SIZE=+2>�n���򥻸��</FONT><P>
</CENTER>
<HR>
<% If Request.Form("name1") <> "" _
      And Request.Form("email1") <> "" Then
      Set objConn = Server.CreateObject("ADODB.Connection")
      Set objRecord = Server.CreateObject("ADODB.Recordset")
      objConn.Open Application("WebUser")
      SQLs = "select * from WAccount where name='" & Request.Form("name1") & "';"
      objRecord.Open SQLs, objConn, adOpenKetset, adLockPessimistic, adCmdText
      If objRecord.EOF Or objRecord.BOF Then
         objRecord.AddNew
         objRecord("name") = Request.Form("name1")
         for i=0 to 1
             Randomize
             passwd1=passwd1 & right(Cstr((9-0+1)*Rnd+0),3)
         next
         objRecord("passwd") =passwd1 
         objRecord("email") = Request.Form("email1")
         If Request.Form("tel1") <> "" Then
            objRecord("tel")  = Request.Form("tel1")
         End If
         If Request.Form("addr1") <> "" Then
            objRecord("addr") = Request.Form("addr1")
         End If
         objRecord.Update
         
         
         Set ml=Server.CreateObject("basp21")
         smtpsrv=Application("MailServer")
         mailto=Request.Form("email1") & Chr(9)
         mailto=mailto & "cc" & Chr(9) & Application("WebMaster")& Chr(9)
         mailto=mailto & "reply-to" & Chr(9) & Application("WebMaster")& vbTab & ">Content-Type: text/plain; charset=big5"  
         mailfrom="�����u�@�� "
         sbj= "���z�K�X"
         body = "�ϥΪ̦W�� : " & Request.Form("name1") & vbCrLf & _
            "�K�X : " & passwd1 & vbCrLf

         file=""
         rc = ml.SendMail(smtpsrv,mailto,mailfrom,sbj,body,file)
         If rc="" Then
	    Response.Write "���t�K�X�� E-mail �w�H�X,���ˬd�H�c�԰O��A��" & "<A HREF='/Webtest/logon.asp'>�n�J</A>!"
         Else
	    Response.Write rc
         End If
      Else
         Response.Write "��p ! �z��J����Ƥ����� !�Э��s<A HREF='" & "/WebApp/datain.asp'>��J</A>" & vbCrLf
      End If
      objRecord.Close
      objConn.Close
      Set objRecord = Nothing
      Set objConn = Nothing
      Response.End
   Else %>
<FORM ACTION="<%= Request.ServerVariables("SCRIPT_NAME") %>" METHOD=POST>
<TABLE>
<TR>
<TD>�ϥΪ̦W�� : </TD><TD><INPUT TYPE="TEXT" NAME="name1" SIZE=20> (���n)</TD>
</TR>
<TR>
<TD>E-mail : </TD><TD><INPUT TYPE="TEXT" NAME="email1" SIZE=20> (���n)</TD>
</TR>
<TR>
<TD>�q�ܸ��X : </TD><TD><INPUT TYPE="TEXT" NAME="tel1" SIZE=20></TD>
</TR>
<TR>
<TD>��  �} : </TD><TD><INPUT TYPE="TEXT" NAME="addr1" SIZE=60></TD>
</TR>
</TABLE><P>
<INPUT TYPE="SUBMIT" VALUE="Submit">
<INPUT TYPE="RESET" VALUE="Clear">
</FORM>
<% End If %>
</BODY>
</HTML>
