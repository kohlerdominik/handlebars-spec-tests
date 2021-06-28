<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestDataSpec
{
    /**
     * @dataProvider dataSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testDataSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function dataSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('data.json');
    }
}