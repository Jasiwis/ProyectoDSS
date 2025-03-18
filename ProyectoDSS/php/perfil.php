<?php
include 'db.php';
session_start();

$usuario = $_SESSION["usuario"];

$stmt = $conn->prepare("SELECT id, nombre, apellido, email FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

//recuperar datos
if($data = $resultado->fetch_assoc()){
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $email = $data['email'];
}

$stmt->close();
$conn->close();


//cerrar sesion
if (isset($_POST['cerrar_sesion'])) {

// Destruye todas las variables de sesión
$_SESSION = array();
    
    session_destroy();
    header("Location: sesion.php"); // Redirige a login
    exit();
}
?>


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
                <h2><?php echo $usuario;?></h2>
                <p><strong>Nombres: </strong><?php echo $nombre;?></p>
                <p><strong>Apellidos: </strong><?php echo $apellido;?></p>
                <p><strong>Correo: </strong><?php echo $email;?></p>
                <form method="post">
                <button class="btn btn-danger" type="submit" name="cerrar_sesion">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
