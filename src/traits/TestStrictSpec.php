<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestStrictSpec
{
    /**
     * @dataProvider strictSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testStrictSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function strictSpecificationDataProvider()
    {
        $this->parseSpecFile('strict.json');
    }
}