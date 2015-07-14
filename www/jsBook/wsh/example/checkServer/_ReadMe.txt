
                      #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
                      #     檢測伺服器服務狀況程式    #
                      #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
                                                                   2002-02-15  ahpei
------------------------------------------------------------------------------------

step 1 : 安裝 JMail元件 - 執行 "w3JMail43Personal.exe"

step 2 : 安裝 Dynu元件 - 將 Dynu.dll 複製到 (WinDir)\System32 
                         , 再執行 regsvr32 system32\Dynu.dll

step 3 : 修改 CheckServer.mdb 資料庫 -

	1. ServerList - 要檢查之Server資料表

		* ServerIP - 要檢查之Server IP
		* WebServer - 要檢查之Web Server網址
		* Ping - 是否要Ping該IP,是為1,否為0
		* Web - 是否檢查WebServer,是為1,否為0
		* Mail - 是否要檢查該MailServer,是為1,否為0
		* RecordStatus - 有效/作廢

	2. PhoneList - 送簡訊的資料表

		* CALL_NO - 手機第2~4碼
		* RECEIVER_NO - 手機第5~8碼
		* RecordStatus - 有效/作廢

	3. EmailList - 送Email的資料表

		* Email - 電子郵件
		* RecordStatus - 有效/作廢

	4. EmailAndSMSLog - 出現錯誤時記錄的資料表 (Log,不必修改)

		* ServerHost - 哪一個Server
		* SendEmail - Email內容
		* SendSMS - 簡訊內容
		* EmailResult - Email是否成功送出
		* SMSResult - 簡訊是否成功送出
		* SendStatus - 送出/保留    (在60分鐘內已送出三次就保留)
		* RecordStatus - 有效/作廢

	5. CheckLog - 每次檢查記錄的資料表 (Log,不必修改)

		* ServerHost - 哪一個Server
		* PingLog - Ping的回傳
		* WebLog - WebServer的回傳
		* MailLog - MailServer的回傳
		* ServerStatus - true/false  ( 正常/出錯 )
		* RecordStatus - 有效/作廢
	
step 4 : 設定主要檢測程式 - 打開 ChkEngine.vbs , 修改部分 "預設值"

step 5 : 排定時程 - 程式集 -> 附屬應用程式 -> 系統工具 -> 排定的工作 -> 新增排定的工作
	 瀏覽,選 ChkEngine.vbs ,每日每隔10分鐘執行一次

	 