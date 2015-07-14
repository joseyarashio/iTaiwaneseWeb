<%@ Language = JScript%>
<%
// The URL to download
var url = "http://neural.cs.nthu.edu.tw/jang/matlab/toolbox/utility/";

// Create instance of Inet Control
inet = new ActiveXObject("InetCtls.Inet");

// Set the timeout property
inet.RequestTimeOut = 20;

// Set the URL property of the control
inet.Url = url;

// Actually download the file
var s = inet.OpenURL();
%>

<%=Server.HtmlEncode(s)%>
