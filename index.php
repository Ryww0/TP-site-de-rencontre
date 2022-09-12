<?php


include('./config.php');

include('./controller/sportController.php');
include('./repository/sportRepository.php');
// include('./repository/IsportRepository.php');
include('./model/sport.php');

use App\Controller\Back\SportController;
use repository\SportRepository;


$test = new SportRepository();
var_dump($test->findAll());

echo '<br><br>';
echo '--------------------------';
echo '<br><br>';

$test2 = new SportController();
var_dump($test2->invoke());
