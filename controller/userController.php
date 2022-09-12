<?php

namespace controller\Back;

use model\User;
// use App\Form\FormSport;  Il faut mettre service/form ?
use repository\IUserRepository;
use repository\UserRepository;
// use App\Service\Input; On a pas input ?
// use App\Service\Redirect; On a pas redirect ?
use service\View;
use service\Validation;

class UserController
{
    use View;

    private IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - User',
            'back/pages/sport/index.php', // Il faut changer cette ligne
            [
                'user' => $this->userRepository->findAll()
            ]);
    }

    public function getUserById($params)
    {
        $user = $this->userRepository->findById($params);
        return $this->render(
            SITE_NAME . ' - User: ' . $user->id,
            'back/pages/sport/show.php', // Il faut changer cette ligne
            [
                'formDeleteSport' => FormSport::buildDeleteFormWithSport($user),   // pour "FormSport" il faut mettre une autre chose
                'formSport' => FormSport::buildUpdateFormWithSport($user),        // pour "FormSport" il faut mettre une autre chose
                'user' => $this->userRepository->findAll()
            ]);
    }

    public function deleteUsertById($params)
    {
        $user = $this->userRepository->findById($params);
        $this->userRepository->remove($user);
        Redirect::to('admin/user');
    }

    public function updateUserById($params)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();   // Je comprend pas cette ligne
            if ($val->isSuccess()) {
                $user = $this->userRepository->findById($params);
                $user->setDesign(Input::get('design'));  // Il faut changer 'design'
                $this->userRepository->update($user);
                Redirect::to('admin/user');
            }
        }
    }

    public function addUser()
    {
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();  // Je comprend pas cette ligne
            if ($val->isSuccess()) {
                $design = Input::get('design');    // Je comprend pas cette ligne
                $user = new User($design);
                $this->userRepository->add($user);
                Redirect::to('admin/user');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - Add User: ',
                'back/pages/sport/new.php',  // Il faut changer cette ligne
                [
                    'formSport' => FormSport::buildCreateForm(),   // pour "FormSport" il faut mettre une autre chose
                ]);
        }
    }
}