<style>
    /* ==========================================
       1. ESTILOS VISUAIS DA NAVBAR
       ========================================== */
    .header-color {
        background-color: #000066; /* Azul Escuro */
    }

    /* Força o cabeçalho a não cortar nada que saia dele */
    .header, .navbar, .header-color {
        overflow: visible !important;
    }

    .search-input {
        border-radius: 20px 0 0 20px !important;
        padding-left: 20px;
    }

    .search-btn {
        background-color: #ff6600; /* Laranja */
        color: white;
        border: none;
        border-radius: 0 20px 20px 0 !important;
        padding: 0 25px;
        transition: background-color 0.2s;
    }

    .search-btn:hover {
        background-color: #e65c00;
        color: white;
    }

    .profile-img-nav {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border: 2px solid #ff6600;
        transition: transform 0.2s;
    }

    .profile-img-nav:hover {
        transform: scale(1.05);
    }

    /* ==========================================
       2. O NOSSO MENU CUSTOMIZADO (LIVRE DO BOOTSTRAP)
       ========================================== */
    .meu-menu-independente {
        display: none; /* Escondido por padrão */
        position: absolute;
        top: 100%; /* Fica exatamente embaixo da foto */
        right: 0;
        margin-top: 10px;
        background-color: #212529; /* Cor dark do Bootstrap */
        min-width: 200px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        z-index: 999999 !important; /* Camada máxima para passar por cima de tudo */
        overflow: hidden;
    }

    /* Classe ativada pelo JavaScript para mostrar o menu */
    .meu-menu-independente.mostrar {
        display: block;
    }

    /* Estilo dos links dentro do menu */
    .meu-menu-independente a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        color: #e9ecef;
        text-decoration: none;
        transition: background 0.2s;
    }

    .meu-menu-independente a:hover {
        background-color: #343a40;
        color: white;
    }

    .meu-menu-independente hr {
        margin: 0;
        border-color: #495057;
    }
</style>

<div>
  <div class="header">
    <nav class="navbar header-color w-100 m-0 py-2 shadow">

      <div class="logo col-2 d-flex justify-content-center align-items-center">
        <a href="{{ route('inicio.index') }}">
          <img src="{{ asset('image/logo.png') }}" style="max-height: 60px; width: auto;" alt="Logo">
        </a>
      </div>

      <div class="container-fluid col-5 p-0" style="overflow: visible !important;">
        <form action="{{ route('produtos.index') }}" method="GET" class="d-flex justify-content-center w-100 px-3" role="search">
          <div class="input-group w-100 shadow-sm">
            <input class="form-control border-0 search-input" name="find" placeholder="O que você vai construir hoje?" aria-label="Search">
            <button class="btn search-btn d-flex align-items-center justify-content-center" type="submit">
              <i class="fa-solid fa-magnifying-glass fs-5"></i>
            </button>
          </div>
        </form>
      </div>

      <div id="entregamos" class="entrega text-light col-2 d-flex justify-content-center align-items-center text-center">
        <h6 class="m-0 fw-bold" style="font-size: 0.85rem;">
          <i class="fa-solid fa-truck-fast me-2"></i>ENTREGAMOS EM TODA A CIDADE!
        </h6>
      </div>

      <div class="carrinho d-flex justify-content-center align-items-center col-1">
        <a href="{{ route('carrinho.index') }}" class="text-decoration-none position-relative text-white">
          <i class="fa-solid fa-cart-shopping" style="font-size: 30px;" id="openModalCarrinho"></i>
          <input type="hidden" id="inputCart" value="">

          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light" style="font-size: 0.65rem;">
            0
            <span class="visually-hidden">itens</span>
          </span>
        </a>
      </div>

      <div class="perfil col-2 d-flex justify-content-center align-items-center" style="overflow: visible !important;">

        <div style="position: relative;">

            <div id="btn-perfil-custom" class="d-flex align-items-center gap-1" style="cursor: pointer;">
                <img src="{{ asset('image/oriPerfil.jpeg') }}" class="rounded-circle profile-img-nav shadow-sm" alt="img perfil">
                <i class="fa-solid fa-caret-down text-white" style="font-size: 12px;"></i>
            </div>

            <div id="menu-perfil-custom" class="meu-menu-independente">
                <a href="{{ auth()->user() ? route('profile.index') : route('login.index') }}">
                    <i class="fa-solid fa-user text-muted" style="width: 20px;"></i> Perfil
                </a>
                <a href="{{ route('admin.index') }}">
                    <i class="fa-solid fa-gear text-muted" style="width: 20px;"></i> Administração
                </a>

                <hr>

                @auth
                    <a href="{{ route('login.logout') }}" class="text-danger fw-bold">
                        <i class="fa-solid fa-right-from-bracket" style="width: 20px;"></i> Sair
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login.index') }}" class="text-success fw-bold">
                        <i class="fa-solid fa-right-to-bracket" style="width: 20px;"></i> Entrar
                    </a>
                @endguest
            </div>

        </div>

      </div>

    </nav>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnPerfil = document.getElementById('btn-perfil-custom');
        const menuPerfil = document.getElementById('menu-perfil-custom');

        if(btnPerfil && menuPerfil) {
            // Abre/Fecha o menu ao clicar na foto
            btnPerfil.addEventListener('click', function(event) {
                event.stopPropagation(); // Impede que o clique feche o menu na mesma hora
                menuPerfil.classList.toggle('mostrar');
            });

            // Fecha o menu se o usuário clicar em qualquer outro lugar da tela
            document.addEventListener('click', function(event) {
                if (!menuPerfil.contains(event.target)) {
                    menuPerfil.classList.remove('mostrar');
                }
            });
        }
    });
</script>
