<?php
namespace Mouf\Utils\Action;

use Mouf\Html\HtmlElement\HtmlElementInterface;

use Mouf\Utils\Actions\ActionInterface;

/**
 * This action triggers the outputing of the HtmlElement it contains, by calling its toHtml method.
 * 
 * @author David Négrier
 */
class OutputElement implements ActionInterface {
	
	private $htmlElement;
	
	/**
	 * @Important $htmlElement
	 * @param HtmlElementInterface $htmlElement The HtmlElement that will be displayed when the action is called.
	 */
	public function __construct(HtmlElementInterface $htmlElement = null) {
		$this->htmlElement = $htmlElement;
	}
	
	/**
	 * The HtmlElement that will be displayed when the action is called.
	 * 
	 * @param HtmlElementInterface $htmlElement
	 */
	public function setHtmlElement(HtmlElementInterface $htmlElement) {
		$this->htmlElement = $htmlElement;
	}
	
	/**
	 * Performs the action the object was designed to do.
	 */
	public function run() {
		$this->htmlElement->toHtml();
	}
}