<%@language=JScript%>
<% title="建立與刪除目錄" %>
<!--#include file="../head.inc"-->
<hr>

<%
// 取得FileSystemObject的個體執行。
fso = new ActiveXObject("Scripting.FileSystemObject");
// 取得Drive 物件。
fldr = fso.GetFolder("c:");
// 列印預設資料夾名稱。
Response.Write("預設資料夾名稱是：" + fldr + "<br>");
// 列印磁碟名稱。
Response.Write("磁碟機名稱：" + fldr.Drive + "<br>");
// 列印根檔案名稱。
if (fldr.IsRootFolder)
	Response.Write("這是根目錄！");
else
	Response.Write("這不是根目錄！");

Response.Write("<br><br>");
// 建立一個資料夾 
fso.CreateFolder ("C:\\Bogus");
Response.Write("建立資料夾：C:\\Bogus" + "<br>");
// 列印資料夾的基底名稱。
Response.Write("Basename = " + fso.GetBaseName("c:\\bogus") + "<br>");
// 刪除資料夾。
fso.DeleteFolder ("C:\\Bogus");
Response.Write("刪除資料夾：C:\\Bogus" + "<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
