<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestWhitespaceControlSpec
{
    /**
     * @dataProvider whitespaceControlSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testWhitespaceControlSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function whitespaceControlSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('whitespace-control.json');
    }
}