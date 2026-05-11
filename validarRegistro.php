<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['nombre'];
    $pass = $_POST['contrasenia'];


    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT);


    $stmt = $conexion->prepare("INSERT INTO usuario (nombre, contrasenia) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass_encriptada);

    try {
        if ($stmt->execute()) {

            echo "<script>
                    alert('¡Usuario registrado exitosamente! Bienvenido Entrenador.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {

            echo "<script>
                    alert('Error: El nombre de usuario ya existe. Elige otro.');
                    window.history.back();
                  </script>";
        } else {

            $msg = addslashes($e->getMessage());
            echo "<script>
                    alert('Error al registrar: $msg');
                    window.history.back();
                  </script>";
        }
    }

    $stmt->close();
    $conexion->close();
}
