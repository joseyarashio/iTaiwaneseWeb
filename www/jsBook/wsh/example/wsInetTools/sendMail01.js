// 使用 wsInetTools.dll 寄送電子郵件。
mail = new ActiveXObject("wsInetTools.SMTP");	// 取得 COM 物件 
mail.MailServer = "wayne.cs.nthu.edu.tw";	// 設定郵件伺服器
// 設定郵件各種性質       
from    = "jang@wayne.cs.nthu.edu.tw";		// 發信人
to      = "jang@cs.nthu.edu.tw";		// 收信人
subject = "Testing wsInetTools";		// 主題
body    = "This is just a test message.\r\n Please ignore it.\r\n\r\nRoger Jang";	// 內文    
mail.SendMail(from, to, subject, body);		// 開始寄發郵件
WScript.Echo("寄送郵件成功！");