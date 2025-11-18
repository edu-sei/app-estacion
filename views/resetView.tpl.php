@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Restablecer contraseña</h2>
            
            {{ MENSAJE }}
            
            <div id="formulario" style="display: {{ MOSTRAR_FORMULARIO }};">
                <form method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="contraseña">Nueva contraseña:</label>
                        <input type="password" id="contraseña" name="contraseña" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="repetir_contraseña">Repetir contraseña:</label>
                        <input type="password" id="repetir_contraseña" name="repetir_contraseña" required>
                    </div>
                    
                    <button type="submit" class="btn-primary">Restablecer contraseña</button>
                </form>
            </div>
            
            <div class="auth-links">
                <a href="?slug=login">Volver al login</a>
            </div>
        </div>
    </main>

    <script>
        if("{{ MOSTRAR_FORMULARIO }}" === "false") {
            document.getElementById('formulario').style.display = 'none';
        }
    </script>

    @extends(footer)

</body>
</html>