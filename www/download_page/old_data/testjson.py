import json
f=open(r'dictionary2.json',"r",encoding='UTF-8')
dics=json.loads(f.read())
f.close()
print(len(dics))
size=len(dics)
dics.append({})
dics[size]["syllable"]="ziiyu"
dics[size]["meaning"]={}
dics[size]["meaning"]["liao"]={}
#for d0 in dics:
#	if d0['syllable'] == "a1":
		#d0['meaning'].pop("AA1")
		#d0['meaning']["AA1"]={}
		#d0['meaning']["AA1"]["123.trs"]="10"

f = open(r'dictionary2.json',"w",encoding='UTF-8')
print(json.dumps(dics,indent=1),file=f)
f.close()