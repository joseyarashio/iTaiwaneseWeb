<%title="�g�� Request.Form �� Request.QueryString �ǰe����ƪ��d��"%>
<!--#include file="../head.inc"-->
<hr>

<form action="formData_vbs.asp?xxx=yyy&aaa=bbb" name="myform">
<ul>
<li>�z���j�W�G<input name="your_name" value="�G���s">
<li>�̫Ӫ��k���P (���)�G
	<input type="radio" name="singer" value="�d�L" checked>�d�L
	<input type="radio" name="singer" value="�L�ӿo">�L�ӿo
	<input type="radio" name="singer" value="���~�W">���~�W
	<input type="radio" name="singer" value="���Ӧ�">���Ӧ�
<li>��i���� (�ƿ�)�G
	<input type="checkbox" name="course" value="��Ƶ��c">��Ƶ��c
	<input type="checkbox" name="course" value="�����ƾ�" checked>�����ƾ�
	<input type="checkbox" name="course" value="�u�{�ƾ�">�u�{�ƾ�
	<input type="checkbox" name="course" value="�ƭȤ�k" checked>�ƭȤ�k
<li>�̳��w���B�� (���)�G
	<select name="single_choice"> 
	<option value="���y" selected>���y
	<option value="���y">���y
	<option value="�]�y">�]�y
	<option value="Yoyo�y">Yoyo�y
	</select>
<li>�h�L���a�� (�ƿ�)�G
	<select name="multiple_choice" size=3 multiple>
	<option value="San Francisco" selected>San Francisco
	<option value="Los Angeles">Los Angeles
	<option value="Boston" selected>Boston
	<option value="Seoul">Seoul
	<option value="Tokyo">Tokyo
	</select>
<li>���٦��ܭn���G<br>
<textarea name="comments" cols=60 rows=3>
�o�Ӱݨ��ܦ���...
�u��N�|�A���ਥ��...
</textarea>
</ul>
<center>
<input type="button" value="�g�� get �e�X" onClick="this.form.method='get'; this.form.submit()">
<input type="button" value="�g�� post �e�X" onClick="this.form.method='post'; this.form.submit()"><br>
�]�ݫ��e�X��A�~�i�H�ݨ�U����Ƴ�I�^
</center>
</form>

<h3 align=center>�� ASP Ū���쪺�����</h3>
<!--#include file="../listdict.inc"-->
<p><% listdict Request.QueryString, "Request.QueryString" %>
<p><% listdict Request.Form, "Request.Form" %>

<hr>
<!--#include file="../foot.inc"-->
