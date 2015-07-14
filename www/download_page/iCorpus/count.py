from LGO import *
import re
import xml.etree.ElementTree as XmlET
F=open(r'word.log','w',encoding='UTF-8')
OF=open(r'outword.log','w',encoding='UTF-8')
Html=open(r'word.html','w',encoding='UTF-8')
data=open(r'worddata.log','w',encoding='UTF-8')
dic={}
dic2={}
def main(file):
	print(r'file:'+file)
	f=XmlET.parse(file)
	r0=f.getroot()
	for r1 in r0.getchildren():
		if r1.tag=='content':
			for r2 in r1.getchildren():
				if r2.tag=='s':
					segmen=[]
					TongYong=[]
					texts=""
					for r3 in r2.getchildren():
						if r3.tag=='segmentation':
							segmen=r3.text.lstrip(' ').rstrip(' ').replace('\t','').split(' ')
							texts=r3.text+'//'
						elif r3.tag=='TongYong':
							TongYong=r3.text.lstrip(' ').rstrip(' ').replace('\t','').split(' ')
							texts+=r3.text
					if len(segmen) != len(TongYong):
						print(file,r2.attrib["id"],segmen,TongYong,file=OF)
					else:
						while len(segmen) != 0:
							text=segmen.pop()+'\t'+TongYong.pop()
							text=text.lower()
							if dic.get(text):
								dic[text]+=1
								dic2[text]+=r'%%'+texts
							else:
								dic[text]=1
								dic2[text]=texts
							
T=os.listdir(os.getcwd())
head='''<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>樹狀選單</title>
 <style type="text/css">
<!--
A:hover{background-color:#FFFF80}
A.MainMenu{text-decoration:none;font:30pt;}
A.SubMenu{text-decoration:none;font-weight:normal;font:30pt;} 
DIV.SubMenu{margin-left:20pt}
.cdh{color:#1F1F1F;font:50pt}
-->
</style>
<script language="JavaScript">
<!--
var currentMenu = 1;
function ShowSubMenu(id) {
  if (document.all["SubMenu" + id].style.display == "")
  {
     document.all["SubMenu" + id].style.display = "none";
     currentMenu = 0;
  }
  else
  {
     if (currentMenu != 0) {document.all["SubMenu" + currentMenu].style.display = "none";}  
     document.all["SubMenu" + id].style.display = "";
     currentMenu = id;
  }
}
-->
</script>
</head>

<body>'''
print(head,file=Html)
for t in T:
	if not re.search('\.',t):
		main(t)

for t in dic.keys():
	print(t,dic[t],sep='\t',end='\n',file=F)
i=0
for t in dic2.keys():
	i+=1
	print(r'<table border="0" cellpadding="0" cellspacing="0">',end='\n',file=Html)
	print(r'<tr>',r'<td valign="center">',sep='\n',end='\n',file=Html)
	print(r'<a class="MainMenu" href="JavaScript:ShowSubMenu(',i,r')">',t+'\t',dic[t],r'</a>',sep='',end='\n',file=Html)
	print(r'</td>',r'</tr>',r'</table>',r'<div id="SubMenu'+str(i)+r'" class="SubMenu" style="display:none">',sep='\n',end='\n',file=Html)
	temp=dic2[t].split('%%')
	for t2 in temp:
		print(r'<a class="SubMenu" target="0">'+t2+r'</a><br>',end='\n',file=Html)
	print(r'</div>',end='\n\n',file=Html)
	
	print(t,dic[t],dic2[t],sep='==',end='\n',file=data)
	
print(r'</body>',r'</html>',sep='\n',end='\n',file=Html)
		
F.close()
OF.close()
Html.close()
data.close()