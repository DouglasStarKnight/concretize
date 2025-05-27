<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Minha Loja' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider -->
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/> --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script> --}}
    {{-- <script src="/js/slick.min.js"></script> --}}
    <!-- Estilos personalizados -->
    <style>
        #content {
            height: 100%;
        }
        html, body {
        overflow-x: hidden;
        width: 100%;
        height: 100%;
}

.container-fluid {
    max-width: 100vw; /* Evita que o conteúdo ultrapasse a largura da tela */
    overflow-x: hidden;
}
.navbar .dropdown-menu {
    position: absolute;
    top: 100%;
    left: auto;
    right: 0;
    z-index: 1000;
}
    </style>
</head>
<body>
    <div id="content">
        <!-- Header -->
          <div class="header">
            <nav class="navbar bg-body-tertiary" style="background-color: #E67F25">
                <div class="logo col-1">
                  <a href="{{route('inicio.index')}}">
                      <img src="{{ asset('image/concretizelogo.jpg') }}" alt="Logo">
                  </a>
                </div>
                <div class="container-fluid col-6">
                    <form class="d-flex justify-content-center w-100" role="search">
                        <input class="form-control me-2 w-75" type="search" placeholder="Digite o produto que deseja" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="ph ph-magnifying-glass" style="font-size: 35px"></i>
                        </button>
                    </form>
                </div>
                <div class="entrega col-2"><p>Entregamos em toda a cidade</p></div>
                <div class="carrinho d-flex justify-content-center col-1">
                    <i class="ph ph-shopping-cart" style="font-size: 35px;" id="openModalCarrinho"></i>
                    <span id="cart-count" class="badge bg-primary rounded-circle" style="font-size: 14px; height:20px; width:20px; display: flex; align-items:center; justify-content:center;">0</span>
                </div>
                <div class="perfil col-2">
                  <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                          <a class="nav-link d-flex justify-content-center align-items-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="{{ asset('image/profile-circle-svgrepo-com.svg') }}" alt="Perfil" height="60px" width="60px">
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Perfil</a></li>
                              <li><a class="dropdown-item" href="{{route('admin.index')}}">Administração</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">logout</a></li>
                          </ul>
                      </li>
                  </ul>
                </div>
            </nav>
          </div>
        <!-- Sub-Header -->
        <div class="sub-header d-flex justify-content-between mb-4 row bg-dark bg-gradient">
            <div class="categoria col-2 dark-dark d-flex justify-content-center">
                <a class="text-decoration-none" href="{{route('produtos.index')}}">Materiais Básico</a>
            </div>
            <div class="categoria col-2 Dark-link d-flex justify-content-center">
                <a class="text-decoration-none" href="{{route('produtos.index')}}">Materiais Acabamento</a>
            </div>
            <div class="categoria col-2 Dark link d-flex justify-content-center">
                <a class="text-decoration-none" href="{{route('produtos.index')}}">Materiais Elétricos</a>
            </div>
            <div class="categoria col-2 Dark link d-flex justify-content-center">
                <a class="text-decoration-none" href="{{route('produtos.index')}}">Materiais Tubulações</a>
            </div>
            <div class="categoria col-2 Dark link d-flex justify-content-center">
                <a class="text-decoration-none" href="{{route('produtos.index')}}">Materiais conexções</a>
            </div>
        </div>

        <!-- Conteúdo Dinâmico -->
        <div class="conteudo">
            {{ $slot }}
        </div>
    </div>
    @stack('scripts')
</body>
</html>
<script>
  document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', function () {
                const submitButtons = form.querySelectorAll('button[type="submit"]');

                submitButtons.forEach(button => {
                    button.disabled = true;
                    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvando...';
                });
            });
        });
    });

    // $(document).ready(function(){
    //     let cartCount = 0;

    //     // Toda vez que clicar no botão de adicionar ao carrinho
    //     $(document).on('click', '.add-to-cart-btn', function(){
    //         cartCount++;
    //         $('#cart-count').text(cartCount);
    //     });
    // });

</script>
