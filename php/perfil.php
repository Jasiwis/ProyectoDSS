<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ProyectoDSS/css/perfil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Vista Perfil de Usuario</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/ProyectoDSS/img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-top">
                NoteHive
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-inicio" href="/ProyectoDSS/php/registrado.php">Inicio</a>
                    </li>
                </ul>
                <span class="navbar-text ml-3">
                    <i class="fas fa-user-circle fa-lg"></i>
                </span>
            </div>
        </div>
    </nav>
    <div class="container mt-5 text-center">
        <div class="card mx-auto" id="profile-card" style="max-width: 350px;">
            <div class="card-body">
                <div class="profile-icon mb-3">
                    <i class="fas fa-user-circle fa-5x"></i>
                </div>
                <h2>Usuario12</h2>
                <p><strong>Nombres:</strong> -</p>
                <p><strong>Apellidos:</strong> -</p>
                <p><strong>Correo:</strong> lorem@gmail.com</p>
                <p><strong>Contraseña:</strong> ********</p>
                <button class="btn btn-danger">Cerrar sesión</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
