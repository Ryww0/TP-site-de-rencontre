<?php

namespace repository;

use service\Database;

class DepartementRepository extends Database implements IDepartementRepository
{
    public function add(Departement $departement)
    {
        $stmt = $this->db->prepare("INSERT INTO departement (departement, numDpt) VALUES (:departement, :numDpt)");
        $stmt->bindValue(':departement', $departement->getDepartement());
        $stmt->bindValue(':numDpt', $departement->getnumDpt());
        $stmt->execute();
        $stmt = null;
    }

    public function findByDepartement($departement): Departement
    {
        $stmt = $this->db->prepare("SELECT * FROM departement WHERE departement = ?");
        $stmt->execute([$departement]);
        $arr = $stmt->fetch();
        if (!$arr) {
            exit('No rows');
        }
        $stmt = null;

        $departement = new Departement($arr['departement']);
        $departement->setNumDpt($arr['numDpt']);
        return $departement;
    }

    public function findByNumDpt($numDpt): Departement
    {
        $stmt = $this->db->prepare("SELECT * FROM departement WHERE numDpt = ?");
        $stmt->execute([$numDpt]);
        $arr = $stmt->fetch();
        if (!$arr) {
            exit('No rows');
        }
        $stmt = null;

        $departement = new Departement($arr['departement']);
        $departement->setNumDpt($arr['numDpt']);
        return $departement;
    }


    public function updateByDepartement(Departement $departement)
    { {
            $stmt = $this->db->prepare("UPDATE departement SET numDpt = ? WHERE departement = ?");
            $stmt->execute([$departement->getNumDpt(), $departement->getDepartement()]);
            $stmt = null;
        }
    }

    public function updateByNumDpt(Departement $departement)
    { {
            $stmt = $this->db->prepare("UPDATE departement SET departement = ? WHERE numDpt = ?");
            $stmt->execute([$departement->getNumDpt(), $departement->getDepartement()]);
            $stmt = null;
        }
    }


    public function remove(Departement $departement)
    { {
            $stmt = $this->db->prepare("DELETE FROM departement WHERE numDpt = ?");
            $stmt->execute([$departement->getNumDpt()]);
            $stmt = null;
        }
    }
}
