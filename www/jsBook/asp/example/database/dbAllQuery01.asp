<%@ language="jscript" %>
<% title="使用 SQL 對資料庫進行新增、修改、刪除" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listQueryResult.inc"-->
<%
// 建立資料庫連結
database="test.mdb";
myConn = Server.CreateObject("ADODB.Connection");
myConn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";

// 建立資料表 friend
Response.Write("建立資料表 friend ...<br>");
myConn.Open();
sql = "CREATE TABLE friend (FirstName char(50), LastName char(50), Company char(100), City char(50), BirthDate date)"; 
myConn.Execute(sql);
// 插入第一筆資料
sql = "INSERT INTO friend (FirstName, LastName, City, Company) VALUES ('Roger', 'Jang', 'Hsinchu', '清華大學')";
myConn.Execute(sql);
// 插入第二筆資料
sql = "INSERT INTO friend (FirstName, LastName, City, Company) VALUES ('Bill', 'Hsu', 'Taipei', '伍豐科技')";
myConn.Execute(sql);
myConn.Close();
Response.Write("加入兩筆資料後，資料表 friend 的內容：<br>");
listQueryResult(database, "select * from friend");	// 印出資料表

// 刪除一筆資料
myConn.Open();
sql = "DELETE FROM friend where LastName='Jang'";
myConn.Execute(sql);
myConn.Close();
Response.Write("刪除一筆資料後，資料表 friend 的內容：<br>");
listQueryResult(database, "select * from friend");	// 印出資料表

// 更新一筆資料
myConn.Open();
sql = "UPDATE friend SET BirthDate = #3/31/62# WHERE LastName='Hsu'";
myConn.Execute(sql);
myConn.Close();
Response.Write("更新一筆資料後，資料表 friend 的內容：<br>");
listQueryResult(database, "select * from friend");	// 印出資料表

// 刪除資料表 friend
Response.Write("刪除資料表 friend ...<br>");
myConn.Open();
sql = "DROP TABLE friend";
myConn.Execute(sql);
myConn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
