<?php

namespace model;

class Sport
{
    private string $id;
    private string $name;

    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
