import os
import re
import json
import sqlite3 as sql
from LGO import *

f=open("original.json","r",encoding='UTF-8')
d=json.loads(f.read())
f.close()
def main():
	#結合json()
	#wav轉mp3()
	#分開json()
	統計trs()
	#測試SQLite()
	#檢查trs()
def 檢查trs():
	#規則1音節檢查檢查,使用全音節表比較
	dics={}
	output=open("check.log","w",encoding='UTF-8')
	files=遞回取得目錄("C:\\AppServ\\www\\GitRepos\\finish",".trs")
	temp1=syl2phn.split("\n")
	file_name=""
	sync=""
	for t in temp1:
		temp2=t.split("\t")
		dics[temp2[0]]=temp2[1]
	for file in files:
		f=open(file,"r",encoding='UTF-8')
		try:
			lines=f.readlines()
		except:
			print(file)
		f.close()
		for line in lines:
			if not re.search("<",line):
				line=line.lstrip('\n').rstrip('\n')
				temp0=re.sub("-","",line)
				temp0=re.sub(" ","",temp0)
				temp0=re.sub(",","",temp0)
				temp=LGO.hunHL(temp0)
				check=0
				for t in temp:
					if re.search("w",t):
						t=re.sub("\d","",t)
						try:
							dics[t]
						except:
							if not file_name==file:
								print("\n",file,sep="",end='',file=output)
								file_name=file
							if not sync=="":
								print("\n",sync,end="=",file=output)
								sync=""
							if check==0:
								print("\n",line,end=" ",file=output)
								check=1
							print(t,end=" ",file=output)				
			elif re.search("Sync",line):
				temp1=line.split('"')
				#print(temp1[1])
				sync=temp1[1]
	output.close()
def 結合json():
	list={}
	print(os.getcwd())
	#list=open(r"filelist.txt",'w',encoding='UTF-8')
	files=遞回取得目錄("C:\\AppServ\\www\\GitRepos\\finish",".json")
	for f in files:	#print(f,sep='',end='\n',file=list)
		f=open(f,"r",encoding='UTF-8')
		temp=json.loads(f.read())
		f.close()
		for t in temp:
			if not list.get(t["syllable"]):
				list[t["syllable"]]={}
			for t1 in t["meaning"]:
				if list[t["syllable"]].get(t1) == None:
					list[t["syllable"]][t1]={}
				for t2 in t["meaning"][t1]["Audio_addr"]:
					list[t["syllable"]][t1][t2]=t["meaning"][t1]["Audio_addr"][t2]
	#print(list)
	for t0 in list:
		d.append({"syllable":t0,"meaning":{}})
		for t1 in list[t0]:
			d[-1]["meaning"][t1]={}
			d[-1]["meaning"][t1]["Text_addr"]={}
			d[-1]["meaning"][t1]["Audio_addr"]={}
			for t2 in list[t0][t1]:
				#print(t2)
				d[-1]["meaning"][t1]["Audio_addr"][t2]=list[t0][t1][t2]
	f=open(r'dic.json',"w",encoding='UTF-8')
	print(json.dumps(d,indent=1,ensure_ascii=False),file=f)
	f.close()

def 分開json():
	f=open(r'dic.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	list=""
	for d0 in dics:
		mean=[]
		for d1 in d0["meaning"]:
			mean.append(d1)
		for d1 in d0["meaning"]:
			for d2 in d0["meaning"][d1]["Audio_addr"]:
				temp=d2.split("+")
				if not list == temp[0]:
					t="C:\\AppServ\\www"+re.sub("\/","\\\\",temp[0].rstrip('trs'))+r'json'
					if not list == "":
						f=open("C:\\AppServ\\www"+re.sub("\/","\\\\",list.rstrip('trs'))+r'json',"w",encoding='UTF-8')
						print(json.dumps(dic,indent=1,ensure_ascii=False),file=f)
						f.close()
					if not os.path.exists(t):
						f=open(t,"w",encoding='UTF-8')
						print(json.dumps(d,indent=1,ensure_ascii=False),file=f)
						f.close()
					f=open(t,"r",encoding='UTF-8')
					dic=json.loads(f.read())
					f.close()
					list=temp[0]
				if len(dic) == 0:
					dic.append({"syllable":d0["syllable"],"meaning":{}})
					for d3 in mean:
						dic[-1]["meaning"][d3]={}
						dic[-1]["meaning"][d3]["Text_addr"]={}
						dic[-1]["meaning"][d3]["Audio_addr"]={}
				elif not dic[-1]["syllable"] == d0["syllable"]:
					dic.append({"syllable":d0["syllable"],"meaning":{}})
					for d3 in mean:
						dic[-1]["meaning"][d3]={}
						dic[-1]["meaning"][d3]["Text_addr"]={}
						dic[-1]["meaning"][d3]["Audio_addr"]={}
				dic[-1]["meaning"][d1]["Audio_addr"][temp[0]+"+"+temp[1]+"+"+temp[2]]=d0["meaning"][d1]["Audio_addr"][d2]
	f=open("C:\\AppServ\\www"+re.sub("\/","\\\\",list.rstrip('trs'))+r'json',"w",encoding='UTF-8')
	print(json.dumps(dic,indent=1,ensure_ascii=False),file=f)
	f.close()
def wav轉mp3():
	files=遞回取得目錄("C:\\AppServ\\www\\GitRepos\\finish",".wav")
	for f in files:
		if not os.path.exists(re.sub(".wav",".mp3",f)):
			print(f,re.sub(".wav",".mp3",f))
			os.system('ffmpeg -y -i '+f+' '+re.sub(".wav",".mp3",f))
	
def 遞回取得目錄(root,end):
	print(root)
	files=[]
	for dirPath, dirNames, fileNames in os.walk(root):
		for f in fileNames:
			if f.endswith(end):
				name=os.path.join(dirPath, f)
				files.append(name)
	return (files)
	
def 統計trs():
	f=open("ForLex(Gtcp_forpa_v1).txt","r",encoding='UTF-8')
	dics=f.readlines()
	f.close()
	dic={}
	for d in dics:
		d=d.lstrip('\n').rstrip('\n')
		temp=d.split(",")
		i=1
		temp[2]=re.sub("_","-",temp[2])
		temp[2]=re.sub("er","or",temp[2])
		temp[2]=re.sub("bh","v",temp[2])
		temp[2]=re.sub("gh","q",temp[2])
		temp1=temp[2].split("-")
		t=temp1.pop()
		temp[2]=""
		for t1 in temp1:
			t1=re.sub("1","2",t1)
			t1=re.sub("2","3",t1)
			t1=re.sub("3","4",t1)
			t1=re.sub("5","2",t1)
			if re.search("6",t1):
				t1=re.sub("6","7",t1)
			else:
				t1=re.sub("7","6",t1)
			temp[2]=temp[2]+t1+"-"
		temp[2]=temp[2]+t
		while dic.get(temp[2]):
			temp[2]=temp[2]+"-"+str(i)
			i+=1
		dic[temp[2]]=temp[1]
		print(temp[2],temp[1])
	files=遞回取得目錄("C:\\AppServ\\www\\GitRepos\\finish",".trs")
	list={}
	for file in files:
		f=open(file,"r",encoding='UTF-8')
		lines=f.readlines()
		f.close()
		for line in lines:
			if not re.search("<",line) and not re.match("\n",line):
				line=line.lstrip('\n').rstrip('\n')
				
				temp=line.split("//")
				
				syllable=re.sub(","," ",temp.pop())
				temp=syllable.split(" ")
				for t in temp:
					if list.get(t):
						list[t]+=1
					else:
						list[t]=1
	f=open("trs_syl_list.log","w",encoding='UTF-8')			
	for d in list.keys():
		#if list[d]>50:
		if dic.get(d):
			print(d,end="\t\t",file=f)
			t=list[d]
			i=1
			while dic.get(d):
				print(dic[d],end=" ",file=f)
				d=d+"-"+str(i)
				i+=1
			print("\t"+str(t),end="\n",file=f)
	f.close()
def 測試SQLite2():
	tcdb=sql.connect("TCoupus.db")#table: Audio ; item: syllable,meaning,file,time,queue,data
	try:
		tcdb.execute('create table Audio(syllable text not null,meaning text not null,file text not null,time text not null,queue text not null,data text not null)')
	except:
		pass
	f=open(r'trs_syl_list.log',"r",encoding='UTF-8')
	lists=f.readlines()
	f.close()
	for l in lists:
		l=l.lstrip('\n').rstrip('\n')
		temp=l.split('\t')
		temp2=temp[2].lstrip(' ').rstrip(' ').split(" ")
		for t in temp2:
			if not 測試存在SQLite(temp[0],t,'n','n','n',tcdb):
				tcdb.execute('insert into Audio values("'+temp[0]+'","'+t+'","n","n","n","n")')
	tcdb.commit()
	tcdb.close()

def 測試存在SQLite(syl,mean,file,time,queue,db):
	t=db.execute('select count(*) from Audio where syllable=="'+syl+'" and meaning=="'+mean+'" and file=="'+file+'" and time=="'+time+'" and queue=="'+queue+'"').fetchone()
	if t[0] == 0:
		return 0
	else:
		return 1
def 測試SQLite():
	tcdb=sql.connect("TCoupus.db")#table: Audio ; item: syllable,meaning,file,time,queue,data
	try:
		tcdb.execute('create table Audio(syllable text not null,meaning text not null,file text not null,time text not null,queue text not null,data text not null)')
	except:
		pass
	f=open(r'dic.json',"r",encoding='UTF-8')
	dics=json.loads(f.read())
	f.close()
	for d0 in dics:
		for d1 in d0["meaning"]:
			#print(d1,len(d0["meaning"][d1]["Audio_addr"]))
			
			if len(d0["meaning"][d1]["Audio_addr"]) == 0:
				if not 測試存在SQLite(d0["syllable"],d1,'n','n','n',tcdb):
					tcdb.execute('insert into Audio values("'+d0["syllable"]+'","'+d1+'","n","n","n","n")')
			else:
				for d2 in d0["meaning"][d1]["Audio_addr"]:
					temp=d2.split("+")
					if not 測試存在SQLite(d0["syllable"],d1,temp[0],temp[1],temp[2],tcdb):
						tcdb.execute('insert into Audio values("'+d0["syllable"]+'","'+d1+'","'+temp[0]+'","'+temp[1]+'","'+temp[2]+'","'+str(d0["meaning"][d1]["Audio_addr"][d2])+'")')
	tcdb.commit()
	n=0
	for i in tcdb.execute('select * from Audio'):
		print(n,i)
		n+=1
	tcdb.close()
syl2phn='''a	a
ah	ah
ai	a i
aih	a ih
ainn	ann inn
ainnh	ann innh
ak	ak
am	a m
an	a n
ang	a ng
ann	ann
annh	annh
ap	ap
at	at
au	a u
auh	a uh
aunn	ann unn
aunnh	ann unnh
ba	b a
bah	b ah
bai	b a i
baih	b a ih
bainn	b ann inn
bainnh	b ann innh
bak	b ak
bam	b a m
ban	b a n
bang	b a ng
bann	b ann
bannh	b annh
bap	b ap
bat	b at
bau	b a u
bauh	b a uh
baui	b a u i
baunn	b ann unn
baunnh	b ann unnh
be	b e
beh	b eh
bei	b e i
ben	b e n
benn	b enn
bennh	b ennh
bet	b et
beu	b e u
bi	b i
bia	b i a
biah	b i ah
biak	b i ak
biam	b i a m
bian	b i a n
biang	b i a ng
biann	b inn ann
biannh	b inn annh
biap	b i ap
biat	b i at
biau	b i a u
biauh	b i a uh
biaunn	b inn ann unn
biaunnh	b inn ann unnh
bie	b i e
bien	b i e n
biet	b i et
bih	b ih
bik	b ik
bim	b i m
bin	b i n
bing	b i ng
binn	b inn
binnh	b innh
bio	b i o
biok	b i ok
biong	b i o ng
bionn	b inn onn
bionnh	b inn onnh
bior	b i or
biorh	b i orh
bip	b ip
bit	b it
biu	b i u
biuh	b i uh
biunn	b inn unn
biunnh	b inn unnh
bng	b ng
bnq	b nq
bo	b o
boh	b oh
boi	b o i
bok	b ok
bom	b o m
bong	b o ng
bonn	b onn
bonnh	b onnh
bop	b op
bor	b or
borh	b orh
born	b or n
bot	b o t
bouh	b o uh
bu	b u
bua	b u a
buah	b u ah
buaih	b u a ih
buainn	b unn ann inn
buainnh	b unn ann innh
buak	b u ak
buan	b u a n
buang	b u a ng
buann	b unn ann
buannh	b unn annh
buat	b u at
bue	b u e
bueh	b u eh
buenn	b unn enn
buennh	b unn ennh
buh	b uh
bui	b u i
buih	b u ih
buinn	b unn inn
buinnh	b unn innh
buk	b uk
bun	b u n
bung	b u ng
buo	b u o
buoh	b u oh
but	b ut
ca	c a
cah	c ah
cai	c a i
caih	c a ih
cainn	c ann inn
cainnh	c ann innh
cak	c ak
cam	c a m
can	c a n
cang	c a ng
cann	c ann
cannh	c annh
cap	c ap
cat	c at
cau	c a u
cauh	c a uh
caunn	c ann unn
caunnh	c ann unnh
ce	c e
ceh	c eh
cen	c e n
cenn	c enn
cennh	c ennh
cet	c et
ceu	c e u
cha	ch a
chai	ch a i
chak	ch ak
chan	ch a n
chang	ch a ng
chat	ch at
chau	ch a u
che	ch e
chi	ch i
chii	ch ii
chim	ch i m
chin	ch i n
chit	ch it
chiu	ch i u
chng	ch ng
choi	ch o i
chok	ch ok
chon	ch o n
chong	ch o ng
chor	ch or
chorn	ch or n
chou	ch o u
chu	ch u
chua	ch u a
chuai	ch u a i
chuan	ch u a n
chuang	ch u a ng
chuei	ch u e i
chui	ch u i
chuk	ch uk
chun	ch u n
chung	ch u ng
chuo	ch u o
chut	ch ut
ci	c i
cia	c i a
ciah	c i ah
ciak	c i ak
ciam	c i a m
cian	c i a n
ciang	c i a ng
ciann	c inn ann
ciannh	c inn annh
ciap	c i ap
ciat	c i at
ciau	c i a u
ciauh	c i a uh
ciaunn	c inn ann unn
cie	c i e
cien	c i e n
ciet	c i et
cih	c ih
cii	c ii
ciim	c ii m
ciin	c ii n
ciit	c ii t
cik	c ik
cim	c i m
cin	c i n
cing	c i ng
cinn	c inn
cinnh	c innh
cio	c i o
ciok	c i ok
cion	c i o n
ciong	c i o ng
cionn	c inn onn
cionnh	c inn onnh
cior	c i or
ciorh	c i orh
ciou	c i o u
cip	c ip
cit	c it
ciu	c i u
ciuh	c i uh
ciuk	c i uk
ciung	c i u ng
ciunn	c inn unn
ciunnh	c inn unnh
cng	c ng
cnq	c nq
co	c o
coh	c oh
coi	c o i
cok	c ok
com	c o m
con	c o n
cong	c o ng
conn	c onn
connh	c onnh
cop	c op
cor	c or
corh	c orh
corn	c or n
cot	c ot
cou	c o u
cu	c u
cua	c u a
cuah	c u ah
cuai	c u a i
cuaih	c u a ih
cuainn	c unn ann inn
cuainnh	c unn ann innh
cuak	c u ak
cuan	c u a n
cuang	c u a ng
cuann	c unn ann
cuannh	c unn annh
cuat	c u at
cue	c u e
cueh	c u eh
cuei	c u e i
cuenn	c unn enn
cuennh	c unn ennh
cuh	c uh
cui	c u i
cuih	c u ih
cuinn	c unn inn
cuinnh	c unn innh
cuk	c uk
cun	c u n
cung	c u ng
cuo	c u o
cut	c ut
cyu	c yu
cyuan	c yu a n
cyue	c yu e
cyuet	c yu et
cyun	c yu n
da	d a
dah	d ah
dai	d a i
daih	d a ih
dainn	d ann inn
dainnh	d ann innh
dak	d ak
dam	d a m
dan	d a n
dang	d a ng
dann	d ann
dannh	d annh
dap	d ap
dat	d at
dau	d a u
dauh	d a uh
daunn	d ann unn
daunnh	d ann unnh
de	d e
deh	d eh
dei	d e i
dem	d e m
den	d e n
denn	d enn
dennh	d ennh
dep	d ep
det	d et
deu	d e u
di	d i
dia	d i a
diah	d i ah
diak	d i ak
diam	d i a m
dian	d i a n
diang	d i a ng
diann	d inn ann
diannh	d inn annh
diap	d i ap
diat	d i at
diau	d i a u
diauh	d i a uh
diaunn	d inn ann unn
diaunnh	d inn ann unnh
die	d i e
dien	d i e n
diet	d i et
dih	d ih
dik	d ik
dim	d i m
din	d i n
ding	d i ng
dinn	d inn
dinnh	d innh
dio	d i o
dioh	d i oh
diok	d i ok
diong	d i o ng
dionn	d inn onn
dionnh	d inn onnh
dior	d i or
diorh	d i orh
diou	d i o u
dip	d ip
dit	d it
diu	d i u
diuh	d i uh
diunn	d inn unn
diunnh	d inn unnh
dng	d ng
dnq	d nq
do	d o
doh	d oh
doi	d o i
dok	d ok
dom	d o m
don	d o n
dong	d o ng
donn	d onn
dop	d op
dor	d or
dorh	d orh
dorn	d or n
dot	d ot
dou	d o u
du	d u
dua	d u a
duah	d u ah
duai	d u a i
duaih	d u a ih
duainn	d unn ann inn
duainnh	d unn ann innh
duak	d u ak
duan	d u a n
duang	d u a ng
duann	d unn ann
duannh	d unn annh
duat	d u at
due	d u e
dueh	d u eh
duei	d u e i
duenn	d unn enn
duennh	d unn ennh
duh	d uh
dui	d u i
duih	d u ih
duinn	d unn inn
duinnh	d unn innh
duk	d uk
dum	d u m
dun	d u n
dung	d u ng
duo	d u o
dut	d ut
e	e
eh	eh
ei	e i
em	e m
en	e n
enn	enn
ennh	ennh
ep	ep
et	et
eu	e u
fa	f a
fai	f a i
fak	f ak
fam	f a m
fan	f a n
fang	f a ng
fap	f ap
fat	f at
fe	f e
fei	f e i
fen	f e n
fet	f et
feu	f e u
fi	f i
fin	f i n
fit	f it
fng	f ng
fo	f o
foi	f o i
fok	f ok
fon	f o n
fong	f o ng
forn	f or n
fou	f o u
fu	f u
fui	f u i
fuk	f uk
fun	f u n
fung	f u ng
fuo	f u o
fut	f ut
ga	g a
gah	g ah
gai	g a i
gaih	g a ih
gainn	g ann inn
gainnh	g ann innh
gak	g ak
gam	g a m
gan	g a n
gang	g a ng
gann	g ann
gannh	g annh
gap	g ap
gat	g at
gau	g a u
gauh	g a uh
gaunn	g ann unn
gaunnh	g ann unnh
ge	g e
geh	g eh
gei	g e i
gen	g e n
genn	g enn
gennh	g ennh
get	g et
gi	g i
gia	g i a
giah	g i ah
giak	g i ak
giam	g i a m
gian	g i a n
giang	g i a ng
giann	g inn ann
giannh	g inn annh
giap	g i ap
giat	g i at
giau	g i a u
giauh	g i a uh
giaunn	g inn ann unn
giaunnh	g inn ann unnh
gie	g i e
giem	g i e m
gien	g i e n
giep	g i ep
giet	g i et
gieu	g i e u
gih	g ih
gik	g ik
gim	g i m
gin	g i n
ging	g i ng
ginn	g inn
ginnh	g innh
gio	g i o
giok	g i ok
giong	g i o ng
gionn	g inn onn
gionnh	g inn onnh
gior	g i or
giorh	g i orh
gip	g ip
git	g it
giu	g i u
giuh	g i uh
giuk	g i uk
giun	g i u n
giung	g i u ng
giunn	g inn unn
giunnh	g inn unnh
gng	g ng
gnq	g nq
go	g o
goh	g oh
goi	g o i
gok	g ok
gom	g o m
gon	g o n
gong	g o ng
gonn	g onn
gonnh	g onnh
gop	g op
gor	g or
gorh	g orh
gorn	g or n
got	g ot
gou	g o u
gu	g u
gua	g u a
guah	g u ah
guai	g u a i
guaih	g u a ih
guainn	g unn ann inn
guainnh	g unn ann innh
guak	g u ak
guan	g u a n
guang	g u a ng
guann	g unn ann
guannh	g unn annh
guat	g u at
gue	g u e
gueh	g u eh
guei	g u e i
guen	g u e n
guenn	g unn enn
guennh	g unn ennh
guet	g u et
guh	g uh
gui	g u i
guih	g u ih
guinn	g unn inn
guinnh	g unn innh
guk	g uk
gun	g u n
gung	g u ng
guo	g u o
gut	g ut
ha	h a
hah	h ah
hai	h a i
haih	h a ih
hainn	h ann inn
hainnh	h ann innh
hak	h ak
ham	h a m
han	h a n
hang	h a ng
hann	h ann
hannh	h annh
hap	h ap
hat	h at
hau	h a u
hauh	h a uh
haunn	h ann unn
haunnh	h ann unnh
he	h e
heh	h eh
hei	h e i
hem	h e m
hen	h e n
henn	h enn
hennh	h ennh
het	h et
heu	h e u
hi	h i
hia	h i a
hiah	h i ah
hiak	h i ak
hiam	h i a m
hian	h i a n
hiang	h i a ng
hiann	h inn ann
hiannh	h inn annh
hiap	h i ap
hiat	h i at
hiau	h i a u
hiauh	h i a uh
hiaunn	h inn ann unn
hiaunnh	h inn ann unnh
hien	h i e n
hiet	h i et
hieu	h i e u
hih	h ih
hik	h ik
him	h i m
hin	h i n
hing	h i ng
hinn	h inn
hinnh	h innh
hio	h i o
hiok	h i ok
hiong	h i o ng
hionn	h inn onn
hionnh	h inn onnh
hior	h i or
hiorh	h i orh
hip	h ip
hit	h it
hiu	h i u
hiuh	h i uh
hiuk	h i uk
hiun	h i u n
hiung	h i u ng
hiunn	h inn unn
hiunnh	h inn unnh
hm	h m
hmh	h mh
hng	h ng
hnq	h nq
ho	h o
hoh	h oh
hoi	h o i
hok	h ok
hom	h o m
hon	h o n
hong	h o ng
honn	h onn
honnh	h onnh
hop	h op
hor	h or
horh	h orh
horn	h or n
hornn	h ornn
hot	h ot
hou	h o u
hu	h u
hua	h u a
huah	h u ah
huai	h u a i
huaih	h u a ih
huainn	h unn ann inn
huainnh	h unn ann innh
huak	h u ak
huan	h u a n
huang	h u a ng
huann	h unn ann
huannh	h unn annh
huat	h u at
hue	h u e
hueh	h u eh
huei	h u e i
huenn	h unn enn
huennh	h unn ennh
huh	h uh
hui	h u i
huih	h u ih
huinn	h unn inn
huinnh	h unn innh
hun	h u n
huo	h u o
huoh	h u oh
hut	h ut
i	i
ia	i a
iah	i ah
iai	i a i
iak	i ak
iam	i a m
ian	i a n
iang	i a ng
iann	inn ann
iannh	inn annh
iap	i ap
iat	i at
iau	i a u
iauh	i a uh
iaunn	inn ann unn
iaunnh	inn ann unnh
ie	i e
ien	i e n
iet	i et
ih	ih
ik	ik
im	i m
in	i n
ing	i ng
inn	inn
innh	innh
io	i o
ioh	i oh
iok	i ok
iong	i o ng
ionn	inn onn
ionnh	inn onnh
ior	i or
iorh	i orh
iou	i o u
ip	ip
it	it
iu	i u
iuh	i uh
iunn	inn unn
iunnh	inn unnh
ka	k a
kah	k ah
kai	k a i
kaih	k a ih
kainn	k ann inn
kainnh	k ann innh
kak	k ak
kam	k a m
kan	k a n
kang	k a ng
kann	k ann
kannh	k annh
kap	k ap
kat	k at
kau	k a u
kaunn	k ann unn
kaunnh	k ann unnh
ke	k e
keh	k eh
ken	k e n
kenn	k enn
kennh	k ennh
ket	k et
ki	k i
kia	k i a
kiah	k i ah
kiak	k i ak
kiam	k i a m
kian	k i a n
kiang	k i a ng
kiann	k inn ann
kiannh	k inn annh
kiap	k i ap
kiat	k i at
kiau	k i a u
kiauh	k i a uh
kiaunn	k inn ann unn
kiaunnh	k inn ann unnh
kie	k i e
kiem	k i e m
kien	k i e n
kiep	k i ep
kiet	k i et
kieu	k i e u
kih	k ih
kik	k ik
kim	k i m
kin	k i n
king	k i ng
kinn	k inn
kinnh	k innh
kio	k i o
kioh	k i oh
kioi	k i o i
kiok	k i ok
kiong	k i o ng
kionn	k inn onn
kionnh	k inn onnh
kior	k i or
kiorh	k i orh
kip	k ip
kit	k it
kiu	k i u
kiuh	k i uh
kiuk	k i uk
kiun	k i u n
kiung	k i u ng
kiunn	k inn unn
kiunnh	k inn unnh
kiut	k i ut
kng	k ng
knq	k nq
ko	k o
koh	k oh
koi	k o i
kok	k ok
kom	k o m
kon	k o n
kong	k o ng
konn	k onn
konnh	k onnh
kop	k op
kor	k or
korh	k orh
korn	k or n
kou	k o u
ku	k u
kua	k u a
kuah	k u ah
kuai	k u a i
kuaih	k u a ih
kuainn	k unn ann inn
kuainnh	k unn ann innh
kuak	k u ak
kuan	k u a n
kuang	k u a ng
kuann	k unn ann
kuannh	k unn annh
kuat	k u at
kue	k u e
kueh	k u eh
kuei	k u e i
kuenn	k unn enn
kuennh	k unn ennh
kuh	k uh
kui	k u i
kuih	k u ih
kuinn	k unn inn
kuinnh	k unn innh
kuk	k uk
kun	k u n
kung	k u ng
kuo	k u o
kut	k ut
la	l a
lah	l ah
lai	l a i
laih	l a ih
lak	l ak
lam	l a m
lan	l a n
lang	l a ng
lap	l ap
lat	l at
lau	l a u
lauh	l a uh
le	l e
leh	l eh
lei	l e i
lem	l e m
len	l e n
lep	l ep
let	l et
leu	l e u
li	l i
lia	l i a
liah	l i ah
liak	l i ak
liam	l i a m
lian	l i a n
liang	l i a ng
liap	l i ap
liat	l i at
liau	l i a u
liauh	l i a uh
lie	l i e
lien	l i e n
liet	l i et
lih	l ih
lik	l ik
lim	l i m
lin	l i n
ling	l i ng
lio	l i o
liok	l i ok
lion	l i o n
liong	l i o ng
lior	l i or
liorh	l i orh
liou	l i o u
lip	l ip
lit	l it
liu	l i u
liuh	l i uh
liuk	l i uk
liung	l i u ng
lng	l ng
lo	l o
loh	l oh
loi	l o i
lok	l ok
lom	l o m
lon	l o n
long	l o ng
lop	l op
lor	l or
lorh	l orh
lot	l ot
lou	l o u
lu	l u
lua	l u a
luah	l u ah
luai	l u a i
luaih	l u a ih
luak	l u ak
luan	l u a n
luang	l u a ng
luat	l u at
lue	l u e
lueh	l u eh
luh	l uh
lui	l u i
luih	l u ih
luk	l uk
lun	l u n
lung	l u ng
luo	l u o
lut	l ut
lyu	l yu
lyuan	l yu a n
lyue	l yu e
lyun	l yu n
m	m
ma	m ann
mah	m annh
mai	m ann inn
maih	m ann innh
mak	m annk
mam	m ann m
man	m ann n
mang	m ann ng
mat	m annt
mau	m ann unn
mauh	m ann unnh
me	m enn
meh	m ennh
mei	m enn inn
men	m enn n
met	m ennt
meu	m enn unn
mh	mh
mi	m inn
mia	m inn ann
miah	m inn annh
miang	m inn ann ng
miau	m inn ann unn
miauh	m inn ann unnh
mie	m inn enn
mien	m inn enn n
miet	m inn ennt
mih	m innh
min	m inn n
ming	m inn ng
mio	m inn onn
mioh	m inn onnh
miong	m inn onn ng
miou	m inn onn unn
miu	m inn unn
miuh	m inn unnh
mng	m ng
mnq	m nq
mo	m onn
moh	m onnh
moi	m onn inn
mok	m onnk
mong	m onn ng
mor	m ornn
morh	m ornnh
morn	m ornn n
mornh	m ornn nh
mou	m onn unn
mu	m unn
mua	m unn ann
muah	m unn annh
muai	m unn ann inn
muaih	m unn ann innh
muan	m unn ann n
mue	m unn enn
mueh	m unn ennh
mui	m unn inn
muih	m unn innh
muk	m unnk
mun	m unn n
mung	m unn ng
muo	m unn onn
muoh	m unn onnh
mut	m unnt
n	n
na	n ann
nah	n annh
nai	n ann inn
naih	n ann innh
nak	n annk
nam	n ann m
nan	n ann n
nang	n ann ng
nanq	n ann nq
nap	n annp
nat	n annt
nau	n ann unn
nauh	n ann unnh
ne	n enn
neh	n ennh
nei	n enn inn
nem	n enn m
nen	n enn n
net	n ennt
neu	n enn unn
ng	ng
nga	ng ann
ngah	ng annh
ngai	ng ann inn
ngaih	ng ann innh
ngam	ng ann m
ngan	ng ann n
ngang	ng ann ng
ngap	ng annp
ngat	ng annt
ngau	ng ann unn
ngauh	ng ann unnh
nge	ng enn
ngeh	ng ennh
ngi	ng inn
ngia	ng inn ann
ngiah	ng inn annh
ngiak	ng inn annk
ngiam	ng inn ann m
ngiang	ng inn ann ng
ngiap	ng inn annp
ngiau	ng inn ann unn
ngiauh	ng inn ann unnh
ngie	ng inn enn
ngiem	ng inn enn m
ngien	ng inn enn n
ngiet	ng inn ennt
ngieu	ng inn enn unn
ngih	ng innh
ngim	ng inn m
ngin	ng inn n
nging	ng inn ng
ngio	ng inn onn
ngioh	ng inn onnh
ngiok	ng inn onnk
ngion	ng inn onn n
ngiong	ng inn onn ng
ngip	ng innp
ngit	ng innt
ngiu	ng inn unn
ngiuh	ng inn unnh
ngiuk	ng inn unnk
ngiun	ng inn unn n
ngiung	ng inn unn ng
ngo	ng onn
ngoh	ng onnh
ngoi	ng onn inn
ngok	ng onnk
ngong	ng onn ng
ngor	ng ornn
ngu	ng unn
ngua	ng unn ann
nguah	ng unn annh
nguai	ng unn ann inn
nguaih	ng unn ann innh
nguan	ng unn ann n
ngue	ng unn enn
ngueh	ng unn ennh
ngui	ng unn inn
ngut	ng unnt
ni	n inn
nia	n inn ann
niah	n inn annh
niam	n inn ann m
niang	n inn ann ng
niau	n inn ann unn
niauh	n inn ann unnh
nie	n inn enn
nien	n inn enn n
nih	n innh
nim	n inn m
nin	n inn n
ning	n inn ng
nio	n inn onn
nioh	n inn onnh
nioorh	n inn onn ornnh
nior	n inn ornn
niou	n inn onn unn
nit	n innt
niu	n inn unn
niuh	n inn unnh
niunn	n inn unn
nng	n ng
nnq	n nq
no	n onn
noh	n onnh
nok	n onnk
non	n onn n
nong	n onn ng
nor	n ornn
norh	n ornnh
norn	n ornn n
nou	n onn unn
nq	nq
nqo	nq o
nu	n unn
nua	n unn ann
nuah	n unn annh
nuai	n unn ann inn
nuaih	n unn ann innh
nuan	n unn ann n
nue	n unn enn
nueh	n unn ennh
nuh	n unnh
nui	n unn inn
nuih	n unn innh
nuk	n unnk
nun	n unn n
nung	n unn ng
nuo	n unn onn
nyu	n yu
nyue	n yu enn
o	o
oh	oh
oi	o i
ok	ok
om	o m
on	o n
ong	o ng
onn	onn
onnh	onnh
op	op
or	or
orh	orh
orn	or n
ornn	ornn
orr	orr
ot	ot
ou	o u
pa	p a
pah	p ah
pai	p a i
paih	p a ih
painn	p ann inn
painnh	p ann innh
pak	p ak
pam	p a m
pan	p a n
pang	p a ng
pann	p ann
pannh	p annh
pap	p ap
pat	p at
pau	p a u
pauh	p a uh
paunn	p ann unn
paunnh	p ann unnh
pe	p e
peh	p eh
pei	p e i
pen	p e n
penn	p enn
pennh	p ennh
pet	p et
peu	p e u
pi	p i
pia	p i a
piah	p i ah
piak	p i ak
piam	p i a m
pian	p i a n
piang	p i a ng
piann	p inn ann
piannh	p inn annh
piap	p i ap
piat	p i at
piau	p i a u
piauh	p i a uh
piaunn	p inn ann unn
piaunnh	p inn ann unnh
pie	p i e
pien	p i e n
piet	p i et
pih	p ih
pik	p ik
pim	p i m
pin	p i n
ping	p i ng
pinn	p inn
pinnh	p innh
pio	p i o
piok	p i ok
piong	p i o ng
pionn	p inn onn
pionnh	p inn onnh
pior	p i or
piorh	p i orh
pip	p ip
pit	p it
piu	p i u
piuh	p i uh
piunn	p inn unn
piunnh	p inn unnh
png	p ng
pnq	p nq
po	p o
poh	p oh
poi	p o i
pok	p ok
pom	p o m
pon	p o n
pong	p o ng
ponn	p onn
ponnh	p onnh
pop	p op
por	p or
porh	p orh
porn	p or n
pou	p o u
pu	p u
pua	p u a
puah	p u ah
puai	p u a i
puaih	p u a ih
puainn	p unn ann inn
puainnh	p unn ann innh
puak	p u ak
puan	p u a n
puang	p u a ng
puann	p unn ann
puannh	p unn annh
puat	p u at
pue	p u e
pueh	p u eh
puenn	p unn enn
puennh	p unn ennh
puh	p uh
pui	p u i
puih	p u ih
puinn	p unn inn
puinnh	p unn innh
puk	p uk
pun	p u n
pung	p u ng
puo	p u o
put	p ut
qa	q a
qah	q ah
qai	q a i
qaih	q a ih
qak	q ak
qam	q a m
qan	q a n
qang	q a ng
qap	q ap
qat	q at
qau	q a u
qauh	q a uh
qe	q e
qeh	q eh
qen	q e n
qet	q et
qi	q i
qia	q i a
qiah	q i ah
qiak	q i ak
qiam	q i a m
qian	q i a n
qiang	q i a ng
qiap	q i ap
qiat	q i at
qiau	q i a u
qiauh	q i a uh
qien	q i e n
qiet	q i et
qih	q ih
qik	q ik
qim	q i m
qin	q i n
qing	q i ng
qiok	q i ok
qiong	q i o ng
qior	q i or
qiorh	q i orh
qip	q ip
qit	q it
qiu	q i u
qiuh	q i uh
qng	q ng
qnq	q nq
qo	q o
qoh	q oh
qok	q ok
qom	q o m
qong	q o ng
qonn	q onn
qop	q op
qor	q or
qorh	q orh
qu	q u
qua	q u a
quah	q u ah
quai	q u a i
quaih	q u a ih
quak	q u ak
quan	q u a n
quang	q u a ng
quat	q u at
que	q u e
queh	q u eh
quh	q uh
qui	q u i
quih	q u ih
qun	q u n
qut	q ut
ra	r a
rah	r ah
rai	r a i
raih	r a ih
rainn	r ann inn
rainnh	r ann innh
rak	r ak
ram	r a m
ran	r a n
rang	r a ng
rann	r ann
rannh	r annh
rap	r ap
rat	r at
rau	r a u
rauh	r a uh
raunn	r ann unn
raunnh	r ann unnh
re	r e
reh	r eh
ren	r e n
renn	r enn
rennh	r ennh
ret	r et
rha	rh a
rhai	rh a i
rhak	rh ak
rham	rh a m
rhan	rh a n
rhang	rh a ng
rhap	rh ap
rhat	rh at
rhau	rh a u
rhe	rh e
rhi	rh i
rhii	rh ii
rhim	rh i m
rhin	rh i n
rhit	rh it
rhiu	rh i u
rhm	rh m
rhng	rh ng
rhok	rh ok
rhong	rh o ng
rhor	rh or
rhorn	rh or n
rhou	rh o u
rhu	rh u
rhuan	rh u a n
rhuei	rh u e i
rhui	rh u i
rhuk	rh uk
rhun	rh u n
rhung	rh u ng
rhuo	rh u o
ri	r i
ria	r i a
riah	r i ah
riak	r i ak
riam	r i a m
rian	r i a n
riang	r i a ng
riann	r inn ann
riannh	r inn annh
riap	r i ap
riat	r i at
riau	r i a u
riauh	r i a uh
riaunn	r inn ann unn
riaunnh	r inn ann unnh
rien	r i e n
riet	r i et
rih	r ih
rii	r ii
rik	r ik
rim	r i m
rin	r i n
ring	r i ng
rinn	r inn
rinnh	r innh
rio	r i o
riok	r i ok
riong	r i o ng
rionn	r inn onn
rionnh	r inn onnh
rior	r i or
riorh	r i orh
rip	r ip
rit	r it
riu	r i u
riuh	r i uh
riunn	r inn unn
riunnh	r inn unnh
rng	r ng
rnq	r nq
ro	r o
roh	r oh
rok	r ok
rom	r o m
rong	r o ng
ronn	r onn
ronnh	r onnh
rop	r op
ror	r or
rorh	r orh
rorn	r or n
ru	r u
rua	r u a
ruah	r u ah
ruai	r u a i
ruaih	r u a ih
ruainn	r unn ann inn
ruainnh	r unn ann innh
ruak	r u ak
ruan	r u a n
ruang	r u a ng
ruann	r unn ann
ruannh	r unn annh
ruat	r u at
rue	r u e
rueh	r u eh
ruenn	r unn enn
ruennh	r unn ennh
ruh	r uh
rui	r u i
ruih	r u ih
ruinn	r unn inn
ruinnh	r unn innh
run	r u n
ruo	r u o
rut	r ut
s	s
sa	s a
sah	s ah
sai	s a i
saih	s a ih
sain	s a i n
sainn	s ann inn
sainnh	s ann innh
sak	s ak
sam	s a m
san	s a n
sang	s a ng
sann	s ann
sannh	s annh
sap	s ap
sat	s at
sau	s a u
sauh	s a uh
saunn	s ann unn
saunnh	s ann unnh
se	s e
seh	s eh
sei	s e i
sem	s e m
sen	s e n
senn	s enn
sennh	s ennh
sep	s ep
set	s et
seu	s e u
sha	sh a
shai	sh a i
shak	sh ak
sham	sh a m
shan	sh a n
shang	sh a ng
shanq	sh a nq
shap	sh ap
shat	sh at
shau	sh a u
she	sh e
shei	sh e i
shi	sh i
shii	sh ii
shiih	sh iih
shim	sh i m
shin	sh i n
ship	sh ip
shit	sh it
shiu	sh i u
shng	sh ng
shoi	sh o i
shok	sh ok
shon	sh o n
shong	sh o ng
shor	sh or
shorn	sh or n
shot	sh ot
shou	sh o u
shu	sh u
shua	sh u a
shuai	sh u a i
shuan	sh u a n
shuang	sh u a ng
shuei	sh u e i
shui	sh u i
shuk	sh uk
shun	sh u n
shuo	sh u o
si	s i
sia	s i a
siah	s i ah
siak	s i ak
siam	s i a m
siang	s i a ng
siann	s inn ann
siannh	s inn annh
siap	s i ap
siat	s i at
siau	s i a u
siauh	s i a uh
siaunn	s inn ann unn
siaunnh	s inn ann unnh
sie	s i e
sien	s i e n
siet	s i et
sih	s ih
sii	s ii
siim	s ii m
siin	s ii n
siip	s iip
siit	s iit
sik	s ik
sim	s i m
simh	s i mh
sin	s i n
sing	s i ng
sinn	s inn
sinnh	s innh
sio	s i o
sioh	s i oh
siok	s i ok
siong	s i o ng
sionn	s inn onn
sionnh	s inn onnh
sior	s i or
siorh	s i orh
siou	s i o u
sip	s ip
sit	s it
siu	s i u
siuh	s i uh
siuk	s i uk
siun	s i u n
siung	s i u ng
siunn	s inn unn
siunnh	s inn unnh
siut	s i ut
sng	s ng
snq	s nq
so	s o
soh	s oh
soi	s o i
sok	s ok
som	s o m
son	s o n
song	s o ng
sonn	s onn
sonnh	s onnh
sop	s op
sor	s or
sorh	s orh
sorn	s or n
sot	s ot
sou	s o u
sp	sp
su	s u
sua	s u a
suah	s u ah
suai	s u a i
suaih	s u a ih
suainn	s unn ann inn
suainnh	s unn ann innh
suak	s u ak
suan	s u a n
suang	s u a ng
suann	s unn ann
suannh	s unn annh
suat	s u at
sue	s u e
sueh	s u eh
suei	s u e i
suenn	s unn enn
suennh	s unn ennh
suh	s uh
sui	s u i
suih	s u ih
suinn	s unn inn
suinnh	s unn innh
suk	s uk
sun	s u n
sung	s u ng
suo	s u o
sut	s ut
syu	s yu
syuan	s yu a n
syue	s yu e
syun	s yu n
ta	t a
tah	t ah
tai	t a i
taih	t a ih
tainn	t ann inn
tainnh	t ann innh
tak	t ak
tam	t a m
tan	t a n
tang	t a ng
tann	t ann
tannh	t annh
tap	t ap
tat	t at
tau	t a u
tauh	t a uh
taunn	t ann unn
taunnh	t ann unnh
te	t e
teh	t eh
ten	t e n
tenn	t enn
tennh	t ennh
tet	t et
teu	t e u
ti	t i
tia	t i a
tiah	t i ah
tiak	t i ak
tiam	t i a m
tian	t i a n
tiang	t i a ng
tiann	t inn ann
tiannh	t inn annh
tiap	t i ap
tiat	t i at
tiau	t i a u
tiauh	t i a uh
tiaunn	t inn ann unn
tiaunnh	t inn ann unnh
tie	t i e
tien	t i e n
tiet	t i et
tih	t ih
tik	t ik
tim	t i m
tin	t i n
ting	t i ng
tinn	t inn
tinnh	t innh
tio	t i o
tiok	t i ok
tiong	t i o ng
tionn	t inn onn
tionnh	t inn onnh
tior	t i or
tiorh	t i orh
tip	t ip
tit	t it
tiu	t i u
tiuh	t i uh
tiunn	t inn unn
tiunnh	t inn unnh
tng	t ng
tnq	t nq
to	t o
toh	t oh
toi	t o i
tok	t ok
tom	t o m
ton	t o n
tong	t o ng
tonn	t onn
tonnh	t onnh
top	t op
tor	t or
torh	t orh
tot	t ot
tou	t o u
touh	t o uh
tu	t u
tua	t u a
tuah	t u ah
tuai	t u a i
tuaih	t u a ih
tuainn	t unn ann inn
tuainnh	t unn ann innh
tuak	t u ak
tuan	t u a n
tuang	t u a ng
tuann	t unn ann
tuannh	t unn annh
tuat	t u at
tue	t u e
tueh	t u eh
tuei	t u e i
tuenn	t unn enn
tuennh	t unn ennh
tuh	t uh
tui	t u i
tuih	t u ih
tuinn	t unn inn
tuinnh	t unn innh
tuk	t uk
tun	t u n
tung	t u ng
tuo	t u o
tut	t ut
u	u
ua	u a
uah	u ah
uai	u a i
uaih	u a ih
uainn	unn ann inn
uainnh	unn ann innh
uak	u ak
uan	u a n
uang	u a ng
uann	unn ann
uannh	u annh
uat	u at
ue	u e
ueh	u eh
uei	u e i
uenn	unn enn
uennh	unn enn
uh	uh
ui	u i
uih	u ih
uinn	unn inn
uinnh	unn innh
un	u n
ung	u ng
unn	unn
unnh	unnh
uo	u o
ut	ut
va	v a
va	v a
vah	v ah
vai	v a i
vai	v a i
vaih	v a ih
vak	v ak
vak	v ak
vam	v a m
van	v a n
van	v a n
vang	v a ng
vang	v a ng
vap	v ap
vat	v at
vat	v at
vau	v a u
vauh	v a uh
ve	v e
ve	v e
veh	v eh
ven	v e n
ven	v e n
vet	v et
vet	v et
vi	v i
vi	v i
via	v i a
viah	v i ah
viak	v i ak
viam	v i a m
vian	v i a n
viang	v i a ng
viap	v i ap
viat	v i at
viau	v i a u
viauh	v i a uh
vien	v i e n
viet	v i et
vih	v ih
vik	v ik
vim	v i m
vin	v i n
ving	v i ng
vio	v i o
viok	v i ok
viong	v i o ng
vior	v i or
viorh	v i orh
vip	v ip
vit	v it
vit	v it
viu	v i u
viuh	v i uh
vng	v ng
vnq	v nq
vo	v o
vo	v o
voh	v oh
voi	v o i
voi	v o i
vok	v ok
vok	v ok
vom	v o m
von	v o n
von	v o n
vong	v o ng
vong	v o ng
vop	v op
vor	v or
vorh	v orh
vu	v u
vu	v u
vua	v u a
vuah	v u ah
vuai	v u a i
vuaih	v u a ih
vuak	v u ak
vuan	v u a n
vuang	v u a ng
vuat	v u at
vue	v u e
vueh	v u eh
vuh	v uh
vui	v u i
vuih	v u ih
vuk	v uk
vuk	v uk
vun	v u n
vun	v u n
vung	v u ng
vung	v u ng
vut	v ut
vut	v ut
ya	i a
yak	i ak
yam	i a m
yang	i a ng
yap	i ap
ye	i e
yen	i e n
yet	i et
yeu	i e u
yi	i
yiang	i a ng
yien	i e n
yiet	i et
yim	i m
yin	i n
yiong	i o ng
yip	ip
yit	it
yiu	i u
yiui	i u i
yiuk	i uk
yiun	i u n
yiung	i u ng
yiut	i ut
yok	i ok
yong	i o ng
yu	yu
yua	yu a
yuan	yu a n
yue	yu e
yun	yu n
yung	yu ng
yut	i ut
z	z
za	z a
zah	z ah
zai	z a i
zaih	z a ih
zainn	z ann inn
zainnh	z ann innh
zak	z ak
zam	z a m
zan	z a n
zang	z a ng
zann	z ann
zannh	z annh
zap	z ap
zat	z at
zau	z a u
zauh	z a uh
zaunn	z ann unn
zaunnh	z ann unnh
ze	z e
zeh	z eh
zei	z e i
zem	z e m
zen	z e n
zenn	z enn
zennh	z ennh
zep	z ep
zet	z et
zeu	z e u
zha	zh a
zhai	zh a i
zhak	zh ak
zham	zh a m
zhan	zh a n
zhang	zh a ng
zhap	zh ap
zhat	zh at
zhau	zh a u
zhe	zh e
zhei	zh e i
zhep	zh ep
zhi	zh i
zhii	zh ii
zhim	zh i m
zhin	zh i n
zhip	zh ip
zhit	zh it
zhiu	zh i u
zhng	zh ng
zhoi	zh o i
zhok	zh ok
zhon	zh o n
zhong	zh o ng
zhor	zh or
zhorh	zh orh
zhorn	zh or n
zhot	zh ot
zhou	zh o u
zhu	zh u
zhua	zh u a
zhuai	zh u a i
zhuan	zh u a n
zhuang	zh u a ng
zhuei	zh u e i
zhui	zh u i
zhuk	zh uk
zhun	zh u n
zhung	zh u ng
zhuo	zh u o
zi	z i
zia	z i a
ziah	z i ah
ziak	z i ak
ziam	z i a m
zian	z i a n
ziang	z i a ng
ziann	z inn ann
ziannh	z inn annh
ziap	z i ap
ziat	z i at
ziau	z i a u
ziauh	z i a uh
ziaunn	z inn ann unn
ziaunnh	z inn ann unnh
zie	z i e
zien	z i e n
ziet	z i et
zih	z ih
zii	z ii
ziih	z iih
ziim	z ii m
ziin	z ii n
ziip	z iip
ziit	z iit
zik	z ik
zim	z i m
zin	z i n
zing	z i ng
zinn	z inn
zinnh	z innh
zio	z i o
zioh	z i oh
ziok	z i ok
ziong	z i o ng
zionn	z inn onn
zionnh	z inn onnh
zior	z i or
ziorh	z i orh
ziot	z i ot
ziou	z i o u
zip	z ip
zit	z it
ziu	z i u
ziuh	z i uh
ziuk	z i uk
ziung	z i u ng
ziunn	z inn unn
ziunnh	z inn unnh
zng	z ng
znq	z nq
zo	z o
zoh	z oh
zoi	z o i
zok	z ok
zom	z o m
zon	z o n
zong	z o ng
zonn	z onn
zop	z op
zor	z or
zorh	z orh
zorn	z or n
zot	z ot
zou	z o u
zu	z u
zua	z u a
zuah	z u ah
zuai	z u a i
zuaih	z u a ih
zuainn	z unn ann inn
zuainnh	z unn ann innh
zuak	z u ak
zuan	z u a n
zuang	z u a ng
zuann	z unn ann
zuannh	z unn annh
zuat	z u at
zue	z u e
zueh	z u eh
zuei	z u e i
zuenn	z unn enn
zuennh	z unn ennh
zuh	z uh
zui	z u i
zuih	z u ih
zuinn	z unn inn
zuinnh	z unn innh
zuk	z uk
zun	z u n
zung	z u ng
zuo	z u o
zut	z ut
zyu	z yu
zyuan	z yu a n
zyue	z yu e
zyun	z yu n'''	
main()

