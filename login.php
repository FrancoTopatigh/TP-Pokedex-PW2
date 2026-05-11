<?php
session_start();
include 'conexion.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_ingresado = $_POST['usuario'];
    $password_ingresada = $_POST['contrasenia'];

    $sql = "SELECT id, nombre, contrasenia FROM usuario WHERE nombre = ?";
    $stmt = mysqli_prepare($conexion, $sql);


    mysqli_stmt_bind_param($stmt, "s", $usuario_ingresado);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);


    if ($usuario_datos = mysqli_fetch_assoc($resultado)) {


        if (password_verify($password_ingresada, $usuario_datos['contrasenia'])) {


            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $usuario_datos['nombre'];

            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El usuario no existe.";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <!-- Card principal roja -->
        <div class="card bg-danger border-dark border-4 shadow-lg p-3" style="max-width: 400px; width: 100%; border-radius: 2rem;">


            <div class="bg-primary border border-white border-4 rounded-circle mb-3 shadow" style="width: 60px; height: 60px;"></div>


            <div class="card-body bg-dark rounded-3 border border-secondary p-4">
                <h3 class="text-center text-white mb-4">LOGIN</h3>

                <?php if ($error !== ""): ?>
                    <div class="alert alert-warning py-1 small text-center"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-white-50 small">ENTRENADOR</label>
                        <input type="text" name="usuario" class="form-control form-control-sm bg-secondary text-white border-0" placeholder="Nombre..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-white-50 small">PASSWORD</label>
                        <input type="password" name="contrasenia" class="form-control form-control-sm bg-secondary text-white border-0" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2 shadow-sm fw-bold">CONECTAR</button>
                </form>
            </div>

            <div class="text-center mt-3">
                <a href="registro.php" class="text-white text-decoration-none small">REGISTRAR NUEVO PERFIL</a>
            </div>
            <div class="text-center mt-3">
                <a href="index.php" class="text-white text-decoration-none small">Volver a la pantalla principal</a>
            </div>
        </div>
    </div>

</body>

</html>