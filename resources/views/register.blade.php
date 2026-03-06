<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concretize | Registre-se</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>

    <style>
        :root {
            --primary-orange: #fd7e14;
        }

        body {
            background-color: #f4f7f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            padding: 20px 0;
        }

        #register-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            border-top: 6px solid var(--primary-orange);
            max-width: 700px;
            width: 95%;
            padding: 2.5rem;
            position: relative;
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #333;
            transition: transform 0.2s;
        }

        .back-link:hover {
            transform: scale(1.1);
            color: var(--primary-orange);
        }

        .logo-img {
            width: 100px;
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.25rem rgba(253, 126, 20, 0.15);
        }

        .btn-register {
            background-color: var(--primary-orange);
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #e66d00;
            box-shadow: 0 4px 12px rgba(253, 126, 20, 0.3);
        }

        .login-link {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .login-link:hover {
            color: var(--primary-orange);
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <main id="register-container">
        <a href="{{route('inicio.index')}}" class="back-link">
            <i class="ph ph-arrow-circle-left" style="font-size:32px;"></i>
        </a>

        <div class="text-center mb-4">
            <img src="{{ asset('image/logo.png') }}" alt="logo" class="logo-img">
            <h2 class="fw-bold mb-1">Crie sua conta</h2>
            <p class="text-muted">Preencha os dados abaixo para começar</p>
        </div>

        <form method="POST" action="{{ route('register.cria') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" id="nome" class="form-control" name="nome" placeholder="Seu nome" required>
                </div>

                <div class="col-md-6">
                    <label for="date" class="form-label">Data de Nascimento</label>
                    <input type="date" id="date" class="form-control" name="data_nascimento" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="seu@email.com" required>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Mínimo 6 caracteres" required>
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary btn-register mb-3">Finalizar Cadastro</button>
                <div>
                    <a href="{{route('login.index')}}" class="login-link">
                        Já possui uma conta? <strong>Faça login</strong>
                    </a>
                </div>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
