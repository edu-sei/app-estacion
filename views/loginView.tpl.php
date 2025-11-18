@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
        <nav>
            <a href="?slug=landing">← Inicio</a>
        </nav>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Acceder a tu cuenta</h2>
            
            {{ MENSAJE }}
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" required>
                </div>
                
                <button type="submit" class="btn-primary">Acceder</button>
            </form>
            
            <div class="auth-links">
                <a href="?slug=recovery">¿Olvidaste tu contraseña?</a>
                <a href="?slug=register">¿No tienes una cuenta? Registrarse</a>
            </div>
        </div>
    </main>

    @extends(footer)

</body>
</html>