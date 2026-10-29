<?php
declare(strict_types=1);

require_once '../ws/models/User.php';

// Valores del HTML
$nombre = (string) ($_POST['nombre'] ?? 'noName');
$apellido1 = (string) ($_POST['apellido1'] ?? 'noApellido1');
$apellido2 = (string) ($_POST['apellido2'] ?? 'noApellido2');
$contrasena1 = (string) ($_POST['contrasena1'] ?? '');
$telefono = (string) ($_POST['telefono'] ?? '682987521');
$correo = (string) ($_POST['correo'] ?? 'no@email.com');
$genero = (string) ($_POST['genero'] ?? 'otro');

// Encripta las contraseñas. 
$contrasenaEncriptada = password_hash($contrasena1, PASSWORD_BCRYPT);

$user = new User(
    $nombre,
    $apellido1,
    $apellido2,
    $contrasenaEncriptada,
    $telefono,
    $correo,
    $genero,
);
$user_json = $user->toJson();
$user->toTextFile($user_json);
echo $user_json;

