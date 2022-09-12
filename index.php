<?php

include('./view/partials/head.php');

$sports = new SportRepository();

foreach ($sports->findAll() as $sport) {
    echo $sport;
}

include('./view/partials/footer.php');
