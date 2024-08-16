<?php
include 'conexion.php'; 


$rut = $_POST['rut'];
$nombre_completo = $_POST['nombre_completo'];
$correo_electronico = $_POST['correo_electronico'];
$numero_movil = $_POST['numero_movil'];
$fotografia_perfil = $_FILES['fotografia_perfil']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fotografia_perfil"]["name"]);


if (move_uploaded_file($_FILES["fotografia_perfil"]["tmp_name"], $target_file)) {
    
    $sql = "INSERT INTO usuarios (rut, nombre_completo, correo_electronico, numero_movil, fotografia_perfil, fecha_hora) 
            VALUES ('$rut', '$nombre_completo', '$correo_electronico', '$numero_movil', '$fotografia_perfil', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error al cargar la fotografía.";
}

$conn->close();
?>
