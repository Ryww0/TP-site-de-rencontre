<?php

namespace controller;

use model\User;
use repository\IUserRepository;
use repository\UserRepository;
use service\View;

class UserController
{
    use View;

    private IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function invoke() //: string
    {
    }

    public function getUserById($params)
    {
    }

    public function deleteUsertById($params)
    {
    }

    public function updateUserById($params)
    {
    }

    public function addUser()
    {
    }
}
