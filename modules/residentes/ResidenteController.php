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

        public function viewEditar(){
            include 'views/residentes/edit.php';
        }

        public function createResidente(array $data){

            $db = (new Database())->getConnection();

            // Inyectamos la implementación concreta del repositorio
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);
            
            $fecha = DateTime::createFromFormat('Y-m-d', $data['fecha_nacimiento']);
        
            $data['edad'] = (int)date('Y') - (int)$fecha->format('Y');

            $data['fk_edad_categoria'] = $this->determinarCategoriaEdad($data['edad']);

            $res = $residenteService->saveResidente($data);

            if($res){
                echo json_encode(['success'=> true, 'message'=>'Se ha registrado exitosamente']);
            }else{
                echo json_encode(['success' => false, 'error' => 'No se ha podido registrar el usuario']);
            }
        }

        public function listResidente(){
            $db = (new Database())->getConnection();
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $residentes = $residenteService->listResidente();

            if($residentes) 
                echo json_encode(['success' => true, 'data' => $residentes]);
            else
                echo json_encode(['success' => false, 'error' => 'No se ha podido registrar el usuario']);
        }

        public function getResidenteById(int $id){
            $db = (new Database())->getConnection();
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $residente = $residenteService->getResidenteById($id);

            if($residente) 
                echo json_encode(['success' => true, 'data' => $residente]);
            else
                echo json_encode(['success' => false, 'error' => 'No se pudo encontrar al residente']);

        }

        public function deleteResidente(int $id){
            $db = (new Database())->getConnection();
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $residente = $residenteService->deleteResidente($id);

            if($residente) 
                echo json_encode(['success' => true]);
            else
                echo json_encode(['success' => false, 'error' => 'No se pudo borrar el regostro del habitante']);

        }

        public function updateResidente(array $data){
            $db = (new Database())->getConnection();
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $fecha = DateTime::createFromFormat('Y-m-d', $data['fecha_nacimiento']);
        
            $data['edad'] = (int)date('Y') - (int)$fecha->format('Y');

            $data['fk_edad_categoria'] = $this->determinarCategoriaEdad($data['edad']);


            $update = $residenteService->editResidente($data);

             if($update){
                echo json_encode(['success'=> true, 'message'=>'Se ha actualizado exitosamente']);
            }else{
                echo json_encode(['success' => false, 'error' => 'No se ha podido actualizar el usuario']);
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

        public function  countResidentesByEdadCategoria(){
             $db = (new Database())->getConnection();
            $repository = new ResidenteRepository($db);
            $residenteService = new ResidenteService($repository);

            $residentes = $residenteService->countResidentesByEdadCategoria();

            if($residentes) 
                echo json_encode(['success' => true, 'data' => $residentes]);
            else
                echo json_encode(['success' => false, 'error' => 'cargar la consulta']);
        }
    }


?>