<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestStringParamsSpec
{
    /**
     * @dataProvider stringParamsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testStringParamsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function stringParamsSpecificationDataProvider()
    {
        $this->parseSpecFile('string-params.json');
    }
}