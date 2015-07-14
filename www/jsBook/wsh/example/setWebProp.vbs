'首先定義位址物件，「 IIS://LocalHost/W3SVC/1/Root」，表示為預設的 Web 站台的主目錄。
Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1/Root") 

'使用「GET」以讀取AccessRead和AccessWrite屬性的值。
gRead = IIsObj.Get("AccessRead") 
gWrite = IIsObj.Get("AccessWrite") 

'使用「WScript.Echo …」，將讀取的顯示於DOS指令行下的畫面。
'因此顯示-1（可讀取）和0（不可寫入）。(顯示第一次結果)
WScript.Echo "AccessRead = " & gRead
WScript.Echo "AccessWrite = " & gWrite

'接著使用「PUT」指令以設定屬性值，設定AccessRead和AccessWrite為False。(第一次初值設定完成)
IIsObj.Put "AccessRead", False 
IIsObj.Put "AccessWrite", False 

'最後再使用SetInfo方法儲存到Metabase當中。 
IIsObj.SetInfo 

'再使用「.」以讀取剛剛寫入的AccessRead和AccessWrite屬性設定值。
gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

'使用「WScript.Echo …」，將讀取的顯示於DOS指令行下的畫面。因此顯示0（不可讀取）和0（不可寫入）。(顯示第二次結果)
WScript.Echo "AccessRead(False) = " & gRead
WScript.Echo "AccessWrite(False) = " & gWrite

'最後使用「.」指令以設定屬性值，設定AccessRead和AccessWrite為原來的值。並讀取顯示出來。 (第二次初值設定完成)
IIsObj.AccessRead = True 
IIsObj.AccessWrite = False 
IIsObj.SetInfo 

gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

'顯示第三次結果
WScript.Echo "AccessRead(True) = " & gRead
WScript.Echo "AccessWrite(False) = " & gWrite 

