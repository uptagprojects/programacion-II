<?php

define("DB_HOST", getenv("DB_HOST") ?: "mysql"); // localhost
define("DB_USER", getenv("DB_USER") ?: "user");
define("DB_PASSWORD", getenv("DB_PASSWORD") ?: "password");
define("DB_NAME", getenv("DB_NAME") ?: "testdb");


$mysqli = new mysqli(
    DB_HOST, // HOST
    DB_USER,   // USUARIO
    DB_PASSWORD,  // CONTRASEÑA
    DB_NAME // BASE DE DATOS
);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}
echo "Conectado exitosamente";


function showUser($row) {
    return "<li>{$row['id']} - {$row['nombre']} - {$row['cedula']} - {$row['telefono']}</li>";
}

$limit = 5;
$result = $mysqli->query("SELECT id, nombre, cedula, telefono FROM usuarios LIMIT $limit");


?>
<ul>
    <?php

    while ($row = $result->fetch_assoc()) {
        echo showUser($row);
    }
    ?>
</ul>

<?php

/*



try {

    $limit = 5;
    $result = $mysqli->query("SELECT id, nombre, cedula, telefono FROM usuarios LIMIT 5");
    ?>

    <ul>
        <?php
        

        $result->data_seek(0); // Reiniciar el puntero del resultado para volver a leer desde el principio

        for($i = 0; $i < $limit; $i++) {
            $row = $result->fetch_assoc();
            if ($row) {
                echo showUser($row);
            }
        }
        ?>
    </ul>
<?php
} catch (Exception $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}*/



?>