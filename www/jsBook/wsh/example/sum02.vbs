' 使用函數計算由 1 加到 n 的總和

n = 40
WScript.Echo("1+2+...+" & n & " = " & sum(n) & chr(13) & chr(10))

function sum(n)
	dim i, total
	total = 0
	for i = 1 to n
		total = total + i
	next
	sum = total
end Function