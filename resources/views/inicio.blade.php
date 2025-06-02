<x-layout>
    <?php
    $quantidadeP = 0;
    ?>

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
            <div id="slide1" class="carousel-item active">
                <img src="{{ asset('image/banner1.avif') }}" alt="Slide 1" class="d-block w-100" style="height: 300px;">
            </div>
            <div id="slide2" class="carousel-item">
                <img src="{{ asset('image/images (2).jpeg') }}" alt="Slide 2" class="d-block w-100" style="height: 300px;">
            </div>
            <div id="slide3" class="carousel-item">
                <img src="{{ asset('image/banner1.avif') }}" alt="Slide 3" class="d-block w-100" style="height: 300px;">
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
        <div class="titlemaisvendidos alpha-color mx-3 rounded">
            <h2 class="text-center text-light border border-2 border-dark rounded" >Promoções</h2>
        </div>
              <div id="contentpromocoes">
                <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
                    @foreach($produtos as $p)
                    <div class="col-2 border my-1 mx-2">
                        <div class="image img-fluid align-items-center">
                            <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height:300px" class="img-fluid" />
                        </div>
                        <div class="fw-bold d-flex justify-content-center">
                            {{$p->nome}}
                        </div>
                        <div class="fw-bold d-flex justify-content-center">
                            R$ {{$p->valor_produto}}
                        </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <button class="btn btn-light col-2 p-0 fw-bold btn-minus" onclick="quantidade(this, {{$p->id}}, 'minus')">-</button>
                            <div class="col-3 text-center">
                                <input type="hidden" name="produtos_quantidade" id="input_qtd{{$p->id}}" value="{{$quantidadeP}}">
                                <span class="spanQuantidade{{$p->id}}">{{$quantidadeP}}</span>
                            </div>
                        <button class="btn btn-light col-2 p-0 fw-bold btn-plus" onclick="quantidade(this, {{$p->id}}, 'plus')">+</button>
                    </div>

                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn subHeader-color border rounded text-white add-to-cart-btn bg-gradient" onclick="quantidade()">Adicionar ao carrinho</button>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
      <div class="maisvendidos mt-5 border-top border-bottom">
        <div class="titlemaisvendidos alpha-color mx-3 rounded">
          <h2 class="text-center text-light border border-2 border-dark rounded">Mais Vendidos</h2>
        </div>
          <div id="contentmaisvendidos">
            <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
              @foreach($produtos as $p)
                <div class="col-2 border my-1 mx-2">
                  <div class="image">
                    {{-- <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height:300px" class="img-fluid" /> --}}
                  </div>
                  <div class="fw-bold d-flex justify-content-center">
                    {{$p->nome}}
                      </div>
                    <div class="fw-bold d-flex justify-content-center">
                      R$ {{$p->valor_produto}}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <button class="btn btn-light col-2 p-0 fw-bold btn-minus" onclick="quantidade(this, {{$p->id}}, 'minus')">-</button>
                            <div class="col-3 text-center">
                                <input type="hidden" name="produtos_quantidade" id="input_qtd{{$p->id}}" value="{{$quantidadeP}}">
                                <span class="spanQuantidade{{$p->id}}">{{$quantidadeP}}</span>
                            </div>
                        <button class="btn btn-light col-2 p-0 fw-bold btn-plus" onclick="quantidade(this, {{$p->id}}, 'plus')">+</button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                      <button id="add-to-cart-btn" class="btn subHeader-color border rounded text-white add-to-cart-btn bg-gradient" onclick="quantidade()">adicionar ao carrinho</button>
                  </div>
                </div>
                    @endforeach
            </div>
          </div>
      </div>
</x-layout>
<style>
    .alpha-color{
    background-color: #fd7e14;
}
.subHeader-color{
    background-color:#000080;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    quantidadeP = 0;

    function quantidade(element, produtoId, action) {
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${produtoId}`);
    const span = parent.find(`.spanQuantidade${produtoId}`);

    if (action === 'plus') {
        quantidadeP++;
    } else if (action === 'minus') {
        if (quantidadeP > 0) {
            quantidadeP--;
        }
    }
    input.val(quantidadeP);
    span.text(quantidadeP);

    const spanCart = $('#cart-count');
    let quantCart = parseInt(spanCart.text()) || 0;
    quantCart++;
    spanCart.text(quantCart);

};
</script>
