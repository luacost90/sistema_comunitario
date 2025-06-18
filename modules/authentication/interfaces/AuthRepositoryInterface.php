<?php
    interface AuthRepositoryInterface{
        public function findByUsername(string $username): ?User;
        public function findByUserByRole(int $fk_rol);
    }
?>