<?php

/*
 +------------------------------------------------------------------------+
 | Phalcon Framework                                                      |
 +------------------------------------------------------------------------+
 | Copyright (c) 2011-2017 Phalcon Team (https://phalconphp.com)          |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file LICENSE.txt.                             |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
 */

namespace Phalcon\Test\Unit;

use Phalcon\Test\Module\UnitTest;
use Codeception\TestCase\Test;
use Phalcon\IteratorAware;
use ArrayIterator;

/**
 * Phalcon\Test\Unit\IteratorAwareTest
 *
 * Tests the Phalcon\IteratorAware component
 *
 * @package   Phalcon\Test\Unit
 */
class IteratorAwareTest extends UnitTest
{
    /**
     * Tests ArrayUtils::iteratorToArray. Testing array.
     *
     * @dataProvider providerArray
     * @param array $array
     * @param array $array
     *
     * @test
     * @author Sergii Svyrydenko <sergey.v.sviridenko@gmail.com>
     * @since  2017-10-04
     */
    public function shouldReturnArrayFromArray($array, $expected)
    {
        $iteratorAware = new IteratorAware();

        $this->assertEquals(
            $expected,
            $iteratorAware->iteratorToArray($array, true),
            'Arrays are different'
        );
    }

    /**
     * Tests ArrayUtils::iteratorToArray. Testing iterator.
     *
     * @dataProvider providerArray
     * @param array $array
     * @param array $array
     *
     * @test
     * @author Sergii Svyrydenko <sergey.v.sviridenko@gmail.com>
     * @since  2017-10-04
     */
    public function shouldReturnArrayFromIterator($array, $expected)
    {
        $iteratorAware = new IteratorAware();
        $iterator = new ArrayIterator($array);

        $this->assertEquals(
            $expected,
            $iteratorAware->iteratorToArray($iterator, true),
            'Arrays are different'
        );
    }

    public function providerArray()
    {
        return require PATH_FIXTURES . 'IteratorAware/array_utils.php';
    }
}
