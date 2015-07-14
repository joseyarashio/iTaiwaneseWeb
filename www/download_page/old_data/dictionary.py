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
from LGO import *
now=time.strftime('%Y%m%d',time.localtime(time.time()))
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
												temp=tail.split('//')
												tail=temp.pop()
											elif flag== 1:
												befor[2]=timer
												return tail,r4.attrib['time'],befor
											else:
												befor[0]=r4.attrib['time']
												befor[1]=r4.tail.lstrip('\n').rstrip('\n')
										elif flag== 1:
											tail=tail+r4.tail.lstrip('\n').rstrip('\n')


if sys.argv[1] == 'trsDic':
	file_url=sys.argv[2].lstrip('~').rstrip('~')
	網頁讀取("http://140.109.18.117"+file_url,"trsDic")
	f=open(r'trsDic',"r",encoding='UTF-8')
	lines=f.readlines()
	f.close()
	f=open(r'dictionary.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	furl=re.sub('\/','\\\\',file_url)
	furl=re.sub('%20',' ',furl)
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
elif sys.argv[1] == 'searchDic':
	file_url=sys.argv[2].lstrip('~').rstrip('~')
	timer = sys.argv[3]
	網頁讀取("http://140.109.18.117"+file_url,"searchDic")
	timer = sys.argv[3]
	(tail,nextTime,befor)=讀取trs("searchDic",timer)
	#tail=re.sub("-"," ",tail)
	temp=tail.split(' ')
	f=open(r'dictionary.json',"r",encoding='UTF-8')
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
	f.close()
	f = open(r'dictionary.json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()

elif sys.argv[1] == 'insertDic':
	file_url=sys.argv[2].lstrip('~').rstrip('~')
	timer = sys.argv[3]
	user = sys.argv[5]
	insert = re.split("\+",sys.argv[4])
	f=open(r'dictionary.json',"r",encoding='UTF-8')
	dics=json.loads(f.read(),encoding="utf-8")
	f.close()
	f=open(r'collision.json',"r",encoding='UTF-8')
	collision=json.loads(f.read(),encoding="utf-8")
	f.close()
	f=open(r'dictionary.log',"r",encoding='UTF-8')
	log=json.loads(f.read(),encoding="utf-8")
	f.close()
	網頁讀取("http://140.109.18.117"+file_url,"insertDic")
	(tail,nextTime,befor)=讀取trs("insertDic",timer)
	#tail=re.sub("-"," ",tail)
	tail=tail.lstrip(' ').rstrip(' ')
	dic=tail.split(' ')
	print(len(dic),dic)
	for t in range(len(dic)):
		other=[]
		flag=1
		for d0 in dics:
			if d0['syllable'] == dic[t]:
				flag=0
				for d1 in d0['meaning']:
					if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+timer+"+"+str(t)):
						dic[t]=dic[t]+"="+d1
						print(len(dic[t]))
						print(dic[t]+"*"+str(flag)+"*<br>")
					else:
						other.append(d1)
		
		if flag == 1:
			dics.append({"syllable":dic[t],"meaning":{dic[t].upper():{"Text_addr": {},"Audio_addr": {}}}})
			other.append(dic[t].upper())
			print("||"+dic[t])
		for o in other:
			if re.search("=",dic[t]):
				dic[t]=dic[t]+","+o		
			else:
				dic[t]=dic[t]+"=null,"+o
	insert_list=""
	print(len(dic),dic)
	for i in range(len(dic)):
		#print("1+"+dic[i]+"++"+insert[i]+"+1<br>")
		t=re.split("=",dic[i])
		temp=re.split(",",t[1])
		if insert[i] != temp[0]:
			print("!"+str(i)+" "+insert[i]+" "+temp[0])
			if temp[0] == "null":
				print("!!"+insert[i])
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
						d0['meaning'][insert[i]]["Audio_addr"][file_url+"+"+timer+"+"+str(i)]=now
						insert_list=insert_list+insert[i]+" "
						print("!!!!"+insert[i])
						flag="1"
				if flag=="0":
					print("!!!!"+file_url+"+"+timer)
					dics.append({"syllable":t[0],"meaning":{insert[i].upper():{"Text_addr": {},"Audio_addr": {file_url+"+"+timer+"+"+str(i)}}}})
					insert_list=insert_list+insert[i]+" "
				flag="0"
				for l0 in log:
					if l0.get(file_url+"+"+timer+"+"+str(i)):
						l0[file_url+"+"+timer+"+"+str(i)]=[]
						l0[file_url+"+"+timer+"+"+str(i)]=[user,now]
						flag="1"
				if flag=="0":
					log.append({file_url+"+"+timer+"+"+str(i):[user,now]})
				print("log "+str(i)+" loa")
			else:
				size=len(collision)
				collision.append({})
				collision[size]["syllable"]=t[0]
				collision[size]["flag"]=0
				collision[size]["Controversy"]={}
				collision[size]["Controversy"]["Original"]=temp[0]
				collision[size]["Controversy"]["Proposal"]=[insert[i],user,now]
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
	f = open(r'dictionary.json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'collision.json',"w",encoding='UTF-8')
	print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	f.close()
elif sys.argv[1] == 'searchtrs':
	f=open(r'collision.json',"r",encoding='UTF-8')
	collision=json.loads(f.read())
	f.close()
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
				(tail,nextTime,befor)=讀取trs("collisionDic",trs[1])
				print(trs[0],befor[0],befor[2],befor[1],"all",sep="+",end='\t',file=f)
				print(trs[0],trs[1],nextTime,tail,trs[2],sep="+",end='\t',file=f)
	f.close()
				
elif sys.argv[1] == 'checkDic':
	print(sys.argv[1])
	f=open(r'collision.json',"r",encoding='UTF-8')
	collision=json.loads(f.read())
	f.close()
	f=open(r'dictionary.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	f=open(r'dictionary.log',"r",encoding='UTF-8')
	log=json.loads(f.read(),encoding="utf-8")
	f.close()
	sys.argv[2]=sys.argv[2].lstrip('+').rstrip('+')
	anser=sys.argv[2].split("+")
	user=sys.argv[3]
	#anser=anser.reverse()
	i=0
	for cll in collision:
		if cll['flag']==0:
			print(cll["Controversy"]["Original"],cll["Controversy"]["Proposal"],anser[i])
			if cll["Controversy"]["Original"] == anser[i]:
				cll['flag']=1
				cll["Result"]["conclusion"]=anser[i]
			elif cll["Controversy"]["Proposal"][0] == anser[i]:
				cll['flag']=1
				cll["Result"]["conclusion"]=anser[i]
				cll["Result"]["checker"]=user
				cll["Result"]["time"]=now
				temp = cll["Controversy"]["addr"][0].split("+")
				addr=temp[0]+"+"+temp[1]
				syl = cll["syllable"]
				for d0 in dics:
					if d0["syllable"] == syl:
						print("***"+d0["meaning"][cll["Controversy"]["Original"]]["Audio_addr"].pop(cll["Controversy"]["addr"][0]))
						try:
							d0["meaning"][cll["Controversy"]["Proposal"]]["Audio_addr"][cll["Controversy"]["addr"][0]]=now
						except:
							print(cll["Controversy"]["Proposal"])
							d0["meaning"][cll["Controversy"]["Proposal"][0]]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Audio_addr"]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Text_addr"]={}
							d0["meaning"][cll["Controversy"]["Proposal"][0]]["Audio_addr"][cll["Controversy"]["addr"][0]]=now
				for l0 in log:
					if l0.get(cll["Controversy"]["addr"][0]):
						l0[cll["Controversy"]["addr"][0]].append(cll["Controversy"]["Proposal"][1])
						l0[cll["Controversy"]["addr"][0]].append(now)
						print("log OK")
			i+=1
	f = open(r'dictionary.json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'dictionary.log',"w",encoding='UTF-8')
	print(json.dumps(log,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'collision.json',"w",encoding='UTF-8')
	print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	f.close()
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