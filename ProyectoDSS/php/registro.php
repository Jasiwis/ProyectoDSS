<?php
include 'db.php';

$alert = ''; // Variable para almacenar el mensaje de alerta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $usuario = trim($_POST["usuario"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // Validaciones
    // Usuario solo con letras y números
    if (!preg_match("/^[a-zA-Z0-9]+$/", $usuario)) {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El usuario solo puede contener letras y números.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    // Email válido
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Formato de correo no válido.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    // Contraseña entre 7 y 8 caracteres
    elseif (strlen($password) < 7 || strlen($password) > 8) {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    La contraseña debe tener entre 7 y 8 caracteres.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    // Contraseña debe iniciar con mayúscula
    elseif (!preg_match("/^[A-Z]/", $password)) {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    La contraseña debe iniciar con una letra mayúscula.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    // Contraseñas coincidentes
    elseif ($password !== $confirmPassword) {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Las contraseñas no coinciden.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }
    
    if (empty($alert)) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Consulta preparada para evitar inyección SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, usuario, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $apellido, $usuario, $email, $passwordHash);

        if ($stmt->execute()) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Registro exitoso. Redirigiendo a Iniciar Sesión...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            // Redirigir después de 3 segundos
            header("refresh:3; url=sesion.php");
        } else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al registrar usuario.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Bootstrap CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">  
    <title>Registro</title>  
</head>  
<body>  
    <div class="container">  
        <div class="left-side">  
            <h1>NoteHive</h1>  
            <img src="../img/logo.png" alt="Logo" class="logo">  
            <p>¿Ya tienes una cuenta?<br><br>
                <a href="../php/sesion.php" class="login-link oval">Iniciar Sesión</a>
                <br><br>
                <a href="../index.php" class="login-link oval">Volver a Inicio</a>
            </p>  
        </div>  
        <div class="right-side">  
            <h2>Regístrate</h2>
            <!-- Aquí se muestra la alerta -->
            <?php 
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <form action="registro.php" method="POST">  
                <div class="input-container">  
                    <span class="icon">👤</span>  
                    <input type="text" name="nombre" placeholder="Nombre" required>  
                </div>  
                <div class="input-container">  
                    <span class="icon">👤</span>  
                    <input type="text" name="apellido" placeholder="Apellido" required>  
                </div>  
                <div class="input-container">  
                    <span class="icon">👤</span>  
                    <input type="text" name="usuario" placeholder="Usuario" required>  
                </div>  
                <div class="input-container">  
                    <span class="icon">📧</span>  
                    <input type="email" name="email" placeholder="Email" required>  
                </div>  
                <div class="input-container">  
                    <span class="icon">🔒</span>  
                    <input type="password" name="password" placeholder="Contraseña" required>  
                </div>  
                <div class="input-container">  
                    <span class="icon">🔒</span>  
                    <input type="password" name="confirmPassword" placeholder="Confirmar Contraseña" required>  
                </div>  
                <button type="submit" class="register-btn">Registrar</button>  
            </form>  
        </div>  
    </div>
    <!-- Bootstrap Bundle JS (incluye Popper) -->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>
