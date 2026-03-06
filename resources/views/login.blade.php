<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concretize | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary-orange: #fd7e14;
            --dark-blue: #0d6efd;
        }

        body {
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #login-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            border-top: 5px solid var(--primary-orange);
            max-width: 450px;
            width: 90%;
            padding: 2.5rem;
        }

        .logo-img {
            width: 120px;
            transition: transform 0.3s ease;
        }

        .logo-img:hover {
            transform: scale(1.05);
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #dee2e6;
        }

        .form-control:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.25 margin-top: rgba(253, 126, 20, 0.25);
        }

        .btn-login {
            background-color: var(--primary-orange);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #e66d00;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(253, 126, 20, 0.3);
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #333;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--primary-orange);
        }

        .register-link {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .register-link:hover {
            color: var(--primary-orange);
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <a href="{{route('inicio.index')}}" class="back-link">
        <i class="ph ph-arrow-circle-left" style="font-size:35px;"></i>
    </a>

    <main id="login-container">
        <div class="text-center mb-4">
            <img src="{{ asset('image/logo.png') }}" alt="logo" class="logo-img mb-3">
            <h2 class="fw-bold text-dark">Bem-vindo</h2>
            <p class="text-muted">Acesse sua conta para continuar</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-bold text-muted">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="ph ph-envelope"></i>
                    </span>
                    <input type="email" id="email" class="form-control border-start-0" name="email" placeholder="exemplo@email.com" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label small fw-bold text-muted">Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="ph ph-lock"></i>
                    </span>
                    <input type="password" id="password" class="form-control border-start-0" name="password" placeholder="Sua senha secreta" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login mb-4">Entrar</button>

            <div class="text-center">
                <a class="register-link" href="{{route('register.index')}}">
                    Ainda não tem conta? <strong>Registre-se agora</strong>
                </a>
            </div>
        </form>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
