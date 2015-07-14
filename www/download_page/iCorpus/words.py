from LGO import *
import re
dic={}
def main(file,word):
	F=open(file,'r',encoding='UTF-8')
	input=F.readlines()
	for i in input:
		if re.search(r'<TongYong>',i):
			i=i.lstrip('\n').rstrip('\n').replace('」','').replace('「','').replace('。','').replace('，','').replace('*','').replace('<TongYong>','').replace(r'</TongYong>','').replace('\t','').replace('！','').replace('）','').replace('（','').replace('；','').replace('，','').replace('、','').replace('-',' ')
			#.replace('-','').replace(' ','')
			#l=LGO.hunHLX(i)
			l=i.split(" ")
			word+=int(len(l))
			for j in l:
				if dic.get(j):
					dic[j]+=1
				else:
					dic[j]=1
	return(word)

words=0
T=os.listdir(os.getcwd())
F=open(r'words.log','w',encoding='UTF-8')
for t in T:
	if not re.search('\.',t) and re.search('\d',t):
		#print(t,words)
		words=main(t,words)
for i in dic.keys():
	print(i,dic[i],sep="\t",file=F)
print(words,file=F)
F.close()
