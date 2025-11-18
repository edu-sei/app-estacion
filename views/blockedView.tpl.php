@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Cuenta bloqueada</h2>
            <p>{{ MENSAJE }}</p>
            <a href="?slug=landing" class="btn-primary">Volver al inicio</a>
        </div>
    </main>

    @extends(footer)

</body>
</html>