<?php
include 'db.php';
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    die("Usuario no autenticado");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];

    // crear una nueva nota
    if ($accion == "crear") {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria_id = $_POST['categoria_id'];
        $usuario_id = $_SESSION["usuario_id"]; 

        $stmt = $conn->prepare("INSERT INTO notas (usuario_id, titulo, contenido, categoria_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $usuario_id, $titulo, $contenido, $categoria_id);
        if ($stmt->execute()) {
            echo "Nota creada exitosamente.";
        } else {
            echo "Error al crear la nota.";
        }
    }

    if ($accion == "actualizar") {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria_id = $_POST['categoria_id'];

          // Verificar que la nota pertenece al usuario
          $stmt = $conn->prepare("SELECT usuario_id FROM notas WHERE id=?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $stmt->bind_result($nota_usuario_id);
          $stmt->fetch();
          $stmt->close();

        $stmt = $conn->prepare("UPDATE notas SET titulo=?, contenido=?, categoria_id=? WHERE id=?");
        $stmt->bind_param("ssii", $titulo, $contenido, $categoria_id, $id);
        $stmt->execute();
        echo "Nota actualizada exitosamente.";
    }

    if ($accion == "eliminar") {
        $id = $_POST['id'];

          // Verificar que la nota pertenece al usuario
          $stmt = $conn->prepare("SELECT usuario_id FROM notas WHERE id=?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $stmt->bind_result($nota_usuario_id);
          $stmt->fetch();
          $stmt->close();

        $stmt = $conn->prepare("DELETE FROM notas WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "Nota eliminada exitosamente.";
    }

    $stmt->close();
    $conn->close();
}
?>
