<?php

namespace model;

class Sport
{
    private int $id;
    private string $name;

    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
