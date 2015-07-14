// 使用函數計算由 1 加到 n 的總和

n = 40;
WScript.Echo("1+2+...+" + n + " = " + sum(n) + "\n");

function sum(n) {
	var i, total=0;
	for (i=1; i<=n; i++)
		total = total + i;
	return(total);
}