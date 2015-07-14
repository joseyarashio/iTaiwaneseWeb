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
	temp_file=open(r"temp",'w',encoding='UTF-8')
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
	
	
def 匯出Plot網頁(url_list,dic_list,size,log):
	output="syltest-0.php"
	output_file=open(output,'w',encoding='UTF-8')
	list_file=open('filelist','w',encoding='UTF-8')
	datatemp=open(log,'w',encoding='UTF-8')
	temp='''<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../js/raphael.js"></script>
<script type="text/javascript" src="../js/morris.js"></script>
<link rel="stylesheet" href="../js/morris.css">
<style type="text/css"> 
pre {
  height: 300px;
  overflow: auto;
}
</style> 
<?php
if(@$_POST["submit"]=="篩選"){
	$keys = $_POST ["item1"].$_POST["item2"];
	$times= $_POST["item3"];
	$aCommand= 'c:/Python33/python.exe C:/AppServ/www/download_page/syllable.py '.$times.' - '.$keys;
	$aReturn= system($aCommand);
	echo $aCommand.'<br>';
	echo $aReturn;
	header('Location: http://140.109.18.117/download_page/syltest-0.php');
    exit;
	}
?>
<form method="post" name="myform">
		篩選<br>韻母:
		<select size="1" name="item1" id="sysearch">
			<option value="all">-All-</option>
			<option value="all">-單韻母-</option>
			<option value="a">a</option>
			<option value="i">i</option>
			<option value="u">u</option>
			<option value="e">e</option>
			<option value="or">or</option>
			<option value="o">o</option>
			<option value="all">-複韻母-</option>
			<option value="ai">ai</option>
			<option value="au">au</option>
			<option value="ia">ia</option>
			<option value="iu">iu</option>
			<option value="io">io</option>
			<option value="iau">iau</option>
			<option value="oa">oa</option>
			<option value="oi">oi</option>
			<option value="oe">oe</option>
			<option value="oai">oai</option>
			<option value="ua">ua</option>
			<option value="ui">ui</option>
			<option value="ue">ue</option>
			<option value="uai">uai</option>
		</select>
		<select size="1" name="item2" id="sysearch">
			<option value="">無</option>
			<option value="p">-p</option>
			<option value="t">-t</option>
			<option value="k">-k</option>
			<option value="h">-h</option>
		</select>
		<select size="1" name="item3" id="sysearch">
			<option value="all">all</option>
			<option value="10">10</option>
			<option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
		</select>
		<input name="submit" type="submit" value="篩選"><br>
		<div id="Bar"></div>
		
	</form>
<body>
	<script type="text/javascript">
	$(function(){
		var data =['''
	print(temp,end="\n",file=output_file)
	temps=[]
	#for i in dic.keys():
	#	temps.append(i)
	#temps.sort()
	if size == 'all' or int(size) > len(dic_list):
		size = len(dic_list)
	i=0
	for i in range(int(size)):
		t=dic_list[i].split('&&')
		print( r'			{"syllable": "',t[0],r'","number":',int(t[1]),r'},',end="\n",file=output_file)
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
		print(ul,end="\n",file=datatemp)
		print(ul,end="\n",file=list_file)
	j=1
	print(r'<br>',end="\n",file=output_file)
	for i in dic_list:
		t=i.split('&&')
		print( r'<a href="http://140.109.18.117/download_page/serachfile.html?'+t[0]+r'">',j,"\t",t[0],r' : ',int(t[1]),r'</a>',end="\n",file=output_file)
		print(t[0]+'='+t[1],end="\n",file=datatemp)
		j+=1
	temp='''</pre>
</body>'''
	print(temp,end="\n",file=output_file)
	output_file.close()
	list_file.close()

def 排序字典(dic):
	temps=[]
	for d in dic.keys():
		temps.append("{0:0>5}".format(str(dic[d]))+'&&'+d)
	temps.sort()
	dic_list=[]
	for d in temps:
		t=d.split('&&')
		dic_list.append(t[1]+'&&'+t[0])
	dic_list.reverse()
	return(dic_list)
	
def 篩選(phone):
	key={}
	url=[]
	dlist=[]
	temp=allsyl.split('\n')
	for t in temp:
		temp1=t.split('\t')
		key[temp1[0]]=temp1[1]
	input=open('datatemp','r',encoding='UTF-8')
	lines=input.readlines()
	for line in lines:
		line=line.rstrip("\n")
		if re.search("http",line):
			url.append(line)
		else:
			temp=line.split('=')
			temp2=re.sub("\d$","",temp[0])
			try:
				if re.search(phone,key[temp2]) or phone == 'all':
					dlist.append(temp[0]+"&&"+temp[1])
			except:
				pass
	匯出Plot網頁(url,dlist,sys.argv[1],'datatemp1')
			
#if len(sys.argv) > 1 :
#	for i in range(len(sys.argv)):
#		if i > 0:
#			print(sys.argv[i])
#			網頁讀取(sys.argv[i])
#
allsyl='''a	a sp
ah	ah sp
ai	a i sp
aih	a ih sp
ainn	ann inn sp
ainnh	ann innh sp
ak	ak sp
am	a m sp
an	a n sp
ang	a ng sp
ann	ann sp
annh	annh sp
ap	ap sp
at	at sp
au	a u sp
auh	a uh sp
aunn	ann unn sp
aunnh	ann unnh sp
ba	b a sp
bah	b ah sp
bai	b a i sp
baih	b a ih sp
bainn	b ann inn sp
bainnh	b ann innh sp
bak	b ak sp
bam	b a m sp
ban	b a n sp
bang	b a ng sp
bann	b ann sp
bannh	b annh sp
bap	b ap sp
bat	b at sp
bau	b a u sp
bauh	b a uh sp
baui	b a u i sp
baunn	b ann unn sp
baunnh	b ann unnh sp
be	b e sp
beh	b eh sp
bei	b e i sp
ben	b e n sp
benn	b enn sp
bennh	b ennh sp
bet	b et sp
beu	b e u sp
bi	b i sp
bia	b i a sp
biah	b i ah sp
biak	b i ak sp
biam	b i a m sp
bian	b i a n sp
biang	b i a ng sp
biann	b inn ann sp
biannh	b inn annh sp
biap	b i ap sp
biat	b i at sp
biau	b i a u sp
biauh	b i a uh sp
biaunn	b inn ann unn sp
biaunnh	b inn ann unnh sp
bie	b i e sp
bien	b i e n sp
biet	b i et sp
bih	b ih sp
bik	b ik sp
bim	b i m sp
bin	b i n sp
bing	b i ng sp
binn	b inn sp
binnh	b innh sp
bio	b i o sp
biok	b i ok sp
biong	b i o ng sp
bionn	b inn onn sp
bionnh	b inn onnh sp
bior	b i or sp
biorh	b i orh sp
bip	b ip sp
bit	b it sp
biu	b i u sp
biuh	b i uh sp
biunn	b inn unn sp
biunnh	b inn unnh sp
bng	b ng sp
bnq	b nq sp
bo	b o sp
boh	b oh sp
boi	b o i sp
bok	b ok sp
bom	b o m sp
bong	b o ng sp
bonn	b onn sp
bonnh	b onnh sp
bop	b op sp
bor	b or sp
borh	b orh sp
born	b or n sp
bot	b o t sp
bouh	b o uh sp
bu	b u sp
bua	b u a sp
buah	b u ah sp
buaih	b u a ih sp
buainn	b unn ann inn sp
buainnh	b unn ann innh sp
buak	b u ak sp
buan	b u a n sp
buang	b u a ng sp
buann	b unn ann sp
buannh	b unn annh sp
buat	b u at sp
bue	b u e sp
bueh	b u eh sp
buenn	b unn enn sp
buennh	b unn ennh sp
buh	b uh sp
bui	b u i sp
buih	b u ih sp
buinn	b unn inn sp
buinnh	b unn innh sp
buk	b uk sp
bun	b u n sp
bung	b u ng sp
buo	b u o sp
buoh	b u oh sp
but	b ut sp
ca	c a sp
cah	c ah sp
cai	c a i sp
caih	c a ih sp
cainn	c ann inn sp
cainnh	c ann innh sp
cak	c ak sp
cam	c a m sp
can	c a n sp
cang	c a ng sp
cann	c ann sp
cannh	c annh sp
cap	c ap sp
cat	c at sp
cau	c a u sp
cauh	c a uh sp
caunn	c ann unn sp
caunnh	c ann unnh sp
ce	c e sp
ceh	c eh sp
cen	c e n sp
cenn	c enn sp
cennh	c ennh sp
cet	c et sp
ceu	c e u sp
cha	ch a sp
chai	ch a i sp
chak	ch ak sp
chan	ch a n sp
chang	ch a ng sp
chat	ch at sp
chau	ch a u sp
che	ch e sp
chi	ch i sp
chii	ch ii sp
chim	ch i m sp
chin	ch i n sp
chit	ch it sp
chiu	ch i u sp
chng	ch ng sp
choi	ch o i sp
chok	ch ok sp
chon	ch o n sp
chong	ch o ng sp
chor	ch or sp
chorn	ch or n sp
chou	ch o u sp
chu	ch u sp
chua	ch u a sp
chuai	ch u a i sp
chuan	ch u a n sp
chuang	ch u a ng sp
chuei	ch u e i sp
chui	ch u i sp
chuk	ch uk sp
chun	ch u n sp
chung	ch u ng sp
chuo	ch u o sp
chut	ch ut sp
ci	c i sp
cia	c i a sp
ciah	c i ah sp
ciak	c i ak sp
ciam	c i a m sp
cian	c i a n sp
ciang	c i a ng sp
ciann	c inn ann sp
ciannh	c inn annh sp
ciap	c i ap sp
ciat	c i at sp
ciau	c i a u sp
ciauh	c i a uh sp
ciaunn	c inn ann unn sp
cie	c i e sp
cien	c i e n sp
ciet	c i et sp
cih	c ih sp
cii	c ii sp
ciim	c ii m sp
ciin	c ii n sp
ciit	c ii t sp
cik	c ik sp
cim	c i m sp
cin	c i n sp
cing	c i ng sp
cinn	c inn sp
cinnh	c innh sp
cio	c i o sp
ciok	c i ok sp
cion	c i o n sp
ciong	c i o ng sp
cionn	c inn onn sp
cionnh	c inn onnh sp
cior	c i or sp
ciorh	c i orh sp
ciou	c i o u sp
cip	c ip sp
cit	c it sp
ciu	c i u sp
ciuh	c i uh sp
ciuk	c i uk sp
ciung	c i u ng sp
ciunn	c inn unn sp
ciunnh	c inn unnh sp
cng	c ng sp
cnq	c nq sp
co	c o sp
coh	c oh sp
coi	c o i sp
cok	c ok sp
com	c o m sp
con	c o n sp
cong	c o ng sp
conn	c onn sp
connh	c onnh sp
cop	c op sp
cor	c or sp
corh	c orh sp
corn	c or n sp
cot	c ot sp
cou	c o u sp
cu	c u sp
cua	c u a sp
cuah	c u ah sp
cuai	c u a i sp
cuaih	c u a ih sp
cuainn	c unn ann inn sp
cuainnh	c unn ann innh sp
cuak	c u ak sp
cuan	c u a n sp
cuang	c u a ng sp
cuann	c unn ann sp
cuannh	c unn annh sp
cuat	c u at sp
cue	c u e sp
cueh	c u eh sp
cuei	c u e i sp
cuenn	c unn enn sp
cuennh	c unn ennh sp
cuh	c uh sp
cui	c u i sp
cuih	c u ih sp
cuinn	c unn inn sp
cuinnh	c unn innh sp
cuk	c uk sp
cun	c u n sp
cung	c u ng sp
cuo	c u o sp
cut	c ut sp
cyu	c yu sp
cyuan	c yu a n sp
cyue	c yu e sp
cyuet	c yu et sp
cyun	c yu n sp
da	d a sp
dah	d ah sp
dai	d a i sp
daih	d a ih sp
dainn	d ann inn sp
dainnh	d ann innh sp
dak	d ak sp
dam	d a m sp
dan	d a n sp
dang	d a ng sp
dann	d ann sp
dannh	d annh sp
dap	d ap sp
dat	d at sp
dau	d a u sp
dauh	d a uh sp
daunn	d ann unn sp
daunnh	d ann unnh sp
de	d e sp
deh	d eh sp
dei	d e i sp
dem	d e m sp
den	d e n sp
denn	d enn sp
dennh	d ennh sp
dep	d ep sp
det	d et sp
deu	d e u sp
di	d i sp
dia	d i a sp
diah	d i ah sp
diak	d i ak sp
diam	d i a m sp
dian	d i a n sp
diang	d i a ng sp
diann	d inn ann sp
diannh	d inn annh sp
diap	d i ap sp
diat	d i at sp
diau	d i a u sp
diauh	d i a uh sp
diaunn	d inn ann unn sp
diaunnh	d inn ann unnh sp
die	d i e sp
dien	d i e n sp
diet	d i et sp
dih	d ih sp
dik	d ik sp
dim	d i m sp
din	d i n sp
ding	d i ng sp
dinn	d inn sp
dinnh	d innh sp
dio	d i o sp
dioh	d i oh sp
diok	d i ok sp
diong	d i o ng sp
dionn	d inn onn sp
dionnh	d inn onnh sp
dior	d i or sp
diorh	d i orh sp
diou	d i o u sp
dip	d ip sp
dit	d it sp
diu	d i u sp
diuh	d i uh sp
diunn	d inn unn sp
diunnh	d inn unnh sp
dng	d ng sp
dnq	d nq sp
do	d o sp
doh	d oh sp
doi	d o i sp
dok	d ok sp
dom	d o m sp
don	d o n sp
dong	d o ng sp
donn	d onn sp
dop	d op sp
dor	d or sp
dorh	d orh sp
dorn	d or n sp
dot	d ot sp
dou	d o u sp
du	d u sp
dua	d u a sp
duah	d u ah sp
duai	d u a i sp
duaih	d u a ih sp
duainn	d unn ann inn sp
duainnh	d unn ann innh sp
duak	d u ak sp
duan	d u a n sp
duang	d u a ng sp
duann	d unn ann sp
duannh	d unn annh sp
duat	d u at sp
due	d u e sp
dueh	d u eh sp
duei	d u e i sp
duenn	d unn enn sp
duennh	d unn ennh sp
duh	d uh sp
dui	d u i sp
duih	d u ih sp
duinn	d unn inn sp
duinnh	d unn innh sp
duk	d uk sp
dum	d u m sp
dun	d u n sp
dung	d u ng sp
duo	d u o sp
dut	d ut sp
e	e sp
eh	eh sp
ei	e i sp
em	e m sp
en	e n sp
enn	enn sp
ennh	ennh sp
ep	ep sp
et	et sp
eu	e u sp
fa	f a sp
fai	f a i sp
fak	f ak sp
fam	f a m sp
fan	f a n sp
fang	f a ng sp
fap	f ap sp
fat	f at sp
fe	f e sp
fei	f e i sp
fen	f e n sp
fet	f et sp
feu	f e u sp
fi	f i sp
fin	f i n sp
fit	f it sp
fng	f ng sp
fo	f o sp
foi	f o i sp
fok	f ok sp
fon	f o n sp
fong	f o ng sp
forn	f or n sp
fou	f o u sp
fu	f u sp
fui	f u i sp
fuk	f uk sp
fun	f u n sp
fung	f u ng sp
fuo	f u o sp
fut	f ut sp
ga	g a sp
gah	g ah sp
gai	g a i sp
gaih	g a ih sp
gainn	g ann inn sp
gainnh	g ann innh sp
gak	g ak sp
gam	g a m sp
gan	g a n sp
gang	g a ng sp
gann	g ann sp
gannh	g annh sp
gap	g ap sp
gat	g at sp
gau	g a u sp
gauh	g a uh sp
gaunn	g ann unn sp
gaunnh	g ann unnh sp
ge	g e sp
geh	g eh sp
gei	g e i sp
gen	g e n sp
genn	g enn sp
gennh	g ennh sp
get	g et sp
gi	g i sp
gia	g i a sp
giah	g i ah sp
giak	g i ak sp
giam	g i a m sp
gian	g i a n sp
giang	g i a ng sp
giann	g inn ann sp
giannh	g inn annh sp
giap	g i ap sp
giat	g i at sp
giau	g i a u sp
giauh	g i a uh sp
giaunn	g inn ann unn sp
giaunnh	g inn ann unnh sp
gie	g i e sp
giem	g i e m sp
gien	g i e n sp
giep	g i ep sp
giet	g i et sp
gieu	g i e u sp
gih	g ih sp
gik	g ik sp
gim	g i m sp
gin	g i n sp
ging	g i ng sp
ginn	g inn sp
ginnh	g innh sp
gio	g i o sp
giok	g i ok sp
giong	g i o ng sp
gionn	g inn onn sp
gionnh	g inn onnh sp
gior	g i or sp
giorh	g i orh sp
gip	g ip sp
git	g it sp
giu	g i u sp
giuh	g i uh sp
giuk	g i uk sp
giun	g i u n sp
giung	g i u ng sp
giunn	g inn unn sp
giunnh	g inn unnh sp
gng	g ng sp
gnq	g nq sp
go	g o sp
goh	g oh sp
goi	g o i sp
gok	g ok sp
gom	g o m sp
gon	g o n sp
gong	g o ng sp
gonn	g onn sp
gonnh	g onnh sp
gop	g op sp
gor	g or sp
gorh	g orh sp
gorn	g or n sp
got	g ot sp
gou	g o u sp
gu	g u sp
gua	g u a sp
guah	g u ah sp
guai	g u a i sp
guaih	g u a ih sp
guainn	g unn ann inn sp
guainnh	g unn ann innh sp
guak	g u ak sp
guan	g u a n sp
guang	g u a ng sp
guann	g unn ann sp
guannh	g unn annh sp
guat	g u at sp
gue	g u e sp
gueh	g u eh sp
guei	g u e i sp
guen	g u e n sp
guenn	g unn enn sp
guennh	g unn ennh sp
guet	g u et sp
guh	g uh sp
gui	g u i sp
guih	g u ih sp
guinn	g unn inn sp
guinnh	g unn innh sp
guk	g uk sp
gun	g u n sp
gung	g u ng sp
guo	g u o sp
gut	g ut sp
ha	h a sp
hah	h ah sp
hai	h a i sp
haih	h a ih sp
hainn	h ann inn sp
hainnh	h ann innh sp
hak	h ak sp
ham	h a m sp
han	h a n sp
hang	h a ng sp
hann	h ann sp
hannh	h annh sp
hap	h ap sp
hat	h at sp
hau	h a u sp
hauh	h a uh sp
haunn	h ann unn sp
haunnh	h ann unnh sp
he	h e sp
heh	h eh sp
hei	h e i sp
hem	h e m sp
hen	h e n sp
henn	h enn sp
hennh	h ennh sp
het	h et sp
heu	h e u sp
hi	h i sp
hia	h i a sp
hiah	h i ah sp
hiak	h i ak sp
hiam	h i a m sp
hian	h i a n sp
hiang	h i a ng sp
hiann	h inn ann sp
hiannh	h inn annh sp
hiap	h i ap sp
hiat	h i at sp
hiau	h i a u sp
hiauh	h i a uh sp
hiaunn	h inn ann unn sp
hiaunnh	h inn ann unnh sp
hien	h i e n sp
hiet	h i et sp
hieu	h i e u sp
hih	h ih sp
hik	h ik sp
him	h i m sp
hin	h i n sp
hing	h i ng sp
hinn	h inn sp
hinnh	h innh sp
hio	h i o sp
hiok	h i ok sp
hiong	h i o ng sp
hionn	h inn onn sp
hionnh	h inn onnh sp
hior	h i or sp
hiorh	h i orh sp
hip	h ip sp
hit	h it sp
hiu	h i u sp
hiuh	h i uh sp
hiuk	h i uk sp
hiun	h i u n sp
hiung	h i u ng sp
hiunn	h inn unn sp
hiunnh	h inn unnh sp
hm	h m sp
hmh	h mh sp
hng	h ng sp
hnq	h nq sp
ho	h o sp
hoh	h oh sp
hoi	h o i sp
hok	h ok sp
hom	h o m sp
hon	h o n sp
hong	h o ng sp
honn	h onn sp
honnh	h onnh sp
hop	h op sp
hor	h or sp
horh	h orh sp
horn	h or n sp
hornn	h ornn sp
hot	h ot sp
hou	h o u sp
hu	h u sp
hua	h u a sp
huah	h u ah sp
huai	h u a i sp
huaih	h u a ih sp
huainn	h unn ann inn sp
huainnh	h unn ann innh sp
huak	h u ak sp
huan	h u a n sp
huang	h u a ng sp
huann	h unn ann sp
huannh	h unn annh sp
huat	h u at sp
hue	h u e sp
hueh	h u eh sp
huei	h u e i sp
huenn	h unn enn sp
huennh	h unn ennh sp
huh	h uh sp
hui	h u i sp
huih	h u ih sp
huinn	h unn inn sp
huinnh	h unn innh sp
hun	h u n sp
huo	h u o sp
huoh	h u oh sp
hut	h ut sp
i	i sp
ia	i a sp
iah	i ah sp
iai	i a i sp
iak	i ak sp
iam	i a m sp
ian	i a n sp
iang	i a ng sp
iann	inn ann sp
iannh	inn annh sp
iap	i ap sp
iat	i at sp
iau	i a u sp
iauh	i a uh sp
iaunn	inn ann unn sp
iaunnh	inn ann unnh sp
ie	i e sp
ien	i e n sp
iet	i et sp
ih	ih sp
ik	ik sp
im	i m sp
in	i n sp
ing	i ng sp
inn	inn sp
innh	innh sp
io	i o sp
ioh	i oh sp
iok	i ok sp
iong	i o ng sp
ionn	inn onn sp
ionnh	inn onnh sp
ior	i or sp
iorh	i orh sp
iou	i o u sp
ip	ip sp
it	it sp
iu	i u sp
iuh	i uh sp
iunn	inn unn sp
iunnh	inn unnh sp
ka	k a sp
kah	k ah sp
kai	k a i sp
kaih	k a ih sp
kainn	k ann inn sp
kainnh	k ann innh sp
kak	k ak sp
kam	k a m sp
kan	k a n sp
kang	k a ng sp
kann	k ann sp
kannh	k annh sp
kap	k ap sp
kat	k at sp
kau	k a u sp
kaunn	k ann unn sp
kaunnh	k ann unnh sp
ke	k e sp
keh	k eh sp
ken	k e n sp
kenn	k enn sp
kennh	k ennh sp
ket	k et sp
ki	k i sp
kia	k i a sp
kiah	k i ah sp
kiak	k i ak sp
kiam	k i a m sp
kian	k i a n sp
kiang	k i a ng sp
kiann	k inn ann sp
kiannh	k inn annh sp
kiap	k i ap sp
kiat	k i at sp
kiau	k i a u sp
kiauh	k i a uh sp
kiaunn	k inn ann unn sp
kiaunnh	k inn ann unnh sp
kie	k i e sp
kiem	k i e m sp
kien	k i e n sp
kiep	k i ep sp
kiet	k i et sp
kieu	k i e u sp
kih	k ih sp
kik	k ik sp
kim	k i m sp
kin	k i n sp
king	k i ng sp
kinn	k inn sp
kinnh	k innh sp
kio	k i o sp
kioh	k i oh sp
kioi	k i o i sp
kiok	k i ok sp
kiong	k i o ng sp
kionn	k inn onn sp
kionnh	k inn onnh sp
kior	k i or sp
kiorh	k i orh sp
kip	k ip sp
kit	k it sp
kiu	k i u sp
kiuh	k i uh sp
kiuk	k i uk sp
kiun	k i u n sp
kiung	k i u ng sp
kiunn	k inn unn sp
kiunnh	k inn unnh sp
kiut	k i ut sp
kng	k ng sp
knq	k nq sp
ko	k o sp
koh	k oh sp
koi	k o i sp
kok	k ok sp
kom	k o m sp
kon	k o n sp
kong	k o ng sp
konn	k onn sp
konnh	k onnh sp
kop	k op sp
kor	k or sp
korh	k orh sp
korn	k or n sp
kou	k o u sp
ku	k u sp
kua	k u a sp
kuah	k u ah sp
kuai	k u a i sp
kuaih	k u a ih sp
kuainn	k unn ann inn sp
kuainnh	k unn ann innh sp
kuak	k u ak sp
kuan	k u a n sp
kuang	k u a ng sp
kuann	k unn ann sp
kuannh	k unn annh sp
kuat	k u at sp
kue	k u e sp
kueh	k u eh sp
kuei	k u e i sp
kuenn	k unn enn sp
kuennh	k unn ennh sp
kuh	k uh sp
kui	k u i sp
kuih	k u ih sp
kuinn	k unn inn sp
kuinnh	k unn innh sp
kuk	k uk sp
kun	k u n sp
kung	k u ng sp
kuo	k u o sp
kut	k ut sp
la	l a sp
lah	l ah sp
lai	l a i sp
laih	l a ih sp
lak	l ak sp
lam	l a m sp
lan	l a n sp
lang	l a ng sp
lap	l ap sp
lat	l at sp
lau	l a u sp
lauh	l a uh sp
le	l e sp
leh	l eh sp
lei	l e i sp
lem	l e m sp
len	l e n sp
lep	l ep sp
let	l et sp
leu	l e u sp
li	l i sp
lia	l i a sp
liah	l i ah sp
liak	l i ak sp
liam	l i a m sp
lian	l i a n sp
liang	l i a ng sp
liap	l i ap sp
liat	l i at sp
liau	l i a u sp
liauh	l i a uh sp
lie	l i e sp
lien	l i e n sp
liet	l i et sp
lih	l ih sp
lik	l ik sp
lim	l i m sp
lin	l i n sp
ling	l i ng sp
lio	l i o sp
liok	l i ok sp
lion	l i o n sp
liong	l i o ng sp
lior	l i or sp
liorh	l i orh sp
liou	l i o u sp
lip	l ip sp
lit	l it sp
liu	l i u sp
liuh	l i uh sp
liuk	l i uk sp
liung	l i u ng sp
lng	l ng sp
lo	l o sp
loh	l oh sp
loi	l o i sp
lok	l ok sp
lom	l o m sp
lon	l o n sp
long	l o ng sp
lop	l op sp
lor	l or sp
lorh	l orh sp
lot	l ot sp
lou	l o u sp
lu	l u sp
lua	l u a sp
luah	l u ah sp
luai	l u a i sp
luaih	l u a ih sp
luak	l u ak sp
luan	l u a n sp
luang	l u a ng sp
luat	l u at sp
lue	l u e sp
lueh	l u eh sp
luh	l uh sp
lui	l u i sp
luih	l u ih sp
luk	l uk sp
lun	l u n sp
lung	l u ng sp
luo	l u o sp
lut	l ut sp
lyu	l yu sp
lyuan	l yu a n sp
lyue	l yu e sp
lyun	l yu n sp
m	m sp
ma	m ann sp
mah	m annh sp
mai	m ann inn sp
maih	m ann innh sp
mak	m annk sp
mam	m ann m sp
man	m ann n sp
mang	m ann ng sp
mat	m annt sp
mau	m ann unn sp
mauh	m ann unnh sp
me	m enn sp
meh	m ennh sp
mei	m enn inn sp
men	m enn n sp
met	m ennt sp
meu	m enn unn sp
mh	mh sp
mi	m inn sp
mia	m inn ann sp
miah	m inn annh sp
miang	m inn ann ng sp
miau	m inn ann unn sp
miauh	m inn ann unnh sp
mie	m inn enn sp
mien	m inn enn n sp
miet	m inn ennt sp
mih	m innh sp
min	m inn n sp
ming	m inn ng sp
mio	m inn onn sp
mioh	m inn onnh sp
miong	m inn onn ng sp
miou	m inn onn unn sp
miu	m inn unn sp
miuh	m inn unnh sp
mng	m ng sp
mnq	m nq sp
mo	m onn sp
moh	m onnh sp
moi	m onn inn sp
mok	m onnk sp
mong	m onn ng sp
mor	m ornn sp
morh	m ornnh sp
morn	m ornn n sp
mornh	m ornn nh sp
mou	m onn unn sp
mu	m unn sp
mua	m unn ann sp
muah	m unn annh sp
muai	m unn ann inn sp
muaih	m unn ann innh sp
muan	m unn ann n sp
mue	m unn enn sp
mueh	m unn ennh sp
mui	m unn inn sp
muih	m unn innh sp
muk	m unnk sp
mun	m unn n sp
mung	m unn ng sp
muo	m unn onn sp
muoh	m unn onnh sp
mut	m unnt sp
n	n sp
na	n ann sp
nah	n annh sp
nai	n ann inn sp
naih	n ann innh sp
nak	n annk sp
nam	n ann m sp
nan	n ann n sp
nang	n ann ng sp
nanq	n ann nq sp
nap	n annp sp
nat	n annt sp
nau	n ann unn sp
nauh	n ann unnh sp
ne	n enn sp
neh	n ennh sp
nei	n enn inn sp
nem	n enn m sp
nen	n enn n sp
net	n ennt sp
neu	n enn unn sp
ng	ng sp
nga	ng ann sp
ngah	ng annh sp
ngai	ng ann inn sp
ngaih	ng ann innh sp
ngam	ng ann m sp
ngan	ng ann n sp
ngang	ng ann ng sp
ngap	ng annp sp
ngat	ng annt sp
ngau	ng ann unn sp
ngauh	ng ann unnh sp
nge	ng enn sp
ngeh	ng ennh sp
ngi	ng inn sp
ngia	ng inn ann sp
ngiah	ng inn annh sp
ngiak	ng inn annk sp
ngiam	ng inn ann m sp
ngiang	ng inn ann ng sp
ngiap	ng inn annp sp
ngiau	ng inn ann unn sp
ngiauh	ng inn ann unnh sp
ngie	ng inn enn sp
ngiem	ng inn enn m sp
ngien	ng inn enn n sp
ngiet	ng inn ennt sp
ngieu	ng inn enn unn sp
ngih	ng innh sp
ngim	ng inn m sp
ngin	ng inn n sp
nging	ng inn ng sp
ngio	ng inn onn sp
ngioh	ng inn onnh sp
ngiok	ng inn onnk sp
ngion	ng inn onn n sp
ngiong	ng inn onn ng sp
ngip	ng innp sp
ngit	ng innt sp
ngiu	ng inn unn sp
ngiuh	ng inn unnh sp
ngiuk	ng inn unnk sp
ngiun	ng inn unn n sp
ngiung	ng inn unn ng sp
ngo	ng onn sp
ngoh	ng onnh sp
ngoi	ng onn inn sp
ngok	ng onnk sp
ngong	ng onn ng sp
ngor	ng ornn sp
ngu	ng unn sp
ngua	ng unn ann sp
nguah	ng unn annh sp
nguai	ng unn ann inn sp
nguaih	ng unn ann innh sp
nguan	ng unn ann n sp
ngue	ng unn enn sp
ngueh	ng unn ennh sp
ngui	ng unn inn sp
ngut	ng unnt sp
ni	n inn sp
nia	n inn ann sp
niah	n inn annh sp
niam	n inn ann m sp
niang	n inn ann ng sp
niau	n inn ann unn sp
niauh	n inn ann unnh sp
nie	n inn enn sp
nien	n inn enn n sp
nih	n innh sp
nim	n inn m sp
nin	n inn n sp
ning	n inn ng sp
nio	n inn onn sp
nioh	n inn onnh sp
nioorh	n inn onn ornnh sp
nior	n inn ornn sp
niou	n inn onn unn sp
nit	n innt sp
niu	n inn unn sp
niuh	n inn unnh sp
niunn	n inn unn sp
nng	n ng sp
nnq	n nq sp
no	n onn sp
noh	n onnh sp
nok	n onnk sp
non	n onn n sp
nong	n onn ng sp
nor	n ornn sp
norh	n ornnh sp
norn	n ornn n sp
nou	n onn unn sp
nq	nq sp
nqo	nq o sp
nu	n unn sp
nua	n unn ann sp
nuah	n unn annh sp
nuai	n unn ann inn sp
nuaih	n unn ann innh sp
nuan	n unn ann n sp
nue	n unn enn sp
nueh	n unn ennh sp
nuh	n unnh sp
nui	n unn inn sp
nuih	n unn innh sp
nuk	n unnk sp
nun	n unn n sp
nung	n unn ng sp
nuo	n unn onn sp
nyu	n yu sp
nyue	n yu enn sp
o	o sp
oh	oh sp
oi	o i sp
ok	ok sp
om	o m sp
on	o n sp
ong	o ng sp
onn	onn sp
onnh	onnh sp
op	op sp
or	or sp
orh	orh sp
orn	or n sp
ornn	ornn sp
orr	orr sp
ot	ot sp
ou	o u sp
pa	p a sp
pah	p ah sp
pai	p a i sp
paih	p a ih sp
painn	p ann inn sp
painnh	p ann innh sp
pak	p ak sp
pam	p a m sp
pan	p a n sp
pang	p a ng sp
pann	p ann sp
pannh	p annh sp
pap	p ap sp
pat	p at sp
pau	p a u sp
pauh	p a uh sp
paunn	p ann unn sp
paunnh	p ann unnh sp
pe	p e sp
peh	p eh sp
pei	p e i sp
pen	p e n sp
penn	p enn sp
pennh	p ennh sp
pet	p et sp
peu	p e u sp
pi	p i sp
pia	p i a sp
piah	p i ah sp
piak	p i ak sp
piam	p i a m sp
pian	p i a n sp
piang	p i a ng sp
piann	p inn ann sp
piannh	p inn annh sp
piap	p i ap sp
piat	p i at sp
piau	p i a u sp
piauh	p i a uh sp
piaunn	p inn ann unn sp
piaunnh	p inn ann unnh sp
pie	p i e sp
pien	p i e n sp
piet	p i et sp
pih	p ih sp
pik	p ik sp
pim	p i m sp
pin	p i n sp
ping	p i ng sp
pinn	p inn sp
pinnh	p innh sp
pio	p i o sp
piok	p i ok sp
piong	p i o ng sp
pionn	p inn onn sp
pionnh	p inn onnh sp
pior	p i or sp
piorh	p i orh sp
pip	p ip sp
pit	p it sp
piu	p i u sp
piuh	p i uh sp
piunn	p inn unn sp
piunnh	p inn unnh sp
png	p ng sp
pnq	p nq sp
po	p o sp
poh	p oh sp
poi	p o i sp
pok	p ok sp
pom	p o m sp
pon	p o n sp
pong	p o ng sp
ponn	p onn sp
ponnh	p onnh sp
pop	p op sp
por	p or sp
porh	p orh sp
porn	p or n sp
pou	p o u sp
pu	p u sp
pua	p u a sp
puah	p u ah sp
puai	p u a i sp
puaih	p u a ih sp
puainn	p unn ann inn sp
puainnh	p unn ann innh sp
puak	p u ak sp
puan	p u a n sp
puang	p u a ng sp
puann	p unn ann sp
puannh	p unn annh sp
puat	p u at sp
pue	p u e sp
pueh	p u eh sp
puenn	p unn enn sp
puennh	p unn ennh sp
puh	p uh sp
pui	p u i sp
puih	p u ih sp
puinn	p unn inn sp
puinnh	p unn innh sp
puk	p uk sp
pun	p u n sp
pung	p u ng sp
puo	p u o sp
put	p ut sp
qa	q a sp
qah	q ah sp
qai	q a i sp
qaih	q a ih sp
qak	q ak sp
qam	q a m sp
qan	q a n sp
qang	q a ng sp
qap	q ap sp
qat	q at sp
qau	q a u sp
qauh	q a uh sp
qe	q e sp
qeh	q eh sp
qen	q e n sp
qet	q et sp
qi	q i sp
qia	q i a sp
qiah	q i ah sp
qiak	q i ak sp
qiam	q i a m sp
qian	q i a n sp
qiang	q i a ng sp
qiap	q i ap sp
qiat	q i at sp
qiau	q i a u sp
qiauh	q i a uh sp
qien	q i e n sp
qiet	q i et sp
qih	q ih sp
qik	q ik sp
qim	q i m sp
qin	q i n sp
qing	q i ng sp
qiok	q i ok sp
qiong	q i o ng sp
qior	q i or sp
qiorh	q i orh sp
qip	q ip sp
qit	q it sp
qiu	q i u sp
qiuh	q i uh sp
qng	q ng sp
qnq	q nq sp
qo	q o sp
qoh	q oh sp
qok	q ok sp
qom	q o m sp
qong	q o ng sp
qonn	q onn sp
qop	q op sp
qor	q or sp
qorh	q orh sp
qu	q u sp
qua	q u a sp
quah	q u ah sp
quai	q u a i sp
quaih	q u a ih sp
quak	q u ak sp
quan	q u a n sp
quang	q u a ng sp
quat	q u at sp
que	q u e sp
queh	q u eh sp
quh	q uh sp
qui	q u i sp
quih	q u ih sp
qun	q u n sp
qut	q ut sp
ra	r a sp
rah	r ah sp
rai	r a i sp
raih	r a ih sp
rainn	r ann inn sp
rainnh	r ann innh sp
rak	r ak sp
ram	r a m sp
ran	r a n sp
rang	r a ng sp
rann	r ann sp
rannh	r annh sp
rap	r ap sp
rat	r at sp
rau	r a u sp
rauh	r a uh sp
raunn	r ann unn sp
raunnh	r ann unnh sp
re	r e sp
reh	r eh sp
ren	r e n sp
renn	r enn sp
rennh	r ennh sp
ret	r et sp
rha	rh a sp
rhai	rh a i sp
rhak	rh ak sp
rham	rh a m sp
rhan	rh a n sp
rhang	rh a ng sp
rhap	rh ap sp
rhat	rh at sp
rhau	rh a u sp
rhe	rh e sp
rhi	rh i sp
rhii	rh ii sp
rhim	rh i m sp
rhin	rh i n sp
rhit	rh it sp
rhiu	rh i u sp
rhm	rh m sp
rhng	rh ng sp
rhok	rh ok sp
rhong	rh o ng sp
rhor	rh or sp
rhorn	rh or n sp
rhou	rh o u sp
rhu	rh u sp
rhuan	rh u a n sp
rhuei	rh u e i sp
rhui	rh u i sp
rhuk	rh uk sp
rhun	rh u n sp
rhung	rh u ng sp
rhuo	rh u o sp
ri	r i sp
ria	r i a sp
riah	r i ah sp
riak	r i ak sp
riam	r i a m sp
rian	r i a n sp
riang	r i a ng sp
riann	r inn ann sp
riannh	r inn annh sp
riap	r i ap sp
riat	r i at sp
riau	r i a u sp
riauh	r i a uh sp
riaunn	r inn ann unn sp
riaunnh	r inn ann unnh sp
rien	r i e n sp
riet	r i et sp
rih	r ih sp
rii	r ii sp
rik	r ik sp
rim	r i m sp
rin	r i n sp
ring	r i ng sp
rinn	r inn sp
rinnh	r innh sp
rio	r i o sp
riok	r i ok sp
riong	r i o ng sp
rionn	r inn onn sp
rionnh	r inn onnh sp
rior	r i or sp
riorh	r i orh sp
rip	r ip sp
rit	r it sp
riu	r i u sp
riuh	r i uh sp
riunn	r inn unn sp
riunnh	r inn unnh sp
rng	r ng sp
rnq	r nq sp
ro	r o sp
roh	r oh sp
rok	r ok sp
rom	r o m sp
rong	r o ng sp
ronn	r onn sp
ronnh	r onnh sp
rop	r op sp
ror	r or sp
rorh	r orh sp
rorn	r or n sp
ru	r u sp
rua	r u a sp
ruah	r u ah sp
ruai	r u a i sp
ruaih	r u a ih sp
ruainn	r unn ann inn sp
ruainnh	r unn ann innh sp
ruak	r u ak sp
ruan	r u a n sp
ruang	r u a ng sp
ruann	r unn ann sp
ruannh	r unn annh sp
ruat	r u at sp
rue	r u e sp
rueh	r u eh sp
ruenn	r unn enn sp
ruennh	r unn ennh sp
ruh	r uh sp
rui	r u i sp
ruih	r u ih sp
ruinn	r unn inn sp
ruinnh	r unn innh sp
run	r u n sp
ruo	r u o sp
rut	r ut sp
s	s sp
sa	s a sp
sah	s ah sp
sai	s a i sp
saih	s a ih sp
sain	s a i n sp
sainn	s ann inn sp
sainnh	s ann innh sp
sak	s ak sp
sam	s a m sp
san	s a n sp
sang	s a ng sp
sann	s ann sp
sannh	s annh sp
sap	s ap sp
sat	s at sp
sau	s a u sp
sauh	s a uh sp
saunn	s ann unn sp
saunnh	s ann unnh sp
se	s e sp
seh	s eh sp
sei	s e i sp
sem	s e m sp
sen	s e n sp
senn	s enn sp
sennh	s ennh sp
sep	s ep sp
set	s et sp
seu	s e u sp
sha	sh a sp
shai	sh a i sp
shak	sh ak sp
sham	sh a m sp
shan	sh a n sp
shang	sh a ng sp
shanq	sh a nq sp
shap	sh ap sp
shat	sh at sp
shau	sh a u sp
she	sh e sp
shei	sh e i sp
shi	sh i sp
shii	sh ii sp
shiih	sh iih sp
shim	sh i m sp
shin	sh i n sp
ship	sh ip sp
shit	sh it sp
shiu	sh i u sp
shng	sh ng sp
shoi	sh o i sp
shok	sh ok sp
shon	sh o n sp
shong	sh o ng sp
shor	sh or sp
shorn	sh or n sp
shot	sh ot sp
shou	sh o u sp
shu	sh u sp
shua	sh u a sp
shuai	sh u a i sp
shuan	sh u a n sp
shuang	sh u a ng sp
shuei	sh u e i sp
shui	sh u i sp
shuk	sh uk sp
shun	sh u n sp
shuo	sh u o sp
si	s i sp
sia	s i a sp
siah	s i ah sp
siak	s i ak sp
siam	s i a m sp
siang	s i a ng sp
siann	s inn ann sp
siannh	s inn annh sp
siap	s i ap sp
siat	s i at sp
siau	s i a u sp
siauh	s i a uh sp
siaunn	s inn ann unn sp
siaunnh	s inn ann unnh sp
sie	s i e sp
sien	s i e n sp
siet	s i et sp
sih	s ih sp
sii	s ii sp
siim	s ii m sp
siin	s ii n sp
siip	s iip sp
siit	s iit sp
sik	s ik sp
sim	s i m sp
simh	s i mh sp
sin	s i n sp
sing	s i ng sp
sinn	s inn sp
sinnh	s innh sp
sio	s i o sp
sioh	s i oh sp
siok	s i ok sp
siong	s i o ng sp
sionn	s inn onn sp
sionnh	s inn onnh sp
sior	s i or sp
siorh	s i orh sp
siou	s i o u sp
sip	s ip sp
sit	s it sp
siu	s i u sp
siuh	s i uh sp
siuk	s i uk sp
siun	s i u n sp
siung	s i u ng sp
siunn	s inn unn sp
siunnh	s inn unnh sp
siut	s i ut sp
sng	s ng sp
snq	s nq sp
so	s o sp
soh	s oh sp
soi	s o i sp
sok	s ok sp
som	s o m sp
son	s o n sp
song	s o ng sp
sonn	s onn sp
sonnh	s onnh sp
sop	s op sp
sor	s or sp
sorh	s orh sp
sorn	s or n sp
sot	s ot sp
sou	s o u sp
su	s u sp
sua	s u a sp
suah	s u ah sp
suai	s u a i sp
suaih	s u a ih sp
suainn	s unn ann inn sp
suainnh	s unn ann innh sp
suak	s u ak sp
suan	s u a n sp
suang	s u a ng sp
suann	s unn ann sp
suannh	s unn annh sp
suat	s u at sp
sue	s u e sp
sueh	s u eh sp
suei	s u e i sp
suenn	s unn enn sp
suennh	s unn ennh sp
suh	s uh sp
sui	s u i sp
suih	s u ih sp
suinn	s unn inn sp
suinnh	s unn innh sp
suk	s uk sp
sun	s u n sp
sung	s u ng sp
suo	s u o sp
sut	s ut sp
syu	s yu sp
syuan	s yu a n sp
syue	s yu e sp
syun	s yu n sp
ta	t a sp
tah	t ah sp
tai	t a i sp
taih	t a ih sp
tainn	t ann inn sp
tainnh	t ann innh sp
tak	t ak sp
tam	t a m sp
tan	t a n sp
tang	t a ng sp
tann	t ann sp
tannh	t annh sp
tap	t ap sp
tat	t at sp
tau	t a u sp
tauh	t a uh sp
taunn	t ann unn sp
taunnh	t ann unnh sp
te	t e sp
teh	t eh sp
ten	t e n sp
tenn	t enn sp
tennh	t ennh sp
tet	t et sp
teu	t e u sp
ti	t i sp
tia	t i a sp
tiah	t i ah sp
tiak	t i ak sp
tiam	t i a m sp
tian	t i a n sp
tiang	t i a ng sp
tiann	t inn ann sp
tiannh	t inn annh sp
tiap	t i ap sp
tiat	t i at sp
tiau	t i a u sp
tiauh	t i a uh sp
tiaunn	t inn ann unn sp
tiaunnh	t inn ann unnh sp
tie	t i e sp
tien	t i e n sp
tiet	t i et sp
tih	t ih sp
tik	t ik sp
tim	t i m sp
tin	t i n sp
ting	t i ng sp
tinn	t inn sp
tinnh	t innh sp
tio	t i o sp
tiok	t i ok sp
tiong	t i o ng sp
tionn	t inn onn sp
tionnh	t inn onnh sp
tior	t i or sp
tiorh	t i orh sp
tip	t ip sp
tit	t it sp
tiu	t i u sp
tiuh	t i uh sp
tiunn	t inn unn sp
tiunnh	t inn unnh sp
tng	t ng sp
tnq	t nq sp
to	t o sp
toh	t oh sp
toi	t o i sp
tok	t ok sp
tom	t o m sp
ton	t o n sp
tong	t o ng sp
tonn	t onn sp
tonnh	t onnh sp
top	t op sp
tor	t or sp
torh	t orh sp
tot	t ot sp
tou	t o u sp
touh	t o uh sp
tu	t u sp
tua	t u a sp
tuah	t u ah sp
tuai	t u a i sp
tuaih	t u a ih sp
tuainn	t unn ann inn sp
tuainnh	t unn ann innh sp
tuak	t u ak sp
tuan	t u a n sp
tuang	t u a ng sp
tuann	t unn ann sp
tuannh	t unn annh sp
tuat	t u at sp
tue	t u e sp
tueh	t u eh sp
tuei	t u e i sp
tuenn	t unn enn sp
tuennh	t unn ennh sp
tuh	t uh sp
tui	t u i sp
tuih	t u ih sp
tuinn	t unn inn sp
tuinnh	t unn innh sp
tuk	t uk sp
tun	t u n sp
tung	t u ng sp
tuo	t u o sp
tut	t ut sp
u	u sp
ua	u a sp
uah	u ah sp
uai	u a i sp
uaih	u a ih sp
uainn	unn ann inn sp
uainnh	unn ann innh sp
uak	u ak sp
uan	u a n sp
uang	u a ng sp
uann	unn ann sp
uannh	u annh sp
uat	u at sp
ue	u e sp
ueh	u eh sp
uei	u e i sp
uenn	unn enn sp
uennh	unn enn sp
uh	uh sp
ui	u i sp
uih	u ih sp
uinn	unn inn sp
uinnh	unn innh sp
un	u n sp
ung	u ng sp
unn	unn sp
unnh	unnh sp
uo	u o sp
ut	ut sp
va	v a sp
va	v a sp
vah	v ah sp
vai	v a i sp
vai	v a i sp
vaih	v a ih sp
vak	v ak sp
vak	v ak sp
vam	v a m sp
van	v a n sp
van	v a n sp
vang	v a ng sp
vang	v a ng sp
vap	v ap sp
vat	v at sp
vat	v at sp
vau	v a u sp
vauh	v a uh sp
ve	v e sp
ve	v e sp
veh	v eh sp
ven	v e n sp
ven	v e n sp
vet	v et sp
vet	v et sp
vi	v i sp
vi	v i sp
via	v i a sp
viah	v i ah sp
viak	v i ak sp
viam	v i a m sp
vian	v i a n sp
viang	v i a ng sp
viap	v i ap sp
viat	v i at sp
viau	v i a u sp
viauh	v i a uh sp
vien	v i e n sp
viet	v i et sp
vih	v ih sp
vik	v ik sp
vim	v i m sp
vin	v i n sp
ving	v i ng sp
vio	v i o sp
viok	v i ok sp
viong	v i o ng sp
vior	v i or sp
viorh	v i orh sp
vip	v ip sp
vit	v it sp
vit	v it sp
viu	v i u sp
viuh	v i uh sp
vng	v ng sp
vnq	v nq sp
vo	v o sp
vo	v o sp
voh	v oh sp
voi	v o i sp
voi	v o i sp
vok	v ok sp
vok	v ok sp
vom	v o m sp
von	v o n sp
von	v o n sp
vong	v o ng sp
vong	v o ng sp
vop	v op sp
vor	v or sp
vorh	v orh sp
vu	v u sp
vu	v u sp
vua	v u a sp
vuah	v u ah sp
vuai	v u a i sp
vuaih	v u a ih sp
vuak	v u ak sp
vuan	v u a n sp
vuang	v u a ng sp
vuat	v u at sp
vue	v u e sp
vueh	v u eh sp
vuh	v uh sp
vui	v u i sp
vuih	v u ih sp
vuk	v uk sp
vuk	v uk sp
vun	v u n sp
vun	v u n sp
vung	v u ng sp
vung	v u ng sp
vut	v ut sp
vut	v ut sp
ya	i a sp
yak	i ak sp
yam	i a m sp
yang	i a ng sp
yap	i ap sp
ye	i e sp
yen	i e n sp
yet	i et sp
yeu	i e u sp
yi	i sp
yiang	i a ng sp
yien	i e n sp
yiet	i et sp
yim	i m sp
yin	i n sp
yiong	i o ng sp
yip	ip sp
yit	it sp
yiu	i u sp
yiui	i u i sp
yiuk	i uk sp
yiun	i u n sp
yiung	i u ng sp
yiut	i ut sp
yok	i ok sp
yong	i o ng sp
yu	yu sp
yua	yu a sp
yuan	yu a n sp
yue	yu e sp
yun	yu n sp
yung	yu ng sp
yut	i ut sp
z	z sp
za	z a sp
zah	z ah sp
zai	z a i sp
zaih	z a ih sp
zainn	z ann inn sp
zainnh	z ann innh sp
zak	z ak sp
zam	z a m sp
zan	z a n sp
zang	z a ng sp
zann	z ann sp
zannh	z annh sp
zap	z ap sp
zat	z at sp
zau	z a u sp
zauh	z a uh sp
zaunn	z ann unn sp
zaunnh	z ann unnh sp
ze	z e sp
zeh	z eh sp
zei	z e i sp
zem	z e m sp
zen	z e n sp
zenn	z enn sp
zennh	z ennh sp
zep	z ep sp
zet	z et sp
zeu	z e u sp
zha	zh a sp
zhai	zh a i sp
zhak	zh ak sp
zham	zh a m sp
zhan	zh a n sp
zhang	zh a ng sp
zhap	zh ap sp
zhat	zh at sp
zhau	zh a u sp
zhe	zh e sp
zhei	zh e i sp
zhep	zh ep sp
zhi	zh i sp
zhii	zh ii sp
zhim	zh i m sp
zhin	zh i n sp
zhip	zh ip sp
zhit	zh it sp
zhiu	zh i u sp
zhng	zh ng sp
zhoi	zh o i sp
zhok	zh ok sp
zhon	zh o n sp
zhong	zh o ng sp
zhor	zh or sp
zhorh	zh orh sp
zhorn	zh or n sp
zhot	zh ot sp
zhou	zh o u sp
zhu	zh u sp
zhua	zh u a sp
zhuai	zh u a i sp
zhuan	zh u a n sp
zhuang	zh u a ng sp
zhuei	zh u e i sp
zhui	zh u i sp
zhuk	zh uk sp
zhun	zh u n sp
zhung	zh u ng sp
zhuo	zh u o sp
zi	z i sp
zia	z i a sp
ziah	z i ah sp
ziak	z i ak sp
ziam	z i a m sp
zian	z i a n sp
ziang	z i a ng sp
ziann	z inn ann sp
ziannh	z inn annh sp
ziap	z i ap sp
ziat	z i at sp
ziau	z i a u sp
ziauh	z i a uh sp
ziaunn	z inn ann unn sp
ziaunnh	z inn ann unnh sp
zie	z i e sp
zien	z i e n sp
ziet	z i et sp
zih	z ih sp
zii	z ii sp
ziih	z iih sp
ziim	z ii m sp
ziin	z ii n sp
ziip	z iip sp
ziit	z iit sp
zik	z ik sp
zim	z i m sp
zin	z i n sp
zing	z i ng sp
zinn	z inn sp
zinnh	z innh sp
zio	z i o sp
zioh	z i oh sp
ziok	z i ok sp
ziong	z i o ng sp
zionn	z inn onn sp
zionnh	z inn onnh sp
zior	z i or sp
ziorh	z i orh sp
ziot	z i ot sp
ziou	z i o u sp
zip	z ip sp
zit	z it sp
ziu	z i u sp
ziuh	z i uh sp
ziuk	z i uk sp
ziung	z i u ng sp
ziunn	z inn unn sp
ziunnh	z inn unnh sp
zng	z ng sp
znq	z nq sp
zo	z o sp
zoh	z oh sp
zoi	z o i sp
zok	z ok sp
zom	z o m sp
zon	z o n sp
zong	z o ng sp
zonn	z onn sp
zop	z op sp
zor	z or sp
zorh	z orh sp
zorn	z or n sp
zot	z ot sp
zou	z o u sp
zu	z u sp
zua	z u a sp
zuah	z u ah sp
zuai	z u a i sp
zuaih	z u a ih sp
zuainn	z unn ann inn sp
zuainnh	z unn ann innh sp
zuak	z u ak sp
zuan	z u a n sp
zuang	z u a ng sp
zuann	z unn ann sp
zuannh	z unn annh sp
zuat	z u at sp
zue	z u e sp
zueh	z u eh sp
zuei	z u e i sp
zuenn	z unn enn sp
zuennh	z unn ennh sp
zuh	z uh sp
zui	z u i sp
zuih	z u ih sp
zuinn	z unn inn sp
zuinnh	z unn innh sp
zuk	z uk sp
zun	z u n sp
zung	z u ng sp
zuo	z u o sp
zut	z ut sp
zyu	z yu sp
zyuan	z yu a n sp
zyue	z yu e sp
zyun	z yu n sp'''	

print(sys.argv[1])
#sys.argv[1]:功能選擇 1:出現次數排序,前50
if sys.argv[2] != "-":
	url_list=sys.argv[2].split("+")
	for ul in url_list:
		網頁讀取(ul)
	#if sys.argv[1] == '1':
	dic_list=排序字典(dic)
	匯出Plot網頁(url_list,dic_list,sys.argv[1],'datatemp')
	print("finish")
else:
	篩選(sys.argv[3])
	print("finish")
print("over")
#main('20110811-zy-120407.trs')
