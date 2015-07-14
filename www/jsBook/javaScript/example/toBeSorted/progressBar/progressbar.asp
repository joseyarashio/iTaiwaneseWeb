<%@ Language=VBScript %>
<%Option explicit

'-----------------------------------------
sub main()
	
	Dim countinner, countouter, count1, count2, j,k
	
	'if Request.Form ("Submit") = "Submit" then
	'else
		call display	
	'end if
	
end sub

'-----------------------------------------
sub display()
%>
		<html>
		<head>
		<title>Progress Bar</title>
		<script language="javascript">
		<!--

		var timerID = null;
		var timerRunning = false;
		var timeValue = 1000;  //the time increment in mS
		var count = 0;
		var finish = false;
		//load up the images for the progress bar
		image00 = new Image(); image00.src='image-00.gif';
		image01 = new Image(); image01.src='image-01.gif';
		image02 = new Image(); image02.src='image-02.gif';
		image03 = new Image(); image03.src='image-03.gif';
		image04 = new Image(); image04.src='image-04.gif';
		image05 = new Image(); image05.src='image-05.gif';
		image06 = new Image(); image06.src='image-06.gif';
		image07 = new Image(); image07.src='image-07.gif';
		image08 = new Image(); image08.src='image-08.gif';
		image09 = new Image(); image09.src='image-09.gif';
		image10 = new Image(); image10.src='image-10.gif';


		function increment() {
			count += 1;
			if (count == 0) {document.images.bar.src=image00.src;}
			if (count == 1) {document.images.bar.src=image01.src;}
			if (count == 2) {document.images.bar.src=image02.src;}
			if (count == 3) {document.images.bar.src=image03.src;}
			if (count == 4) {document.images.bar.src=image04.src;}
			if (count == 5) {document.images.bar.src=image05.src;}
			if (count == 6) {document.images.bar.src=image06.src;}
			if (count == 7) {document.images.bar.src=image07.src;}
			if (count == 8) {document.images.bar.src=image08.src;}
			if (count == 9) {document.images.bar.src=image09.src;}
			//If you want it to repeat the bar continuously then use this line:
			if (count == 10) {document.images.bar.src=image10.src; count=-1;}
			//If you want it to stop repeating the bar then use this line:
			//if (count == 10) {document.images.bar.src=image10.src; end();}
		}

		function stopclock() {
			if (timerRunning)
				clearInterval(timerID);
			timerRunning = false;	
		}

		function end() {
			if (finish == true) {
				stopclock();
				window.close();
			}
			else {
				finish = true; 
			}
		}

		function startclock() {		
			stopclock();
			timerID = setInterval("increment()", timeValue);
			timerRunning = true;
			document.images.bar.src=image00.src;
		}

		function Send_onclick(frmSubmit) {
			startclock();
			frmSubmit.submit();			
		}

		//-->
		</script>		
		
		<head>
		<body>
		
		Please wait.<br><br>
		<img src="image-00.gif" name="bar" align="middle">

		<form name="frmProgressBar" action="finish.asp" method="post">
		<INPUT type="submit" value="Submit" name="Submit" LANGUAGE=javascript onclick="return Send_onclick(frmProgressBar)">
		</form>		

		</body>
		</html>
<%
end sub

'-----------------------------------------
call main
%>

