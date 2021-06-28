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
    public function testBasicSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function basicSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('basic.json');
    }
}