<?php

const DB_HOST = "mysql"; // localhost
const DB_USER = "user";
const DB_PASSWORD = "password";
const DB_NAME = "testdb";

$mysqli = new mysqli(
    DB_HOST, // HOST
    DB_USER,   // USUARIO
    DB_PASSWORD,  // CONTRASEÑA
    DB_NAME, // BASE DE DATOS
);

$nombre = "Juan Pérez";

// 1. Preparar
$stmt = $mysqli->prepare("SELECT id, nombre, cedula FROM usuarios WHERE nombre = ?");
// 2. Vincular (s = string)
$stmt->bind_param("s", $nombre);
// 3. Ejecutar
$stmt->execute();
// 4. Obtener resultados
$resultado = $stmt->get_result();
$usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

print_r($usuarios);
$stmt->close();

?>