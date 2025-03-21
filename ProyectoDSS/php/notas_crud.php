<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];

    if ($accion == "crear") {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria_id = $_POST['categoria_id'];
        $usuario_id = 4; //aqui de momento esta fijo

        $stmt = $conn->prepare("INSERT INTO notas (usuario_id, titulo, contenido, categoria_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $usuario_id, $titulo, $contenido, $categoria_id);
        $stmt->execute();
        echo "Nota creada exitosamente.";
    }

    if ($accion == "actualizar") {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria_id = $_POST['categoria_id'];

        $stmt = $conn->prepare("UPDATE notas SET titulo=?, contenido=?, categoria_id=? WHERE id=?");
        $stmt->bind_param("ssii", $titulo, $contenido, $categoria_id, $id);
        $stmt->execute();
        echo "Nota actualizada exitosamente.";
    }

    if ($accion == "eliminar") {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM notas WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "Nota eliminada exitosamente.";
    }

    $stmt->close();
    $conn->close();
}
?>
