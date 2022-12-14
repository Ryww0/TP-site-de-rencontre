<?php

namespace repository;

include('./service/Database.php');
include('./repository/ISportRepository.php');



use model\Sport;
use service\Database;
use repository\ISportRepository;
use PDO;
use PDOException;

class SportRepository extends Database implements ISportRepository
{
    public function add(Sport $sport)
    {
        $stmt = $this->db->prepare("INSERT INTO sport (name) VALUES (:name)");
        $stmt->bindValue(':name', $sport->getName());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM sport ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $sports = $stmt->fetchAll();
        foreach ($sports as $sport) {
            $s = new Sport($sport['name']);
            $s->setId($sport['id']);
            $ss[] = $s;
        }
        return $ss;
        $stmt = null;
    }

    public function findBySport(string $sport): Sport
    {
        $stmt = $this->db->prepare("SELECT * FROM sport WHERE design = :name");
        $stmt->bindValue(':name', $sport);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find design in database");
        }
        $stmt = null;
        $sport = new Sport($arr['name']);
        $sport->setName($arr['id']);
        return $sport;
    }

    public function update(Sport $sport)
    {
        $stmt = $this->db->prepare("UPDATE sport SET name = :name WHERE id = :id");
        $stmt->bindValue(':name', $sport->name);
        $stmt->bindValue(':id', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function remove(Sport $sport)
    {
        $stmt = $this->db->prepare("DELETE FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function findById($params): Sport
    {
        $stmt = $this->db->prepare("SELECT * FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find id in database");
        }
        $stmt = null;
        $sport = new Sport($arr['name']);
        $sport->setName($arr['id']);
        return $sport;
    }
}
