// �ϥ� wsInetTools.dll �H�e�q�l�l��C
mail = new ActiveXObject("wsInetTools.SMTP");	// ���o COM ���� 
mail.MailServer = "wayne.cs.nthu.edu.tw";	// �]�w�l����A��
// �]�w�l��U�ةʽ�       
from    = "jang@wayne.cs.nthu.edu.tw";		// �o�H�H
to      = "jang@cs.nthu.edu.tw";		// ���H�H
subject = "Testing wsInetTools";		// �D�D
body    = "This is just a test message.\r\n Please ignore it.\r\n\r\nRoger Jang";	// ����    
mail.SendMail(from, to, subject, body);		// �}�l�H�o�l��
WScript.Echo("�H�e�l�󦨥\�I");