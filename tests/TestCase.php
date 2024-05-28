<?php
/**
 * Description of TestCase.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests;

use Orchestra\Testbench\TestCase as LaravelTestCase;
use Ramsey\Uuid\Uuid;

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

    public function uuid(): string
    {
        return Uuid::uuid7()->toString();
    }
}
