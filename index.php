<?php


include('./config.php');

include('./repository/sportRepository.php');
// include('./repository/IsportRepository.php');
include('./model/sport.php');

use repository\SportRepository;


$test = new SportRepository();
var_dump($test->findAll());
