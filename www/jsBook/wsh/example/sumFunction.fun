// 此函數計算由 1 加到 n 的總和
function sum(n) {
	var i, total=0;
	for (i=1; i<=n; i++)
		total = total + i;
	return(total);
}