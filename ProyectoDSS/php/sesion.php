<?php
include 'db.php';
session_start();

$alert = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    // Buscar usuario
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $passwordHash);
        $stmt->fetch();

        if (password_verify($password, $passwordHash)) {
            $_SESSION["usuario"] = $usuario;
            header("Location: registrado.php"); // Cambia a la página deseada
            exit();
        } else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña incorrecta.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
        }
    } else {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Usuario no encontrado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    }

    $stmt->close();
    $conn->close();
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
    <title>Iniciar Sesión</title>  
</head>  
<body>  
    <div class="container">  
        <div class="left-side">  
            <h1>NoteHive</h1>  
            <img src="../img/logo.png" alt="Logo" class="logo">  
            <p>¿No tienes una cuenta?<br><br><a href="../php/registro.php" class="login-link oval">Crear cuenta</a></p> 
            <p><a href="../index.php" class="login-link oval">Volver a Inicio</a></p>
        </div>  
        <div class="right-side">  
            <h2>Iniciar Sesión</h2>
            <!-- Aquí se muestra la alerta -->
            <?php 
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <form action="sesion.php" method="POST">  
                <div class="input-container">  
                    <span class="icon">👤</span>  
                    <input type="text" name="usuario" placeholder="Usuario" required>  
                </div>   
                <div class="input-container">  
                    <span class="icon">🔒</span>  
                    <input type="password" name="password" placeholder="Contraseña" required>  
                </div>    
                <button type="submit" class="register-btn">Iniciar Sesión</button>  
            </form>  
        </div>  
    </div>
    <!-- Bootstrap Bundle JS (incluye Popper) -->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>
