<?php

namespace Source\Models;

use Glauce\Database\Model;

class User extends Model
{

    protected string $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function emailExists(string $email): bool
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email AND status = :status");
        $query->bindValue(":email", $email);
        $query->bindValue(":status", 1);
        $query->execute();

        return ($query->rowCount() > 0) ? true : false;

    }

}