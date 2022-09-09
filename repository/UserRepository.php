<?php
include_once 'IUserRepository.php';


class UserRepository extends Database implements IUserRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(User $user)
    {
        $stmt = $this->db->prepare("INSERT INTO user (name, email, password, numDpt) VALUES (:name, :email, :password, :numDpt)");
        $stmt->execute(array(
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'numDpt' => $user->getNumDpt()
        ));
        $stmt = null;
    }

    public function findAll(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM user");
        return $this->db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
    }

    public function findByName(User $name): User
    {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $this->db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
    }
    public function update(User $user)
    {
        $stmt = $this->connection->prepare("UPDATE user SET password = :password WHERE name = :name");
        $stmt->execute(array(
            'name' => $user->getName(),
            'password' => $user->getPassword()
        ));
        $stmt = null;
    }

    public function remove(User $user)
    {
        $stmt = $this->connection->prepare("DELETE FROM user WHERE name = :name");
        $stmt->bindParam(':name', $user->getName());
        $stmt->execute();
        $stmt = null;
    }

}