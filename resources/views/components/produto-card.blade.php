@props([
    'title' => $title,
    'produtos' => $produtos
])
{{-- @dd($produtos) --}}
<?php
    $quantidadeP = 0;
    ?>
<div id="promocoes" style="background-color:#ffffff" class="my-4 rounded">
    <div class="row g-0 border border-black rounded-top">
        <h4 class="text-center my-1">{{$title}}</h4>
    </div>
    <div class="produtos g-0 row border border-top-0 border-black rounded-bottom-2" >
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($produtos as $p)
                <div class="swiper-slide p-2" style="width: auto;">
                    <form id="form_pedidos{{$p->id}}" method="POST" onsubmit="manipulaDados(this, {{$p->id}})">
                        @csrf
                        <input hidden name="_method" id="_method" />
                        <input id="input_valor{{$p->id}}" name="produto_id" type="hidden" value="{{$p->id}}">
                        <div class="border rounded p-2" style="width: 220px;">
                            <div class="image mb-2">
                                <input type="hidden" id="input_img{{$p->id}}" name="image" value="{{ $p->image}}">
                                <img name="image" src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height: 200px; object-fit: cover;" class="img-fluid w-100" />
                            </div>
                            <div class="fw-bold text-center mb-1">
                                <input id="input_nome{{$p->id}}" name="nome" type="hidden" value="{{$p->nome}}">
                                <span name="nome" class="letters-color">{{ $p->nome }}</span>
                            </div>
                            <div class="fw-bold text-center mb-2">
                                <input id="input_valor{{$p->id}}" name="valor_produto" type="hidden" value="{{$p->valor_produto}}">
                                <span id="valor" class="letters-color ">R$ {{ $p->valor_produto }}</span>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <div class="btn btn-light p-0 fw-bold btn-minus" onclick="quantidade(this, {{ $p->id }}, 'minus')">-</div>
                                <div class="text-center">
                                    <input name="quantidade" type="hidden" id="input_qtd{{ $p->id }}" value="{{ $quantidadeP }}">
                                    <span class="spanQuantidade{{ $p->id }}">{{ $quantidadeP }}</span>
                                </div>
                                <div class="btn btn-light p-0 fw-bold btn-plus" onclick="quantidade(this, {{ $p->id }}, 'plus')">+</div>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <button id="submit{{$p->id}}" class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
                                    adicionar ao carrinho
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
    <script>

    function quantidade(element, produtoId, action) {
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${produtoId}`);
    const span = parent.find(`.spanQuantidade${produtoId}`);

    let quantidadeP = parseInt(input.val()) || 0;

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

function manipulaDados(form, produtoId){
    event.preventDefault()
    // console.log($(`#form_pedidos${produtoId}`).find(`#input_img${produtoId}`).val())
    $(`#form_pedidos${produtoId}`).find(`#input_nome${produtoId}`).val();
    $(`#form_pedidos${produtoId}`).find(`#input_valor${produtoId}`).val();
    $(`#form_pedidos${produtoId}`).find(`#input_qtd${produtoId}`).val();
    $(`#form_pedidos${produtoId}`).find(`#input_img${produtoId}`).val();
    $(`#form_pedidos${produtoId}`).find("#_method").attr('value', 'post');
    $(`#form_pedidos${produtoId}`).attr('action', "{!! route('carrinho.cria') !!}");
    $(form).off('submit');
    form.submit();
}

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
    
</script>