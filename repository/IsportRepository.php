<?php

namespace App\Repository;

// Il faut changer //
use Entity\Sport;

interface ISportRepository
{
    public function add(Sport $sport);

    public function findAll() : array;

    public function findBySport(string $sport): Sport;

    public function update(Sport $sport);

    public function remove(Sport $sport);

    public function findById($params);
}