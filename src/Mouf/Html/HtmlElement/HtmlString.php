<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

use Mouf\Utils\Value\ValueUtils;
use Mouf\Utils\Value\ValueInterface;

/**
 * An Html string that can be embedded in any container accepting HtmlElements.
 *
 * @Component
 */
class HtmlString implements HtmlElementInterface {
	
	/**
	 * The HTML string that will be embedded in the container.
	 *
	 * @var string|ValueInterface
	 */
	public $htmlString;
	
	/**
	 * @Important
	 * @param string|ValueInterface $htmlString The HTML string that will be embedded in the container
	 */
	public function __construct($htmlString = null){
		$this->htmlString = $htmlString;
	}
	
	public function toHtml() {
		echo ValueUtils::val($this->htmlString); 		
	}
}
?>