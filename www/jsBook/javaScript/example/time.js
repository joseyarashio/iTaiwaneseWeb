// �P������������
function currentTime(){		// �^�ǲ{�b���ɶ�
	var today = new Date();
	var hour = today.getHours();
	var minute = today.getMinutes();
	var second = today.getSeconds();
	var prepand = (hour>=12)? "�U��":"�W��";
	hour = (hour>=12)? hour-12:hour;
	return(prepand + hour + " �I " + minute + " �� " + second + " ��");
}

function currentDay(){		// �^�Ǥ��ѬP���X
	var today = new Date();
	var day = today.getDay();	// ���o���ѬO�P���X
	var conversion=["��", "�@", "�G", "�T", "�|", "��", "��"];
	return("�P��"+conversion[day]);
}