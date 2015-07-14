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
import sqlite3 as sql
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
def 斷詞檢查(file_url,time):
	ct=cut.execute("select * from Audio where file='"+file_url+"' and time='"+time+"'").fetchall()
	if len(ct) == 0:
		return 0
	else:
		data_t=0
		tail=""
		for t in ct:
			if int(t[4])>data_t:
				data_t=int(t[4])
				tail=t[0]
		return tail
def trsDic(file_url):#trs查詢字典內容
	file_url=file_url.lstrip('~').rstrip('~')
	網頁讀取("http://140.109.18.117"+file_url,"trsDic")
	f=open(r'trsDic',"r",encoding='UTF-8')
	lines=f.readlines()
	f.close()
	#f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	#dics=json.loads(f.read())
	#f.close()
	furl=re.sub('\/','\\\\',file_url)
	furl=re.sub('%20',' ',furl)
	#if os.path.exists(r'c:'+furl+"~"):
	#	os.remove(r'c:'+furl+"~")
	#	print("刪除存在檔")
	f=open(r'c:'+furl+"~","w",encoding='UTF-8')
	flag="0"
	time=""
	n=0
	#tc=tcdb.execute("select * from Audio where file='"+file_url+"'")
	for line in lines:
		line=line.lstrip('\n').rstrip('\n')
		if flag=="1" and line != "" and not re.search("<",line):
			flag="0"
			tails=[]
			line=re.sub("//","/",line)
			tails=line.split("/")
			tail=斷詞檢查(file_url,time)
			if tail != 0:
				tails.pop()
				tails.append(tail)
				
			size=len(tails)-1
			temp=""
			tail=""
			for l in range(len(tails[size])):
				if re.search(" ",tails[size][l]) or re.search(",",tails[size][l]):
					tc=tcdb.execute("select * from Audio where file='"+file_url+"' and syllable='"+temp+"' and time='"+time+"' and queue='"+str(n)+"'").fetchall()
					if not len(tc) == 0:
						temp="<ruby><rb>"+temp+"</rb><rt>"+tc[0][1]+"</rt></ruby>"
					tail=tail+temp+tails[size][l]
					temp=""
					n+=1
				else:
					temp+=tails[size][l]
			
			tc=tcdb.execute("select * from Audio where file='"+file_url+"' and syllable='"+temp+"' and time='"+time+"' and queue='"+str(n)+"'").fetchall()
			if not len(tc) == 0:
				temp="<ruby><rb>"+temp+"</rb><rt>"+tc[0][1]+"</rt></ruby>"
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
def cutsentence(file_url,timer,sentence,cuter):
	file_url=file_url.lstrip('~').rstrip('~')
	tail=斷詞檢查(file_url,timer)
	if tail==0:
		網頁讀取("http://140.109.18.117"+file_url,"cutsentence")
		(tail,nextTime,befor,audio)=讀取trs("cutsentence",timer)
		tail=re.sub(","," ",tail)
	if tail != sentence:
		cut.execute('insert into Audio values("'+sentence+'","'+file_url+'","'+timer+'","'+cuter+'","'+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+'")')
		searchDic(file_url,timer)
	
def searchDic(file_url,timer):#讀出準備標記內容與相關字典
	file_url=file_url.lstrip('~').rstrip('~')
	#timer = sys.argv[3]
	tail=斷詞檢查(file_url,timer)
	if tail == 0:
		網頁讀取("http://140.109.18.117"+file_url,"searchDic")
		(tail,nextTime,befor,audio)=讀取trs("searchDic",timer)
		tail=re.sub(","," ",tail)
	temp=tail.split(' ')
	#f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	#dics=json.loads(f.read())
	#f.close()
	for t in range(len(temp)):
		if not temp[t] == "":
			other=[]
			mean=""
			tc=tcdb.execute("select * from Audio where syllable='"+temp[t]+"'").fetchall()
			if not len(tc) == 0:
				for t0 in tc:
					other.append(t0[1])
			else:
				tcdb.execute('insert into Audio values("'+temp[t]+'","'+temp[t].upper()+'","n","n","n","n")')
				other.append(temp[t].upper())
			
			tc=tcdb.execute("select * from Audio where file='"+file_url+"' and syllable='"+temp[t]+"' and time='"+timer+"' and queue='"+str(t)+"'").fetchall()
			if not len(tc) == 0:
				temp[t]=temp[t]+"="+tc[0][1]
				mean=tc[0][1]
			
			for o in other:
				if re.search("=",temp[t]):
					if not mean == o:
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
	#f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
	#print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	#f.close()

def insertDic(file_url,timer,Sentence,user):#將標記內容輸入字典或爭議檔
	file_url=file_url.lstrip('~').rstrip('~')
	timer = timer
	insert = re.split("\+",Sentence)
	#f=open(r'c:'+file_url.rstrip('trs')+r'json',"r",encoding='UTF-8')
	#dics=json.loads(f.read(),encoding="utf-8")
	#f.close()
	網頁讀取("http://140.109.18.117"+file_url,"insertDic")
	(tail,nextTime,befor,audio)=讀取trs("insertDic",timer)
	#tail=re.sub("-"," ",tail)
	tail=tail.lstrip(' ').rstrip(' ')
	dic=tail.split(' ')
	for t in range(len(dic)):
		other=[]
		flag=1
		
		tc=tcdb.execute("select * from Audio where file='"+file_url+"' and syllable='"+dic[t]+"' and time='"+timer+"' and queue='"+str(t)+"'").fetchall()
		if not len(tc) == 0:
			dic[t]=dic[t]+"="+tc[0][1]
		
		tc=tcdb.execute("select * from Audio where syllable='"+dic[t]+"'").fetchall()
		if not len(tc) == 0:
			for t0 in tc:
				other.append(t0[1])
		else:
			tcdb.execute('insert into Audio values("'+dic[t]+'","'+dic[t].upper()+'","n","n","n","n")')
			other.append(dic[t].upper())
		
		for o in other:
			if re.search("=",dic[t]):
				dic[t]=dic[t]+","+o		
			else:
				dic[t]=dic[t]+"=null,"+o
	insert_list=""
	#print(len(dic),dic)
	for i in range(len(dic)):
		t=re.split("=",dic[i])
		temp=re.split(",",t[1])
		if insert[i] != temp[0]:
			print("!"+str(i)+" "+insert[i]+" "+temp[0])
			if temp[0] == "null":#未曾寫入過字典
				tcdb.execute('insert into Audio values("'+t[0]+'","'+insert[i]+'","'+file_url+'","'+timer+'","'+str(i)+'","'+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+'")')
				log.execute('insert into Audio values("'+t[0]+'","'+file_url+'","'+timer+'","'+str(i)+'","'+user+'","","'+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+'")')
			else:
				lg=log.execute("select * from Audio where file='"+file_url+"' and time='"+timer+"' and queue='"+str(i)+"'").fetchall()
				#[('zai1', '0', '/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs', '234.246', '3', '知','' ,'知道','', '', '', '')]
				#item:syllable 0,flag 1,file 2,time 3,queue 4,Original 5,owner1 6,Proposal 6-7,owner2 8,checker 7-9,conclusion 8-10,data 9-11
				collision.execute('insert into Audio values("'+t[0]+'","0","'+file_url+'","'+timer+'","'+str(i)+'","'+temp[0]+'","'+lg[0][4]+'","'+insert[i]+'","'+user+'","","","")')
				
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
	#print(insert_l)
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
					try:
						temp=insert_l.pop()
						if not (temp == "*" or re.search("<",tail[i])):
							tail[i]=re.sub(tail[i],"<ruby><rb>"+tail[i]+"</rb><rt>"+temp+"</rt></ruby>",tail[i])
							print(tail[i])
					except:
						pass
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
	#f = open(r'dictionary.log',"w",encoding='UTF-8')
	#print(json.dumps(log,indent=1,ensure_ascii=False),file=f)
	#f.close()
	#f = open(r'c:'+file_url.rstrip('trs')+r'json',"w",encoding='UTF-8')
	#print(json.dumps(dics,indent=1,ensure_ascii=False),file=f)
	#f.close()
	#f = open(r'collision.json',"w",encoding='UTF-8')
	#print(json.dumps(collision,indent=1,ensure_ascii=False),file=f)
	#f.close()

def searchtrs():#讀出需要判斷的爭議
	#f=open(r'collision.json',"r",encoding='UTF-8')
	#collision=json.loads(f.read())
	#f.close()
	f=open(r'collision',"w",encoding='UTF-8')
	cll=collision.execute("select * from Audio where flag='0'").fetchall()
	#[('zai1', '0', '/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs', '234.246', '3', '知','' ,'知道','', '', '', '')]
	#item:syllable 0,flag 1,file 2,time 3,queue 4,Original 5,owner1 6,Proposal 6-7,owner2 8,checker 7-9,conclusion 8-10,data 9-11
	for c in cll:
		網頁讀取("http://140.109.18.117"+c[2],"collisionDic")
		t=XmlET.parse(c[2])
		r0=t.getroot()
		temp=c[2].split("/")
		#wav=re.sub(temp[-1],r0.attrib["audio_filename"],c[2])
		wav=c[2].replace(temp[-1],r0.attrib["audio_filename"])
		(tail,nextTime,befor,audio)=讀取trs("collisionDic",c[3])
		print(wav,befor[0],befor[2],befor[1],"all",sep="+",end='\t',file=f)
		print(wav,c[3],nextTime,tail,c[4],c[5],c[7],sep="+",end='\t',file=f)
	f.close()
				
def checkDic(Sentence,user):#寫入判斷結果
	Sentence=Sentence.lstrip('+').rstrip('+')
	anser=Sentence.split("+")
	print("++"+Sentence)
	i=0
	file_url=""
	cll=collision.execute("select * from Audio where flag='0'").fetchall()
	#[('zai1', '0', '/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs', '234.246', '3', '知','' ,'知道','', '', '', '')]
	#item:syllable 0,flag 1,file 2,time 3,queue 4,Original 5,owner1 6,Proposal 6-7,owner2 8,checker 7-9,conclusion 8-10,data 9-11
	for c in cll:
		if c[5] == anser[i]:
			collision.execute("update Audio set flag='1' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set checker='"+user+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set conclusion='"+anser[i]+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set data='"+time.strftime('%Y%m%d%H%M%S',time.localtime(time.strftime('%Y%m%d%H%M%S',time.localtime(now))))+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+str(c[4])+"'")
		elif c[7] == anser[i]:
			collision.execute("update Audio set flag='1' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set checker='"+user+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set conclusion='"+anser[i]+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			collision.execute("update Audio set data='"+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+str(c[4])+"'")
			
			if not 測試存在SQLite(c[0],c[5],'n','n','n',tcdb):
				tcdb.execute('insert into Audio values("'+c[0]+'","'+c[5]+'","n","n","n","n")')
			tcdb.execute("update Audio set meaning='"+anser[i]+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			tcdb.execute("update Audio set data='"+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+"' where file='"+c[2]+"' and time='"+c[3]+"' and queue='"+c[4]+"'")
			log.execute('insert into Audio values("'+c[0]+'","'+c[2]+'","'+c[3]+'","'+c[4]+'","'+c[8]+'","'+user+'","'+time.strftime('%Y%m%d%H%M%S',time.localtime(now))+'")')
			

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
		
def 測試存在SQLite(syl,mean,file,time,queue,db):
	t=db.execute('select count(*) from Audio where syllable=="'+syl+'" and meaning=="'+mean+'" and file=="'+file+'" and time=="'+time+'" and queue=="'+queue+'"').fetchone()
	if t[0] == 0:
		return 0
	else:
		return 1

#--讀入字典--
#f=open(r'dictionary.json',"r",encoding='UTF-8')
#dics=json.loads(f.read())
#f.close()
tcdb=sql.connect("TCoupus.db")
#table: Audio ; item: syllable,meaning,file,time,queue,data
try:
	tcdb.execute('create table Audio(syllable text not null,meaning text not null,file text not null,time text not null,queue text not null,data text not null)')
except:
	pass
collision=sql.connect("collision.db")
#table: Audio ; item:syllable,flag,file,time,queue,mean1,owner1,mean2,owner2,checker,conclusion,data
try:
	collision.execute('create table Audio(syllable text not null,flag text not null,file text not null,time text not null,queue text not null,mean1 text not null,owner1 text not null,mean2 text not null,owner2 text not null,checker text not null,conclusion text not null,data text not null)')
except:
	pass
#f=open(r'collision.json',"r",encoding='UTF-8')
#collision=json.loads(f.read(),encoding="utf-8")
#f.close()
log=sql.connect("log.db")
#table: Audio ; item:syllable,file,time,queue,author,checker,data

try:
	log.execute('create table Audio(syllable text not null,file text not null,time text not null,queue text not null,author text not null,checker text not null,data text not null)')
except:
	pass
#f=open(r'dictionary.log',"r",encoding='UTF-8')
#log=json.loads(f.read(),encoding="utf-8")
#f.close()
cut=sql.connect("cut.db")
#table: Audio ; item:sentence,file,time,data
try:
	cut.execute('create table Audio(sentence text not null,file text not null,time text not null,cuter text not null,data text not null)')
except:
	pass
#--
lf=open(r'dictionary_rt_sqlite.log',"a",encoding='UTF-8')
print("檔案準備OK")
print("開始執行",datetime.datetime.fromtimestamp(time.time()).strftime('%Y-%m-%d %H:%M:%S'),sep='\t',file=lf)
lf.close()
file_name="cmd"
loop=1
while(loop):
	loop+=1;
	now=int(time.time())
	retime= int(os.path.getmtime(file_name))
	while int(time.time())==now:
		if not int(os.path.getmtime(file_name))== retime:
			print("偵測指令",end="\n")
			lf=open(r'dictionary_rt_sqlite.log',"a",encoding='UTF-8')
			retime= int(os.path.getmtime(file_name))
			f=open(file_name,"r",encoding='UTF-8')
			cmd=f.readline().lstrip('\n').rstrip('\n')
			f.close()
			cmdline=cmd.split("\t")
			if cmdline[0]=="trsDic":
				st=time.time()
				trsDic(cmdline[1])
				print("trs加註意思",cmdline[1],time.time()-st,sep='\n')
				print("trs加註意思",cmdline[1],time.time()-st,sep='\t',file=lf)
			elif cmdline[0]=="cut":
				st=time.time()
				cutsentence(cmdline[1],cmdline[2],cmdline[3],cmdline[4])
				print("cut斷句",cmdline[1],time.time()-st,sep='\n')
				print("cut斷句",cmdline[1],time.time()-st,sep='\t',file=lf)
				cut.commit()
				trsDic(cmdline[1])
				print("trs加註意思",cmdline[1],time.time()-st,sep='\n')
				print("trs加註意思",cmdline[1],time.time()-st,sep='\t',file=lf)
			elif cmdline[0]=="searchDic":
				st=time.time()
				searchDic(cmdline[1],cmdline[2])
				print("準備標記字典",cmdline[1],time.time()-st,sep='\n')
				print("準備標記字典",cmdline[1],time.time()-st,sep='\t',file=lf)
				tcdb.commit()
			elif cmdline[0]=="insertDic":
				st=time.time()
				insertDic(cmdline[1],cmdline[2],cmdline[3],cmdline[4])
				print("標記意思",cmdline[1],time.time()-st,sep='\n')
				print("標記意思",cmdline[1],time.time()-st,sep='\t',file=lf)
				tcdb.commit()
				trsDic(cmdline[1])
				print("trs加註意思",cmdline[1],time.time()-st,sep='\n')
				print("trs加註意思",cmdline[1],time.time()-st,sep='\t',file=lf)
				collision.commit()
				log.commit()
			elif cmdline[0]=="searchtrs":
				st=time.time()
				searchtrs()
				print("爭議列表",time.time()-st,sep='\n')
				print("爭議列表",time.time()-st,sep='\t',file=lf)
			elif cmdline[0]=="checkDic":
				st=time.time()
				checkDic(cmdline[1],cmdline[2])
				print("爭議選擇",time.time()-st,sep='\n')
				print("爭議選擇",time.time()-st,sep='\t',file=lf)
				tcdb.commit()
				collision.commit()
				log.commit()
			elif cmdline[0]=="search":
				st=time.time()
				search(cmdline[1],cmdline[2])
				print("字典搜尋",time.time()-st,sep='\n')
				print("字典搜尋",time.time()-st,sep='\t',file=lf)
			elif cmdline[0]=="exit":
				loop=0
				print("結束")
				print("結束",file=lf)
			print("\t"+datetime.datetime.fromtimestamp(retime).strftime('%Y-%m-%d %H:%M:%S'))
			print(datetime.datetime.fromtimestamp(retime).strftime('%Y-%m-%d %H:%M:%S'),file=lf)
			lf.close()
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