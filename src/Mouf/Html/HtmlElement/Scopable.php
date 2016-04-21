<?php

/*
 * Copyright (c) 2012 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Html\HtmlElement;

/**
 * Interface that allows a class to execute PHP files inside its scope.
 * Note: this should be transformed into a Trait when PHP 5.4 is widely used.
 */
interface Scopable
{
    /**
     * Loads the file.
     *
     * @param string $file
     */
    public function loadFile($file);
}
