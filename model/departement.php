<?php

namespace model;

class Departement
{
    private string $departement;
    private string $numDpt;

    public function __construct(string $departement, string $numDpt)
    {
        $this->departement = $departement;
        $this->numDpt = $numDpt;
    }

    public function getDepartement(): string
    {
        return $this->departement;
    }

    public function getNumDpt(): string
    {
        return $this->numDpt;
    }
}
$test = new Departement('ain', '01');
echo $test->getDepartement();
echo ' ';
echo $test->getNumDpt();
