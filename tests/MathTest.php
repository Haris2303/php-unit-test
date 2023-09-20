<?php

namespace Haris\Test;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testManual()
    {
        self::assertEquals(20, Math::sum([5, 5, 5, 5]));
        self::assertEquals(20, Math::sum([4, 4, 4, 4, 4]));
        self::assertEquals(15, Math::sum([3, 3, 3, 3, 3]));
        self::assertEquals(8, Math::sum([2, 2, 2, 2]));
        self::assertEquals(0, Math::sum([]));
    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }

    public function mathSumData(): array
    {
        return [
            [[5, 5, 5, 5], 20],
            [[4, 4, 4, 4, 4], 20],
            [[3, 3, 3, 3, 3], 15],
            [[2, 2, 2, 2], 8],
            [[], 0]
        ];
    }

    /**
     * @testWith [[1,2,3,4], 10]
     *           [[3,4,3], 10]
     *           [[9,9,6], 24]
     */
    public function testWith(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }
}
