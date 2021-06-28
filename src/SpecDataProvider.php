<?php

namespace KohlerDominik\SpecTester;

use KohlerDominik\SpecTester\Specifications\AbstractSpecification;
use KohlerDominik\SpecTester\Specifications\ExceptionSpecification;
use KohlerDominik\SpecTester\Specifications\StringSpecification;

class SpecDataProvider
{
    protected $helperTransformer = null;

    /**
     * @param \Closure|callable $transformer
     */
    public function transformHelpersWith($transformer)
    {
        $this->helperTransformer = $transformer;
    }

    public function parseFile($path)
    {
        $specs = json_decode(file_get_contents($path), true);

        foreach($specs as $spec) {
            $specObject = $this->makeSpecification($spec);
            yield $specObject->makeKey() => [$specObject];
        }
    }

    public function makeSpecification($json): AbstractSpecification
    {
        $spec = (isset($json['exception']))
            ? $this->newExceptionSpecification($json)
            : $this->newStringSpecification($json);

        $spec->setDescription(
            SpecificationKeyGenerator::make(
                $json['description'] ?? null,
                $json['it'] ?? null,
                $json['number'] ?? null
            ));

        if (isset($json['message'])) {
            $spec->setMessage($json['message']);
        }

        if (isset($json['data'])) {
            $spec->setData($json['data']);
        }

        $this->addHelpers($spec, $json);

        return $spec;
    }

    protected function newExceptionSpecification($json)
    {
        return new ExceptionSpecification();
    }

    protected function newStringSpecification($json)
    {
        return new StringSpecification(
            $json['expected'],
            $json['template']
        );
    }

    /**
     * @param AbstractSpecification $spec
     * @param array $json
     */
    protected function addHelpers($spec, $json)
    {
        if (!isset($json['helpers'])) {
            return;
        }

        $transformedHelpers = [];

        foreach([$json['helpers']] as $name => $helper) {
            if (is_string($helper)) {
                $transformedHelpers[$name] = $helper;
            } elseif (isset($helper['php'])) {
                $callback = eval('return ' . ($helper['php']) . ';');
                $transformedHelpers = (is_null($this->helperTransformer))
                    ? $callback
                    : call_user_func($this->helperTransformer, $callback);
            }
        }

        $spec->setHelpers($transformedHelpers);
    }
}