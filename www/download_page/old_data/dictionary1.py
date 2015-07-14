#字典輸入 
#sys.argv[1] 音節 sys.argv[2] 字意 sys.argv[3] 檔案url sys.argv[4] 時間
#查詢1 sys.argv[1]=searchDic sys.argv[2]=file name sys.argv[3]=time sys.argv[4]=new
import xml.etree.ElementTree as XmlET
import sys
import json
import os
import urllib.request
import re
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
def dic_input():
	f = open(r'dictionary.json',"r",encoding='UTF-8')
	b=json.loads(f.read())
	print(type(b[0].keys()))

#dic_input()
def 網頁讀取(url,temp):
	webpage = urllib.request.urlopen(url)
	webcode = webpage.read().decode("utf8")
	temp_file=open(temp,'w',encoding='UTF-8')
	webcode=re.sub("\n","",webcode)
	print(webcode,end="",file=temp_file)
	temp_file.close()

def 讀取trs(trs):
	flag=0
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
												return tail
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
	print(os.getcwd())
	flag="0"
	time=""
	for line in lines:
		line=line.lstrip('\n').rstrip('\n')
		if flag=="1" and line != "" and not re.search("<",line):
			flag="0"
			line=re.sub("//","/",line)
			tails=line.split("/")
			size=len(tails)-1
			temp=""
			tail=""
			n=0
			for l in range(len(tails[size])):
				if re.search(" ",tails[size][l]) or re.search(",",tails[size][l]):
					for d0 in dics:
						if d0['syllable'] == temp:
							for d1 in d0['meaning']:
								if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+time) != None and d0['meaning'][d1]["Audio_addr"][file_url+"+"+time]==n:
									temp="<ruby><rb>"+temp+"</rb><rt>"+d1+"</rt></ruby>"
					tail=tail+temp+tails[size][l]
					temp=""
					n+=1
				else:
					temp+=tails[size][l]
			for d0 in dics:
				if d0['syllable'] == temp:
					for d1 in d0['meaning']:
						if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+time)and d0['meaning'][d1]["Audio_addr"][file_url+"+"+time]==n:
							temp="<ruby><rb>"+temp+"</rb><rt>"+d1+"</rt></ruby>"
			tail=tail+temp
			tails[size]=tail
			line=""
			for t in range(len(tails)):
				if t == len(tails)-1:
					line=line+tails[t]
				else:
					line=line+tails[t]+"//"
		if re.search("Sync",line) or re.search("Event",line):
			flag="1"
			time=line.split('"')[1]
		print(line,file=f)
	f.close()												
elif sys.argv[1] == 'searchDic':
	file_url=sys.argv[2].lstrip('~').rstrip('~')
	timer = sys.argv[3]
	網頁讀取("http://140.109.18.117"+file_url,"searchDic")
	timer = sys.argv[3]
	tail=讀取trs("searchDic")
	print(tail)
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
						if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+timer) != None:
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
							#temp[t]=temp[t]+"="+d0['meaning'][""]
					#d0["meaning2"]={}
					#d0["meaning2"]["freq"]=0
					#d0["meaning2"]["Audio_addr"]={}
					#d0["meaning2"]["Text_addr"]={}
				#for d1 in d0:
					#if d1 !="syllable":
						#for d2 in d0[d1]:
						#	if d2 == "freq":
						#		d0[d1][d2]=0
		
	f = open(r'searchDic',"w",encoding='UTF-8')
	for t in temp:
		print(t,end='\t',file=f)
	f.close()
	f = open(r'dictionary.json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
elif sys.argv[1] == 'insertDic':
	a=len(sys.argv[4])
	file_url=sys.argv[2].lstrip('~').rstrip('~')
	timer = sys.argv[3]
	insert = re.split("+",sys.argv[4])
	f=open(r'dictionary.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	f=open(r'collision.json',"r",encoding='UTF-8')
	collision=json.loads(f.read())
	f.close()
	網頁讀取("http://140.109.18.117"+file_url,"insertDic")
	tail=讀取trs("insertDic")
	tail=re.sub("-"," ",tail)
	dic=tail.split(' ')
	for t in range(len(dic)):
		other=[]
		for d0 in dics:
			if d0['syllable'] == dic[t]:
				for d1 in d0['meaning']:
					if d0['meaning'][d1]["Audio_addr"].get(file_url+"+"+timer):
						dic[t]=dic[t]+"="+d1
					else:
						other.append(d1)

		for o in other:
			if re.search("=",dic[t]):
				dic[t]=dic[t]+","+o		
			else:
				dic[t]=dic[t]+"=null"+","+o
		if not re.search("null",dic[t]):
			dic[t]=dic[t]+","+"null"
	
	for i in range(len(dic)):
		t=re.split("=",dic[i])
		temp=re.split(",",t[1])
		if insert[i] != temp[0]:
			if temp[0] == "null":
				for d0 in dics:
					if d0['syllable'] == t[0]:
						try:
							temp.index(insert[i])#字典內存在
						except:
							d0['meaning'][insert[i]]={}#字典內不存在
							d0['meaning'][insert[i]]["Audio_addr"]={}
							d0['meaning'][insert[i]]["Text_addr"]={}
						d0['meaning'][insert[i]]["Audio_addr"][file_url+"+"+timer]=i
			else:
				#for d0 in dics:
				#	if d0['syllable'] == t[0]:
				#		try:
				#			temp.index(insert[i])#字典內存在
				#		except:
				#			d0['meaning'][insert[i]]={}#字典內不存在
				#		d0['meaning'][insert[i]][file_url]=timer
				#		print("2",insert[i],file_url,timer)
				size=len(collision)
				print(t[0]+"XX")
				collision.append({})
				collision[size]["syllable"]=t[0]
				collision[size]["flag"]=0
				collision[size]["Controversy"]={}
				collision[size]["Controversy"]["Original"]=temp[0]
				collision[size]["Controversy"]["Proposal"]=insert[i]
				collision[size]["Controversy"]["addr"]=[]
				collision[size]["Controversy"]["addr"].append(file_url+"+"+timer+"+"+str(i))
				collision[size]["Result"]={}
				collision[size]["Result"]["checker"]=""
				collision[size]["Result"]["time"]=""
				collision[size]["Result"]["expiry"]=""
				
				
				
	f = open(r'dictionary.json',"w",encoding='UTF-8')
	print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	f.close()
	f = open(r'collision.json',"w",encoding='UTF-8')
	print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	f.close()
#elif sys.argv[1] == 'checkDic':
	
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