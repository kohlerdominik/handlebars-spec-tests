<?php

namespace KohlerDominik\SpecTester;

use KohlerDominik\SpecTester\Traits\TestBasicSpec;
use KohlerDominik\SpecTester\Traits\TestBlocksSpec;
use KohlerDominik\SpecTester\Traits\TestBuiltinsSpec;
use KohlerDominik\SpecTester\Traits\TestDataSpec;
use KohlerDominik\SpecTester\Traits\TestHelpersSpec;
use KohlerDominik\SpecTester\Traits\TestPartialsSpec;
use KohlerDominik\SpecTester\Traits\TestRegressionsSpec;
use KohlerDominik\SpecTester\Traits\TestStrictSpec;
use KohlerDominik\SpecTester\Traits\TestStringParamsSpec;
use KohlerDominik\SpecTester\Traits\TestSubexpressionsSpec;
use KohlerDominik\SpecTester\Traits\TestTrackIdsSpec;
use KohlerDominik\SpecTester\Traits\TestWhitespaceControlSpec;

abstract class AllSpecificationsTest extends AbstractTestCase
{
    const SPEC_PATH = 'vendor/jbboehr/handlebars-spec';

    use TestBasicSpec;
    use TestBlocksSpec;
    use TestBuiltinsSpec;
    use TestDataSpec;
    use TestHelpersSpec;
    use TestPartialsSpec;
    use TestRegressionsSpec;
    use TestStrictSpec;
    use TestStringParamsSpec;
    use TestSubexpressionsSpec;
    use TestTrackIdsSpec;
    use TestWhitespaceControlSpec;
}