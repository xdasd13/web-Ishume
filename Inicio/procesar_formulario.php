<?php
// Configuración de la base de datos
$host = 'localhost';     
$username = 'root';   
$password = '';     
$database = 'forum'; 

// Número de WhatsApp al que se enviarán los mensajes (incluye código de país)
$numero_whatsapp = '51991157028'; // Cambia esto por tu número real con código de país (51 para Perú)

// Inicializar array de errores
$errores = [];

// Función para limpiar y validar entradas
function limpiarEntrada($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
    return $dato;
}

// Recibir y limpiar los datos del formulario
$nombre = isset($_POST['nombre']) ? limpiarEntrada($_POST['nombre']) : '';
$email = isset($_POST['email']) ? limpiarEntrada($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? limpiarEntrada($_POST['telefono']) : '';
$tipoEvento = isset($_POST['tipoEvento']) ? limpiarEntrada($_POST['tipoEvento']) : '';
$fecha = isset($_POST['fecha']) ? limpiarEntrada($_POST['fecha']) : '';
$comentario = isset($_POST['comentario']) ? limpiarEntrada($_POST['comentario']) : '';

// Validar que existan los campos requeridos
if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio";
}

if (empty($email)) {
    $errores[] = "El email es obligatorio";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El formato del email no es válido";
}

if (empty($tipoEvento)) {
    $errores[] = "El tipo de evento es obligatorio";
}

if (empty($comentario)) {
    $errores[] = "El comentario es obligatorio";
}

// Validar teléfono (debe tener 9 dígitos)
if (!empty($telefono)) {
    // Eliminar espacios y caracteres no numéricos
    $telefono_limpio = preg_replace('/[^0-9]/', '', $telefono);
    
    if (strlen($telefono_limpio) != 9) {
        $errores[] = "El número de teléfono debe tener exactamente 9 dígitos";
    } else {
        // Formatear el teléfono para asegurar consistencia
        $telefono = $telefono_limpio;
    }
}

// Validar fecha (si se proporciona)
if (!empty($fecha)) {
    // Convertir la fecha a timestamp
    $fecha_timestamp = strtotime($fecha);
    $hoy_timestamp = strtotime(date('Y-m-d'));
    $un_anio_despues = strtotime('+1 year', $hoy_timestamp);
    
    // Verificar que la fecha no sea pasada
    if ($fecha_timestamp < $hoy_timestamp) {
        $errores[] = "La fecha del evento no puede ser en el pasado. Por favor, selecciona una fecha a partir de hoy.";
    }
    
    // Verificar que la fecha no sea más de un año en el futuro
    if ($fecha_timestamp > $un_anio_despues) {
        $errores[] = "No se pueden programar eventos con más de un año de anticipación.";
    }
}

// Si hay errores, enviar respuesta con los errores
if (count($errores) > 0) {
    echo json_encode([
        'success' => false,
        'message' => implode('. ', $errores)
    ]);
    exit;
}

// Formatear la fecha para mostrarla mejor (si existe)
$fecha_formateada = !empty($fecha) ? date('d/m/Y', strtotime($fecha)) : 'No especificada';

// Guardar en la base de datos
try {
    // Crear conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Configurar el manejo de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, telefono, tipo_evento, fecha, comentario, fecha_registro) 
                           VALUES (:nombre, :email, :telefono, :tipoEvento, :fecha, :comentario, NOW())");
    
    // Vincular parámetros
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':tipoEvento', $tipoEvento);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':comentario', $comentario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    $db_success = true;
    $db_message = "Datos guardados correctamente en la base de datos";
} catch(PDOException $e) {
    // Registrar el error en un archivo de log (opcional)
    error_log("Error de base de datos: " . $e->getMessage(), 0);
    
    $db_success = false;
    $db_message = "Error al guardar en la base de datos. Por favor, inténtalo más tarde.";
    
    // No mostrar el mensaje de error específico en producción
    // $db_message = "Error al guardar en la base de datos: " . $e->getMessage();
}

// Solo continuar con el envío a WhatsApp si la base de datos fue exitosa
if ($db_success) {
    // Preparar el mensaje para WhatsApp
    $mensaje = "🎬 *NUEVO CONTACTO - ISHUME PRODUCTORA* 🎬\n\n";
    $mensaje .= "*Nombre:* $nombre\n";
    $mensaje .= "*Email:* $email\n";
    $mensaje .= "*Teléfono:* " . (!empty($telefono) ? $telefono : "No proporcionado") . "\n";
    $mensaje .= "*Tipo de Evento:* $tipoEvento\n";
    $mensaje .= "*Fecha del Evento:* $fecha_formateada\n";
    $mensaje .= "*Comentarios:*\n$comentario";

    // Codificar el mensaje para URL
    $mensaje_codificado = urlencode($mensaje);

    // Crear el enlace para WhatsApp
    $url_whatsapp = "https://api.whatsapp.com/send?phone=$numero_whatsapp&text=$mensaje_codificado";

    // Respuesta al cliente
    $response = [
        'success' => true,
        'message' => $db_message,
        'whatsapp_url' => $url_whatsapp
    ];
} else {
    $response = [
        'success' => false,
        'message' => $db_message
    ];
}

// Devolver respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>