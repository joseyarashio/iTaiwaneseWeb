<!--#include file="constant.inc"-->
<!--#include file="../common/head.inc"-->
<!--#include virtual="/jang/include/util.inc"-->

<!-------------------- �бq�H�U�}�l�ק� ------------------->
Web �򥻤W�Ƥ@�Ӥ������t�ΡA�Ҧ����p��M�B�z�A���ѥΤ�ݩM���A���Ӧ@�P�����A�Τ�ݪ��q�����檺�O�������� client script�A�Ӧ��A���h�O����������� server scripts�C�b http ����w�U�A�C��ϥΪ̵o�X�@�� request ����A���A���N�۰���������� server scripts �]�p ASP�^�A�ñN���G�Ǧ^���Τ�ݡA�A�ѥΤ�ݪ��s�����Ӱ���������� client scripts�]�p JavaScript �� VBScript�^�A�ñN���G��ܦb�ù��W�C�p�G�٭n�s�����A���ݪ���ơA�N�����A�@���g�Ѫ�檺�e�X�A�~��������A�����ơA�ñN���G�H�s�������^�ǡA�]���n�O�s�����������T�]�Ϊ��A�^�N����·СA�]�ӳy�������y�{�]�p���x���C�]���A�ڭ̬O�_��� client scripts �ұ������ƥ�]�p�ƹ��I��Y�@���s�^�ӫ��� server scripts ���ơA�æb����ʺ��������p�U�A�N server scripts �����浲�G�����a�e�^ client scripts�H���׬O�֩w���G�Х� Remote Scripting�C
<p>
Remote Scripting�]���� Scripting�A��²�� RS�^�O�L�n�s�񴣥X���s�����A�����S�I�O�i�H���Τ�ݪ��{���X�]JavaScript �� VBScript�^�����M���A���ݪ��{���X���q�A�Ӥ������@�� CGI �� ASP�A�ݸg�ѭ������^�Ǥ~����o���A�������浲�G�CRemote Scripting �i�H���ѤU�C�n�B�G
<ol>
<li>������s�Τ�ݪ������Y�i��o���A���ݪ����浲�G�A�i²�ƺ����y�{�]�p�C
<li>�����b���P���������ǻ��ܼơA�i���C�����y�q�C
</ol>
<p>
Remote Scripting ���y�{�p�U�G
<ol>
<li>�b�Τ�ݩI�s���A���ݪ� ASP �{���X�ҩw�q���@�Ӥ�k�C
<li>�� request �N�g�Ѥ@�ӥN�z�{�ǡ]Proxy process�^�Ӱe����A���C�ثe�o�ӥN�z�{�Ǩƹ�W�O�@�� Java applet�A���|�N�Τ�ݪ� request �e����A���A�ñN���浲�G�]���@�Ӫ���Ǧ^�Τ�ݡC������٬� Call object�A���]�t�����A�����檺���G�H�ά�������T�C
</ol>
Remote Scripting ���檺�覡�i����ءG
<ul>
<li>�P�B����]Synchronously�^�G�Τ�ݻݵ��� RS �q���A���ݶǦ^���G��A�~��i��U�@�B�ʧ@�C
<li>�D�P�B����]Asynchronously�^�G�Τ�ݥi�ߨ�i���L�u�@�A�Ӥ������ݦ��A�������浲�G�C
</ul>
�A�i�H�̻ݭn�A��Τ��P������覡�A�H�t�X���ε{���ݨD�κ����t�סC
<p>
�U���æw�� RS ��A�|���U�C�T���ɮסA���O�����p�U�G
<ol>
<li><a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/_ScriptLibrary/rs.htm">Rs.htm</a>�G�o�O�M RS �������Τ�� JavaScript �{���X�A�ݳQ�Φb RS Client Script�C
<li>Rsproxy.class�G�H Java applet �Φ��s�b���N�z�{�ǡA�ݳQ�Φb RS �� Client Script�C
<li><a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/_ScriptLibrary/rs.asp">Rs.asp</a>�G�M RS ���������A���ݵ{���X�A�w�q�F RS Client Script �i�I�s����k�C
</ol>
�]�ƹ�W�A�A�i�H���Υh�A�ѳo�T���ɮת����e�A���D�A�Q���D��������@�覡�C�^
<p>
�ϥ� RS ���Ĥ@�ӨB�J�A�������b client script �Ұ� RS�A�]�t��Ӱʧ@�G
<ul>
<li>�[�J rs.htm�A�Ҧp�G
<pre class=code>
&#60SCRIPT LANGUAGE="JavaScript" src="/_ScriptLibrary/Rs.htm">
</pre>
<li>�[�J Rsproxy.class�A�Ҧp�G
<pre class=code>
&#60SCRIPT LANGUAGE="JavaScript">
	RSEnableRemoteScripting("/_ScriptLibrary")
&#60/script>
</pre>
�W�z�{�����|�ޥ� rsproxy.class�A�ҥH������b &#60body&#62 ���Ҥ���C
</ul>
�W�z��q�{���X�A�����]�A�O�N RS �w�˦b���A���ڥؿ��U�� _ScriptLibrary�C�Y�O _ScriptLibrary ��b��L��m�A�ڭ̤]�i�H�ε���ά۹���|�ӫ������m�C�]���@�Ӧb�Τ�ݪ��嫬�����A�i�H��ܦp�U�G<p>
<%src="client.htm"%>
<IFRAME ID=IFrame1 width=100% height=40% FRAMEBORDER=0 SCROLLING=yes SRC="example/rs/<%=src%>"></IFRAME><p>
�W�z�d�Ҫ������l�ɮ� (<a href="example/rs/<%=src%>"><%=src%></a>) �p�U�G
<pre class=code>
<% FileName=dirname(Request.ServerVariables("PATH_INFO")) & "example/rs/" & src %>
<%=printfile(FileName)%></pre>

<%src="server.asp"%>
���W�z�� client script�A�ڭ̦b���A���ݦ��۹����� server script�A�����l�ɮ� (<a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/<%=src%>"><%=src%></a>) �p�U�G
<pre class=code>
<% FileName=dirname(Request.ServerVariables("PATH_INFO")) & "example/rs/" & src %>
<%=printfile(FileName)%></pre>

�Ъ`�N�b�W�z�d�Ҥ��A��� client.htm ���� getTime() ��ƩҲ��ͪ��ɶ��O�� JavaScript Ū���Τ�ݹq�����ɶ��A�Ӧ�� client.htm ���� getServerTime() �|�I�s server.asp ���� getTime() �H���o���A�����ɶ��A�ñN���G�Ǧ^ client.htm�A��ӹL�{�ä��ݭn�� client.htm �i�洫�����u�@�C�ܩ��㪺�A�ѥΤ�ݩM���A���ݩұo�쪺�ɶ��ä��@�w�|�����@�P�C
<p>
�q�W�z�d�Ҥ��A�ڭ̥i�oı�b client.htm �� getTime() ��ƩM�b server.asp �� getTime() ��ƬO�@�Ҥ@�˪��A���y�ܻ��A�ڭ̥i�H�u�Τ@�ӥ]�t getTime() ���ɮסA�N�i�H�F��b�Τ�ݩM���A���ݦ@�ε{���X���ĪG�A�o�O�ϥ� JavaScript/JScript ���t�@���u�I�C�]�����G�b�Τ�ݭn�ϥΤ@�ӥ]�t JavaScript ���ɮסA�i�� client-side include�F�Ӧb���A���ݭn�ϥΤ@�ӥ]�t JScript ���ɮסA�i�� server-side include�C�^
 
<p>
RS ���w���h�ŬO�M Java applet �M IFrame �@�P���C�ѩ���A���w���ʪ��Ҷq�ARS ���U�C����G
<ul>
<li>Client script ���i�ǰe���c�Ƹ�ơ]�p����^�� Server script�C
<li>Client script �����M�Q�I�s�� Server script ���P�@�Ӧ��A���C
</ul>

<h3 class=txtH2><img src=/jang/graphics/dots/redball.gif> �d�Ҿ�z</h3>
<blockquote>
<ul>
<li><a target=_blank href="example/rs/client.htm">��²�檺 RS �d��</a>
<li><a target=_blank href="/jang/sandbox/asp/examples/rs/mysample/client1.asp">�L�n���d��</a>
<li><a target=_blank href="/jang/sandbox/asp/examples/rs/mysample/client2.asp">RS �M��Ʈw��X���d��</a>
<li><a target=_blank href="http://140.114.39.160:3001/waverecord/wavescript.hi">�ϥ� RS ���I�q�M��������</a>�]�Х��խ��s�������w���ʳ]�w�̧ܳC�w���A�H�Q ActiveX ����^
</ul></blockquote>
<h3 class=txtH2><img src=/jang/graphics/dots/redball.gif> �ѦҸ��</h3>
<blockquote>
<ul>
<li>�L�n�� <a href="/jang/sandbox/asp/examples/rs/docs/rmscpt.htm">English documents</a>
<li>�L�n�� <a href="http://www.microsoft.com/taiwan/products/develop/scripting/remotescripting/default.htm">RS ����</a>
<li><a href="http://www.microsoft.com/taiwan/products/develop/scripting/remotescripting/rsdown.htm">�U�� RS</a>
<li>���� Scripting ��<a href="news://msnews.microsoft.com/microsoft.public.scripting.remote">�s�D�s��</a>
</ul></blockquote>

<!-------------------- �H�U�Фŭק� -------------------->

<!--#include file="../common/tail.inc"-->
