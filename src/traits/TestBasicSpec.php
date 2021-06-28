<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestBasicSpec
{
    /**
     * @dataProvider basicSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testBlockSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function basicSpecificationDataProvider()
    {
        $this->parseSpecFile('basic.json');
    }
}