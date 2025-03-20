<?php
include 'db.php';

// Obtenr todas las notas de la base de datos
$sql = "SELECT notas.id, notas.titulo, notas.contenido, categorias.nombre AS categoria, notas.fecha_creacion 
        FROM notas 
        JOIN categorias ON notas.categoria_id = categorias.id";
$result = $conn->query($sql);

$notas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notas[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../css/styles.css">  
    <script src="/ProyectoDSS/js/notasJs.js"></script>  
    <title>App Notas</title>  
</head>  
<body>  
<nav class="navbar">  
    <div class="navbar-container">  
        <div class="brand">  
            <a href="/ProyectoDSS/php/registrado.php">  
                <img src="/ProyectoDSS/img/logo.png" class="logo">  
            </a>  
        </div>  
        <i class="fa fa-bars nav-toggle"></i>  
        <ul class="nav-links">   
            <li><a href="/ProyectoDSS/php/perfil.php">Mi perfil</a></li>
            <li><a href="/ProyectoDSS/php/registrado.php" class="btn-login">Inicio</a></li>
        </ul>  
    </div>  
</nav> 

<div class="sidebar">  
    <div class="logo">📝 Notas</div>   
    <div class="tags-section">  
        <h2>Etiquetas</h2>  
        <div class="tag-list">  
            <div class="tag-item">💻 Trabajo</div>    
            <div class="tag-item">❤️ Salud</div>  
            <div class="tag-item">👤 Personal</div>      
            <div class="tag-item">🛒 Compras</div>   
        </div>  
    </div>  
</div>  

<div class="main-content">  
    <div class="header">  
        <h1 id="mainTitle">Todas Las Notas</h1>  
        <div class="search-bar">  
            <input type="text" placeholder="Buscar por título, contenido o etiquetas...">  
            <span>🔍</span>  
        </div>  
    </div>  
    <button class="btn btn-primary" onclick="openCreateModal()">+ Crear nueva nota</button>  
    <div class="notes-grid" id="notesGrid">
        <?php foreach ($notas as $nota): ?>
            <div class="note-card">
                <h2><?= htmlspecialchars($nota['titulo']) ?></h2>
                <p><?= nl2br(htmlspecialchars($nota['contenido'])) ?></p>
                <span class="category"><?= htmlspecialchars($nota['categoria']) ?></span>
                <small><?= $nota['fecha_creacion'] ?></small>
                <button onclick="editNote(<?= $nota['id'] ?>)">Editar</button>
                <button onclick="deleteNote(<?= $nota['id'] ?>)">Eliminar</button>
            </div>
        <?php endforeach; ?>
    </div>  
</div>  

<script>
    function editNote(id) {
        alert("Función para editar nota ID " + id);
    }

    function deleteNote(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta nota?")) {
            fetch('/ProyectoDSS/php/notas_crud.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `accion=eliminar&id=${id}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            });
        }
    }
</script>

</body>  
</html>
