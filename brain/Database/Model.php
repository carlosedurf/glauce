<?php

namespace Glauce\Database;

use \PDO;

class Model
{

    protected $db;
    protected string $table;
    protected bool $timestamps;
    protected string $query;

    public function __construct()
    {
        $this->timestamps   = true;
        $this->db           = Connection::getInstance();
    }

    public function findAll($fields = "*")
    {

        if(is_array($fields))
            $fields = implode(",", $fields);

        $this->query = "SELECT {$fields} FROM {$this->table}";

        $get = $this->db->query($this->query);

        return $get->fetchAll();

    }

    public function find(int $id, $fields = "*")
    {
        return $this->where(['id' => $id], $fields);
    }

    public function where(array $conditions, $operator = " AND ", $fields = "*")
    {
        if(is_array($fields))
            $fields = implode(",", $fields);

        $this->query = "SELECT {$fields} FROM {$this->table} WHERE ";

        $binds = array_keys($conditions);

        $where = null;
        foreach ($binds as $v){
            if(is_null($where)){
                $where .= "{$v} = :{$v}";
            }else{
                $where .= "{$operator} {$v} = :{$v}";
            }
        }

        $this->query .= $where;

        $get = $this->bind($conditions);
        $get->execute();

        if(!$get->rowCount()){
//            throw new \Exception("Nada Encontrado para essa consulta!");
            return false;
        }

        if($get->rowCount() === 1)
            return $get->fetch();

        return $get->fetchAll();
    }

    public function create($data)
    {
        $binds = array_keys($data);

        $timestampFields = ($this->timestamps) ? ",created_at, updated_at" : "";
        $timestampValues = ($this->timestamps) ? ",NOW(), NOW()" : "";

        $this->query = "INSERT INTO {$this->table} (".implode(',', $binds) . $timestampFields . ") VALUES (:".implode(', :', $binds) . $timestampValues . ")";

        $insert = $this->bind($data);

        $insert->execute();

        return $this->find($this->db->lastInsertId());

    }

    public function update(array $data)
    {
        if(!array_key_exists('id', $data)){
            throw new \Exception("É preciso informar um ID válido para update!");
        }

        $this->query = "UPDATE {$this->table} SET ";

        $set = null;
        $binds = array_keys($data);

        foreach ($binds as $v){
            if($v !== 'id'){
                $set .= is_null($set) ? "{$v} = :{$v}" : ", {$v} = :{$v}";
            }
        }

        $this->query .= "{$set}, updated_at = NOW() WHERE id = :id";

        $update = $this->bind($data);
        $update->execute();

        return $this->find($data['id']);
    }

    public function delete($id): bool
    {
        if(is_array($id)){
            $bind   = $id;
            $field  = array_keys($id)[0];
        }else{
            $bind   = ['id' => $id];
            $field  = 'id';
        }

        $this->query = "DELETE FROM {$this->table} WHERE {$field} = :{$field}";

        $delete = $this->bind($bind);

        return $delete->execute();
    }

    private function bind($data)
    {
        $bind   = $this->db->prepare($this->query);

        foreach ($data as $k => $v){
            gettype($v) == "int" ? $bind->bindValue(":{$k}", $v, PDO::PARAM_INT) : $bind->bindValue(":{$k}", $v, PDO::PARAM_STR);
        }

        return $bind;

    }

}