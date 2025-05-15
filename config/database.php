<?php

class Database
{
    private $host = 'localhost';
    private $db = 'asistencia-aprode';
    private $user = 'root';
    private $pass = '';
    private $pdo;

    public function getConnection()
    {
        if (!$this->pdo) {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8";
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return $this->pdo;
    }
}
