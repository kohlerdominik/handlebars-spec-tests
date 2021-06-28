<?php

namespace KohlerDominik\SpecTester;

class SpecificationKeyGenerator
{
    public static function make($description = null, $it = null, $number = null)
    {
        return implode(': ', [$description, $it, $number]);
    }
}