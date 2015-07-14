<%@language=JScript%>
<% title="開啟檔案進行讀寫" %>
<!--#include file="../head.inc"-->
<hr>

<%
fileName = "test.txt";
fso = new ActiveXObject("Scripting.FileSystemObject");
// 寫入檔案
fid = fso.OpenTextFile(Server.MapPath(fileName), 2, true);	// 2 代表寫入，true 代表若檔案不存在，則自動產生新檔案
string = "這是一個測試！";
fid.WriteLine(string);
fid.Close();
Response.Write("<p>已經產生檔案「" + fileName + "」並寫入文字「" + string + "」！");
// 讀出檔案
fid = fso.OpenTextFile(Server.MapPath(fileName), 1);	// 1 代表唯讀
output = fid.ReadAll();
fid.Close();
Response.Write("<p>讀出的內容是：「" + output + "」");
%>

<hr>
<!--#include file="../foot.inc"-->
