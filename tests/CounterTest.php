<?php

namespace Haris\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{

    private Counter $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
        echo "Membuat counter" . \PHP_EOL;
    }

    // incomplete test
    public function testIncrement()
    {
        self::assertEquals(0, $this->counter->getCounter());
        self::markTestIncomplete("TODO do counter again");
    }

    public function testCounter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());
        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
    }

    /**
     * Annotation
     * 
     * @test
     */
    public function increment()
    {
        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());
        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter): void
    {
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }

    // tearDown
    protected function tearDown(): void
    {
        echo "Tear Down" . \PHP_EOL;
    }

    /**
     * annotation
     * 
     * @after
     */
    protected function after(): void
    {
        echo "After" . PHP_EOL;
    }
}
