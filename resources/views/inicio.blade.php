<x-layout layout slides>
    <?php
    $quantidadeP = 0;
    ?>
    {{-- @dd($slides) --}}
    <div id="contentpromocoes">
        <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
            <div class="swiper-wrapper">
                @foreach($produtos as $p)
                    <div class="swiper-slide p-2" style="width: auto;">
                        <div class="border rounded p-2" style="width: 220px;">
                            <div class="image mb-2">
                                <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height: 200px; object-fit: cover;" class="img-fluid w-100" />
                            </div>

                            <div class="fw-bold text-center mb-1">
                                {{ $p->nome }}
                            </div>

                            <div class="fw-bold text-center mb-2">
                                R$ {{ $p->valor_produto }}
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
                                <button class="btn subHeader-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
                                    onclick="addToCart({{ $p->id }})">
                                    adicionar ao carrinho
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="swiper-pagination"></div>
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

      var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
};
</script>
