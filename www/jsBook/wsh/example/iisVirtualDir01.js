// 設定 IIS 的虛擬目錄

//首先定義位址物件，「 IIS://LocalHost/W3SVC/1/Root」，表示於預設的 Web 站台的主目錄下建立虛擬目錄。
ServiceObj = GetObject("IIS://LocalHost/W3SVC/1/Root");

//使用「Create("IISWebVirtualDir","虛擬目錄名稱")」方法，以建立虛擬目錄。
dirName="winTemp";
WScript.Echo("建立虛擬目錄：" + dirName);
newVirDir = ServiceObj.Create("IISWebVirtualDir", dirName);

//由Path屬性設定虛擬目錄的實際物理路徑。 
newVirDir.Path = "c:\\windows\\temp";

//由EnableDirBrowsing屬性設定虛擬目錄是否允許瀏覽目錄。
newVirDir.EnableDirBrowsing = true;

//由AccessRead屬性設定虛擬目錄是否允許讀寫。
newVirDir.AccessRead = true;
newVirDir.AccessWrite = false;

//最後再使用SetInfo方法儲存到Metabase當中。
newVirDir.SetInfo();
