<%
// ���������Ȭ�����{�Ҹ�T�O�_�s�b�G
// 1. �Y�s�b�A�h��������ơC
// 2. �Y���s�b�A�h���X�{�ҵ����]auth.asp�^�A�ШD��J�K�X�A�æb��������J������]source.asp�^�C

// ����ݭn�K�X�O�@�������A�u�ݭn include ���ɮסA�Y�i�F��O�@�\��C
%>

<script>
function getPassword() {	// ��ܻ{�ҵ���
	var toURL = "auth.asp";
	win1 = window.open(toURL, "getPassword", "height=300, width=500, alwaysRaised");
}
</script>

<% // �w�q��ơA�T�{�{�Ҹ�T�O�_�s�b
function authentication(sessionVariable){
	// This file is usually loaded twice after the user has input the password correctly.
	// When it's loaded the second time, Request.ServerVariables("HTTP_REFERER") will be empty since the page is loaded via a JavaScript in the authentication window
	if ((Request.ServerVariables("HTTP_REFERER")+"")!="undefined")	// ��X�ӷ�����
		Session("source") = (Request.ServerVariables("HTTP_REFERER")+"");
	Session("target") = Request.ServerVariables("URL")+"";	// �ؼк���
	if (Request.ServerVariables("QUERY_STRING")!="")
		Session("target") = Session("target") + "?" + Request.ServerVariables("QUERY_STRING");
	if (!sessionVariable){ %>
		<script>
		getPassword();		// ��ܻ{�ҵ���
		history.go(-1);		// ���J�ӷ�����
		</script>
		<% Response.End()
	}
}

authentication(Session("ok")); %>