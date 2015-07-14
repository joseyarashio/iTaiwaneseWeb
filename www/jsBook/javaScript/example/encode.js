// 各種編碼與解碼的函數
function shiftEncode(inputStr, offset){
	var encoded, outputStr="";
	for (var i=0; i<inputStr.length; i++){
		encoded=inputStr.charCodeAt(i)+offset;
		outputStr += String.fromCharCode(encoded);
	}
	return(outputStr);
}

function xorEncode(inputStr, keyStr){
	var outputStr="";
	var j=0;
	for (var i=0; i<inputStr.length; i++){
		encoded=inputStr.charCodeAt(i) ^ keyStr.charCodeAt(j++);
		if (j==keyStr.length)
			j -= keyStr.length;
		outputStr += String.fromCharCode(encoded);
	}
	return(outputStr);
}