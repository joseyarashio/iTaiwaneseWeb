<%@language=JScript%>
<%Response.Buffer=false%>
<%title="Response.Buffer�BFlush�BClear�BEnd ���d��"%>
<!--#include file="../head.inc"-->
<hr>

�ڧ�w�İϪ����e�ߨ�e��Ȥ�ݡA�ҥH�o�O�A�ݱo�쪺���e�C
<%Response.Flush;%>

<p>�ڧ�w�İϪ����e�M���F�A�ҥH�o�O�A�ݤ��쪺���e�C
<%Response.Clear;%>

<p>�ڤS�}�l�g�J�w�İϡA�ҥH�o�O�A�ݱo�쪺���e�C

<%Response.End;%>
<p>�o�ǳ��ݤ���A�]�����A���ݨ� Response.End�A�N���A�ǰe��ƤF�I
