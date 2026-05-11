<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card bg-danger text-white border-dark border-3" style="max-width: 450px; width: 100%;">
            <div class="card-header border-bottom border-dark">
                <h4 class="mb-0">ALTA DE ENTRENADOR</h4>
            </div>

            <div class="card-body bg-light text-dark">
                <form action="validarRegistro.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control border-danger" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="contrasenia" class="form-control border-danger" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success fw-bold">GUARDAR USUARIO </button>
                        <a href="login.php" class="btn btn-outline-danger btn-sm border-0">Volver al Login</a>
                    </div>
                </form>
            </div>

            <div class="card-footer bg-danger border-top border-dark py-3">
                <div class="row g-2">
                    <div class="col-4">
                        <div class="bg-dark rounded-pill" style="height: 10px;"></div>
                    </div>
                    <div class="col-4">
                        <div class="bg-dark rounded-pill" style="height: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>