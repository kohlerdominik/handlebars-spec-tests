<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestPartialsSpec
{
    /**
     * @dataProvider partialsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testPartialsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function partialsSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('partials.json');
    }
}