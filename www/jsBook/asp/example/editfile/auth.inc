<%
rem ���������Ȭ�����{�Ҹ�T�O�_�s�b�G
rem 1. �Y�s�b�A�h��������ơC
rem 2. �Y���s�b�A�h���X�{�ҵ����]auth.asp�^�A�ШD��J�K�X�A�æb��������J�ӷ������C

rem ����ݭn�K�X�O�@�������A�u�ݭn include ���ɮסA�Y�i�F��O�@�\��C
%>

<script>
function getPassword(URL) {
	toURL = "auth.asp";
	win1 = window.open(toURL,"getPassword","status=no,titlebar=no,toolbar=no,location=no,resizeable=no,scrollbars=no,height=300,width=500,alwaysRaised");
	return;
}
</script>

<% rem �w�q��ơA�T�{�{�Ҹ�T�O�_�s�b
sub authentication(sessionVariable)
	' session("source") is defined at editfile.inc
	session("target") = Request.ServerVariables("URL")
	If not (request.ServerVariables("QUERY_STRING")="") Then
		session("target") = session("target") & "?" & Request.ServerVariables("QUERY_STRING") 
	End If
	if sessionVariable <> true then %>
		<script>
		getPassword();
		history.go(-1);
		</script>
		<% 'response.expires=0
		response.clear
	end if
end sub
%>
<% call authentication(session("secret")) %>