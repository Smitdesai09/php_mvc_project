<?php

require_once __DIR__ . '/../../common/db.php';

class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM users ORDER BY user_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($data)
    {
        if ($data['role'] !== 'Student') {
            $data['target_year'] = null;
        }

        $stmt = $this->conn->prepare("
            INSERT INTO users (username, email, password, full_name, target_year, role)
            VALUES (:username, :email, :password, :full_name, :target_year, :role)");

        $hash_password = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $hash_password);
        $stmt->bindParam(':full_name', $data['full_name']);
        $stmt->bindParam(':target_year', $data['target_year']);
        $stmt->bindParam(':role', $data['role']);

        return $stmt->execute();
    }

    public function updateUser($id, $data)
    {
        if ($data['role'] !== 'Student') {
            $data['target_year'] = null;
        }

        $stmt = $this->conn->prepare("
            UPDATE users SET username=:username, email=:email, full_name=:full_name, 
            target_year=:target_year, role=:role WHERE user_id=:id");

        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':full_name', $data['full_name']);
        $stmt->bindParam(':target_year', $data['target_year']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
