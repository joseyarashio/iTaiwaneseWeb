<%@language=JScript%>
<% title="��� big5 ��������ܭ�l�X" %>
<!--#include file="../head.inc"-->
<hr>
<%
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
// Step 1: �ϥ� WinHttp.WinHttpRequest ����ӧ������
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseBody;	// ��^ binary �����
// Step 2: �ϥ� adodb.stream ����Ӷi����s�X
oStream = new ActiveXObject("adodb.stream");   
oStream.Type=1;			// �H�G�i��覡�ާ@
oStream.Mode=3;			// �i�P�ɶi��Ū�g
oStream.Open();			// �}�Ҫ���
oStream.Write(content);		// �N content �g�J����
oStream.Position=0;		// �q�Y�}�l
oStream.Type=2;			// �H��r�Ҧ��ާ@
oStream.Charset="Big5";		// �]�w�s�X�覡
result= oStream.ReadText();	// �N���󤺪���rŪ�X
%>

<fieldset>
<legend><a target=_blank href="<%=url%>"><%=url%></a> ����l�X</legend>
<xmp><%=result%></xmp>
</fieldset>

<hr>
<!--#include file="../foot.inc"-->
