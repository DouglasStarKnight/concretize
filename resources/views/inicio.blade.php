<x-layout>
    <!-- SLIDER CORRIGIDO -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/slide.jpeg') }}" alt="Slide 1" class="d-block w-100" style="height: 300px;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/cimento.heic') }}" alt="Slide 2" class="d-block w-100" style="height: 300px;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/cimento.heic') }}" alt="Slide 3" class="d-block w-100" style="height: 300px;">
            </div>
        </div>

        <!-- Controles -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="maisvendidos mt-5 border-top border-bottom">
        <div class="titlemaisvendidos">
            <h2 class="ms-3">Promoções</h2>
        </div>
              <div class="contentmaisvendidos">
                <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
                    @foreach($produtos as $p)
                    <div class="col-2 border my-1 mx-2">
                        <div class="image">
                            <img src="{{ $p->image }}" alt="Imagem do Produto" class="img-fluid" />
                        </div>
                        <div class="fw-bold d-flex justify-content-center">
                            {{$p->nome}}
                        </div>
                        <div class="fw-bold d-flex justify-content-center">
                            R$ {{$p->valor_produto}}
                        </div>
                        <div class="d-flex justify-content-center">
                          <button>adicionar ao carrinho</button>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
      <div class="maisvendidos mt-5 border-top border-bottom">
        <div class="titlemaisvendidos">
          <h2 class="ms-3">mais vendidos</h2>
        </div>
          <div class="contentmaisvendidos">
            <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
              @foreach($produtos as $p)
                <div class="col-2 border my-1 mx-2">
                  <div class="image">
                    <img src="{{ $p->image }}" alt="Imagem do Produto" class="img-fluid" />
                  </div>
                  <div class="fw-bold d-flex justify-content-center">
                    {{$p->nome}}
                      </div>
                    <div class="fw-bold d-flex justify-content-center">
                      R$ {{$p->valor_produto}}
                    </div>
                    <div class="d-flex justify-content-center">
                      <button>adicionar ao carrinho</button>
                  </div>
                </div>
                    @endforeach
            </div>
          </div>
      </div>
      <div class="maisvendidos mt-5 border-top border-bottom">
        <div class="titlemaisvendidos">
          <h2 class="ms-3">teste 3</h2>
        </div>
          <div class="contentmaisvendidos">
            <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
              @foreach($produtos as $p)
                <div class="col-2 border my-1 mx-2">
                  <div class="image">
                    <img src="{{ $p->image }}" alt="Imagem do Produto" class="img-fluid" />
                  </div>
                  <div class="fw-bold d-flex justify-content-center">
                    {{$p->nome}}
                      </div>
                    <div class="fw-bold d-flex justify-content-center">
                      R$ {{$p->valor_produto}}
                    </div>
                    <div class="d-flex justify-content-center">
                        <button>adicionar ao carrinho</button>
                    </div>
                </div>
                    @endforeach
            </div>
          </div>
      </div>
</x-layout>
