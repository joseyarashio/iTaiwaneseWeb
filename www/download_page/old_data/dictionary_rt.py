#字典輸入 
#sys.argv[1] 音節 sys.argv[2] 字意 sys.argv[3] 檔案url sys.argv[4] 時間
#查詢1 sys.argv[1]=searchDic sys.argv[2]=file name sys.argv[3]=time sys.argv[4]=new
import xml.etree.ElementTree as XmlET
import sys
import json
import os
import urllib.request
import re
import time
import datetime
from LGO import *
#宣告 dict={} ,
#[
#	{
#	 "syllable":"a5",
#	 "meaning":"A5",
#	 "freq":"",
#	 "Audio_addr":{"Audio":"time","Audio":"time"},
#	 "Text_addr":{"Text":"line","Text":"line"},
#	}
#]
#
#
#dic_input()
def 網頁讀取(url,temp):
	url=re.sub(" ","%20",url)
	webpage = urllib.request.urlopen(url)
	webcode = webpage.read().decode("utf8")
	temp_file=open(temp,'w',encoding='UTF-8')
	webcode=re.sub("\n","",webcode)
	print(webcode,end="",file=temp_file)
	temp_file.close()

def 讀取trs(trs,timer):
	flag=0
	befor=["","",""]
	t=XmlET.parse(trs)
	r0=t.getroot()
	for r1 in r0.getchildren(): 
				if r1.tag=='Episode':
					for r2 in r1.getchildren():
						if r2.tag=='Section':
							for r3 in r2.getchildren():
								if r3.tag=='Turn':
									for r4 in r3.getchildren():
										if r4.tag=='Sync':
											if r4.attrib['time'] == timer:
												flag=1
												tail=r4.tail.lstrip('\n').rstrip('\n')
											elif flag== 1:
												temp=tail.split('//')
												tail=temp.pop()
												befor[2]=timer
												return tail,r4.attrib['time'],befor,r0.attrib['audio_filename']
											else:
												befor[0]=r4.attrib['time']
												befor[1]=r4.tail.lstrip('\n').rstrip('\n')
										elif flag== 1:
											tail=tail+r4.tail.lstrip('\n').rstrip('\n')

def trsDic(file_url):#trs查詢字典內容
	file_url=file_url.lstrip('~').rstrip('~')
	網頁讀取("http://140.109.18.117"+file_url,"trsDic")
	f=open(r'trsDic',"r",encoding='UTF-8')
	lines=f.readlines()
	f.close()
	f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	furl=re.sub('\/','\\\\',file_url)
	furl=re.sub('%20',' ',furl)
	#if os.path.exists(r'c:'+furl+"~"):
	#	os.remove(r'c:'+furl+"~")
	#	print("刪除存在檔")
	f=open(r'c:'+furl+"~","w",encoding='UTF-8')
	flag="0"
	time=""
	n=0
	for line in lines:
		line=line.lstrip('\n').rstrip('\n')
		if flag=="1" and line != "" and not re.search("<",line):
			flag="0"
			line=re.sub("//","/",line)
			tails=line.split("/")
			size=len(tails)-1
			temp=""
			tail=""
			for l in range(len(tails[size])):
				if re.search(" ",tails[size][l]) or re.search(",",tails[size][l]):
					for d0 in dics:
						if d0['syllable'] == temp:
							for d1 in d0['meaning']:
								if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+time+"+"+str(n)):
									temp="<ruby><rb>"+temp+"</rb><rt>"+d1+"</rt></ruby>"
									
					tail=tail+temp+tails[size][l]
					temp=""
					n+=1
				else:
					temp+=tails[size][l]
			
			for d0 in dics:
				if d0['syllable'] == temp:
					for d1 in d0['meaning']:
						if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+time+"+"+str(n)):
							temp="<ruby><rb>"+temp+"</rb><rt>"+d1+"</rt></ruby>"
							
			tail=tail+temp
			tails[size]=tail
			line=""
			for t in range(len(tails)):
				if t == len(tails)-1:
					line=line+tails[t]
				else:
					line=line+tails[t]+"//"
		if re.search("Sync",line) :
			flag="1"
			time=line.split('"')[1]
			n=0
		elif re.search("Event",line):
			flag="1"
		print(line,file=f)
	f.close()	

def searchDic(file_url,timer):#讀出準備標記內容與相關字典
	file_url=file_url.lstrip('~').rstrip('~')
	#timer = sys.argv[3]
	網頁讀取("http://140.109.18.117"+file_url,"searchDic")
	(tail,nextTime,befor,audio)=讀取trs("searchDic",timer)
	tail=re.sub(","," ",tail)
	temp=tail.split(' ')
	f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	for t in range(len(temp)):
		if not temp[t] == "":
			other=[]
			flag="0"
			for d0 in dics:
				if d0['syllable'] == temp[t]:
					for d1 in d0['meaning']:
						if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+timer+"+"+str(t)) != None:
							temp[t]=temp[t]+"="+d1
						else:
							other.append(d1)
						flag="1"
			if flag == "0":
				#size=len(dics)
				dics.append({"syllable":temp[t],"meaning":{temp[t].upper():{"Text_addr": {},"Audio_addr": {}}}})
				temp[t]=temp[t]+"=null"
			for o in other:
				if re.search("=",temp[t]):
					temp[t]=temp[t]+","+o		
				else:
					temp[t]=temp[t]+"=null"+","+o
			if not re.search("null",temp[t]):
				temp[t]=temp[t]+","+"null"
		
	f = open(r'searchDic',"w",encoding='UTF-8')
	for t in temp:
		print(t,end='\t',file=f)
	#print("",file=f)
	print(tail,end='',file=f)
	f.close()
	f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()

def insertDic(file_url,timer,Sentence,user):#將標記內容輸入字典或爭議檔
	file_url=file_url.lstrip('~').rstrip('~')
	timer = timer
	insert = re.split("\+",Sentence)
	f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	dics=json.loads(f.read(),encoding="utf-8")
	f.close()
	網頁讀取("http://140.109.18.117"+file_url,"insertDic")
	(tail,nextTime,befor,audio)=讀取trs("insertDic",timer)
	#tail=re.sub("-"," ",tail)
	tail=tail.lstrip(' ').rstrip(' ')
	dic=tail.split(' ')
	for t in range(len(dic)):
		other=[]
		flag=1
		for d0 in dics:
			if d0['syllable'] == dic[t]:
				flag=0
				for d1 in d0['meaning']:
					if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+timer+"+"+str(t)):
						dic[t]=dic[t]+"="+d1
					else:
						other.append(d1)
		
		if flag == 1:
			dics.append({"syllable":dic[t],"meaning":{dic[t].upper():{"Text_addr": {},"Audio_addr": {}}}})
			other.append(dic[t].upper())
		for o in other:
			if re.search("=",dic[t]):
				dic[t]=dic[t]+","+o		
			else:
				dic[t]=dic[t]+"=null,"+o
	insert_list=""
	print(len(dic),dic)
	for i in range(len(dic)):
		t=re.split("=",dic[i])
		temp=re.split(",",t[1])
		if insert[i] != temp[0]:
			print("!"+str(i)+" "+insert[i]+" "+temp[0])
			if temp[0] == "null":
				flag="0"
				for d0 in dics:
					if d0['syllable'] == t[0]:
						try:
							temp.index(insert[i])#字典內存在
						except:
							d0['meaning'][insert[i]]={}#字典內不存在
							d0['meaning'][insert[i]]["Audio_addr"]={}
							d0['meaning'][insert[i]]["Text_addr"]={}
							print("!!!"+insert[i])	
						d0['meaning'][insert[i]]["Audio_addr"][file_url+"+"+timer+"+"+str(i)]=time.strftime('%Y%m%d%H%M%S',time.localtime(now))
						insert_list=insert_list+insert[i]+" "
						print("!!!!"+insert[i])
						flag="1"
				if flag=="0":
					dics.append({"syllable":t[0],"meaning":{insert[i].upper():{"Text_addr": {},"Audio_addr": {file_url+"+"+timer+"+"+str(i)}}}})
					insert_list=insert_list+insert[i]+" "
				flag="0"
				for l0 in log:
					if l0.get(file_url+"+"+timer+"+"+str(i)):
						l0[file_url+"+"+timer+"+"+str(i)]=[]
						l0[file_url+"+"+timer+"+"+str(i)]=[user,time.strftime('%Y%m%d%H%M%S',time.localtime(now))]
						flag="1"
				if flag=="0":
					log.append({file_url+"+"+timer+"+"+str(i):[user,time.strftime('%Y%m%d%H%M%S',time.localtime(now))]})
			else:
				size=len(collision)
				collision.append({})
				collision[size]["syllable"]=t[0]
				collision[size]["flag"]=0
				collision[size]["Controversy"]={}
				collision[size]["Controversy"]["Original"]=temp[0]
				collision[size]["Controversy"]["Proposal"]=[insert[i],user,time.strftime('%Y%m%d%H%M%S',time.localtime(now))]
				collision[size]["Controversy"]["addr"]=[]
				collision[size]["Controversy"]["addr"].append(file_url+"+"+timer+"+"+str(i))
				collision[size]["Result"]={}
				collision[size]["Result"]["checker"]=""
				collision[size]["Result"]["time"]=""
				collision[size]["Result"]["conclusion"]=""
				
				insert_list=insert_list+"*"+" "
				
		else:
			insert_list=insert_list+"*"+" "
	insert_list=insert_list.lstrip(' ').rstrip(' ')
	print("@@@"+insert_list)
	insert_l=insert_list.split(" ")
	furl=re.sub('\/','\\\\',file_url)
	furl=re.sub('%20',' ',furl)
	f=open(r'c:'+furl+"~","r",encoding='UTF-8')
	lines=f.readlines()
	f.close()
	f=open(r'c:'+furl+"~","w",encoding='UTF-8')
	flag="0"
	insert_l.reverse()
	for line in lines:
		line=line.lstrip('\n').rstrip('\n')
		line=re.sub("//r","/r",line)
		line=re.sub("//","**",line)
		tails=line.split("**")
		size=len(tails)-1
		tails[size]=tails[size].lstrip(' ').rstrip(' ')
		tail=tails[size].split(" ")
		if re.search("Sync",line) and re.search(timer,line):
			flag="1"
		elif re.search("Sync",line) or re.search("\/Turn",line) and flag=="1":
			flag="0"
		elif re.search("Event",line) and flag=="1":
			flag="1"
		elif flag=="1":
			print("---<br>")
			print(tail)
			print("<br>---")
			for i in range(len(tail)):
				if not tail[i] == "":
					temp=insert_l.pop()
					if not (temp == "*" or re.search("<",tail[i])):
						tail[i]=re.sub(tail[i],"<ruby><rb>"+tail[i]+"</rb><rt>"+temp+"</rt></ruby>",tail[i])
						print(tail[i])
			line=""
			tails[size]=""
			for j in tail:
				tails[size]=tails[size]+j+" "
			tails[size]=tails[size].lstrip(' ').rstrip(' ')
			for j in tails:
				line=line+j+"//"
			line=line.lstrip('//').rstrip('//')
		line=re.sub("\*\*",r"//",line)
		print(line,file=f)
	print("<br>*OK*<br>")
		
	f.close()
	f = open(r'dictionary.log',"w",encoding='UTF-8')
	print(json.dumps(log,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'collision.json',"w",encoding='UTF-8')
	print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	f.close()

def searchtrs():#讀出需要判斷的爭議
	#f=open(r'collision.json',"r",encoding='UTF-8')
	#collision=json.loads(f.read())
	#f.close()
	f=open(r'collision',"w",encoding='UTF-8')
	for cll in collision:
		if cll['flag']==0:
			for c in cll["Controversy"]["addr"]:
				trs = c.split("+")
				網頁讀取("http://140.109.18.117"+trs[0],"collisionDic")
				t=XmlET.parse(trs[0])
				r0=t.getroot()
				temp=trs[0].split("/")
				trs[0]=re.sub(temp[-1],r0.attrib["audio_filename"],trs[0])
				(tail,nextTime,befor,audio)=讀取trs("collisionDic",trs[1])
				print(trs[0],befor[0],befor[2],befor[1],"all",sep="+",end='\t',file=f)
				print(trs[0],trs[1],nextTime,tail,trs[2],sep="+",end='\t',file=f)
	f.close()
				
def checkDic(Sentence,user):#寫入判斷結果
	Sentence=Sentence.lstrip('+').rstrip('+')
	anser=Sentence.split("+")
	print("++"+Sentence)
	i=0
	file_url=""
	for cll in collision:
		if cll['flag']==0:
			#print(cll["Controversy"]["Original"],cll["Controversy"]["Proposal"],anser[i])
			if cll["Controversy"]["Original"] == anser[i]:
				cll['flag']=1
				cll["Result"]["conclusion"]=anser[i]
			elif cll["Controversy"]["Proposal"][0] == anser[i]:
				cll['flag']=1
				cll["Result"]["conclusion"]=anser[i]
				cll["Result"]["checker"]=user
				cll["Result"]["time"]=time.strftime('%Y%m%d%H%M%S',time.localtime(time.strftime('%Y%m%d%H%M%S',time.localtime(now))))
				temp = cll["Controversy"]["addr"][0].split("+")
				if file_url != temp[0]:
					if file_url != "":
						f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
						print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
						f.close()
					file_url=temp[0]
					f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
					dics=json.loads(f.read())
					f.close()
					
				addr=temp[0]+"+"+temp[1]
				syl = cll["syllable"]
				for d0 in dics:
					if d0["syllable"] == syl:
						print(d0["meaning"][cll["Controversy"]["Original"]]["Audio_addr"].pop(cll["Controversy"]["addr"][0]))
						try:
							d0["meaning"][cll["Controversy"]["Proposal"]]["Audio_addr"][cll["Controversy"]["addr"][0]]=time.strftime('%Y%m%d%H%M%S',time.localtime(now))
						except:
							print(cll["Controversy"]["Proposal"])
							d0["meaning"][cll["Controversy"]["Proposal"][0]]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Audio_addr"]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Text_addr"]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Audio_addr"][cll["Controversy"]["addr"][0]]=time.strftime('%Y%m%d%H%M%S',time.localtime(now))
				for l0 in log:
					if l0.get(cll["Controversy"]["addr"][0]):
						l0[cll["Controversy"]["addr"][0]].append(cll["Controversy"]["Proposal"][1])
						l0[cll["Controversy"]["addr"][0]].append(time.strftime('%Y%m%d%H%M%S',time.localtime(now)))
						print("log OK")
			i+=1
	f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'dictionary.log',"w",encoding='UTF-8')
	print(json.dumps(log,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'collision.json',"w",encoding='UTF-8')
	print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	f.close()

def search(item,tail):#item: meaning or syllable 搜尋
	syllables=[]
	tails=[]
	result=[]
	print(item,tail)
	f=open(r'dictionary.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	if item == "syllable":
		result.append("搜尋音節："+tail+"<br>")
	elif item == "meaning":
		result.append("搜尋字意："+tail+"<br>")
	for d0 in dics:
		if item=="all":
			try: 
				syllables.index(d0["syllable"])
			except:
				syllables.append(d0["syllable"])
			for d1 in d0['meaning'].keys():
				for d2 in d0['meaning'][d1]:
					if d0['meaning'][d1][d2] != {} or tail == "all":
						try:
							tails.index(d1)
						except:
							tails.append(d1)
		elif item == "syllable" and d0[item] == tail:
			for d1 in d0['meaning']:
				for d2 in d0['meaning'][d1]:
					for d3 in d0['meaning'][d1][d2]:
						temp=d3.split("+")
						網頁讀取("http://140.109.18.117"+temp[0],"search_temp")
						t=temp[0].split("/")
						t.pop()
						(tl,nextTime,befor,audio)=讀取trs("search_temp",temp[1])
						t1=""
						for i in t:
							t1=t1+i+'/'
						audio=t1+audio
						result.append(d1+"\t"+audio+"\t"+temp[1]+"\t"+nextTime)
		elif item == "meaning":
			for d1 in d0['meaning']:
				if d1 == tail:
					print(d1,d0["syllable"])
					for d2 in d0['meaning'][tail]:
						for d3 in d0['meaning'][tail][d2]:
							print(d0["syllable"],d3)
							temp=d3.split("+")
							網頁讀取("http://140.109.18.117"+temp[0],"search_temp")
							t=temp[0].split("/")
							t.pop()
							(tl,nextTime,befor,audio)=讀取trs("search_temp",temp[1])
							t1=""
							for i in t:
								t1=t1+i+'/'
							audio=t1+audio
							result.append(d0["syllable"]+"\t"+audio+"\t"+temp[1]+"\t"+nextTime)
	if item=="all":
		search=open("search",'w',encoding='UTF-8')
		for i in syllables:
			print(i,end="\t",file=search)
		print("",file=search)
		for i in tails:
			print(i,end="\t",file=search)
		search.close()
	else:
		search=open("result",'w',encoding='UTF-8')
		for i in result:
			print(i,end="\n",file=search)
		
	
#--讀入字典--
#f=open(r'dictionary.json',"r",encoding='UTF-8')
#dics=json.loads(f.read())
#f.close()
f=open(r'collision.json',"r",encoding='UTF-8')
collision=json.loads(f.read(),encoding="utf-8")
f.close()
f=open(r'dictionary.log',"r",encoding='UTF-8')
log=json.loads(f.read(),encoding="utf-8")
f.close()
#--
file_name="cmd"
loop=1

while(loop):
	now=int(time.time())
	retime= int(os.path.getmtime(file_name))
	while int(time.time())==now:
		if not int(os.path.getmtime(file_name))== retime:
			print("偵測指令",end="")
			retime= int(os.path.getmtime(file_name))
			f=open(file_name,"r",encoding='UTF-8')
			cmd=f.readline().lstrip('\n').rstrip('\n')
			f.close()
			cmdline=cmd.split("\t")
			#print(len(cmdline))
			if len(cmdline)>1:
				cmdline[1]=cmdline[1].lstrip('~').rstrip('~')
				if not os.path.exists(r'c:'+cmdline[1].rstrip('trs')+r'json'):
					f=open(r'c:'+cmdline[1].rstrip('trs')+r'json',"w",encoding='UTF-8')
					print("[]",file=f)
					f.close()
			if cmdline[0]=="trsDic":
				st=time.time()
				trsDic(cmdline[1])
				print("trs加註意思",cmdline[1],time.time()-st)
			elif cmdline[0]=="searchDic":
				st=time.time()
				searchDic(cmdline[1],cmdline[2])
				print("準備標記字典",cmdline[1],time.time()-st)
			elif cmdline[0]=="insertDic":
				st=time.time()
				insertDic(cmdline[1],cmdline[2],cmdline[3],cmdline[4])
				print("意思標記",cmdline[1],time.time()-st)
			elif cmdline[0]=="searchtrs":
				st=time.time()
				searchtrs()
				print("字典列表",time.time()-st)
			elif cmdline[0]=="checkDic":
				st=time.time()
				checkDic(cmdline[1],cmdline[2])
				print("校正",time.time()-st)
			elif cmdline[0]=="search":
				st=time.time()
				search(cmdline[1],cmdline[2])
				print("字典搜尋",time.time()-st)
			elif cmdline[0]=="exit":
				loop=0
				print("結束")
			print("\t"+datetime.datetime.fromtimestamp(retime).strftime('%Y-%m-%d %H:%M:%S'))
	now=int(time.time())





#f=open(r'dictionary.json',"r",encoding='UTF-8')
#dics=json.loads(f.read())
#f.close()
#for d0 in dics:
#	d0['meaning'].pop(d0['syllable'])
#	d0['meaning'][d0['syllable'].upper()]={}
#	d0['meaning'][d0['syllable'].upper()]["Audio_addr"]={}
#	d0['meaning'][d0['syllable'].upper()]["Text_addr"]={}
#f = open(r'dictionary1.json',"w",encoding='UTF-8')
#print(json.dumps(dics,indent=1),file=f)
#f.close()