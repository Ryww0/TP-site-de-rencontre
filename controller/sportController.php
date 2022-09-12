<?php

namespace App\Controller\Back;

use model\Sport;
// use App\Form\FormSport;   je sais pas quel form ?
use repository\ISportRepository;
use repository\SportRepository;
// use App\Service\Input; On a pas input ?
// use App\Service\Redirect; On a pas redirect ?
use service\View;
use service\Validation;

class SportController
{
    use View;

    private ISportRepository $sportRepository;

    public function __construct()
    {
        $this->sportRepository = new SportRepository();
    }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - Sport',
            'back/pages/sport/index.php',   // Il faut changer cette ligne
            [
                'sports' => $this->sportRepository->findAll()
            ]);
    }

    public function getSportById($params)
    {
        $sport = $this->sportRepository->findById($params);
        return $this->render(
            SITE_NAME . ' - Sport: ' . $sport->design,
            'back/pages/sport/show.php',
            [
                'formDeleteSport' => FormSport::buildDeleteFormWithSport($sport),
                'formSport' => FormSport::buildUpdateFormWithSport($sport),
                'sports' => $this->sportRepository->findAll()
            ]);
    }

    public function deleteSportById($params)
    {
        $sport = $this->sportRepository->findById($params);
        $this->sportRepository->remove($sport);
        Redirect::to('admin/sport');
    }

    public function updateSportById($params)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $sport = $this->sportRepository->findById($params);
                $sport->setDesign(Input::get('design'));
                $this->sportRepository->update($sport);
                Redirect::to('admin/sport');
            }
        }
    }

    public function addSport()
    {
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $design = Input::get('design');
                $sport = new Sport($design);
                $this->sportRepository->add($sport);
                Redirect::to('admin/sport');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - Add Sport: ',
                'back/pages/sport/new.php',
                [
                    'formSport' => FormSport::buildCreateForm(),
                ]);
        }
    }
}
