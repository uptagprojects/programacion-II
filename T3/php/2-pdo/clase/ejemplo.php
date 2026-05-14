<?php

$email_usuario = $_POST['email']; // posible inyección SQL: email=algo';DELETE FROM USERS;'

$statement_list_users = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$statement_update_user = $pdo->prepare("UPDATE usuarios SET nombre = ? WHERE email = ?");




$statement_list_users->execute([$email_usuario]);




$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, rol) VALUES (:nombre, :email, :rol)");
$stmt->execute([
    ':nombre' => 'Ana Gómez',
    ':email' => 'ana@mail.com',
    ':rol' => 'editor'
]);
echo "ID insertado: " . $pdo->lastInsertId();