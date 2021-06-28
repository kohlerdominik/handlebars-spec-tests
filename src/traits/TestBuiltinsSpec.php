<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestBuiltinsSpec
{
    /**
     * @dataProvider builtinsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testBuiltinsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function builtinsSpecificationDataProvider()
    {
        $this->parseSpecFile('builtins.json');
    }
}