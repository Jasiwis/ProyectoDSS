<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteHive</title>
    <!-- Enlace al archivo CSS principal que define el estilo de la página -->
    <link rel="stylesheet" href="../ProyectoDSS/css/estiloindex.css"> 
</head>
<body>
    <!-- Barra de navegación principal del sitio -->
    <nav class="contenedor-fluid nav">
        <div class="contenedor cf">
            <div class="marca">
                <!-- Logo e identidad de la aplicación, enlaza al inicio (sección splash) -->
                <a href="../ProyectoDss/index.php">
                    <img src="../ProyectoDSS/img/logo.png" class="logo">
                    NoteHive
                </a>
            </div>
            <i class="fa fa-bars nav-toggle"></i>
            <ul>
                <!-- Enlaces de navegación a las diferentes secciones del sitio -->
                <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
                <li><a href="#ventajas">Ventajas</a></li>
                <li><a href="../ProyectoDSS/php/sesion.php">Notas</a></li>
                <li><a href="../ProyectoDSS/php/sesion.php" class="btn-login">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <!-- Sección principal de bienvenida con slogan e imagen de scroll -->
    <div class="contenedor-fluid splash" id="splash">
        <div class="contenedor">
            <h1 class="bienvenido">Bienvenido a NoteHive</h1>
            <h2 class="slogan">Anota, organiza, recuerda</h2>
            <span class="continuar">
                <!-- Icono de flecha para indicar al usuario que puede continuar hacia la siguiente sección -->
                <a href="#sobre-nosotros">
                    <img src="../ProyectoDSS/img/flecha.png" alt="Icono de continuar">
                </a>
            </span>
        </div>
    </div>

    <!-- Sección informativa sobre la misión y propósito de NoteHive -->
    <div class="contenedor-fluid intro" id="sobre-nosotros">
        <div class="contenedor">
            <h2>Sobre Nosotros</h2>
            <p>Creemos que las pequeñas ideas pueden convertirse en grandes proyectos, y por eso queremos ayudarte a que no se te escape ninguna. Sabemos que muchas veces los grandes cambios comienzan con una simple nota: una palabra clave, una tarea pendiente, una inspiración repentina o un recordatorio importante.</p>
            <p> Nuestro propósito es brindarte una herramienta sencilla, práctica y confiable que te permita capturar esos momentos sin esfuerzo. Ya sea que estés planificando tu día, escribiendo una lista de tareas, organizando tus estudios o simplemente anotando pensamientos, NoteHive está diseñado para acompañarte en cada paso.</p>
        </div>
    </div>

    <!-- Sección de beneficios clave de usar la plataforma -->
    <div class="contenedor-fluid caracteristicas" id="ventajas">
        <div class="contenedor cf">
            <h2>Ventajas</h2>
            <!-- Cada columna representa una ventaja o característica destacada -->
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

    <!-- Pie de página con derechos reservados -->
    <footer class="contenedor-fluid pie-de-pagina">
        <div class="contenedor">
            <p>© 2025 NoteHive. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Enlace al archivo JavaScript principal-->
    <script src="../ProyectoDss/js/indexjs.js"></script>
</body>
</html>
