<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

/**
 * An Html string that can be embedded in any container accepting HtmlElements.
 *
 * @Component
 */
class HtmlString implements HtmlElementInterface {
	
	/**
	 * The HTML string that will be embedded in the container.
	 *
	 * @Property
	 * @Compulsory 
	 * @var string
	 */
	public $htmlString;
	
	/**
	 * @param string $htmlString The HTML string that will be embedded in the container
	 */
	public function __construct($htmlString = null){
		$this->htmlString = $htmlString;
	}
	
	public function toHtml() {
		echo $this->htmlString; 
		
	}
}
?>