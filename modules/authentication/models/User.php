<?php
    class User{
        
        public string $id;
        public string $username;
        public string $password;
        public string $rol;

        public function __construct(array $data = []){
            $this->id = $data['id_user'] ?? null;
            $this->username = $data['username'] ?? '';
            $this->password = $data['password'] ?? '';
            $this->rol = $data['fk_rol'] ?? null;
        }

    }


?>