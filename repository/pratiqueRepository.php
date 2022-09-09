<?php

namespace repository;

use model/Pratique;
use service\Database;
use PDO;
use PDOException;

class PratiqueRepository extends Database implements IPratiqueRepository
{
    public function add(Pratique $pratique)
    {
        $stmt = $this->db->prepare("INSERT INTO pratique (idUser, idSport, level) VALUES (:idUser, :idSport, :level)");
        $stmt->bindValue(':idUser', $pratique->getIdUser());
        $stmt->bindValue(':idSport', $pratique->getIdSport());
        $stmt->bindValue(':level', $pratique->getLevel());
        $stmt->execute();
        $stmt = null;    
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare('SELECT * FROM pratique');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find pratique in database");
        }
        $stmt = null;
        $pratiques = [];
        foreach ($arr as $pratique) {
            $p = new Pratique($pratique['idUser'], $pratique['idSport']);
            $p->setLevel($pratique['level']);
            $pratiques[] = $p;
        }
        return $pratiques;
    }

    public function update(Pratique $Pratique)
    {
        // TODO: Implement update() method.
    }

    public function remove(Pratique $Pratique)
    {
        // TODO: Implement remove() method.
    }

    public function findByDesign(string $pratique): Pratique
    {
        $stmt = $this->db->prepare("SELECT * FROM pratique WHERE design = :design");
        $stmt->bindValue(':design', $design);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find design in database");
        }
        $stmt = null;
        $pratique = new Pratique($arr['idUser'], $arr['idSport']);
        $pratique->setLevel($arr['id']);
        return $pratique;
    }
}
