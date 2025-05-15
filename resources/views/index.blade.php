<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteHive</title>
    <!-- Usamos asset() para enlazar archivos CSS -->
    <link rel="stylesheet" href="{{ asset('css/estiloindex.css') }}"> 
</head>
<body>
    <!-- Barra de navegación principal del sitio -->
    <nav class="contenedor-fluid nav">
        <div class="contenedor cf">
            <div class="marca">
                <!-- Usamos route() para enlazar a la página principal -->
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" class="logo">
                    NoteHive
                </a>
            </div>
            <i class="fa fa-bars nav-toggle"></i>
            <ul>
                <!-- Enlaces de navegación -->
                <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
                <li><a href="#ventajas">Ventajas</a></li>
                <li><a href="{{ route('sesion') }}">Notas</a></li>
                <li><a href="{{ route('sesion') }}" class="btn-login">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <!-- Sección principal de bienvenida -->
    <div class="contenedor-fluid splash" id="splash">
        <div class="contenedor">
            <h1 class="bienvenido">Bienvenido a NoteHive</h1>
            <h2 class="slogan">Anota, organiza, recuerda</h2>
            <span class="continuar">
                <a href="#sobre-nosotros">
                    <img src="{{ asset('img/flecha.png') }}" alt="Icono de continuar">
                </a>
            </span>
        </div>
    </div>

    <!-- Sección sobre nosotros -->
    <div class="contenedor-fluid intro" id="sobre-nosotros">
        <div class="contenedor">
            <h2>Sobre Nosotros</h2>
            <p>Creemos que las pequeñas ideas pueden convertirse en grandes proyectos...</p>
            <p>Nuestro propósito es brindarte una herramienta sencilla, práctica y confiable...</p>
        </div>
    </div>

    <!-- Sección de ventajas -->
    <div class="contenedor-fluid caracteristicas" id="ventajas">
        <div class="contenedor cf">
            <h2>Ventajas</h2>
            <div class="col-3">
                <h3>Orden</h3>
                <p>Organiza tus ideas, tareas y proyectos de forma clara y accesible...</p>
            </div>
            <div class="col-3">
                <h3>Recordatorios</h3>
                <p>No dejes que tus pendientes se te pasen por alto...</p>
            </div>
            <div class="col-3">
                <h3>Sostenibilidad</h3>
                <p>Cuida el planeta mientras organizas tu vida...</p>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="contenedor-fluid pie-de-pagina">
        <div class="contenedor">
            <p>© 2025 NoteHive. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Enlace al archivo JavaScript -->
    <script src="{{ asset('js/indexjs.js') }}"></script>
</body>
</html>