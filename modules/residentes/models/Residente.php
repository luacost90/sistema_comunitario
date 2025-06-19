<?php
class Residente
{
    public ?int $id_residente;
    public string $nombre_residente;
    public string $apellido_residente;
    public string $fecha_nacimiento;
    public int $edad;
    public string $direccion;
    public string $telefono;
    public bool $embarazo;
    public ?int $fk_grupo_familiar;
    public int $fk_genero;
    public int $fk_edad_categoria;

    public function __construct(array $data = [])
    {
        $this->id_residente = $data['id_residente'] ?? null;
        $this->nombre_residente = $data['nombre_residente'] ?? '';
        $this->apellido_residente = $data['apellido_residente'] ?? '';
        $this->fecha_nacimiento = $data['fecha_nacimiento'] ?? '';
        $this->edad = $data['edad'] ?? 0;
        $this->direccion = $data['direccion'] ?? '';
        $this->telefono = $data['telefono'] ?? '';
        $this->embarazo = $data['embarazo'] ?? false;
        $this->fk_grupo_familiar = $data['fk_grupo_familiar'] ?? null;
        $this->fk_genero = $data['fk_genero'] ?? 0;
        $this->fk_edad_categoria = $data['fk_edad_categoria'] ?? 0;
    }
}
?>
