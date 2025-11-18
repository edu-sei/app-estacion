@extends(head)

<body>

    <header>
        <h1>{{ APP_SECTION }}</h1>
    </header>

    <main class="auth-container">
        <div class="auth-card">
            <h2>Validación de cuenta</h2>
            <p>{{ MENSAJE }}</p>
            <a href="?slug=login" class="btn-primary">Ir a Login</a>
        </div>
    </main>

    @extends(footer)

</body>
</html>