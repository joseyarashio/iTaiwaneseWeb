<%title="依照伺服器時間來回傳不同的問候語（VBScript）"%>
<!--#include file="head.inc"-->
<hr>
<p>
Time: <font color=green><%=time%></font><br>
Date: <font color=green><%=date%></font><br>
Now:  <font color=green><%=now%></font><br>
<p>
<%
if #12:00:00 am# <= time and time < #2:00:00 am# then
	greeting = "已經凌晨了，該睡了!"
elseif #2:00:00 am# <= time and time < #4:00:00 am# then
	greeting = "您要撐到天亮嗎？快睡吧!"
elseif #4:00:00 am# <= time and time < #6:00:00 am# then
	greeting = "天快亮了! 您是早起的鳥兒，還是晚睡的蟲兒?"
elseif #6:00:00 am# <= time and time < #8:00:00 am# then
	greeting = "您早! 一大清早您就在研究ASP，精神令人感動!"
elseif #8:00:00 am# <= time and time < #10:00:00 am# then
	greeting = "您早! 早上研究ASP的效果最好，您說是嗎?"
elseif #10:00:00 am# <= time and time < #12:00:00 pm# then
	greeting = "吃飯時間快到了，您餓了嗎?"
elseif #12:00:00 pm# <= time and time < #1:00:00 pm# then
	greeting = "吃飽了嗎?別忘了吃飯喔!"
elseif #1:00:00 pm# <= time and time < #2:00:00 pm# then
	greeting = "午安...午睡時間，別吵嘛!"
elseif #2:00:00 pm# <= time and time < #4:00:00 pm# then
	greeting = "午安! 您午覺睡夠嗎？別睡著了!"
elseif #4:00:00 pm# <= time and time < #6:00:00 pm# then
	greeting = "運動時間，別工作了!"
elseif #6:00:00 pm# <= time and time < #8:00:00 pm# then
	greeting = "您吃過晚餐了嗎?該吃飯了!"
elseif #8:00:00 pm# <= time and time < #10:00:00 pm# then
	greeting = "晚安! 您吃過晚餐了嗎?"
elseif #10:00:00 pm# <= time and time < #12:00:00 am# then
	greeting = "晚安! 該睡覺了!"
else
	greeting = "您好!"
end if
%>
<font size=+2>
<%= greeting %>
</font>

<hr>
<!--#include file="foot.inc"-->
