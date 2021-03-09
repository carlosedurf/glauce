<?php

namespace Models;

use Core\Model;

class User extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function find(int $id): array
    {
        $data = array();

        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id AND status = :status");
        $query->bindValue(":id", $id);
        $query->bindValue(":status", 1);
        $query->execute();

        if($query->rowCount() > 0){
            $data = $query->fetch(\PDO::FETCH_ASSOC);
        }

        return $data;
    }

    public function findAll(): array
    {
        $data = array();

        $query = $this->db->query("SELECT * FROM users WHERE status = 1");

        if($query->rowCount() > 0){
            $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $data;
    }

    public function create(string $name, string $email, string $password): bool
    {
        $query = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $query->bindValue(":name", $name);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", md5($password));
        $isOk = $query->execute();

        return $isOk;
    }

    public function update(int $id, string $name, string $password = ""): bool
    {
        if(!empty($password)){
            $sql = "UPDATE users SET name = :name, password = :password, updated_at = NOW() WHERE id = :id";
        }else{
            $sql = "UPDATE users SET name = :name, updated_at = NOW() WHERE id = :id";
        }

        $query = $this->db->prepare($sql);
        $query->bindValue(":id", $id);
        $query->bindValue(":name", $name);

        if(!empty($password)) {
            $query->bindValue(":password", md5($password));
        }

        $isOk = $query->execute();

        return $isOk;
    }

    public function emailExists(string $email): bool
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email AND status = :status");
        $query->bindValue(":email", $email);
        $query->bindValue(":status", 1);
        $query->execute();

        return ($query->rowCount() > 0) ? true : false;

    }

    public function delete(int $id):bool
    {
        $query = $this->db->prepare("UPDATE users SET status = :status WHERE id = :id");
        $query->bindValue(":status", 0);
        $query->bindValue(":id", $id);
        $isOk = $query->execute();

        return $isOk;
    }

}