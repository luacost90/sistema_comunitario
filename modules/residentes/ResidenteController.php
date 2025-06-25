<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sistema_comunitario/core/database/Database.php');
    require_once 'ResidenteRepository.php';
    require_once 'ResidenteService.php';


    class ResidenteController{
        public function viewListar(){
            include 'views/residentes/lista.php';
        }

        public function viewRegistrar(){
            include 'views/residentes/registrar.php';
        }

        public function createResidente(array $data){

            $db = (new Database())->getConnection();
            
            $fecha = DateTime::createFromFormat('Y-m-d', $data['fecha_nacimiento']);
        
            $data['edad'] = (int)date('Y') - (int)$fecha->format('Y');

            $data['fk_edad_categoria'] = $this->determinarCategoriaEdad($data['edad']);
            // Inyectamos la implementación concreta del repositorio
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $res = $residenteService->saveResidente($data);

            if($res){
                echo json_encode(['success'=> true, 'message'=>'Se ha registrado exitosamente']);
            }else{
                echo json_encode(['success' => false, 'error' => 'No se ha podido registrar el usuario']);
            }
        }

        public function determinarCategoriaEdad(int $edad): int{
            
            if($edad > 0 && $edad <=3){
                return 1;
            }

            if($edad > 3 && $edad <= 12){
                return 2;
            }

            if($edad > 12 && $edad <= 17){
                return 3;
            }

            if($edad >= 18 && $edad <= 60){
                return 4;
            }

            if($edad > 60){
                return 5; 
            }

            throw new InvalidArgumentException("Edad no válida: $edad");
        }
    }


?>