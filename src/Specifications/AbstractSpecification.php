<?php

namespace KohlerDominik\SpecTester\Specifications;

abstract class AbstractSpecification
{
    /** @var string */
    protected $template;
    /** @var null|string|array */
    protected $data = null;
    /** @var null|string */
    protected $description = null;
    /** @var null|string */
    protected $message = null;
    /** @var null|array */
    protected $helpers = null;

    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    /** @param string|array $data */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /** @return null|string|array */
    public function getData()
    {
        return $this->data;
    }

    public function getStringData()
    {
        if (is_null($this->getData())) {
            return null;
        } elseif (is_array($this->getData())) {
            return array_filter($this->getData(), function ($data) {
                return ($data['!code'] ?? false) === false;
            });
        }
    }

    public function getCallbackData()
    {
        if (is_array($this->getData())) {
            $filtered = array_filter($this->getData(), function ($data) {
                return ($data['!code'] ?? false) === true;
            });

            return $this->parseCallables($filtered);
        }

        return null;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /** @return string|null */
    public function getMessage()
    {
        return $this->message;
    }

    public function setHelpers($helpers): self
    {
        $this->helpers = $helpers;

        return $this;
    }

    public function hasHelpers()
    {
        return !is_null($this->getHelpers());
    }

    public function getHelpers()
    {
        return (is_null($this->helpers))
            ? null
            : $this->parseCallables($this->helpers ?? []);
    }

    public function makeKey(): string
    {
        $id = substr(md5(spl_object_hash($this)), -4);

        return implode(' | ', [
            $this->getDescription() ?? 'no Description',
            $this->getMessage() ?? 'no Message',
            "[$id]",
        ]);
    }

    public function descriptionMatches($needle)
    {
        return strpos($this->getDescription(), $needle) !== false;
    }

    protected function parseCallables($callables)
    {
        $result = [];

        foreach($callables as $name => $callable) {
            if (is_string($callable)) {
                $result[$name] = $callable;
            } elseif (isset($callable['php'])) {
                $result[$name] = eval('return ' . ($callable['php']) . ';');
            }
        }

        return $result;
    }
}