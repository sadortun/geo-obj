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

namespace CrEOF\Geo\Obj\Tests;

use CrEOF\Geo\Obj\Configuration;
use CrEOF\Geo\Obj\CircularString;
use CrEOF\Geo\Obj\Object;

/**
 * Class CircularStringTest
 *
 * @author  Derek J. Lambert <dlambert@dereklambert.com>
 * @license http://dlambert.mit-license.org MIT
 */
class CircularStringTest extends \PHPUnit_Framework_TestCase
{
    public function testCountPoints()
    {
        $circularString = new CircularString([[0,0],[1,1],[2,0]]);

        static::assertCount(3, $circularString);
    }

    /**
     * @param $value
     * @param $validators
     * @param $expected
     *
     * @dataProvider circularStringTestData
     */
    public function testCircularString($value, $validators, $expected)
    {
        if (null !== $validators) {
            foreach ($validators as $validator) {
                Configuration::getInstance()->pushValidator(Object::T_POINT, $validator);
            }
        }

        try {
            $actual = (new CircularString($value))->getValue();

            self::assertEquals($expected, $actual);
        } catch (\Exception $e) {
            /** @var \Exception $expected */
            self::assertInstanceOf(get_class($expected), $e);
            self::assertEquals($expected->getMessage(), $e->getMessage());
        }
    }

    /**
     * @return array[]
     */
    public function circularStringTestData()
    {
        return [
            'testGoodWkbCircularString' => [
                'value'      => pack('H*', '01080000000300000000000000000000000000000000000000000000000000f03f000000000000f03f00000000000000400000000000000000'),
                'validators' => null,
                'expected'   => [[0,0],[1,1],[2,0]]
            ],
        ];
    }
}
