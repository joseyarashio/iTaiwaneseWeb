
                      #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
                      #     �˴����A���A�Ȫ��p�{��    #
                      #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
                                                                   2002-02-15  ahpei
------------------------------------------------------------------------------------

step 1 : �w�� JMail���� - ���� "w3JMail43Personal.exe"

step 2 : �w�� Dynu���� - �N Dynu.dll �ƻs�� (WinDir)\System32 
                         , �A���� regsvr32 system32\Dynu.dll

step 3 : �ק� CheckServer.mdb ��Ʈw -

	1. ServerList - �n�ˬd��Server��ƪ�

		* ServerIP - �n�ˬd��Server IP
		* WebServer - �n�ˬd��Web Server���}
		* Ping - �O�_�nPing��IP,�O��1,�_��0
		* Web - �O�_�ˬdWebServer,�O��1,�_��0
		* Mail - �O�_�n�ˬd��MailServer,�O��1,�_��0
		* RecordStatus - ����/�@�o

	2. PhoneList - �e²�T����ƪ�

		* CALL_NO - �����2~4�X
		* RECEIVER_NO - �����5~8�X
		* RecordStatus - ����/�@�o

	3. EmailList - �eEmail����ƪ�

		* Email - �q�l�l��
		* RecordStatus - ����/�@�o

	4. EmailAndSMSLog - �X�{���~�ɰO������ƪ� (Log,�����ק�)

		* ServerHost - ���@��Server
		* SendEmail - Email���e
		* SendSMS - ²�T���e
		* EmailResult - Email�O�_���\�e�X
		* SMSResult - ²�T�O�_���\�e�X
		* SendStatus - �e�X/�O�d    (�b60�������w�e�X�T���N�O�d)
		* RecordStatus - ����/�@�o

	5. CheckLog - �C���ˬd�O������ƪ� (Log,�����ק�)

		* ServerHost - ���@��Server
		* PingLog - Ping���^��
		* WebLog - WebServer���^��
		* MailLog - MailServer���^��
		* ServerStatus - true/false  ( ���`/�X�� )
		* RecordStatus - ����/�@�o
	
step 4 : �]�w�D�n�˴��{�� - ���} ChkEngine.vbs , �קﳡ�� "�w�]��"

step 5 : �Ʃw�ɵ{ - �{���� -> �������ε{�� -> �t�Τu�� -> �Ʃw���u�@ -> �s�W�Ʃw���u�@
	 �s��,�� ChkEngine.vbs ,�C��C�j10��������@��

	 