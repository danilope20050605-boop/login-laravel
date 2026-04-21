<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <section>
        <div class="login-box">
            <form action="{{ route('register.post') }}" method="POST">
                @csrf <h2>Registrar</h2>

                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Nombre Completo</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Correo</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Contraseña</label>
                </div>

                <button type="submit">Registrar</button>

                <div class="register-link">
                    <p>Ya tienes una cuenta? 
                        <a href="{{ route('login') }}">Iniciar Sesión</a>    
                    </p>
                </div>
            </form>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>