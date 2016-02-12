function UnmakingCSSCode(cssCode)
{
	this.totalCSSCode = cssCode;
}
UnmakingCSSCode.prototype.getSeparateCode = function()
{	//алгоритм не универсальный; все точки с запятой заменить на запятые и попробовать распарсить как json
	var startPos = 	this.totalCSSCode.indexOf("{");
	var endPos = this.totalCSSCode.indexOf("}", startPos);
	var object = this.totalCSSCode.substr(0, startPos);	
	while(startPos > 0){
		alert(object);
	    var code = this.totalCSSCode.substr(startPos, endPos - startPos + 1); 
		startPos = 	this.totalCSSCode.indexOf("{", endPos);
		code = code.replace('{', '');
		code = code.replace('}', '');
		var propValues = code.split(';');
		for(var i = 0; i < propValues.length; i++){
			var propvalue = propValues[i].split(':');
			$(object).css(propvalue[0], propvalue[1]);
		}
		object = this.totalCSSCode.substr(endPos+1, startPos - endPos - 1);
		endPos = this.totalCSSCode.indexOf("}", startPos);
	}
}

