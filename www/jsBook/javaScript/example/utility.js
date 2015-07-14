// Print the properties of an object in an increassing order
function propertyPrint(obj, objName){
	var property = new Array();
	var k=0, prop;
	for (prop in obj)
		property[k++]=prop;
	property.sort();
	for (i=0; i<property.length; i++)
		document.writeln(objName+".<font color=red>"+property[i]+"</font> = <font color=green>"+obj[property[i]]+"</font><br>");
}

// Print the source of an object
function sourcePrint(obj) {
	document.writeln("<xmp class=code>");
	document.writeln(obj.outerHTML);
	document.writeln("</xmp>");
}