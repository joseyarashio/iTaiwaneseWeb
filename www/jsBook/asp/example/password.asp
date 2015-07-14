<!--#include file="constant.inc"-->
<!--#include file="../common/head.inc"-->
<!--#include virtual="/jang/include/util.inc"-->

<!-------------------- 請從以下開始修改 ------------------->
Web 基本上事一個分散的系統，所有的計算和處理，都由用戶端和伺服器來共同完成，用戶端的電腦執行的是網頁中的 client script，而伺服器則是執行網頁中的 server scripts。在 http 的協定下，每當使用者發出一個 request 之後，伺服器就相執行網頁中的 server scripts （如 ASP），並將結果傳回給用戶端，再由用戶端的瀏覽器來執行網頁中的 client scripts（如 JavaScript 或 VBScript），並將結果顯示在螢幕上。如果還要存取伺服器端的資料，就必須再一次經由表單的送出，才能指揮伺服器做事，並將結果以新的網頁回傳，因此要保存原先網頁的資訊（或狀態）就比較麻煩，因而造成網頁流程設計的困難。因此，我們是否能由 client scripts 所接收的事件（如滑鼠點選某一按鈕）來指揮 server scripts 做事，並在不更動網頁的情況下，將 server scripts 的執行結果悄悄地送回 client scripts？答案是肯定的：請用 Remote Scripting。
<p>
Remote Scripting（遠端 Scripting，或簡稱 RS）是微軟新近提出的新概念，它的特點是可以讓用戶端的程式碼（JavaScript 或 VBScript）直接和伺服器端的程式碼溝通，而不必像一般 CGI 或 ASP，需經由頁面的回傳才能取得伺服器的執行結果。Remote Scripting 可以提供下列好處：
<ol>
<li>不必更新用戶端的網頁即可獲得伺服器端的執行結果，可簡化網頁流程設計。
<li>不必在不同網頁之間傳遞變數，可降低網路流量。
</ol>
<p>
Remote Scripting 的流程如下：
<ol>
<li>在用戶端呼叫伺服器端的 ASP 程式碼所定義的一個方法。
<li>此 request 將經由一個代理程序（Proxy process）而送到伺服器。目前這個代理程序事實上是一個 Java applet，它會將用戶端的 request 送到伺服器，並將執行結果包成一個物件傳回用戶端。此物件稱為 Call object，它包含的伺服器執行的結果以及相關的資訊。
</ol>
Remote Scripting 執行的方式可分兩種：
<ul>
<li>同步執行（Synchronously）：用戶端需等到 RS 從伺服器端傳回結果後，才能進行下一步動作。
<li>非同步執行（Asynchronously）：用戶端可立刻進行其他工作，而不必等待伺服器的執行結果。
</ul>
你可以依需要，選用不同的執行方式，以配合應用程式需求及網路速度。
<p>
下載並安裝 RS 後，會有下列三個檔案，分別說明如下：
<ol>
<li><a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/_ScriptLibrary/rs.htm">Rs.htm</a>：這是和 RS 相關的用戶端 JavaScript 程式碼，需被用在 RS Client Script。
<li>Rsproxy.class：以 Java applet 形式存在的代理程序，需被用在 RS 的 Client Script。
<li><a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/_ScriptLibrary/rs.asp">Rs.asp</a>：和 RS 相關的伺服器端程式碼，定義了 RS Client Script 可呼叫之方法。
</ol>
（事實上，你可以不用去瞭解這三個檔案的內容，除非你想知道內部的實作方式。）
<p>
使用 RS 的第一個步驟，必須先在 client script 啟動 RS，包含兩個動作：
<ul>
<li>加入 rs.htm，例如：
<pre class=code>
&#60SCRIPT LANGUAGE="JavaScript" src="/_ScriptLibrary/Rs.htm">
</pre>
<li>加入 Rsproxy.class，例如：
<pre class=code>
&#60SCRIPT LANGUAGE="JavaScript">
	RSEnableRemoteScripting("/_ScriptLibrary")
&#60/script>
</pre>
上述程式馬會引用 rsproxy.class，所以必須放在 &#60body&#62 標籤之後。
</ul>
上述兩段程式碼，均假設你是將 RS 安裝在伺服器根目錄下的 _ScriptLibrary。若是 _ScriptLibrary 放在其他位置，我們也可以用絕對或相對路徑來指明其位置。因此一個在用戶端的典型網頁，可以顯示如下：<p>
<%src="client.htm"%>
<IFRAME ID=IFrame1 width=100% height=40% FRAMEBORDER=0 SCROLLING=yes SRC="example/rs/<%=src%>"></IFRAME><p>
上述範例的完整原始檔案 (<a href="example/rs/<%=src%>"><%=src%></a>) 如下：
<pre class=code>
<% FileName=dirname(Request.ServerVariables("PATH_INFO")) & "example/rs/" & src %>
<%=printfile(FileName)%></pre>

<%src="server.asp"%>
對於上述的 client script，我們在伺服器端有相對應的 server script，完整原始檔案 (<a href="../common/showcode.asp?source=/jang/books/webprog/06asp/example/rs/<%=src%>"><%=src%></a>) 如下：
<pre class=code>
<% FileName=dirname(Request.ServerVariables("PATH_INFO")) & "example/rs/" & src %>
<%=printfile(FileName)%></pre>

請注意在上述範例中，位於 client.htm 中的 getTime() 函數所產生的時間是由 JavaScript 讀取用戶端電腦的時間，而位於 client.htm 中的 getServerTime() 會呼叫 server.asp 中的 getTime() 以取得伺服器的時間，並將結果傳回 client.htm，整個過程並不需要對 client.htm 進行換頁的工作。很明顯的，由用戶端和伺服器端所得到的時間並不一定會完全一致。
<p>
從上述範例中，我們可發覺在 client.htm 的 getTime() 函數和在 server.asp 的 getTime() 函數是一模一樣的，換句話說，我們可以只用一個包含 getTime() 的檔案，就可以達到在用戶端和伺服器端共用程式碼的效果，這是使用 JavaScript/JScript 的另一項優點。（提醒：在用戶端要使用一個包含 JavaScript 的檔案，可用 client-side include；而在伺服器端要使用一個包含 JScript 的檔案，可用 server-side include。）
 
<p>
RS 的安全層級是和 Java applet 和 IFrame 一致的。由於伺服器安全性的考量，RS 有下列限制：
<ul>
<li>Client script 不可傳送結構化資料（如物件）至 Server script。
<li>Client script 必須和被呼叫的 Server script 位於同一個伺服器。
</ul>

<h3 class=txtH2><img src=/jang/graphics/dots/redball.gif> 範例整理</h3>
<blockquote>
<ul>
<li><a target=_blank href="example/rs/client.htm">最簡單的 RS 範例</a>
<li><a target=_blank href="/jang/sandbox/asp/examples/rs/mysample/client1.asp">微軟的範例</a>
<li><a target=_blank href="/jang/sandbox/asp/examples/rs/mysample/client2.asp">RS 和資料庫整合的範例</a>
<li><a target=_blank href="http://140.114.39.160:3001/waverecord/wavescript.hi">使用 RS 的點歌和錄音介面</a>（請先調降瀏覽器之安全性設定至最低安全，以利 ActiveX 執行）
</ul></blockquote>
<h3 class=txtH2><img src=/jang/graphics/dots/redball.gif> 參考資料</h3>
<blockquote>
<ul>
<li>微軟的 <a href="/jang/sandbox/asp/examples/rs/docs/rmscpt.htm">English documents</a>
<li>微軟的 <a href="http://www.microsoft.com/taiwan/products/develop/scripting/remotescripting/default.htm">RS 網站</a>
<li><a href="http://www.microsoft.com/taiwan/products/develop/scripting/remotescripting/rsdown.htm">下載 RS</a>
<li>遠端 Scripting 的<a href="news://msnews.microsoft.com/microsoft.public.scripting.remote">新聞群組</a>
</ul></blockquote>

<!-------------------- 以下請勿修改 -------------------->

<!--#include file="../common/tail.inc"-->
