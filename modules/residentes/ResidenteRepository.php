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
        $sql = "SELECT r.*, g.nombre_genero, e.edad_categoria
            FROM residentes r
            LEFT JOIN generos g ON r.fk_genero = g.id_genero
            LEFT JOIN edad_categorias e ON r.fk_edad_categoria = e.id_edad_categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResidenteById(int $id){
        $sql = "SELECT r.*, g.nombre_genero, e.edad_categoria
            FROM residentes r
            LEFT JOIN generos g ON r.fk_genero = g.id_genero
            LEFT JOIN edad_categorias e ON r.fk_edad_categoria = e.id_edad_categoria
            WHERE r.id_residente = :id_residente";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id_residente', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteResidente(int $id){
        $sql = "DELETE FROM residentes WHERE id_residente = :id_residente";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id_residente', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateResidente(array $data) {
        $sql = "UPDATE residentes SET
            cedula_residente = :cedula_residente,
            nombre_residente = :nombre_residente,
            apellido_residente = :apellido_residente,
            fecha_nacimiento = :fecha_nacimiento,
            edad = :edad,
            direccion = :direccion,
            telefono = :telefono,
            embarazo = :embarazo,
            fk_genero = :fk_genero,
            fk_edad_categoria = :fk_edad_categoria
            WHERE id_residente = :id_residente";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':cedula_residente', $data['cedula_residente']);
        $stmt->bindValue(':nombre_residente', $data['nombre_residente']);
        $stmt->bindValue(':apellido_residente', $data['apellido_residente']);
        $stmt->bindValue(':fecha_nacimiento', $data['fecha_nacimiento']);
        $stmt->bindValue(':edad', $data['edad'], PDO::PARAM_INT);
        $stmt->bindValue(':direccion', $data['direccion']);
        $stmt->bindValue(':telefono', $data['telefono']);
        $stmt->bindValue(':embarazo', $data['embarazo'], PDO::PARAM_BOOL);
        $stmt->bindValue(':fk_genero', $data['fk_genero'], PDO::PARAM_INT);
        $stmt->bindValue(':fk_edad_categoria', $data['fk_edad_categoria'], PDO::PARAM_INT);
        $stmt->bindValue(':id_residente', $data['id_residente'], PDO::PARAM_INT);

        return $stmt->execute();
    }
}

?>