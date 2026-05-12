<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px;">

        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.jpg') }}" width="80">
            <h4 class="mt-2">Login</h4>
        </div>

        <!-- MENSAJE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Recordarme</label>
            </div>

            <div class="d-flex justify-content-between">

                <button class="btn btn-primary">
                    Iniciar sesión
                </button>

                <a href="{{ route('register') }}" class="btn btn-success">
                    Registrarse
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
