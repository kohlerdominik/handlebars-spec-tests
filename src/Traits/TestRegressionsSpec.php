<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestRegressionsSpec
{
    /**
     * @dataProvider regressionsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testRegressionsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function regressionsSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('regressions.json');
    }
}