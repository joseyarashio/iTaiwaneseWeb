// ����@�Ӻ����A�é���X�������e���Ҧ��s���]�\��ä������A�i�A��i�I�^
inet=new ActiveXObject("InetCtls.Inet");		// ���o Inet Control ����
inet.Url="http://www.cs.nthu.edu.tw";			// ���U��������
inet.RequestTimeOut=20;					// �]�w���ծɶ�
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// �U������
pattern=/<A(.*?)<\/A>/gi;				// �w�q�q�Ϊ�ܦ�
found=content.match(pattern);				// ��X�s��
pattern2=/<\s*A\s+HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;	// �t�@�ӳq�ιB�⦡
for (i=0; i<found.length; i++){
	pattern2.exec(found[i]);		// ��X�s�������}�H�γs������r
	WScript.Echo(found[i]+" ===> URL="+RegExp.$1+", TEXT="+RegExp.$2);
}