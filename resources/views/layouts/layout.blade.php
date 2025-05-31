<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Concretize' }}</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('app.js') }}"></script>
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
.alpha-color{
    background-color: #fd7e14;
}
.subHeader-color{
   background: linear-gradient(180deg,rgba(237, 119, 0, 1) 0%, rgba(196, 95, 0, 1) 42%, rgba(186, 87, 0, 1) 78%);
}
.header-color {
background: linear-gradient(180deg,rgba(9, 29, 102, 1) 0%, rgba(11, 40, 82, 1) 42%, rgba(0, 5, 54, 1) 78%);
}


    </style>
</head>
<body>

    @props([
        'layout' => false,
    ])
    <div id="content">
        <!-- Header -->
    @if(!$layout)
        <div>
            <div class="header">
              <nav class="navbar header-color">
                  <div class="logo col-2 d-flex justify-content-center">
                    <a href="{{route('inicio.index')}}">
                        <img src="{{ asset('image/logo.png') }}" height="70" alt="Logo">
                    </a>
                  </div>
                  <div class="container-fluid col-5">
                      <form class="d-flex justify-content-center w-100" role="search">
                          <input class="form-control me-2 w-75" name="find" placeholder="Digite o produto que deseja" aria-label="Search">
                          <button class="btn btn-outline-dark" type="submit">
                              <i class="ph ph-magnifying-glass" style="font-size: 35px;color:aliceblue"></i>
                          </button>
                      </form>
                  </div>
                  <div id="entregamos" class="entrega text-light col-2"><h6>ENTREGAMOS EM TODA A CIDADE!</h6></div>
                  <div class="carrinho d-flex justify-content-center align-items-center col-1">
                      <i class="ph ph-shopping-cart" style="font-size: 35px; color:aliceblue" id="openModalCarrinho"></i>
                      <input type="hidden" id="inputCart" value="">
                      {{-- <span id="cart-count" class="badge rounded-circle" style="font-size: 14px; height:20px; width:20px; display: flex; align-items:center; justify-content:center;">0</span> --}}
                  </div>
                  <div class="perfil col-2">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex justify-content-center align-items-center dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('image/profile-circle-svgrepo-com.svg') }}" class="img-thumbnail rounded" alt="Perfil" height="60px" width="60px">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('profile.index')}}">Perfil</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.index')}}">Administração</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('login.index')}}">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                  </div>
              </nav>
            </div>
          <!-- Sub-Header -->
          <div class="sub-header d-flex justify-content-between mb-4 row subHeader-color">
              <div class="categoria col-2 kink-primary d-flex justify-content-center">
                  <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'basicos'])}}">BÁSICOS</a>
              </div>
              <div class="categoria col-2 d-flex justify-content-center">
                  <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' =>'acabamento'])}}">ACABAMENTO</a>
              </div>
              <div class="categoria col-2 d-flex justify-content-center">
                  <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'eletricos'])}}">Elétricos</a>
              </div>
              <div class="categoria col-2 d-flex justify-content-center">
                  <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'tubulacoes'])}}">Tubulações</a>
              </div>
              <div class="categoria col-2 d-flex justify-content-center">
                  <a class="text-decoration-none  link-light" href="{{route('produtos.index', ['tipo' => 'conexcoes'])}}">Conexções</a>
              </div>
          </div>
        </div>
    @endif
        <!-- Conteúdo Dinâmico -->
        <x-notificacao></x-notificacao>
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
    widthWindow = screen.width
    if(widthWindow < 768){
        $('#entregamos').hide()
    }else{
        $('#entregamos').show()

    }


</script>
