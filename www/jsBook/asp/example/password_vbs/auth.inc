<%
' ���������Ȭ�����{�Ҹ�T�O�_�s�b�G
' 1. �Y�s�b�A�h��������ơC
' 2. �Y���s�b�A�h���X�{�ҵ����]auth.asp�^�A�ШD��J�K�X�A�æb��������J�ӷ������]source.asp�^�C

' ����ݭn�K�X�O�@�������A�u�ݭn include ���ɮסA�Y�i�F��O�@�\��C
%>

<script>
function getPassword() {	' ��ܻ{�ҵ���
	toURL = "auth.asp";
	win1 = window.open(toURL,"getPassword","height=300,width=500,alwaysRaised");
	return;
}
</script>

<% rem �w�q��ơA�T�{�{�Ҹ�T�O�_�s�b
sub authentication(sessionVariable)
	' This file is usually loaded twice after the user has input the password correctly.
	' When it's loaded the second time, Request.ServerVariables("HTTP_REFERER") will be empty
	' since the page is loaded via a JavaScript in the authentication window
	If (Request.ServerVariables("HTTP_REFERER") <> "") Then
		session("source") = Request.ServerVariables("HTTP_REFERER")	// �ӷ�����
	End If
	session("target") = Request.ServerVariables("URL")	// �ؼк���
	If (request.ServerVariables("QUERY_STRING") <> "") Then
		session("target") = session("target") & "?" & Request.ServerVariables("QUERY_STRING") 
	End If
	if sessionVariable <> true then %>
		<script>
		getPassword();		// ��ܻ{�ҵ���
		history.go(-1);		// ���J�ӷ�����
		</script>
		<% response.end
	end if
end sub

call authentication(session("secret")) %>