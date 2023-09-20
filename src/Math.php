<?php

namespace Haris\Test;

class Math
{

    public static function sum(array $values): int
    {
        $result = 0;

        foreach ($values as $value) {
            $result += $value;
        }

        return $result;
    }
}
