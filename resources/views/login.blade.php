<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concretize | Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="auth-wrapper">
    <a href="{{ route('inicio.index') }}" class="back-link" aria-label="Voltar à home">
        <i class="ph ph-arrow-left" style="font-size: 20px;"></i>
    </a>

    <main class="auth-card" style="max-width: 460px;">
        <div class="auth-body">
            <div class="text-center mb-4">
                <img src="{{ asset('image/logo.png') }}" alt="Concretize" class="auth-logo mb-3">
                <h2 class="fw-bold mb-1">Bem-vindo de volta</h2>
                <p class="text-muted mb-0">Acesse sua conta para continuar</p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted">
                            <i class="ph ph-envelope"></i>
                        </span>
                        <input type="email" id="email" class="form-control border-start-0 ps-0"
                               name="email" placeholder="exemplo@email.com" required autocomplete="email">
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted">
                            <i class="ph ph-lock"></i>
                        </span>
                        <input type="password" id="password" class="form-control border-start-0 ps-0"
                               name="password" placeholder="Sua senha" required autocomplete="current-password">
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-4">
                    <a href="#" class="text-muted small text-decoration-none">Esqueci minha senha</a>
                </div>

                <button type="submit" class="btn btn-accent w-100 py-2 mb-4">
                    Entrar <i class="ph ph-arrow-right ms-1"></i>
                </button>

                <div class="text-center">
                    <span class="text-muted small">Ainda não tem conta?</span>
                    <a class="text-accent fw-bold text-decoration-none ms-1"
                       href="{{ route('register.index') }}">Registre-se agora</a>
                </div>
            </form>
        </div>
    </main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
