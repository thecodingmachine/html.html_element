<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

/**
 * This class executes a function that will display some html.
 * The function can be passed a number of parameters.
 *
 * @Component
 */
class HtmlFromFunction implements HtmlElementInterface {
	
	/**
	 * The function to call.
	 *
	 * @Property
	 * @Compulsory 
	 * @var string
	 */
	public $functionPointer;
	
	/**
	 * The parameters to be passed to the function.
	 *
	 * @Property
	 * @var array<mixed>
	 */
	public $parameters;
	
	
	public function toHtml() {
		if ($this->parameters == false) {
			$this->parameters = array();
		}
		call_user_func_array($this->functionPointer, $this->parameters);
	}
}
?>