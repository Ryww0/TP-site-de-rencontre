<?php

namespace model;

class Sport
{
    private int $id;
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setUpId(): Sport
    {
        $this->id = uniqid();
        return $this;
    }
}
