<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .block {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #4f46e5;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background: #4338ca;
        }

        a {
            font-size: 14px;
            color: #4f46e5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Logo -->
        <div class="logo">
            <!-- Imagen local -->
            <img src="{{ asset('storage/Banner/udg.jpg') }}" alt="Congreso">
        </div>

        <!-- Email Address -->
        <div class="block">
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
        </div>

        <!-- Password -->
        <div class="block">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember"> Recuérdame
            </label>
        </div>

        <!-- Forgot Password -->
        <div class="block" style="text-align: right;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
