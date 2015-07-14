// 從一段文字中，抽取連結文字與相關網址

content="<a href=\"url1\">text1</a> and <a href=\"url2\">text2</a> and \r\n<a href=\"url3\">text3</a>";
pattern=/<A(.*?)<\/A>/gi;
found=content.match(pattern);
pattern2=/<\s*A\s+HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;
for (i=0; i<found.length; i++){
	pattern2.exec(found[i]);
	WScript.Echo(found[i]+" ===> URL="+RegExp.$1+", TEXT="+RegExp.$2);
}