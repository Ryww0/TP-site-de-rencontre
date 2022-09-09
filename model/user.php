<?php

namespace model;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $sport;
    private string $password;

    public function __construct(string $name, string $email, string $sport, string $password)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->sport = $sport;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSport(): string
    {
        return $this->sport;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
