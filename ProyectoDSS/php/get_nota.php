<?php
include 'db.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    die(json_encode(["error" => "Acceso denegado. Inicia sesión primero."]));
}

$usuario_id = $_SESSION['usuario_id']; // Obtener ID del usuario autenticado

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT id, titulo, contenido, categoria_id FROM notas WHERE id=? AND usuario_id=?");
    $stmt->bind_param("ii", $id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "Nota no encontrada"]);
    }

    $stmt->close();
    $conn->close();
}
?>
