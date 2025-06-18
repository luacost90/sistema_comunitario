<?php
    require_once 'models/User.php';
    require_once 'interfaces/AuthRepositoryInterface.php';

    class AuthRepository implements AuthRepositoryInterface{
        private $conn;

        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

        public function findByUsername(string $username): ?User
        {
            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Ensure User constructor accepts $row as an array
            return $row ? new User($row) : null;
        }

        public function findByUserByRole(int $fk_rol){
            $sql = "SELECT role_name from roles WHERE id_rol = :fk_rol LIMIT 1";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':fk_rol', $fk_rol);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            return $row; 

        }


    }
?>