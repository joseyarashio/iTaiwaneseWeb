<%title="Case Conversion"%>
<!--#include file="head.inc"-->
<hr>

<SCRIPT>
function convertField(field) {
	if (document.form1.convertCase[0].checked)
		field.value = field.value.toLowerCase();
	if (document.form1.convertCase[1].checked)
		field.value = field.value.toUpperCase();
}
function convertToUpper() {
	document.form1.last.value = document.form1.last.value.toUpperCase();
	document.form1.first.value = document.form1.first.value.toUpperCase();
	document.form1.city.value = document.form1.city.value.toUpperCase();
}
function convertToLower() {
	document.form1.last.value = document.form1.last.value.toLowerCase();
	document.form1.first.value = document.form1.first.value.toLowerCase();
	document.form1.city.value = document.form1.city.value.toLowerCase();
}
</SCRIPT>
<BODY>

<FORM NAME="form1">
<B>Last name:</B>
<INPUT TYPE="text" NAME="last" SIZE=20 value="Lee" onChange="convertField(this)"><BR>
<B>First name:</B>
<INPUT TYPE="text" NAME="first" SIZE=20 value="Richard" onChange="convertField(this)"><BR>
<B>City:</B>
<INPUT TYPE="text" NAME="city" SIZE=20 value="Hsinchu" onChange="convertField(this)">
<P>
<INPUT TYPE="radio" NAME="convertCase" onClick="if (this.checked) {convertToLower()}">轉成小寫
<INPUT TYPE="radio" NAME="convertCase" onClick="if (this.checked) {convertToUpper()}">轉成大寫
<p><input type="reset">
</FORM>

<hr>
<!--#include file="foot.inc"-->
