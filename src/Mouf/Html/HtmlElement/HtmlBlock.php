<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement; 

/**
 * An Html element that can embedded many other Html elements.
 *
 * @Component
 */
class HtmlBlock implements HtmlElementInterface {
	
	/**
	 * The list of HTML elements that will be embedded in this block.
	 * 
	 * @Property
	 * @Compulsory 
	 * @var array<HtmlElementInterface>
	 */
	public $children = array();
	
	/**
	* Adds some content to the block by calling the function passed in parameter.
	* @return HtmlBlock
	*/
	public function addFunction($function) {
		$arguments = func_get_args();
		// Remove the first argument
		array_shift($arguments);
	
		$content = new HtmlFromFunction();
		$content->functionPointer = $function;
		$content->parameters = $arguments;
		$this->children[] = $content;
		return $this;
	}
	
	/**
	 * Adds some content to the block by displaying the text passed in parameter.
	 * @return HtmlBlock
	 */
	public function addText($text) {
		$content = new HtmlString();
		$content->htmlString = $text;
		$this->children[] = $content;
		return $this;
	}
	
	/**
	 * Adds some content to the block by displaying the text in the file passed in parameter.
	 * The scope is the object that will refer the $this.
	 * @return HtmlBlock
	 */
	public function addFile($fileName, Scopable $scope = null) {
		$content = new HtmlFromFile();
		$content->fileName = $fileName;
		$content->scope = $scope;
		$this->children[] = $content;
	
		return $this;
	}
	
	/**
	 * Adds an object extending the HtmlElementInterface interface to the rgiht of the template.
	 *
	 * @param HtmlElementInterface $element
	 * @return HtmlBlock
	 */
	public function addHtmlElement(HtmlElementInterface $element) {
		$this->children[] = $element;
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see HtmlElementInterface::toHtml()
	 */
	public function toHtml() {
		foreach ($this->children as $element) {
			/* @var $element HtmlElementInterface */
			$element->toHtml();
		}
		
	}
	
	/**
	 * Exactly the same as toHtml except that HTML is returned instead of outputted.
	 * 
	 * @return string
	 */
	public function getHtml() {
		ob_start();
		$this->toHtml();
		$content = ob_get_clean();
		return $content;
	}
}
?>