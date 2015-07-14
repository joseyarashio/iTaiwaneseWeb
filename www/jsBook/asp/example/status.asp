<% title="Status Codes for Server Response" %>
<!--#include virtual="/jang/include/editfile.inc"-->
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<style>
		td {font-family: "�з���", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
<LINK Rel = "stylesheet" Href = "http://www.december.com/december.css" Type = "text/css">
</head>

<body background="/jang/graphics/background/yellow.gif">
<font face="�з���">
<h2 align=center><%=title%></h2>
<hr>

<TABLE align=center class="guide" border="1">
<TR><TH class="guide1">���A�X
    <TH class="guide1">�^�廡��
    <TH class="guide1">���廡��
<TR><TH class="guide2">2xx
    <TH class="guide2">Success
    <TH class="guide2">���O�����e�F���u�@�����p
<TR><TD class="guide" align="center">200
    <TD>OK; the request was fulfilled.
    <TD>���O����
<TR><TD class="guide" align="center">201
    <TD>OK; following a POST command.
    <TD>���O�����A�Hpost command �榡�ǰe
<TR><TD class="guide" align="center">202
    <TD>OK; accepted for processing, but processing is not completed.
    <TD>���O�w�e�F�A���{�Ǧ����D�A�L�k�������{�ǡC
<TR><TD class="guide" align="center">203
    <TD>OK; partial information--the returned information is only partial.
    <TD>���O�w�e�F�A���]�Y�Ǧ]���u��^�ǳ�����T�C
<TR><TD class="guide" align="center">204
    <TD>OK; no response--request received but no information exists to send back.
    <TD>���O�w�e�F�A���]�Y�Ǧ]���L�k�^�Ǹ�T�C

<TR><TH class="guide2">3xx
    <TH class="guide2">Redirection
    <TH class="guide2">ĵ�i�I��ĳ��}�I
<TR><TD class="guide" align="center">301
    <TD>Moved--the data requested has a new location and the change is permanent.
    <TD>ĵ�i�I�z�ҭn�D�����}�w�ä[�E���C
<TR><TD class="guide" align="center">302
    <TD>Found--the data requested has a different URL temporarily.
    <TD>ĵ�i�I�z�ҭn�D�����}�ȮɾE���C
<TR><TD class="guide" align="center">303
    <TD>Method--under discussion, a suggestion for the client to try another location.
    <TD>ĵ�i�I �z�ҭn�D�����}�ثe���Ҫ�ĳ�A��ĳ�z�ոէO����} �C
<TR><TD class="guide" align="center">304
    <TD>Not Modified--the document has not been modified as expected.
    <TD>ĵ�i�I�n�ǰe��Ƥ��X�W�w
<TR><TH class="guide2">4xx
    <TH class="guide2">Error seems to be in the client
    <TH class="guide2">ĵ�i�Iclient �ݺæ����~
<TR><TD class="guide" align="center">400
    <TD>Bad request--syntax problem in the request or it could not be satisfied.
    <TD>ĵ�i�I �b�zrequest�� �y�k�������D�A��ĳ�z�ץ��A�_�h�i��L�k����C
<TR><TD class="guide" align="center">401
    <TD>Unauthorized--the client is not authorized to access data.
    <TD>ĵ�i�Iclient �ݥ��g���v�A�L�k�Ǳ���ơC
<TR><TD class="guide" align="center">402
    <TD> Payment required--indicates a charging scheme is in effect.
    <TD>ĵ�i�I�ثe���榹�B�ݥI�O
<TR><TD class="guide" align="center"> 403
    <TD>Forbidden--access not required even with authorization.
    <TD>�ثe���B��������(�Y�ϳq�L�{�ҥ�L�k�q��) 
<TR><TD class="guide" align="center">404
    <TD>Not found--server could not find the given resource.
    <TD>ĵ�i�I���A���L�k�M��귽
<TR><TH class="guide2">5xx
    <TH class="guide2">Error seems to be in the server
    <TH class="guide2">ĵ�i�I���A���X�{���D
<TR><TD class="guide" align="center">500
    <TD>Internal Error--the server could not fulfill the request because of an unexpected condition.
    <TD>ĵ�i�I�]���W��]�A���A���L�k������O
<TR><TD class="guide" align="center">501
    <TD>Not implemented--the sever does not support the facility requested.
    <TD>ĵ�i�I���A���ݦb�޳N�W���䴩�n�D���O
<TR><TD class="guide" align="center">502
    <TD>Server overloaded--high load (or servicing) in progress.
    <TD>�ܩ�p�I���A���]�I���L���A�ثe�L�k����C
<TR><TD class="guide" align="center">503
    <TD>Gateway timeout--server waited for another service that did not complete in time.
    <TD>�ܩ�p�I���A���]�B�z��Lprocess�ε��ݮɶ��L�[�ӶW�X�ɶ� 
</TABLE>


<hr>
<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
