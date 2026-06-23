<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concretize | Registre-se</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="auth-wrapper">
    <main class="auth-card" style="max-width: 720px;">
        <a href="{{ route('inicio.index') }}" class="back-link" aria-label="Voltar à home">
            <i class="ph ph-arrow-left" style="font-size: 20px;"></i>
        </a>

        <div class="auth-body">
            <div class="text-center mb-4">
                <img src="{{ asset('image/logo.png') }}" alt="Concretize" class="auth-logo mb-3">
                <h2 class="fw-bold mb-1">Crie sua conta</h2>
                <p class="text-muted mb-0">Preencha os dados abaixo para começar</p>
            </div>

            <form method="POST" action="{{ route('register.cria') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Seu nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Data de nascimento</label>
                        <input type="date" id="date" class="form-control" name="data_nascimento" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Mínimo 6 caracteres" required minlength="6">
                    </div>
                </div>
                <div class="mt-4 pt-2 d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-accent px-5 py-2 mb-3">
                        Finalizar cadastro <i class="ph ph-arrow-right ms-1"></i>
                    </button>
                    <div>
                        <span class="text-muted small">Já possui uma conta?</span>
                        <a href="{{ route('login.index') }}"
                           class="text-accent fw-bold text-decoration-none ms-1">Faça login</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
