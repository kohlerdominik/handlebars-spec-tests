<?php

namespace KohlerDominik\SpecTester\Specifications;

class StringSpecification extends AbstractSpecification
{
    /** @var string */
    protected $expected;

    public function __construct(string $expected, string $template, array $data = null)
    {
        $this->expected = $expected;
        $this->setTemplate($template);
        if (!is_null($data)) {
            $this->setData($data);
        }
    }

    public function getExpected(): string
    {
        return $this->expected;
    }
}