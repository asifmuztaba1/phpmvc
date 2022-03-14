<?php

namespace Phpmvc\Src\Core;

use \PDO;
use PDOException;

class Database
{
    private $server_name;
    private $db_name;
    private $db_user;
    private $db_password;

    public function __construct($server_name, $db_name = NULL, $db_user = NULL, $db_password = NULL)
    {
        try {
            if ($db_name && $db_user) {
                $this->pdo = new PDO("mysql:host=$server_name;dbname=$db_name", $db_user, $db_password);
                $this->database_type = 'MYSQL';
            } else {
                $this->pdo = new PDO("sqlite:$server_name");
                $this->database_type = 'SQLITE';
            }
            $this->server_name = $server_name;
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_password = $db_password;
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function close()
    {
        $this->db->pdo = NULL;
    }

    public function pdo_reconnect()
    {
        $this->pdo = new PDOdb($this->server_name, $this->db_name, $this->db_user, $this->db_password);
    }

    public function escape_mysql_identifier($field): string
    {
        return "`" . str_replace("`", "``", $field) . "`";
    }

    public function insert($table, $data): bool
    {
        try {
            $keys = array_keys($data);
            foreach ($keys as $key) {
                $bind[] = ":$key";
            }
            $binders = implode(",", $bind);
            $keys = array_map([$this, 'escape_mysql_identifier'], $keys);
            $fields = implode(",", $keys);
            $table = $this->escape_mysql_identifier($table);
            $sql = "INSERT INTO $table ($fields) VALUES ($binders)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function select($table)
    {
        try {
            $query = $this->pdo->query("SELECT * FROM $table");
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function createTable($sql)
    {
        try {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Error Handling
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}