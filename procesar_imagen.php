<?php


$ruta_final_imagen = null;

if (isset($_FILES['imagen'])
    && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['imagen']['tmp_name'];
    $fileName = $_FILES['imagen']['name'];
    $fileSize = $_FILES['imagen']['size'];
    $fileType = $_FILES['imagen']['type'];
    $extensiones_permitidas = ['image/jpeg', 'image/png', 'image/webp'];
    $max_size = 2 * 1024 * 1024; // Límite de 2MB

    if (!in_array($fileType, $extensiones_permitidas)) {
        $errores[] = "Solo se permiten imágenes JPG, PNG o WEBP.";
    }

    if ($fileSize > $max_size) {
        $errores[] = "La imagen es demasiado pesada. El máximo es 2MB.";
    }

    if (empty($errores)) {
        $carpeta_destino = './images/';

        if (!is_dir($carpeta_destino)) {
            mkdir($carpeta_destino, 0755, true);
        }

        $nombre_limpio = preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);
        $ruta_final_imagen = $carpeta_destino . time() . "_" . $nombre_limpio;

        if (!move_uploaded_file($fileTmpPath, $ruta_final_imagen)) {
            $errores[] = "Error crítico al guardar la imagen en el servidor.";
        }
    }
}

echo "<img src='$ruta_final_imagen'>";
