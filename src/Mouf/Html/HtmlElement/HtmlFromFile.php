<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

/**
 * This class loads a file, and displays it as Html.
 * The file loaded executes into a scope. The scope must be an object extending the Scopable property.
 * The $this keyword in the file will refer to the scope.
 * If no scope is provided, the scope will be the instance of the HtmlFromFile class (which is not very useful).
 *
 * @Component
 */
class HtmlFromFile implements HtmlElementInterface {
	
	/**
	 * The PHP file to be executed.
	 *
	 * @Property
	 * @Compulsory 
	 * @var string
	 */
	public $fileName;
	
	/**
	 * The scope of the file to be executed.
	 *
	 * @Property
	 * @var Scopable
	 */
	public $scope;
	
	/**
	 * If true, the filename will be relative to the ROOT PATH (if the file name is relative).
	 * Otherwise, the file is relative to the current directory.
	 * 
	 * @Property
	 * @var bool
	 */
	public $relativeToRootPath;
	
	public function toHtml() {
		$isRelative = true;
		if (strpos($this->fileName, "/") === 0 || strpos($this->fileName, ":") === 1) {
			$isRelative = false;
		}

		if ($isRelative && $this->relativeToRootPath) {
			$fileName = ROOT_PATH.$this->fileName;
		} else {
			$fileName = $this->fileName;
		}

		if ($this->scope != null) {
			$this->scope->loadFile($fileName);
		} else {
			require $fileName;
		}
	}
}
?>