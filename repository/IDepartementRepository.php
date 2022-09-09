<?php

namespace repository;

interface IPratiqueRepository
{
    public function add(Departement $departement);

    public function findAll(): array;

    public function findByDesign(string $departement): Departement;

    public function update(Departement $departement);

    public function remove(Departement $departement);
}
