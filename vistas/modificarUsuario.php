<?php

// Incluir archivo de config.php donde están las rutas
// Verifica si el archivo ya ha sido incluido y si es así, no lo incluye de nuevo
require_once __DIR__ . '/../config.php';
// Incluir archivo de usuario_modelo.php con las funciones de modelo
require_once MODEL_PATH . 'usuarioModelo.php';

// Array de provincias
$provincias = ['Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'A Coruña', 'Cuenca', 'Gerona', 'Granada', 'Guadalajara', 'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Orense', 'Palencia', 'Las Palmas', 'Pontevedra', 'La Rioja', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'];

/* 
El código comienza verificando el método de la solicitud HTTP.
$_SERVER['REQUEST_METHOD'] devuelve el método de la solicitud HTTP (puede ser GET, POST, PUT, etc. Aquí se verifica si el método es GET.
Si la solicitud es un GET y existe un parámetro id en la URL (por ejemplo, actualizar_usuario.php?id=1):
$id = $_GET['id']; extrae el valor del parámetro id de la URL y lo guarda en la variable $id
obtener_usuario_por_id($id); es una función que busca un usuario en la base de datos utilizando este ID y devuelve la información del usuario
Verificar si se envió el formulario de actualización (método POST)
Si la solicitud es un POST y existen los parámetros id y nombre en el cuerpo de la solicitud (es decir, se envió el formulario de actualización):
$_SERVER['REQUEST_METHOD'] === 'POST' verifica si el método de la solicitud es POST.
isset($_POST['id']) && isset($_POST['nombre']) verifica si los parámetros id y nombre están presentes en los datos del formulario enviados.
Si ambas condiciones son verdaderas, se extraen los valores id y nombre del formulario enviado:
Luego se llama a la función editar_usuario($id, $nombre) para actualizar el usuario en la base de datos:
editar_usuario($id, $nombre) es una función (que debes tener definida en algún lugar) que actualiza el nombre del usuario con el ID proporcionado en la base de datos.
*/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = obtenerUsuarioPorID($id); // Función para obtener usuario por ID
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellidos'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $mail = $_POST['mail'];
    $provincia = $_POST['provincia'];
    if (editarUsuario($id, $nombre, $apellidos, $telefono, $mail, $provincia)) {
        header('Location: ' . BASE_URL . '/index.php?action=listar');
        exit;
    }
}

?>


<!------------------------------------------- HTML ------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-4 p-5 bg-light border rounded text-secondary">
        <h2 class="text-center">Actualizar Usuario</h2>
        
        
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div><!-- form-group -->
            <div class="form-group">
                <label for="apellidos">Apellido:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
            </div><!-- form-group -->
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
            </div><!-- form-group -->
            <div class="form-group">
                <label for="mail">Mail:</label>
                <input type="email" class="form-control" id="mail" name="mail" value="<?php echo htmlspecialchars($usuario['mail']); ?>" required>
            </div><!-- form-group -->
            <div class="form-group">
                <label for="provincia">Provincia:</label>
                <select name="provincia" id="provincia" class="form-control" required>
                    <!-- Bucle para recorrer el array -->
                    <?php foreach ($provincias as $prov): ?>
                        <!-- usuario && usuario en el valor [provincia] es = a prov-> si selected es = a prov lo pinta, : si no  aparece vacío-->
                        <option value="<?php echo htmlspecialchars($prov); ?>" <?php echo ($usuario && $usuario['provincia'] == $prov) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($prov); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div><!-- form-group -->
            <div class="text-end">
                <button type="submit" class="btn btn-outline-warning text-end">Modificar</button>
                <a href="<?php echo BASE_URL . '/index.php?action=listar'; ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left-long"></i> Volver al listado</a>
            </div>
            
        </form>
        <div class="container text-center mt-5">
            <img src="<?php echo BASE_URL . '/assets/media/'; ?>" alt=""  class="img-fluid rounded mx-auto d-block">
        </div>
    </div>
</body>
</html>
