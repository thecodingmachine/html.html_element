<?php

/*
 * Copyright (c) 2012 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

/**
 * Every object extending this interface can be rendered in an HTML page, using the toHtml function.
 */
interface HtmlElementInterface
{
    /**
     * Renders the object in HTML.
     * The Html is echoed directly into the output.
     */
    public function toHtml();

    /**
     * Exactly the same as toHtml except that HTML is returned instead of outputted.
     *
     * @return string
     */
    public function getHtml():string;
}
