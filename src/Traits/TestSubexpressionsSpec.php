<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestSubexpressionsSpec
{
    /**
     * @dataProvider subexpressionsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testSubexpressionsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function subexpressionsSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('subexpressions.json');
    }
}