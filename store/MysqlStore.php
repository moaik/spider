<?php

class MysqlStore
{
    public $pdo;

    public function __construct($options = null)
    {
        try {
            $host = 'localhost';
            $database = 'spider';
            $username = 'root';
            $password = '';
            $dsn = 'mysql:host=' . $host . ';dbname=' . $database;

            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function insert($table, $data)
    {
        $columns = $values = $placeholder = [];
        foreach ($data as $key => $val) {
            $columns[] = $key;
            $values[] = $val;
            $placeholder[] = '?';
        }

        $query = "INSERT INTO " .$table. " (" . implode(',', $columns) .") VALUES (" .implode(',', $placeholder).");";
        $statement = $this->pdo->prepare($query);
        $inserted = $statement->execute($values);
        return $inserted;
    }
}
