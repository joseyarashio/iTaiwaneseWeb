'首先定義位址物件，「IIS://LocalHost」，表示為整個IIS伺服器。
Set IIsObj = GetObject("IIS://LocalHost") 

'使用「GET」以讀取最大頻寬限制「MaxBandwidth」的屬性值。
MaxBW = IIsObj.Get("MaxBandwidth") 

'或使用「.」以讀取最大頻寬限制「MaxBandwidth」的屬性值。
'MaxBW = IIsObj.MaxBandwidth

'用「WScript.Echo …」，將讀取的顯示於DOS指令行下的畫面。因此顯示-1表示原本未限制最大頻寬。(也就是在 在IIS伺服器的電腦上的 [內容]項目，[啟用頻寬節流設定]這項目沒有打勾)
WScript.Echo "原來最大頻寬 = " & MaxBW

'接著使用「PUT」指令以設定最大頻寬屬性值，設定MaxBandwidth為200 KBytes。
IIsObj.Put "MaxBandwidth", 200 * 1024

'最後再使用SetInfo方法儲存到Metabase當中。
IIsObj.SetInfo 

'再使用「.」以讀取剛剛寫入的MaxBandwidth屬性設定值並顯示出。
MaxBW = IIsObj.MaxBandwidth
WScript.Echo "最大頻寬(設定為200 KBytes) = " & MaxBW