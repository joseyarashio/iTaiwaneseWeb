<script runat=server language=jscript>
function pageHitCounter(){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	counterFile = Request.ServerVariables("PATH_TRANSLATED") + ".cnt";	// 找出記數檔案在硬碟中的實際位置
	fid = fso.OpenTextFile(counterFile, 1);			// 開啟唯讀檔案
	count = fid.ReadLine();					// 從檔案讀出記數資料
	fid.Close();						// 關閉檔案
	count++;						// 增加記數資料
	fid = fso.OpenTextFile(counterFile, 2);			// 開啟檔案並允許寫入
	fid.WriteLine(count);					// 寫入檔案
	fid.Close();						// 關閉檔案
	return(count);
}
</script>

<script runat=server language=vbscript>
Function pageHitCounter
	Set fso = Server.CreateObject("Scripting.FileSystemObject")
	counterFile=Request.ServerVariables("PATH_TRANSLATED") & ".cnt"	' 找出記數檔案在硬碟中的實際位置
	'Response.Write(counterFile)
	Set Out= fso.OpenTextFile(counterFile, 1, FALSE, FALSE)	' 開啟唯讀檔案
	count = Out.ReadLine					' 從檔案讀出記數資料
	Out.Close						' 關閉檔案
	count= count+1						' 增加記數資料
	Set Out= fso.CreateTextFile (counterFile, TRUE, FALSE)	' 開啟檔案並允許寫入
	Out.WriteLine(count)					' 寫入檔案
	Out.Close						' 關閉檔案
	pageHitCounter=count					' 回傳資料
End Function
</script>