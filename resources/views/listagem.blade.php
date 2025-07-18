<x-layout layout>
  <?php
  $quantidadeP = 0;
  ?>

  @forelse($produtos as $p)
    <div id="maisVendidos" style="background-color:#ffffff" class="my-5 rounded">
      <div class="row g-0 border border-black rounded-top">
        <h4 class="text-center my-1">MAIS VENDIDOS</h4>
      </div>
      <div class="produtos g-0 row border border-top-0 border-black rounded-bottom-2">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide p-2" style="width: auto;">
              <div class="border rounded p-2" style="width: 220px;">
                <div class="image mb-2">
                  <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto"
                    style="height: 200px; object-fit: cover;" class="img-fluid w-100" />
                </div>

                <div class="fw-bold text-center mb-1">
                  <span class="letters-color">{{ $p->nome }}</span>
                </div>

                <div class="fw-bold text-center mb-2">
                  <span class="letters-color ">R$ {{ $p->valor_produto }}</span>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-2">
                  <button class="btn btn-light p-0 fw-bold btn-minus"
                    onclick="quantidade(this, {{ $p->id }}, 'minus')">-</button>

                  <div class="text-center">
                    <input type="hidden" name="produtos_quantidade" id="input_qtd{{ $p->id }}"
                      value="{{ $quantidadeP }}">
                    <span class="spanQuantidade{{ $p->id }}">{{ $quantidadeP }}</span>
                  </div>
                  <button class="btn btn-light p-0 fw-bold btn-plus"
                    onclick="quantidade(this, {{ $p->id }}, 'plus')">+</button>
                </div>

                <div class="d-flex justify-content-center mt-2">
                  <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
                    onclick="addToCart({{ $p->id }})">
                    adicionar ao carrinho
                  </button>
                </div>
              </div>
            </div>
          @empty
            <div class=" title-color border border-secondary rounded mt-5 row mx-2">
              <div class="col-1 d-flex justify-content-start align-items-center">
              </div>
              <div class="col-10">
                <h2 class="text-light text-center m-0 py-2">Nenhum Produto Encontrado</h2>
              </div>
            </div>
  @endforelse
  </div>
  </div>
  </div>
  </div>
</x-layout>
<style>
  .alpha-color {
    background-color: #fd7e14;
  }

  .subHeader-color {
    background-color: #000080;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  quantidadeP = 0;

  function quantidade(element, produtoId, action) {
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${produtoId}`);
    const span = parent.find(`.spanQuantidade${produtoId}`);

    let quantidadeP = parseInt(input.val());

    if (action === 'plus') {
      quantidadeP++;
    } else if (action === 'minus') {
      if (quantidadeP > 0) {
        quantidadeP--;
      }
    }
    input.val(quantidadeP);
    span.text(quantidadeP);
  };
</script>
