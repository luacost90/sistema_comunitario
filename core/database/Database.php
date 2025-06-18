<?php
class Database{
    private string $host = 'localhost';
    private string $db = 'gestion_escuela';
    private string $user = 'root';
    private string $pass = '123';

    private PDO $conn;

    public function getConnection(): PDO{
        if(!isset($this->conn)){
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
                $this->conn = new PDO($dsn, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Conexion fallida". $e->getMessage());
            }
        }

        return $this->conn;
    }

}

?>