<?php
/**
 * Copyright (C) 2016 Derek J. Lambert
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace CrEOF\Geo\Obj\Value\Generator;

use CrEOF\Geo\Obj\Exception\UnsupportedFormatException;

/**
 * Interface ValueGeneratorInterface
 *
 * A class implementing ValueGeneratorInterface takes a standard value (WKB, WKB, etc.)
 * and generates the value array used internally
 *
 * array {
 *      $type       string       Type of object
 *      $value      array        Array of numbers (for points) or array(s) of point arrays
 *      $srid       null|integer SRID for object
 *      $properties array        Array with string keys and mixed values containing additional object properties
 * }
 *
 * @author  Derek J. Lambert <dlambert@dereklambert.com>
 * @license http://dlambert.mit-license.org MIT
 */
interface ValueGeneratorInterface
{
    /**
     * @param mixed $value
     *
     * @return array
     * @throws UnsupportedFormatException
     */
    public function generate($value);
}
