<?php
namespace Mouf\Utils\Action;

use Mouf\Html\HtmlElement\HtmlBlock;

use Mouf\Html\HtmlElement\HtmlElementInterface;

/**
 * This action puts into an HtmlBlock one or many HtmlElement.
 * Very useful to add some content to blocks before triggering a render.
 * 
 * @author David Négrier
 */
class FillHtmlBlock implements ActionInterface {
	
	private $targetBlock;
	
	private $htmlElements;
	
	/**
	 * 
	 * @param HtmlBlock $targetBlock
	 * @param array<HtmlElementInterface> $htmlElements
	 */
	public function __construct(HtmlBlock $targetBlock = null, array $htmlElements = array()) {
		$this->targetBlock = $targetBlock;
		$this->htmlElements = $htmlElements;
	}
	
	/**
	 * The HtmlBlock this will be filled by this action.
	 * 
	 * @Important
	 * @param HtmlBlock $targetBlock
	 */
	public function setTargetBlock(HtmlBlock $targetBlock) {
		$this->targetBlock = $targetBlock;
	}
	
	/**
	 * The HtmlElements that will be added to the target block.
	 *
	 * @Important
	 * @param array<HtmlElementInterface> $htmlElements
	 */
	public function setHtmlElements(array $htmlElements) {
		$this->htmlElements = $htmlElements;
	}
	
	/**
	 * Performs the action the object was designed to do.
	 */
	public function run() {
		foreach ($this->htmlElements as $htmlElement) {
			$this->targetBlock->addHtmlElement($htmlElement);
		}
	}
}