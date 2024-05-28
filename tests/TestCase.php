<?php
/**
 * Description of TestCase.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests;

use Orchestra\Testbench\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase
{
    protected function assertArraysEqual(array $expected, array $actual): void
    {
        foreach ($expected as $key => $value) {
            if (is_array($value)) {
                $this->assertArraysEqual($value, $actual[$key]);
                continue;
            }
            $this->assertEquals($value, $actual[$key]);
        }
    }
}
