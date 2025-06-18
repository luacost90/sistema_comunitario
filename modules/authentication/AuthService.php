<?php
    require_once 'interfaces/AuthRepositoryInterface.php';

    class AuthService{
        private AuthRepositoryInterface $repository;

        public function __construct(AuthRepositoryInterface $repository){
            $this->repository = $repository;
        }

        public function login(string $username, string $password){
            
            $user = $this->repository->findByUsername($username);
            
            
            if($user && password_verify($password, $user->password)){
                $userRole = $this->repository->findByUserByRole($user->rol);
                return ['id' => $user->id, 'username' => $user->username, 'role' => $userRole['role_name']];
            }

            return null;
        }

    }
?>