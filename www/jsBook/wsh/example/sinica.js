function seg(sentence)
{
	// get sn
	url = "http://mt.iis.sinica.edu.tw/cgi-bin/text.cgi?query="+sentence;
	var http = WScript.CreateObject("Microsoft.XMLHTTP");
	http.open("GET", url, false);
	http.send();
	var html = http.responseText;
	var re = /pool\/(\d+)\.html/;
	var sn = re.exec(html)[1];
	// use this page http://mt.iis.sinica.edu.tw/uwextract/pool/{sn}.tag.txt
	// convert encoding by php
	url = "http://exa.zibox.cc/~zi/mt/sinica/en.php?sn="+sn;
	http.open("GET", url, false);
	http.send();
	html = http.responseText;
	// parse tokens
	var rew = /　([^(]+)\((\w+)\)/g;
	var ws = html.match(rew);
	var res = new Array();
	for(var i=0; i<ws.length; ++i)
	{
		var w = new Object();
		w.cword = ws[i].replace(rew, "$1");
		w.cpos = ws[i].replace(rew, "$2");
		res.push(w);
	}
	return res;
}
s = seg("我家有成千上萬的貓，真是太多了呀。");
for(var i in s)
	WScript.Echo(s[i].cword+s[i].cpos);
