<?php

namespace KohlerDominik\SpecTester\Traits;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;

trait TestTrackIdsSpec
{
    /**
     * @dataProvider TrackIdsSpecificationDataProvider
     *
     * @param AbstractSpecification $specification
     */
    public function testTrackIdsSpecification($specification)
    {
        return $this->runSpecificationTest($specification);
    }

    public function trackIdsSpecificationDataProvider()
    {
        yield from $this->parseSpecFile('track-ids.json');
    }
}