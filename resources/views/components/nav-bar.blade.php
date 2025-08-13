<div>
  <div class="header">
    <nav class="navbar header-color">
      <div class="logo col-2 d-flex justify-content-center">
        <a href="{{ route('inicio.index') }}">
          <img src="{{ asset('image/logo.png') }}" height="70" alt="Logo">
        </a>
      </div>
      <div class="container-fluid col-5">
        <form action="{{ route('produtos.index') }}" method="GET" class="d-flex justify-content-center w-100"
          role="search">
          <input class="form-control me-2 w-75" name="find" placeholder="Digite o produto que deseja"
            aria-label="Search">
          <button class="btn btn-outline-dark" type="submit">
            <i class="ph ph-magnifying-glass" style="font-size: 35px;color:aliceblue"></i>
          </button>
        </form>
      </div>
      <div id="entregamos" class="entrega text-light col-2">
        <h6>ENTREGAMOS EM TODA A CIDADE!</h6>
      </div>
      <div class="carrinho d-flex justify-content-center align-items-center col-1">
        <a href="{{ route('carrinho.index') }}" class="text-decoration-none">
          <i class="ph ph-shopping-cart" style="font-size: 35px; color:aliceblue" id="openModalCarrinho"></i>
          <input type="hidden" id="inputCart" value="">
        </a>
      </div>
      {{-- @dd(auth()->user()) --}}
      <div class="perfil col-2 d-flex justify-content-center">
        <div class="dropdown-center">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link d-flex justify-content-center align-items-center dropdown-toggle p-0" href="#"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('image/oriPerfil.jpeg') }}" class="rounded-circle" alt="img perfil" height="60px">
                {{-- <img src="{{ asset('image/oriPerfil.jpeg') }}" class="rounded" alt="Perfil" height="60px" width="60px"> --}}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                  <a class="dropdown-item" href="{{auth()->user() ? route('profile.index') : route('login.index') }}">Perfil</a>
                </li>
                  <li><a class="dropdown-item" href="{{ route('admin.index') }}">Administração</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                @auth
                  <li><a class="dropdown-item" href="{{ route('login.logout') }}">Logout</a></li>
                @endauth
                @guest
                  <li><a class="dropdown-item" href="{{ route('login.index') }}">Login</a></li>
                @endguest
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
