<%@language=jscript%>
<%title="依照伺服器時間來回傳不同的問候語"%>
<!--#include file="head.inc"-->
<hr>

<% today=new Date(); %>
伺服器端的現在時間：<font color=green><%=today.toLocaleString()%></font><p>
<%
time=today.getHours();
if ((12<=time) && (time<2))
	greeting = "已經凌晨了，該睡了!";
else if ((2<=time) && (time<4))
	greeting = "您要撐到天亮嗎？快睡吧!"
else if ((4<=time) && (time<6))
	greeting = "天快亮了! 您是早起的鳥兒，還是晚睡的蟲兒?"
else if ((6<=time) && (time<8))
	greeting = "您早! 一大清早您就在研究ASP，精神令人感動!"
else if ((8<=time) && (time<10))
	greeting = "您早! 早上研究ASP的效果最好，您說是嗎?"
else if ((10<=time) && (time<12))
	greeting = "吃飯時間快到了，您餓了嗎?"
else if ((12<=time) && (time<13))
	greeting = "吃飽了嗎?別忘了吃飯喔!"
else if ((13<=time) && (time<14))
	greeting = "午安...午睡時間，別吵嘛!"
else if ((14<=time) && (time<16))
	greeting = "午安! 您午覺睡夠嗎？別睡著了!"
else if ((16<=time) && (time<18))
	greeting = "運動時間，別工作了!"
else if ((18<=time) && (time<20))
	greeting = "您吃過晚餐了嗎?該吃飯了!"
else if ((20<=time) && (time<22))
	greeting = "晚安! 您吃過晚餐了嗎?"
else if ((22<=time) && (time<24))
	greeting = "晚安! 該睡覺了!"
else
	greeting = "您好!"
%>
<font size=+2><%= greeting %></font>

<hr>
<!--#include file="foot.inc"-->
