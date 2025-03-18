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
        <div class="notes-grid" id="notesGrid"></div>  
    </div>  

    <!-- Crear/Editar Nota Modal -->  
    <div class="modal" id="editModal">  
        <div class="modal-header">  
            <h2 class="modal-title" id="modalTitle">Crear Nueva Nota</h2>  
            <div class="modal-actions">  
                <button class="btn btn-primary" onclick="saveNote()">Guardar</button>  
                <button class="btn btn-secondary" onclick="closeModal('editModal')">Cancelar</button>  
            </div>  
        </div>  
        <input type="text" id="noteTitle" placeholder="Título de la Nota">  
        <textarea id="noteContent" placeholder="Ingresa el contenido de tu nota..."></textarea>  
        <select id="tagSelect" multiple>  
            <option value="Desarrollo">Desarrollo</option>  
            <option value="React">React</option>  
            <option value="Personal">Personal</option>  
            <option value="Viajes">Viajes</option>  
            <option value="Cocina">Cocina</option>  
            <option value="Salud">Salud</option>  
            <option value="Fitness">Fitness</option>  
            <option value="Recetas">Recetas</option>  
        </select>  
    </div>  

    <!-- Ver Nota Modal -->  
    <div class="modal" id="viewModal">  
        <div class="modal-header">  
            <h2 class="modal-title" id="viewTitle"></h2>  
            <div class="modal-actions">  
                <button class="btn btn-primary" onclick="editNote()">Editar</button>  
                <button class="btn btn-secondary" id="archiveBtn" onclick="toggleArchive()">Archivar</button>  
                <button class="btn btn-danger" onclick="deleteNote()">Eliminar</button>  
                <button class="btn btn-secondary" onclick="closeModal('viewModal')">Cerrar</button>  
            </div>  
        </div>  
        <div class="note-tags" id="viewTags"></div>  
        <div class="modal-content" id="viewContent"></div>  
        <div class="note-date" id="viewDate"></div>  
    </div>  

    <div class="overlay" id="overlay"></div>  
</body>  
</html>  
