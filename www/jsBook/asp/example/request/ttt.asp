<%@language=JScript%>
<%title="�g�� Request.Form �� Request.QueryString �ǰe����ƪ��d��"%>
<!--#include file="../head.inc"-->
<hr>

<form>
<ul>
<li>�z���j�W�G<input name="your_name" value="Roger Jang">

<li>�̫Ӫ��k�q�� (���)�G
	<input type="radio" name="singer" value="�����o">�����o
	<input type="radio" name="singer" value="�G���s" checked>�G���s
	<input type="radio" name="singer" value="�L�ӿo">�L�ӿo
	<input type="radio" name="singer" value="�J��">�J��
	<input type="radio" name="singer" value="�B�w��">�B�w��

<li>��i���� (�ƿ�)�G
<ul>
<li><input type="checkbox" name="course" value="C Language">C Language
<li><input type="checkbox" name="course" value="Engineering Mathematics">Engineering Mathematics
<li><input type="checkbox" name="course" value="Numerical Methods">Numerical Methods
<li><input type="checkbox" name="course" value="Web Programming" checked>Web Programming
<li><input type="checkbox" name="course" value="Neural Networks" checked>Neural Networks
<li><input type="checkbox" name="course" value="Fuzzy Logic">Fuzzy Logic
</ul>

<li>�̳��w���B�� (���)�G
<select name="single_choice"> 
<option value="�x�y">�x�y
<option value="���y" selected>���y
<option value="�Ʋy">�Ʋy
<option value="���y">���y
<option value="�]�y">�]�y
<option value="Yoyo�y">Yoyo�y
</select>

<li>�h�L���a�� (�ƿ�)�G
<select name="multiple_choice" size=4 multiple>
<option value="San Francisco" selected>San Francisco
<option value="Los Angeles">Los Angeles
<option value="Boston" selected>Boston
<option value="Perth">Perth
<option value="Sydney">Sydney
<option value="Barcelona">Barcelona
<option value="Amsterdam">Amsterdam
<option value="Prague" selected>Prague
<option value="Seoul">Seoul
<option value="Tokyo">Tokyo
 <option value="Osaka">Osaka
</select>

<li>���٦��ܭn���G<br>
<textarea name="comments" cols=50 rows=6>
�o�Ӱݨ��ܦ���...
�u��N�|�A���ਥ��...
</textarea>
</ul>

<center>
<input type="button" value="�g�� get �e�X" onClick="this.form.submit()">
</center>

</form>

<hr>
<h3 align=center>�� ASP Ū���쪺�����</h3>
<center>�]�Ы��e�X��A�~�i�H�ݨ��Ƴ�I�^</center>
<!--#include file="../listdict.inc"-->
<p><% listdict(Request.QueryString, "Request.QueryString"); %>
<p><% listdict(Request.Form, "Request.Form"); %>

<hr>
<!--#include file="../foot.inc"-->
