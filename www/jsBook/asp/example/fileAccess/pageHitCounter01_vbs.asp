<% title="以檔案為主的記數器" %>
<!--#include file="../head.inc"-->
<hr>

<%  
Set FileObject = Server.CreateObject("Scripting.FileSystemObject")
CountFile = Server.MapPath("pageHitCounter01.cnt")	' 找出記數檔案在硬碟中的實際位置
Set Out= FileObject.OpenTextFile(CountFile, 1, FALSE, FALSE)	' 開啟唯讀檔案
counter = Out.ReadLine	' 從檔案讀出記數資料
Out.Close	' 關閉檔案
counter= counter+1	' 增加記數資料
Set Out= FileObject.CreateTextFile (CountFile, TRUE, FALSE)	' 開啟檔案並允許寫入
Out.WriteLine(counter)	' 寫入檔案
Out.Close	' 關閉檔案
%>

<center>
您是本頁的第 <font color=green><%=counter%></font> 位訪客.！
<p>（按「<a href="javascript:history.go(0)">重新整理</a>」以增加記數資料。）
</center>

<hr>
<!--#include file="../foot.inc"-->
