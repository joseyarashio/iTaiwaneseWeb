'首先定義位址物件，「 IIS://LocalHost/W3SVC/1/Root」，表示於預設的 Web 站台的主目錄下建立虛擬目錄。
Set ServiceObj = GetObject("IIS://LocalHost/W3SVC/1/Root")

'使用「Create("IISWebVirtualDir","虛擬目錄名稱")」方法，以建立虛擬目錄。
dirName="winTemp"
WScript.Echo("建立虛擬目錄：" & dirName)
Set newVirDir =ServiceObj.Create("IISWebVirtualDir", dirName)

'由Path屬性設定虛擬目錄的實際物理路徑c:\temp。
newVirDir.Path = "c:\temp"

'由EnableDirBrowsing屬性設定虛擬目錄是否允許瀏覽目錄。
newVirDir.EnableDirBrowsing = False

'由AccessRead屬性設定虛擬目錄是否允許讀取。
newVirDir.AccessRead = True
newVirDir.AccessWrite = False

'最後再使用SetInfo方法儲存到Metabase當中。
newVirDir.SetInfo

'======移除虛擬目錄（沒用？）
WScript.Echo("移除虛擬目錄：" & dirName)
Set DirObj = GetObject("IIS://LocalHost/W3SVC/1/Root/" & dirName)
DirObj.AppDelete
Set DirObj = Nothing