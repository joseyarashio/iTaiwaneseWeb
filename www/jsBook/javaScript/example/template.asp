<html>
<head>
<title> Methods of Math </title>
</head>

<body>

<h2 align=center>Methods of Math</h2>

<hr>

<font face=symbol>p</font> = <script>document.writeln(Math.PI);</script>,
e = <script>document.writeln(Math.E);</script>

<br>
sin(30<sup>o</sup>) = <script>document.writeln(Math.sin(Math.PI/6));</script>

<br>
cos(30<sup>o</sup>) = <script>document.writeln(Math.cos(Math.PI/6));</script>

<br>
sin<sup>2</sup>(30<sup>o</sup>)+cos<sup>2</sup>(30<sup>o</sup>) =
<script>
document.writeln(Math.pow(Math.cos(Math.PI/6),2)+Math.pow(Math.sin(Math.PI/6),2)
);
</script>

<br>
sin<sup>2</sup>(30<sup>o</sup>)+cos<sup>2</sup>(30<sup>o</sup>) =
<script>
// Another way of using Math
with (Math) {
	document.writeln(pow(cos(PI/6),2)+pow(sin(PI/6),2));
}
</script>

<hr>
<!--#include file="foot.inc"-->

</body>
</html>
