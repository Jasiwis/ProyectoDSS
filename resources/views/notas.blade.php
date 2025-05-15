<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">  
    <script src="{{ asset('js/notasJs.js') }}" defer></script>  
    <title>App Notas</title>  
</head>  
<body>  
<nav class="navbar">  
    <div class="navbar-container">  
        <div class="brand">  
            <a href="{{ route('registrado') }}">  
                <img src="{{ asset('img/logo.png') }}" class="logo">  
            </a>  
        </div>  
        <i class="fa fa-bars nav-toggle"></i>  
        <ul class="nav-links">   
            <li><a href="{{ route('perfil') }}">Mi perfil</a></li>
            <li><a href="{{ route('registrado') }}" class="btn-login">Inicio</a></li>
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
    <button class="btn" id="btnCrearNota">+ Crear nueva nota</button>  
    <div class="notes-grid" id="notesGrid">
    @forelse($notas as $nota)
        <div class="note-card">
            <span class="categoria-badge">{{ $nota->categoria->nombre }}</span>
            <h2>{{ $nota->titulo }}</h2>
            <p>{!! nl2br(e($nota->contenido)) !!}</p>
            <small>{{ $nota->fecha_creacion ? \Carbon\Carbon::parse($nota->fecha_creacion)->format('d/m/Y H:i') : 'Sin fecha' }}</small>
            <div class="note-actions">
                <button class="btn btn-light" onclick="editNote({{ $nota->id }})">Editar</button>
                <button class="btn btn-light" onclick="deleteNote({{ $nota->id }})">Eliminar</button>
            </div>
        </div>
    @empty
        <div class="no-notes">
            <p>No tienes notas creadas. ¡Agrega una nueva!</p>
        </div>
    @endforelse
    </div>  
</div>  

<div id="overlay"></div>

<div id="editModal">
    <h2 id="modalTitle">Crear Nueva Nota</h2>
    <div id="modalErrors" class="alert alert-danger" style="display:none;"></div>
    <input type="text" id="titulo" placeholder="Título de la nota" required><br><br>
    <textarea id="contenido" placeholder="Contenido de la nota" required></textarea><br><br>
    <select id="categoria" name="categoria" required>
        <option value="" disabled selected>Selecciona una categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select><br><br>
    <button class="btn" id="btnModalGuardar">Guardar</button>
    <button class="btn btn-secondary" id="btnModalCancelar">Cancelar</button>
</div>
<script src="{{ asset('js/notasJs.js') }}"></script>
</body>  
</html>