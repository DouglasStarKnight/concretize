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
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

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
    </style>
</head>
<body>
    <div id="content">
        <!-- Header -->
        <div class="header border">
            <nav class="navbar bg-body-tertiary row" style="background-color: #E67F25">
                <div class="logo col-1">
                    <img src="{{ asset('image/concretizelogo.jpg') }}" alt="Logo">
                </div>
                <div class="container-fluid col-7">
                    <form class="d-flex w-100" role="search">
                        <input class="form-control me-2 w-75" type="search" placeholder="Digite o produto que deseja" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="{{ asset('image/search-alt-2-svgrepo-com.svg') }}" alt="search" height="35px" width="35px">
                        </button>
                    </form>
                </div>
                <div class="entrega col-2">Entregamos em toda a cidade</div>
                <div class="carrinho col-1">
                    <img src="{{ asset('image/shopping-cart-free-15-svgrepo-com.svg') }}" alt="Carrinho" height="35px" width="35px">
                </div>
                <div class="perfil col-1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <!-- Botão do dropdown -->
                            <img class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="navbarDropdown" role="button" src="{{ asset('image/profile-circle-svgrepo-com.svg') }}" alt="Perfil" height="60px" width="60px">
                            <!-- Menu dropdown -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Ação</a></li>
                                <li><a class="dropdown-item" href="#">Outra ação</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Algo mais aqui</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Sub-Header -->
        <div class="sub-header border mb-4 row bg-dark bg-gradient">
            <div class="categoria col-2 text-dark">
                <a class="text-decoration-none text-light" href="{{route('inicio.index')}}">Materiais Básico</a>
            </div>
            <div class="categoria col-2 Dark-link">
                <a class="text-dark" href="{{route('inicio.index')}}">Materiais Acabamento</a>
            </div>
            <div class="categoria col-2 Dark link">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">Materiais Elétricos</a>
            </div>
            <div class="categoria col-2 Dark link">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">Materiais Tubulações</a>
            </div>
            <div class="categoria col-2 Dark link">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">Materiais conexções</a>
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
