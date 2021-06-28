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
        $this->parseSpecFile('regressions.json');
    }
}