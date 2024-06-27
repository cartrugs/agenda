<?php

// Incluir archivo de configuración
require_once __DIR__ . '/../config.php';

$provincias = ['Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'A Coruña', 'Cuenca', 'Gerona', 'Granada', 'Guadalajara', 'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Orense', 'Palencia', 'Las Palmas', 'Pontevedra', 'La Rioja', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'];

?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar por ID</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center mb-4 p-5">
        <a href="<?php echo BASE_URL . '/index.php'; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left-long"></i> Volver al inicio</a>
    </div>
    <div class="container mt-5 mb-4 p-3 border rounded">
        <h2 class="text-center">Consultar Usuario por ID</h2>
        <div class="container mt-3 mb-5">
            <img src="<?php echo BASE_URL . '/assets/media/th1.jpg'; ?>" alt="" class="img-fluid rounded mx-auto d-block">
        </div><!-- container mt-3 mb-5 -->
        
        <form action="<?php echo BASE_URL . '/index.php?action=consultar'; ?>" method="POST" class="text-center">
                <div class="form-group">
                    <label for="id">ID del Usuario</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <a href="<?php echo BASE_URL . '/index.php?action=listarId'; ?>" class="btn btn-primary">Consultar</a>
        </form>

        <div class="text-end">
            <a href="<?php echo BASE_URL . '/index.php'; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left-long"></i> Volver al inicio</a>
        </div>

        </div><!-- container mt-5 p-3 border rounded -->

        
</body>
</html>