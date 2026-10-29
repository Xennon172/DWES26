<?php
declare(strict_types=1);

require_once '../ws/interfaces/IToJson.php';

class User implements IToJson
{
    private string $nombre;
    private string $apellido1;
    private string $apellido2;
    private string $contrasena1;
    private string $telefono;
    private string $correo;
    private string $genero;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $contrasena1,
        string $telefono,
        string $correo,
        string $genero
    ) {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->contrasena1 = $contrasena1;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->genero = $genero;

    }

    //Guetters 
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido1()
    {
        return $this->apellido1;
    }

    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function getContrasena1()
    {
        return $this->contrasena1;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getGenero()
    {
        return $this->genero;
    }


    //Setters

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }
    public function setContrasena1($contrasena1)
    {
        $this->contrasena1 = $contrasena1;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    // Se convierten los valores a JSON 
    public function toJson(): string
    {
        $user_values = [
            'nombre' => $this->nombre,
            'apellido1' => $this->apellido1,
            'apellido2' => $this->apellido2,
            'contrasena1' => $this->contrasena1,
            'telefono' => $this->telefono,
            'genero' => $this->genero,
            'correo' => $this->correo,
        ];

        return json_encode($user_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    // Guarda los usuarios en un txt.
    public function toTextFile(string $user_json): void
    {
        file_put_contents('UserList.txt', $user_json, FILE_APPEND);
    }

}