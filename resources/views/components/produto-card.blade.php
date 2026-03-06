@props([
    'title' => isset($title) ? $title : null,
    'produtos' => isset($produtos) ? $produtos : null,
    'destaques' => isset($destaques) ? $destaques : null,
])
<?php
$quantidadeP = 0;
?>

<style>
    /* Melhoria visual sem alterar tipos de dados */
    .product-card {
        transition: all 0.3s ease;
        border: 1px solid #eee !important;
        background: #fff;
        width: 220px;
        margin: 0 auto;
    }
    .product-card:hover {
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
    .img-wrapper {
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .img-wrapper img {
        object-fit: contain !important; /* Melhor para produtos não ficarem esticados */
    }
    .qty-controls {
        background: #f8f9fa;
        border-radius: 5px;
        padding: 5px;
    }
    .btn-qty-box {
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        background: #fff;
        border: 1px solid #ddd;
    }
    .btn-qty-box:hover { background: #e9ecef; }
</style>

<div id="promocoes" style="background-color:#ffffff" class="my-4 rounded shadow-sm">
  <div class="row g-0 border border-black rounded-top">
    <h4 class="text-center my-2 fw-bold text-uppercase">{{ $title }}</h4>
  </div>

  <div class="produtos g-0 row border border-top-0 border-black rounded-bottom-2">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ($destaques ?? collect() as $destaque)
          @foreach ($destaque['produtos'] ?? [] as $p)
            <div class="swiper-slide p-3">
              <form id="form_pedidos{{ $p['id'] }}" method="POST" onsubmit="manipulaDados(event, this, {{ $p['id'] }})">
                @csrf
                <input hidden name="_method" id="_method" />
                <input id="input_valor{{ $p['id'] }}" name="produto_id" type="hidden" value="{{ $p['id'] }}">

                <div class="product-card border rounded p-3">
                  <a href="{{ route('produtos.descricao', ['id' => $p['id']]) }}" class="text-decoration-none">
                    <div class="img-wrapper mb-2">
                      <input type="hidden" id="input_img{{ $p['id'] }}" name="image" value="{{ $p['image'] }}">
                      <img name="image" src="{{ Storage::disk('s3')->url($p['image']) }}" alt="Imagem do Produto" class="img-fluid w-100 h-100" />
                    </div>

                    <div class="fw-bold text-center mb-1 text-truncate">
                      <input id="input_nome{{ $p['id'] }}" name="nome" type="hidden" value="{{ $p['nome'] }}">
                      <span name="nome" class="letters-color d-block text-dark">{{ $p['nome'] }}</span>
                    </div>

                    <div class="fw-bold text-center mb-3">
                      <input id="input_valor{{ $p['id'] }}" name="valor_produto" type="hidden" value="{{ $p['valor_produto'] }}">
                      <span class="letters-color fs-5">R$ {{ $p['valor_produto'] }}</span>
                    </div>
                  </a>

                  <div class="d-flex justify-content-center align-items-center gap-2 mb-3 qty-controls">
                    <div class="btn-qty-box fw-bold btn-minus" onclick="quantidade(this, {{ $p['id'] }}, 'minus')">-</div>
                    <div class="text-center mx-2">
                      <input name="quantidade" type="hidden" id="input_qtd{{ $p['id'] }}" value="{{ $quantidadeP }}">
                      <span class="spanQuantidade{{ $p['id'] }} fw-bold">{{ $quantidadeP }}</span>
                    </div>
                    <div class="btn-qty-box fw-bold btn-plus" onclick="quantidade(this, {{ $p['id'] }}, 'plus')">+</div>
                  </div>

                  <div class="d-grid">
                    <button id="submit{{ $p['id'] }}" class="btn btn-dark text-white add-to-cart-btn fw-bold py-2 border-0">
                      Adicionar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          @endforeach
        @endforeach
      </div>
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</div>

<script>
  function quantidade(element, produtoId, action) {
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${produtoId}`);
    const span = parent.find(`.spanQuantidade${produtoId}`);

    let q = parseInt(input.val()) || 0;

    if (action === 'plus') {
      q++;
    } else if (action === 'minus') {
      if (q > 0) q--;
    }
    input.val(q);
    span.text(q);

    const spanCart = $('#cart-count');
    if(spanCart.length) {
        let quantCart = parseInt(spanCart.text()) || 0;
        quantCart++;
        spanCart.text(quantCart);
    }
  };

  function manipulaDados(event,form, produtoId) {
    event.preventDefault();
    const $form = $(form);
    $form.find("#_method").val('post');
    const actionUrl = "{!! route('carrinho.cria') !!}";
    const formData = $form.serialize();

    const btn = $form.find('button');
    const textOriginal = btn.text();
    btn.prop('disabled', true).text('Processando...');
    $.ajax({
      url: actionUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
        if(response.sucesso) {
               
          btn.prop('disabled', false).text(textOriginal);

          mostrarErroToast("Produto Cadastrado com Sucesso!");
    }
      },
      error: function(xhr, status, error) {
        console.log('error aqui:', error, xhr, status);
      }
    })
  }

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      980: { slidesPerView: 3 },
      1200: { slidesPerView: 4 },
      1400: { slidesPerView: 5 },
      1660: { slidesPerView: 6 }
    }
  });
</script>
