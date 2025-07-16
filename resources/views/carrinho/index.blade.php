<x-layout>
  <div class="title-color border border-secondary rounded row m-1">
    <div class="col-1 d-flex justify-content-start align-items-center">
      <a class="text-decoration-none" href="{{ route('inicio.index') }}">
        <i class="ph ph-arrow-circle-left" style="font-size:35px; color:#f0f3f4"></i>
      </a>
    </div>
    <div class="col-10">
      <h2 class="text-light text-center m-0 py-2">CARRINHO DE COMPRAS</h2>
    </div>
  </div>
  <div class="row my-4">
    <div class="col-9">
      <div class="bg-light ">
        <div>
          <h4 class="text-start mx-4">Itens no carrinho:</h4>
        </div>
        <div class="border-bottom mx-4"></div>
        @foreach ($carrinho['carrinho'] as $c)
          <div class="row my-2  mx-4">
            <div class="col-3">
              <img name="image" src="{{ Storage::disk('s3')->url($c->image) }}" alt="Imagem do Produto"
                style="height: 200px; object-fit: cover;" class="img-fluid h-100 w-50" />
            </div>
            <div class="col-6">
              <span>{{ $c->nome }}</span>
            </div>
            <div class="col-1">
              <div class="d-flex justify-content-center align-items-center gap-2">
                <div class="btn btn-light p-0 fw-bold btn-minus">-</div>
                <div class="text-center">
                  <input name="quantidade" type="hidden" id="input_qtd" value="5">
                  <span class="spanQuantidade">{{ $c->quantidade }}</span>
                </div>
                <div class="btn btn-light p-0 fw-bold btn-plus">+</div>
              </div>
            </div>
            <div class="col-2">
              <span> R$ {{ $c->valor_produto }}</span>
            </div>
          </div>
          <div class="border-bottom mx-4"></div>
        @endforeach
        <div class="row m-3 justify-self-end">
          <h6>Sub Total(3 produtos):<span class="fw-bold"> R$3.000,00</span></h6>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="bg-light">
        <div class="">seu pedido tem frete GRÁTIS! + taxa por usar o site de : 999,54R$</div>
        <div class="my-4">
          <h6>Sub Total(3 produtos):<span class="fw-bold"> R$3.000,00</span></h6>
        </div>
        <div class="justify-self-center mt-2">
          <a href="{{route('carrinho.pagamento')}}">
            <x-botaoModal class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
            id_button="btnConfirma" modal_id="modal-pedido">
            Fechar pedido
          </x-botaoModal>
        </a>
        </div>
      </div>
      <div class="bg-light mt-5">
        <div class="">Calma lá paizão, Bora calcular esse frete ai?</div>
        <input type="text" class="form-control w-75 justify-self-center">
        <div class="justify-self-center mt-2">
          <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
            Calcular frete
          </button>
        </div>
      </div>
    </div>
  </div>
  @include('carrinho.cards', ['produtos' => $carrinho['carrinho']])
  <form method="POST" id="form_pedido">
    @csrf
    <x-modal modal_id="modal-pedido" title="Escolha metodo de pagamento">
      <input hidden name="_method" id="_method_manipula_pedido" />
      @include('carrinho.forms.formPedido')
      <x-slot name="footer">
        <button id="confirmaPedido" type="submit" class="btn btn-primary">Finalizar</button>
      </x-slot>
    </x-modal>
  </form>
</x-layout>
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
</script>
