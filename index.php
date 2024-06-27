<?php

// Incluir archivo de config.php donde están las rutas
require_once 'config.php';
// Incluir archivo de usuario_controlador.php donde se ejecutan las funciones
require_once CONTROLLER_PATH . 'usuarioControlador.php';

?>

<!------------------------------------------- HTML ------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome (icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container mt-5">
        <div class="bg-primary p-1 border rounded">
            <h2 class="mb-4 text-center text-danger">Gestión de Usuarios</h2>
            <div class="container mt-3 mb-4">
                <img src="<?php echo BASE_URL . '/assets/media/_2f0668bb-2855-4b0a-9594-0e711a1146ce.jpg'; ?>" alt="Foto usuarios tipo Simpsons zombies"  class="img-fluid rounded mx-auto d-block">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-around mb-3">
                <a href="<?php echo BASE_URL . '/index.php?action=insertar'; ?>" class="btn btn-outline-light"><i class="fa-solid fa-user-plus"></i> Altas</a>
                <a href="<?php echo BASE_URL . '/index.php?action=listar'; ?>" class="btn btn-outline-light"><i class="fas fa-list"></i> Listado Usuarios</a>
                <a href="<?php echo BASE_URL . '/index.php?action=listarId'; ?>" class="btn btn-outline-light"><i class="fa-solid fa-user-gear"></i> Consultar Usuario</a>
                <a href="<?php echo BASE_URL . '/index.php?action=modificar'; ?>" class="btn btn-outline-light"><i class="fa-solid fa-user-pen"></i> Modificar Usuario</a>
                <a href="<?php echo BASE_URL . '/index.php?action=listar'; ?>" class="btn btn-danger"><i class="fa-solid fa-user-slash"></i> Eliminar Usuario</a>
            </div>
            
        </div><!-- container mt-3 mb-5 -->
    </div>

    <!-- Incluye Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php


/* Verifica si el parámetro action está presente en la URL. Si está presente, asigna su valor a la variable $action; de lo contrario, establece $action en 'listar' */ 
if (!isset($_GET['action'])) {
    header('Location: ' . BASE_URL . '/index.php?action=' .'');
    exit;
}

/* Comienzo de una estructura de control switch. Dependiendo del valor de $action, se ejecutará una de las siguientes acciones:
Si $action es 'crear', se invocará la función crear_usuario()
Si $action es 'actualizar', se invocará la función actualizar_usuarios()
Si $action es 'listar', no se hace nada, ya que el listado de usuarios se mostrará solo cuando se pulse el botón correspondiente
 */
// $action = $_GET['action'];

// switch ($action) {
//     case 'insertar':
//         insertarUsuario();
//         break;
//     case 'modificar':
//         modificarUsuario();
//         break;
//     case 'eliminar':
//         eliminarUsuario();
//         break;
//     case 'listar':
//         listarUsuarios();
//         break;
//     default:
//         // No hacer nada, solo mostrar el div de gestión de usuarios
//         break;
// }

?>
