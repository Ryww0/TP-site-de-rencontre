<?php

namespace repository;

// I dont know file path for User.php
use model\User;

interface IUserRepository
{
    public function add(User $user);

    public function findByName(User $name): User;

    public function findAll(): array;

    public function update(User $user);

    public function remove(User $user);
}
