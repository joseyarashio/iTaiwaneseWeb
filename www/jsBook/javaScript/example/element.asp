<%title="All Elements Used in a Form"%>
<!--#include file="head.inc"-->
<hr>

<form method="get" name="myform">

<ol>

<li>
�z���j�W�G<input name="your_name" value="Roger Jang">

<p>
<li>
�̫Ӫ��k�q�� (���)�G
<input type="radio" name="singer" value="�����o">�����o
<input type="radio" name="singer" value="�G���s" checked>�G���s
<input type="radio" name="singer" value="�L�ӿo">�L�ӿo
<input type="radio" name="singer" value="�J��">�J��
<input type="radio" name="singer" value="�B�w��">�B�w��

<p>
<li>
��i���� (�ƿ�)�G
<ul>
<li>
<input type="checkbox" name="course" value="C Language">C Language
<li>
<input type="checkbox" name="course" value="Engineering Mathematics">Engineering Mathematics
<li>
<input type="checkbox" name="course" value="Numerical Methods">Numerical Methods
<li>
<input type="checkbox" name="course" value="Web Programming" checked>Web Programming
<li>
<input type="checkbox" name="course" value="Neural Networks" checked>Neural Networks
<li>
<input type="checkbox" name="course" value="Fuzzy Logic">Fuzzy Logic
</ul>

<p>
<li>
�̳��w���B�� (���)�G
<select name="single_choice"> 
<option value="�x�y">�x�y
<option value="���y" selected>���y
<option value="�Ʋy">�Ʋy
<option value="���y">���y
<option value="�]�y">�]�y
<option value="Yoyo�y">Yoyo�y
</select>

<p>
<li>
�h�L���a�� (�ƿ�)�G
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

<p>
<li>
���٦��ܭn���G<br>
<textarea name="comments" cols=50 rows=6>
�o�Ӱݨ��ܦ���...
�u��N�|�A���ਥ��...
</textarea>

</ol>

<script src="listform.js">
	document.writeln("Cannot find listform.js!")
</script>

<input type="submit" value="Submit">
<input type="reset" value="Reset">
<input type="button" value="Show Widgets' Values using JavaScript" onClick="showValue(this.form)">

</form>

<hr>
<h3 align=center>Properties of this form</h3>
<SCRIPT  src="listprop.js">
      document.writeln("Included file listprop.js not found");
</SCRIPT>
<SCRIPT>listprop(document.forms[0], "document.forms[0]")</SCRIPT>

<hr>
<h3 align=center>Inputs of this form received by ASP</h3>
<center>
(Please hit "Submit" to see new values.)
<br>
<% call answer %>
</center>

<SCRIPT LANGUAGE=VBScript RUNAT=Server>
sub answer
	Response.Write "<table border=1>"
	Response.Write "<tr align=center><td>�W��</td><td>��J��</td></tr>"
	Set Params = Request.QueryString
	For Each p in Params
		Response.Write "<tr><td>" & p & "</td><td>" & Params(p) & "</td></tr>"
	Next
	Response.Write "</table>"
end sub
</SCRIPT>

<hr>
<!--#include file="foot.inc"-->
