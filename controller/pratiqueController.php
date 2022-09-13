<?php

namespace controller\Back;

use model\Pratique;
// use App\Form\FormSport;  Il faut mettre service/form ?
use repository\IPratiqueRepository;
use repository\PratiqueRepository;
// use App\Service\Input; On a pas input ?
// use App\Service\Redirect; On a pas redirect ?
use service\View;
use service\Validation;

class PratiqueController
{
    use View;

    private IPratiqueRepository $pratiqueRepository;

    public function __construct()
    {
        $this->pratiqueRepository = new pratiqueRepository();
    }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - User',
            'back/pages/pratique/index.php', // Il faut changer cette ligne
            [
                'user' => $this->pratiqueRepository->findAll()
            ]);
    }

    public function getProtiqueById($params)
    {
        $pratique = $this->pratiqueRepository->findById($params);
        return $this->render(
            SITE_NAME . ' - User: ' . $pratique->id,
            'back/pages/pratique/show.php', // Il faut changer cette ligne
            [
                'formDeleteSport' => FormSport::buildDeleteFormWithSport($pratique),   // pour "FormSport" il faut mettre une autre chose
                'formSport' => FormSport::buildUpdateFormWithSport($pratique),        // pour "FormSport" il faut mettre une autre chose
                'user' => $this->pratiqueRepository->findAll()
            ]);
    }

    public function deletePratiquetById($params)
    {
        $pratique = $this->pratiqueRepository->findById($params);
        $this->pratiqueRepository->remove($pratique);
        Redirect::to('admin/pratique');
    }

    public function updateUserById($params)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();   // Je comprend pas cette ligne
            if ($val->isSuccess()) {
                $pratique = $this->pratiqueRepository->findById($params);
                $pratique->setDesign(Input::get('design'));  // Il faut changer 'design'
                $this->pratiqueRepository->update($pratique);
                Redirect::to('admin/pratique');
            }
        }
    }

    public function addPratique()
    {
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();  // Je comprend pas cette ligne
            if ($val->isSuccess()) {
                $design = Input::get('design');    // Je comprend pas cette ligne
                $pratique = new Pratique();
                $this->pratiqueRepository->add($pratique);
                Redirect::to('admin/pratique');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - Add Pratique: ',
                'back/pages/pratique/new.php',  // Il faut changer cette ligne
                [
                    'formSport' => FormSport::buildCreateForm(),   // pour "FormSport" il faut mettre une autre chose
                ]);
        }
    }
}
