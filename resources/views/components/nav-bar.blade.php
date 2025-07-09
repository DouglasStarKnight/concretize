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