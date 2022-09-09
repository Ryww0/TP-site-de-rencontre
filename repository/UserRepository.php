<?php
include_once 'IUserRepository.php';


class UserRepository implements IUserRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(User $user)
    {
        $stmt = $this->connection->prepare("INSERT INTO user (name, email, password, sport) VALUES (:name, :email, :password, :sport)");
        $stmt->execute(array(
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'sport' => $user->getSport()
        ));
        $stmt = null;
    }

    public function findAll(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM user");
        return $bdd->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
    }

    public function findByName(User $name): User
    {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $bdd->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
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