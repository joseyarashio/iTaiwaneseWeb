<html>


<body>
<%
url1="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-�������F��"
url2="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-" & Server.URLEncode("�������F��")
url3=Server.URLEncode(url1) 
%>
<a target=_blank href="<%=url1%>">link1</a><br>
<a target=_blank href="<%=url2%>">link2</a><br>
<a target=_blank href="<%=url3%>">link3</a><br>

<%
url1="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-�������Y�C"
url2="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-" & Server.URLEncode("�������Y�C")
url3=Server.URLEncode(url1) 
%>
<a target=_blank href="<%=url1%>">link1</a><br>
<a target=_blank href="<%=url2%>">link2</a><br>
<a target=_blank href="<%=url3%>">link3</a><br>


<script>
url1="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-" + escape("�������F��");
document.write("<a target=_blank href=\"" + url1 + "\">" + url1 + "</a>");
url2="http://neural.cs.nthu.edu.tw/jang2/image/diary/2004/20040809-" + escape("�������Y�C");
document.write("<a target=_blank href=\"" + url2 + "\">" + url2 + "</a>");
</script>

</body>
</html>
