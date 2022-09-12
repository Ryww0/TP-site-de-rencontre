<?php

namespace model;

class User
{
    private string $id;
    private string $name;
    private string $email;
    private string $numDpt;
    private string $password;

    public function __construct(string $name, string $email, string $numDpt, string $password)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->numDpt = $numDpt;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getId(): string
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

    public function getNumDpt(): string
    {
        return $this->sport;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
