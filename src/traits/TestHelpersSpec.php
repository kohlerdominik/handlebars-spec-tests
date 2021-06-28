<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestHelpersSpec
{
    /**
     * @dataProvider helpersSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testHelpersSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function helpersSpecificationDataProvider()
    {
        $this->parseSpecFile('helpers.json');
    }
}