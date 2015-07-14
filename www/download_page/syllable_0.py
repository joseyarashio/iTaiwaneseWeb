from LGO import *
import xml.etree.ElementTree as XmlET
import os
import urllib.request
import sys
dic={}
def main(input):
	t=XmlET.parse(input)
	r0=t.getroot()
	line=[]
	for r1 in r0.getchildren(): 
				if r1.tag=='Episode':
					for r2 in r1.getchildren():
						if r2.tag=='Section':
							endTime=round(float(r2.attrib['endTime']))
							for r3 in r2.getchildren():
								if r3.tag=='Turn':
									for r4 in r3.getchildren():
										if r4.tag=='Sync':
											tail=r4.tail.lstrip('\n').rstrip('\n')
											temp=tail.split('//')
											tail=temp.pop()
											line.append(tail)
	音節統計(line)

def 網頁讀取(url):
	
	webpage = urllib.request.urlopen(url)
	webcode = webpage.read().decode("utf8")
	temp_file=open("temp",'w',encoding='UTF-8')
	print(webcode,end="\n",file=temp_file)
	temp_file.close()
	main("temp")

def 音節統計(syl_line):
	
	for line in syl_line:
		syllable = LGO.hunHLXiterative(line)
		for syl in syllable:
			if not syl == " " :
				if re.match('^[a-z]',syl):#u'^[\4e00-9fa5]+$'
					if dic.get(syl):
						dic[syl]+=1
					else:
						dic[syl]=1
	
	
def 匯出Plot網頁(url_list):
	output="syltest-0.html"
	output_file=open(output,'w',encoding='UTF-8')
	temp='''<!doctype html>
<head>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/raphael.js"></script>
<script type="text/javascript" src="js/morris.js"></script>
<style type="text/css"> 
pre {
  height: 300px;
  overflow: auto;
}
</style> 
<script type="text/javascript">
	$(function(){
		var data =['''
	print(temp,end="\n",file=output_file)
	temps=[]
	for i in dic.keys():
		temps.append(i)
	temps.sort()
	for i in temps:
		print( r'			{"syllable": "',i,r'","number":',dic[i],r'},',end="\n",file=output_file)
	temp='''];
	Morris.Bar({
		  element: 'Bar',
		  data: data, 
		  xkey: 'syllable',
		  ymax: 'auto',
		  ykeys: ['number'],
		  labels: ['syllable','number']
		});
	});
</script>
<body>
	<div id="Bar"></div>
	<pre id="code" class="prettyprint linenums">'''
	print(temp,end="\n",file=output_file)
	for ul in url_list:
		print(r'<a href="'+ul+r'">'+ul+r'</a>',end="\n",file=output_file)
	for i in temps:
		print( "\t",i,r' : ',dic[i],r'',end="\n",file=output_file)
	temp='''</pre>
</body>'''
	print(temp,end="\n",file=output_file)
	output_file.close()


#if len(sys.argv) > 1 :
#	for i in range(len(sys.argv)):
#		if i > 0:
#			print(sys.argv[i])
#			網頁讀取(sys.argv[i])
#	
try:
	url_list=sys.argv[1].split("+")
	for ul in url_list:
		網頁讀取(ul)
	匯出Plot網頁(url_list)
	print("finish")
except:
	print(ul+" is failed")
#main('20110811-zy-120407.trs')
