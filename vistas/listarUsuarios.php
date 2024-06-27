<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center mb-4 p-5">
        <a href="<?php echo BASE_URL . '/index.php'; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left-long"></i> Volver al inicio</a>
    </div>
    <div class="container mt-5 mb-4 p-3 border rounded">
        <h2 class="text-center">Listado de Usuarios</h2>
        <div class="container mt-3 mb-5">
            <img src="<?php echo BASE_URL . '/assets/media/th1.jpg'; ?>" alt="" class="img-fluid rounded mx-auto d-block">
        </div><!-- container mt-3 mb-5 -->
        
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Mail</th>
                    <th>Provincia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['apellidos']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['mail']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['provincia']); ?></td>
                        <td>
                            <!-- Botón para actualizar usuario -->
                            <!-- urlencode — Codifica como URL una cadena -->
                            <a href="<?php echo BASE_URL . '/vistas/modificarUsuario.php?id=' . urlencode($usuario['id']); ?>" class="btn btn-outline-secondary btn-sm">
                                Modificar
                            </a>
                            <a href="<?php echo BASE_URL . '/vistas/bajaUsuario.php?id=' . urlencode($usuario['id']); ?>" class="btn btn-outline-danger btn-sm">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- container mt-5 p-3 border rounded -->
</body>
</html>
