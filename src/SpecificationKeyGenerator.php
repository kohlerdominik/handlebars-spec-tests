<?php

namespace KohlerDominik\SpecTester;

class SpecificationKeyGenerator
{
    public static function make($description = null, $it = null, $number = null)
    {
        // parts which are not null
        $parts = array_filter([$description, $it, $number]);

        return implode(' → ', $parts);
    }
}