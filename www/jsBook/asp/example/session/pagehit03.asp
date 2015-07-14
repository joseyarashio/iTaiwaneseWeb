<%@language=JScript%>
<%title="記錄每日來訪人數"%>
<!--#include file="../head.inc"-->
<hr>

<%
// 下列程式碼可以將每天訪客的人數（含頁次和人次）記錄於 counter.txt
// Application.Contents.RemoveAll();		// 清除變數以便測試此網頁
// Session.Contents.RemoveAll();		// 清除變數以便測試此網頁
if (Application("counterDate")==null){
	Application("counter1") = 0;
	Application("counter2") = 0;
	today=new Date();
	Application("counterDate") = today.getDate();
	Application("lastRecordTime") = today.toLocaleString();
}

Application("counter1")++;		// 更新頁次計數
if (Session("PreviouslyOnLine")!=true){
	Application("counter2")++;	// 更新人次計數
	Session("PreviouslyOnLine") = true;
}

// Write to a file if necessary
fso = new ActiveXObject("Scripting.FileSystemObject");
today=new Date();
counterFile="counter.txt";
if (today.getDate()!=Application("counterDate")){		// 若不在同一天，則將資料寫入檔案
	fid = fso.OpenTextFile(Server.MapPath(counterFile), 8, true);	// 8 代表附加資料於檔案，true 代表若無檔案則新增
	fid.WriteLine(today.toLocaleString());
	fid.WriteLine("頁次："+Application("counter1"));
	fid.WriteLine("人次："+Application("counter2"));
	fid.Close();
	Application("counter1")=0;
	Application("counter2")=0;
	Application("counterDate")=today.getDate();;
	Application("lastRecordTime")=today.toLocaleString();
}
%>

<h3 align=center>從 <font color=green><%=Application("lastRecordTime")%></font> 以來，
本頁被造訪 <font color=red><%=Application("counter1")%></font> 次，
而您是第 <font color=red><%=Application("counter2")%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
