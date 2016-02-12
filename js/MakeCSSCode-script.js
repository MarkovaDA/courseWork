function ObjectCssProperty(elemName){
	this.elemName = elemName;
	this.attrList = new Array();
}

ObjectCssProperty.prototype.addPropertyToObject = function(propName,propValue)
{
	this.attrList[propName] = propValue;
}
ObjectCssProperty.prototype.printCSSCode = function()
{
	var code = this.elemName + "{";
	for(var i in this.attrList)
	{
		code += i + ":" + this.attrList[i] + ";";
	}
	code+="}";
	return code;
}
//класс генерации css-кода
function MakingCSSCode()
{
	this.allElements = new Array();
}
MakingCSSCode.prototype.setPropertyForElement = function(elemName, propName, propValue)
{	
	if (this.allElements[elemName] == null){
		var newElem = new ObjectCssProperty(elemName);
		this.allElements[elemName] = newElem;
	}
	this.allElements[elemName].addPropertyToObject(propName, propValue);	
}
MakingCSSCode.prototype.printTotalCSS = function(){
	var code = "";
	for(var elem in this.allElements)
	{
		code += this.allElements[elem].printCSSCode();
	}
	return code;
}
/*var obj = new MakingCSSCode();
obj.setPropertyForElement("navigation_menu" ,"border", "1px solid red");
obj.setPropertyForElement("navigation_menu" ,"color", "red");
obj.setPropertyForElement("navigation_menu ul" ,"color", "blue");
alert(obj.printTotalCSS());*/

