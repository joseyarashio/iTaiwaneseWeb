// �ϥΨ�ƭp��� 1 �[�� n ���`�M

function sum(n) {
	var i, total=0;
	for (i=1; i<=n; i++)
		total = total + i;
	return(total);
}

n = 40;
WScript.Echo("1+2+...+" + n + " = " + sum(n) + "\n");