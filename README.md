What is this package?
=====================

This package contains an interface used to render objects in HTML.
Basically, instances of classes implementing this interface provide a toHtml method that can be used to get some HTML.

The concept is very abstract, but also very powerful. Let's take a sample:

- you might write a "HtmlButtonElement" class that would render a simple HTML button.
- you might write a "HtmlCalendarElement" class that would render a calendar.
- you might write a "HtmlTemplateElement" class that would render a full template.
- ...

Obviously, this package is useless on its own. It is useful only if you implement the interface in your classes.

In practice
-----------

Implementing the HtmlElementInterface is simple stupid: just add a "toHtml" method to your code:

	/**
	 * Renders the object in HTML.
	 * The Html is echoed directly into the output.
	 */
	function toHtml();

Provided classes
----------------

This package comes with a few classes implementing the HtmlElementInterface:

- **HtmlString**: this class contains a string that is outputed when you call the toHtml method
- **HtmlFromFile**: this class refers to a PHP file that is required when you call the toHtml method  
- **HtmlFromFunction**: this class refers to a PHP callable (method, function, ...) that is called when you call the toHtml method


Mouf package
------------

This package is part of [Mouf](http://mouf-php.com), an effort to ensure good developing practices by providing a graphical dependency injection framework.
