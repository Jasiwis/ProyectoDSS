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
                <!-- Logo e identidad de la aplicación -->
                <a href="#splash">
                    <img src="{{ asset('img/logo.png') }}" class="logo">
                    NoteHive
                </a>
            </div>
            <i class="fa fa-bars nav-toggle"></i>
            <ul>
                <!-- Enlaces de navegación -->
                <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
                <li><a href="#ventajas">Ventajas</a></li>
                <li><a href="{{ route('notas') }}">Notas</a></li>
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
            <p>Creemos que las pequeñas ideas pueden convertirse en grandes proyectos, y por eso queremos ayudarte a que no se te escape ninguna. Sabemos que muchas veces los grandes cambios comienzan con una simple nota: una palabra clave, una tarea pendiente, una inspiración repentina o un recordatorio importante.</p>
            <p>Nuestro propósito es brindarte una herramienta sencilla, práctica y confiable que te permita capturar esos momentos sin esfuerzo. Ya sea que estés planificando tu día, escribiendo una lista de tareas, organizando tus estudios o simplemente anotando pensamientos, NoteHive está diseñado para acompañarte en cada paso.</p>
        </div>
    </div>

    <!-- Sección de ventajas -->
    <div class="contenedor-fluid caracteristicas" id="ventajas">
        <div class="contenedor cf">
            <h2>Ventajas</h2>
            <div class="col-3">
                <h3>Orden</h3>
                <p>Organiza tus ideas, tareas y proyectos de forma clara y accesible. Clasifica tus notas por categorías y encuentra fácilmente todo lo que necesitas, sin perder tiempo buscando.</p>
            </div>
            <div class="col-3">
                <h3>Recordatorios</h3>
                <p>No dejes que tus pendientes se te pasen por alto. Configura alertas personalizadas para recibir notificaciones a tiempo y mantener el control de tus actividades diarias sin olvidos.</p>
            </div>
            <div class="col-3">
                <h3>Sostenibilidad</h3>
                <p>Cuida el planeta mientras organizas tu vida. Al tomar notas de forma digital, reduces el uso de papel y contribuyes a un estilo de vida más ecológico y responsable.</p>
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