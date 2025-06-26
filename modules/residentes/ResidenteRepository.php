<?php

require_once 'models/Residente.php';
require_once 'interfaces/ResidenteRepositoryInterface.php';

class ResidenteRepository implements ResidenteRepositoryInterface{
    private $conn;

    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function createResidente(array $data){

        $residente = new Residente($data);
        
        $sql = "INSERT INTO residentes (
            cedula_residente,
            nombre_residente,
            apellido_residente,
            fecha_nacimiento,
            edad,
            direccion,
            telefono,
            embarazo,
            fk_genero,
            fk_edad_categoria
        ) VALUES (
            :cedula_residente,
            :nombre_residente,
            :apellido_residente,
            :fecha_nacimiento,
            :edad,
            :direccion,
            :telefono,
            :embarazo,
            :fk_genero,
            :fk_edad_categoria
        )";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':cedula_residente', $residente->cedula_residente);
        $stmt->bindValue(':nombre_residente', $residente->nombre_residente);
        $stmt->bindValue(':apellido_residente', $residente->apellido_residente);
        $stmt->bindValue(':fecha_nacimiento', $residente->fecha_nacimiento);
        $stmt->bindValue(':edad', $residente->edad, PDO::PARAM_INT);
        $stmt->bindValue(':direccion', $residente->direccion);
        $stmt->bindValue(':telefono', $residente->telefono);
        $stmt->bindValue(':embarazo', $residente->embarazo, PDO::PARAM_BOOL);
        $stmt->bindValue(':fk_genero', $residente->fk_genero, PDO::PARAM_INT);
        $stmt->bindValue(':fk_edad_categoria', $residente->fk_edad_categoria, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function indexResidente(){
        $sql = "SELECT * FROM residentes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>