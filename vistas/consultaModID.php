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
                <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <?php if ($usuario): ?>
                <h2 class="text-center mt-5">Modificar Usuario</h2>
                <form action="<?php echo BASE_URL . '/index.php?action=modificar'; ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="email" class="form-control" id="mail" name="mail" value="<?php echo htmlspecialchars($usuario['mail']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="instagram">Instagram:</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo htmlspecialchars($usuario['instagram']); ?>"required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="tiktok">Tiktok:</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="<?php echo htmlspecialchars($usuario['tiktok']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="domicilio">Domicilio:</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo htmlspecialchars($usuario['domicilio']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="poblacion">Población:</label>
                        <input type="text" class="form-control" id="poblacion" name="poblacion" value="<?php echo htmlspecialchars($usuario['poblacion']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="provincia">Provincia:</label>
                        <select name="provincia" id="provincia" class="form-control" required>
                            <option value="" disabled selected>Selecciona una Provincia</option>
                            <!-- Bucle para recorrer el array -->
                            <?php foreach ($provincias as $provincia): ?>
                                <option value="<?php echo htmlspecialchars($provincia); ?>"><?php echo htmlspecialchars($provincia); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label for="pais">País:</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo htmlspecialchars($usuario['pais']); ?>" required>
                    </div><!-- form-group -->
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="activo" name="activo" value="<?php echo htmlspecialchars($usuario['activo']); ?>" required>
                        <label class="form-check-label" for="activo">Activo</label>
                    </div>
                            <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
            <?php endif; ?>
    </div><!-- container mt-5 p-3 border rounded -->
</body>
</html>
