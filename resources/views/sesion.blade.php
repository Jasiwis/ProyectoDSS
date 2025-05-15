<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Bootstrap CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">  
    <title>Iniciar Sesión</title>  
</head>  
<body>  
    <div class="container">  
        <div class="left-side">  
            <h1>NoteHive</h1>  
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">  
            <p>¿No tienes una cuenta?<br><br><a href="{{ route('registro') }}" class="login-link oval">Crear cuenta</a></p> 
            <p><a href="{{ url('/') }}" class="login-link oval">Volver a Inicio</a></p>
        </div>  
        <div class="right-side">  
            <h2>Iniciar Sesión</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <form action="{{ route('login') }}" method="POST">  
                @csrf
                <div class="input-container">  
                    <span class="icon">👤</span>  
                    <input type="text" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}" required>  
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