<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestBlocksSpec
{
    /**
     * @dataProvider blocksSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testBlocksSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function blocksSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('blocks.json');
    }
}