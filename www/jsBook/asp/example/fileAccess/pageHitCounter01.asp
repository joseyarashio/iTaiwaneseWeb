<%@language=JScript%>
<% title="以檔案為主的記數器" %>
<!--#include file="../head.inc"-->
<hr>

<%  
fso = new ActiveXObject("Scripting.FileSystemObject");
countFile = Server.MapPath("pageHitCounter01.cnt");	// 找出記數檔案在硬碟中的實際位置
fid = fso.OpenTextFile(countFile, 1);			// 開啟唯讀檔案
count = fid.ReadLine();					// 從檔案讀出記數資料
fid.Close();						// 關閉檔案
count++;						// 增加記數資料
fid = fso.OpenTextFile(countFile, 2);			// 開啟檔案並允許寫入
fid.WriteLine(count);					// 寫入檔案
fid.Close();						// 關閉檔案
%>

<center>
您是本頁的第 <font color=green><%=count%></font> 位訪客.！
<p>（按「<a href="javascript:history.go(0)">重新整理</a>」以增加記數資料。）
</center>

<hr>
<!--#include file="../foot.inc"-->
