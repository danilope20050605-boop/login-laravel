<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <section>
        <div class="login-box">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <h2>Actualizar Contraseña</h2>
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Confirmar Contraseña</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Nueva Contraseña</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password_confirmation" required>
                    <label>Confirmar Nueva Contraseña</label>
                </div>

                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>