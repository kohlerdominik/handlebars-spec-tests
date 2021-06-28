<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestBlocksSpec
{
    /**
     * @dataProvider blockSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testBlockSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function blockSpecificationDataProvider()
    {
        $this->parseSpecFile('blocks.json');
    }
}