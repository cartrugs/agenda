<?php

// Incluir archivo de config.php donde están las rutas
// Verifica si el archivo ya ha sido incluido y si es así, no lo incluye de nuevo
require_once __DIR__ . '/../config.php';
// Incluir archivo de usuario_modelo.php donde se obtiene PDO
require_once MODEL_PATH . 'usuarioModelo.php';

// Array de provincias
$provincias = ['Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'A Coruña', 'Cuenca', 'Gerona', 'Granada', 'Guadalajara', 'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Orense', 'Palencia', 'Las Palmas', 'Pontevedra', 'La Rioja', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'];

// Función para listar por id
function listarPorId($id) {
    $usuarios = obtenerListaPorId($id);
    require VIEW_PATH . 'consultaUsuarioID.php';
    return $usuarios;
    
}

// Función para obtener usuario por id
function buscarUsuarioPorId() {
    $mensaje = '';
    $usuario = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = limpiarDato($_POST['id']); 
        if (!empty($id)) {
            $usuario = obtenerUsuarioPorID($id);
            if ($usuario) {
                $mensaje = "Usuario encontrado";
            } else {
                $mensaje = "El ID no existe";
            }
        } else {
            $mensaje = "Por favor ingrese un ID";
        }
    }

    require VIEW_PATH . 'consultaModId.php';
}

// Función para listar los usuarios
function listarUsuarios() {
    // Se asigna compo valor a la variable la llamada a la función obtener_usuarios (usuario_modelo.php)
    $usuarios = obtenerUsuarios();
    // Llama a vistas
    require VIEW_PATH . 'listarUsuarios.php';
    return $usuarios;
} 

// Función para manejar la creación de un nuevo usuario
function insertarUsuario() {
    // Variable que se declara vacía para poder manejar el mensaje
    $mensaje = '';

    // Verificar si se ha enviado el formulario (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener, validar y limpiar los datos del formulario
        $nombre = limpiarDato($_POST['nombre']);
        $apellidos = limpiarDato($_POST['apellidos']);
        $telefono = limpiarDato($_POST['telefono']);
        $mail = limpiarDato($_POST['mail']);
        $instagram = limpiarDato($_POST['instagram']);
        $tiktok = limpiarDato($_POST['tiktok']);
        $domicilio = limpiarDato($_POST['domicilio']);
        $poblacion = limpiarDato($_POST['poblacion']);
        $provincia = limpiarDato($_POST['provincia']);
        $pais = limpiarDato($_POST['pais']);
        $activo = limpiarDato($_POST['activo']);
        
        // Comprobar que los campos no estén vacíos
        if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($mail) && !empty($instagram) && !empty($tiktok) && !empty($domicilio) && !empty($poblacion) && !empty($pais) && !empty($provincia) && !empty($activo)) {
            // Llama a la funcion agreagar_usuario (usuario_modelo.php) con 4 parámetros
            if (agregarUsuario($nombre, $apellidos, $telefono, $mail, $instagram, $tiktok, $domicilio, $poblacion, $provincia, $pais, $activo)) {
                $mensaje = 'Usuario creado correctamente';
            } else {
                $mensaje = 'Error al crear el usuario';
            }
            // header() función para agregar línea HTTP
            header('Location: ' . BASE_URL . '/index.php?mensaje=' . urlencode($mensaje));
            exit;
        }
    }
    require VIEW_PATH . 'altaUsuario.php';
}

function modificarUsuario() {
    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = limpiarDato(($_POST['id']));
        $nombre = limpiarDato(($_POST['nombre']));
        $apellidos = limpiarDato(($_POST['apellidos']));
        $telefono = limpiarDato(($_POST['telefono']));
        $mail = limpiarDato(($_POST['mail']));
        $instagram = limpiarDato($_POST['instagram']);
        $tiktok = limpiarDato($_POST['tiktok']);
        $domicilio = limpiarDato($_POST['domicilio']);
        $poblacion = limpiarDato($_POST['poblacion']);
        $provincia = limpiarDato($_POST['provincia']);
        $pais = limpiarDato($_POST['pais']);
        $activo = limpiarDato($_POST['activo']);
        if (!empty($id) && !empty($nombre)) {
            if (editarUsuario($nombre, $apellidos, $telefono, $mail, $instagram, $tiktok, $domicilio, $poblacion, $provincia, $pais, $activo)) {
                $mensaje = 'Usuario actualizado correctamente';
            } else {
                $mensaje = 'Error al actualizar el usuario';
            }
        } else {
            $mensaje = 'Por favor ingrese un ID y un nombre válidos';
        }
    } else {
        $mensaje = 'El formulario debe enviarse por método POST';
    }
    
    echo $mensaje;
}

function eliminarUsuario() {
    $mensaje = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = limpiarDato(($_POST['id']));
        if (!empty($id) && !empty($nombre)) {   
            if (desactivarUsuario($id, $nombre)) {
                $mensaje = 'Usuario eliminado correctamente';
            } else {
                $mensaje = 'Error al eliminar el usuario';
            }
        } else {
            $mensaje = 'Por favor ingrese un ID válido';
        }
    } else {
        $mensaje = 'El formulario debe de enviarse por post';
    }

    echo $mensaje;
}

// Función para limpiar datos
function limpiarDato($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/* Comienzo de una estructura de control switch. Dependiendo del valor de $action, se ejecutará una de las siguientes acciones:
Si $action es 'crear', se invocará la función crear_usuario()
Si $action es 'actualizar', se invocará la función actualizar_usuarios()
Si $action es 'listar', no se hace nada, ya que el listado de usuarios se mostrará solo cuando se pulse el botón correspondiente
 */
$action = $_GET['action'];

switch ($action) {
    case 'insertar':
        insertarUsuario();
        break;
    case 'modificar':
        modificarUsuario();
        break;
    case 'eliminar':
        eliminarUsuario();
        break;
    case 'listar':
        listarUsuarios();
        break;
    case 'listarID':
        listarPorId($id);
        break;
    case 'consultar':
        buscarUsuarioPorID();
        break;
    default:
        // No hacer nada, solo mostrar el div de gestión de usuarios
        break;
}

?>