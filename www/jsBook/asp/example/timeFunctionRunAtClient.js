function currentTime(){		// �^�ǲ{�b���ɶ�
	var today = new Date();
	return(today.toLocaleString());
}

function currentDay(){		// �^�Ǥ��ѬP���X
	var today = new Date();
	var day = today.getDay();	// ���o���ѬO�P���X
	var conversion=["��", "�@", "�G", "�T", "�|", "��", "��"];
	return("�P��"+conversion[day]);
}