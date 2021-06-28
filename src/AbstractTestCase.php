<?php

namespace KohlerDominik\SpecTester;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;
use KohlerDominik\SpecTester\Specifications\ExceptionSpecification;
use KohlerDominik\SpecTester\Specifications\StringSpecification;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * @param AbstractSpecification $specification
     * @return mixed
     */
    abstract public function render($specification): string;

    /**
     * @param AbstractSpecification $specification
     */
    protected function runSpecificationTest($specification)
    {
        if ($specification instanceof ExceptionSpecification) {
            $this->expectError();
        }

        $actual = $this->render($specification);

        if ($specification instanceof StringSpecification) {
            $this->assertEquals($specification->getExpected(), $actual);
        }
    }

    protected function parseSpecFile($fileName)
    {
        $provider = new SpecDataProvider();

        yield $provider->parseFile(static::SPEC_PATH . $fileName);
    }
}