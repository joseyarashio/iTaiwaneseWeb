<%@language=JScript%>
<% title="分色顯示 ASP 網頁內容" %>
<!--#include file="../head.inc"-->
<hr>

<%
function fileRead(fileName){
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	var fid = fso.OpenTextFile(realPath, 1);		// 開啟唯讀檔案
	var fileContents = fid.ReadAll();			// 讀取整個檔案的資料
	fid.Close();
	return(fileContents);
}

url=Request("url")+"";
if (url=="undefined"){
	Response.write("You need to specify the target URL!!!");
	Response.End();
}
realPath=Server.MapPath(url);				// 檔案的實體路徑
contents = fileRead(realPath);				// 讀取檔案內容
// Step1, 讓瀏覽器進行適當排版：
contents=contents.replace(/</g, "&lt;");		// 將「<」代換成「&lt;」，以避免瀏覽器進行排版
contents=contents.replace(/>/g, "&gt;");		// 將「>」代換成「&gt;」，以避免瀏覽器進行排版
contents=contents.replace(/\n/g, "<br>");		// 將換列代換成<br>
contents=contents.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");	 // 將定位鍵代換成八個空格
// Step 2, 將 Server-side JScript 顯示成紅色：
contents=contents.replace(/&lt;%/g, "<font color=red>&lt;%");	// 將「&lt;%」代換成「<font color=red>&lt;%」
contents=contents.replace(/%&gt;/g, "%&gt;</font>");		// 將「%&gt;」代換成「%&gt;</font>」
// Step 3, 將 Client-side JavaScript 顯示成藍色：
contents=contents.replace(/&lt;script&gt;/gi, "<font color=blue>&lt;script&gt;");
contents=contents.replace(/&lt;script language=javascript&gt;/gi, "<font color=blue>&lt;script language=javascript&gt;");
contents=contents.replace(/&lt;\/script&gt;/gi, "&lt;\/script&gt;<\/font>");
Response.write(contents);
%>

<hr>
<!--#include file="../foot.inc"-->
