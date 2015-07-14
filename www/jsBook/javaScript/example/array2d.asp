<%title="Multidiemnsional Arrays"%>
<!--#include file="head.inc"-->
<hr>

<script>
document.write("Multidimensional array test:<p>");
</script>

<script>
a = new Array(4);
for (i=0; i<4; i++) {
	a[i] = new Array(4);
	for (j=0; j<4; j++)
		a[i][j] = "["+i+","+j+"]";
}

for (i=0; i<4; i++) {
	str = "Row "+i+":";
	for (j=0; j<4; j++)
		str += a[i][j]
	document.write(str+"<p>")}
}
</script>

<hr>
<!--#include file="foot.inc"-->
