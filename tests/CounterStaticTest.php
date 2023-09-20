<?php

namespace Haris\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase
{
    private static Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecond()
    {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

    public static function tearDownBeforeClass()
    {
        echo "Unit Test Selesai" . \PHP_EOL;
    }
}
