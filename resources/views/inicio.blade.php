<x-layout layout slides>
    <?php
    $quantidadeP = 0;
    ?>

    @if($slides)
    <x-slides :slides="$slides"/>
    @endif

    <div id="maisVendidos" style="background-color:#ffffff" class="my-5 rounded">
        <div class="row g-0 border border-black rounded-top">
            <h4 class="text-center my-1">MAIS VENDIDOS</h4>
        </div>
        <div class="produtos g-0 row border border-top-0 border-black rounded-bottom-2" >
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($produtos as $p)
                        <div class="swiper-slide p-2" style="width: auto;">
                            <div class="border rounded p-2" style="width: 220px;">
                                <div class="image mb-2">
                                    <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height: 200px; object-fit: cover;" class="img-fluid w-100" />
                                </div>
    
                                <div class="fw-bold text-center mb-1">
                                    <span class="letters-color">{{ $p->nome }}</span>
                                </div>
    
                                <div class="fw-bold text-center mb-2">
                                    <span class="letters-color ">R$ {{ $p->valor_produto }}</span>
                                </div>
    
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="btn btn-light p-0 fw-bold btn-minus" onclick="quantidade(this, {{ $p->id }}, 'minus')">-</button>
    
                                    <div class="text-center">
                                        <input type="hidden" name="produtos_quantidade" id="input_qtd{{ $p->id }}" value="{{ $quantidadeP }}">
                                        <span class="spanQuantidade{{ $p->id }}">{{ $quantidadeP }}</span>
                                    </div>
    
                                    <button class="btn btn-light p-0 fw-bold btn-plus" onclick="quantidade(this, {{ $p->id }}, 'plus')">+</button>
                                </div>
    
                                <div class="d-flex justify-content-center mt-2">
                                    <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
                                        onclick="addToCart({{ $p->id }})">
                                        adicionar ao carrinho
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="promocoes" style="background-color:#ffffff" class="mb-5 rounded">
        <div class="row g-0 border border-black rounded-top">
            <h4 class="text-center my-1">PROMOÇÕES</h4>
        </div>
        <div class="produtos g-0 row border border-top-0 border-black rounded-bottom-2" >
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($produtos as $p)
                        <div class="swiper-slide p-2" style="width: auto;">
                            <div class="border rounded p-2" style="width: 220px;">
                                <div class="image mb-2">
                                    <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height: 200px; object-fit: cover;" class="img-fluid w-100" />
                                </div>
    
                                <div class="fw-bold text-center mb-1">
                                    <span class="letters-color">{{ $p->nome }}</span>
                                </div>
    
                                <div class="fw-bold text-center mb-2">
                                    <span class="letters-color ">R$ {{ $p->valor_produto }}</span>
                                </div>
    
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="btn btn-light p-0 fw-bold btn-minus" onclick="quantidade(this, {{ $p->id }}, 'minus')">-</button>
    
                                    <div class="text-center">
                                        <input type="hidden" name="produtos_quantidade" id="input_qtd{{ $p->id }}" value="{{ $quantidadeP }}">
                                        <span class="spanQuantidade{{ $p->id }}">{{ $quantidadeP }}</span>
                                    </div>
    
                                    <button class="btn btn-light p-0 fw-bold btn-plus" onclick="quantidade(this, {{ $p->id }}, 'plus')">+</button>
                                </div>
    
                                <div class="d-flex justify-content-center mt-2">
                                    <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
                                        onclick="addToCart({{ $p->id }})">
                                        adicionar ao carrinho
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="departamento" style="background-color:#ffffff" class="rounded">
        <div class="d-flex align-items-center gap-1 mb-3">
            <i class="fa-solid fa-list fa-xl" style="color: #ff6500;"></i>
            <h3 class="m-0 letters-color fw-bold" >DEPARTAMENTOS</h3>
        </div>
        <div class="swiper departamento_Swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'basico'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/cimento.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold letters-color fw-bold">BÁSICOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'acabamento'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/pisos.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ACABAMENTOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'hidraulica'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/tubos.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">HIDRÁULICA</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'eletrica'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/fios.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ELÉTRICA</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'estruturas'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/vergalao.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ESTRUTURAS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'ferramentas'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/ferramenta.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">FERRAMENTAS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'equipamentos'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/epi.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">EQUIPAMENTOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'fundacao'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/brita.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">PARA FUNDAÇÕES</h5>
                            </div>
                        </div>
                    </a>
                </div>
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

.imagem-hover:hover {
  transform: scale(1.2);
   transition: transform 0.3s ease;
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
// console.log('oi')
  var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 1,
      centeredSlides: false,
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints:{
            1660:{
                slidesPerView: 6,
                spaceBetween:1
            },
            1400:{
                slidesPerView: 5,
                spaceBetween:1
            },
            1175:{
                slidesPerView: 4,
                spaceBetween:1
            },
            980:{
                slidesPerView: 3,
                spaceBetween:1
            },
            750:{
                slidesPerView: 2,
                spaceBetween:1,
                // centeredSlides: true,
            }
        }
    });
    console.log('oi')
    var wwiper = new Swiper(".departamento_Swiper", {
        slidesPerView: 3,
        spaceBetween: 15,
        grid: {
            rows: 1,
            fill: 'row',
        },
        breakpoints:{
            1270:{
                slidesPerView: 4,
                spaceBetween:5,
                grid: {
                rows: 2,
                fill: 'row',
            },
            },
            1024:{
                slidesPerView: 3,
                spaceBetween:5,
                grid: {
                rows: 2,
                fill: 'row',
            }
        }
    }
    })
</script>
