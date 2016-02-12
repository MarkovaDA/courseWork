<?php
!!!//переписать на джава-скрипте
class ObjectCssProperty{
	
	public $elemName; 
	//список свойств этого аттрибута [ {propName => propValue}]
	public $attrList; 
	function __construct($elemName)
	{
		$this->elemName = $elemName;
		$this->attrList = array(); //пустой массив свойств
	}
	function addPropertyToObject($propName, $propValue)
	{
		$this->attrList[$propName] = $propValue;
	}
	function removePropertyFromObject($propName)
	{
		unset($this->attrList[$propName]);
	}
	function printCssCode()
	{
		$code = $this->elemName . '{';
		foreach($this->attrList as $i => $value){
			$code .= $i . ':' . $value . ';';
		}
		$code .= '}';
		return $code;
	}
}
class MakingCSSCode
{
	public $allElements = array();
	
	function setPropertyForElement($elemName, $propName, $propValue)
	{
		if (!isset($this->allElements[$elemName])) //такого элемента нет в общем списке
		{   $newElem = new ObjectCssProperty($elemName);
			$this->allElements[$elemName] = $newElem; //создали элемент
			
		}
		$this->allElements[$elemName]->addPropertyToObject($propName, $propValue); //обновили/добавили значение свойства
	}
	function printTotalCss()
	{	$code = ' ';
		foreach($this->allElements as $elem => $val ){
			$code .= $val->printCssCode();
		}
		return $code;
	}
}
?>