' �ϥΨ�ƭp��� 1 �[�� n ���`�M

function sum(n)
	dim i, total
	total = 0
	for i = 1 to n
		total = total + i
	next
	sum = total
end function

n = 40
WScript.Echo("1+2+...+" & n & " = " & sum(n) & chr(13) & chr(10))