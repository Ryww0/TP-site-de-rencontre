<?php

namespace model;

class Pratique
{
    private string $userId;
    private string $sportId;
    private string $level;

    public function __construct(string $userId, string $sportId)
    {
        $this->userId = $userId;
        $this->sportId = $sportId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getSportId(): string
    {
        return $this->sportId;
    }

    public function setLevel(string $level): Pratique
    {
        $this->level = $level;
        return $this;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
