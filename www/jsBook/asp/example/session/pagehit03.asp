<%@language=JScript%>
<%title="�O���C��ӳX�H��"%>
<!--#include file="../head.inc"-->
<hr>

<%
// �U�C�{���X�i�H�N�C�ѳX�Ȫ��H�ơ]�t�����M�H���^�O���� counter.txt
// Application.Contents.RemoveAll();		// �M���ܼƥH�K���զ�����
// Session.Contents.RemoveAll();		// �M���ܼƥH�K���զ�����
if (Application("counterDate")==null){
	Application("counter1") = 0;
	Application("counter2") = 0;
	today=new Date();
	Application("counterDate") = today.getDate();
	Application("lastRecordTime") = today.toLocaleString();
}

Application("counter1")++;		// ��s�����p��
if (Session("PreviouslyOnLine")!=true){
	Application("counter2")++;	// ��s�H���p��
	Session("PreviouslyOnLine") = true;
}

// Write to a file if necessary
fso = new ActiveXObject("Scripting.FileSystemObject");
today=new Date();
counterFile="counter.txt";
if (today.getDate()!=Application("counterDate")){		// �Y���b�P�@�ѡA�h�N��Ƽg�J�ɮ�
	fid = fso.OpenTextFile(Server.MapPath(counterFile), 8, true);	// 8 �N����[��Ʃ��ɮסAtrue �N��Y�L�ɮ׫h�s�W
	fid.WriteLine(today.toLocaleString());
	fid.WriteLine("�����G"+Application("counter1"));
	fid.WriteLine("�H���G"+Application("counter2"));
	fid.Close();
	Application("counter1")=0;
	Application("counter2")=0;
	Application("counterDate")=today.getDate();;
	Application("lastRecordTime")=today.toLocaleString();
}
%>

<h3 align=center>�q <font color=green><%=Application("lastRecordTime")%></font> �H�ӡA
�����Q�y�X <font color=red><%=Application("counter1")%></font> ���A
�ӱz�O�� <font color=red><%=Application("counter2")%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
