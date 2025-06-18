<?php
// En AuthController.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistema_aped/core/database/Database.php');
require_once 'AuthRepository.php';
require_once 'AuthService.php';

class AuthController{
    public function viewLogin(){
        include 'views/login.php';
    }

    public function viewDashboard(){
        include 'views/dashboard.php';
    }

    public function login(string $username, string $password){
        $db = (new Database())->getConnection();

        // Inyectamos la implementación concreta del repositorio
        $repository = new AuthRepository($db);
        $authService = new AuthService($repository);

        $user = $authService->login($username, $password);

        if($user){     
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol'] = $user['role'];
            echo json_encode(['success'=> true]);
        }else{
            echo json_encode(['success' => false, 'error' => 'Usuario o contraseña no válidas']);
        }

    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        echo json_encode(['success' => true]);
    }
}

?>