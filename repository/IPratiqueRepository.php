<?php

namespace repository;

interface IPratiqueRepository
{
    public function addPratique(Pratique $pratique);
    public function findAll(): array;
    public function findByDesign(string $pratique): Pratique;
    public function update(Pratique $pratique);
    public function remove(Pratique $pratique);
}
