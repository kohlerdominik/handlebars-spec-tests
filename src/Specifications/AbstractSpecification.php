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
        return $this->helpers;
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
}