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
                style="height:100px" class="img-fluid w-50" />
            </div>
            <div class="col-5" style="align-self: center">
              <span>{{ $c->nome }}</span>
            </div>
            <div class="col-1">
              <div class="d-flex justify-content-center align-items-center gap-2">
                <div onclick="quantidade(this, {{ json_encode($c) }}, 'minus')"
                  class="btn btn-light p-0 fw-bold btn-minus" >-</div>
                <div class="text-center">
                  <input name="quantidade" type="hidden" id="input_qtd" value="">
                  <span class="spanQuantidade">{{ $c->quantidade }}</span>
                </div>
                <div onclick="quantidade(this, {{ json_encode($c) }}, 'plus')"
                  class="btn btn-light p-0 fw-bold btn-plus">+</div>
              </div>
            </div>
            <div class="col-2">
              <span class="valor" data-id="{{ $c->id }}"></span>
            </div>
            <div class="col-1">
              <x-botaoModal id_button="btn-excluir" modal_id="modal-excluir" onclick="manipulacao_modais(this,{{ $c->id }})" class="btn bg-danger border rounded text-white add-to-cart-btn bg-gradient fw-bold">
                Excluir
              </x-botaoModal>
            </div>
          </div>
          <div class="border-bottom mx-4"></div>
        @endforeach
        <div class="row m-3 justify-self-end">
          <h6>Sub Total(3 produtos):<span class="fw-bold total"></span></h6>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="bg-light text-center py-2 rounded">
        <div>Cê tem cupom meu mano?</div>
        <input type="text" class="form-control w-75 justify-self-center">
        <div class="my-4">
          <h6>Sub Total(3 produtos):<span class="fw-bold total"></span></h6>
        </div>
        <div class="justify-self-center mt-2">
          <a href="{{ route('carrinho.pagamento') }}">
            <x-botaoModal class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold"
              id_button="btnConfirma" modal_id="modal-pedido">
              Não funciona!
            </x-botaoModal>
          </a>
        </div>
      </div>
      <div class="bg-light text-center py-2 mt-5 rounded">
        <div class="">Calma lá paizão, Bora calcular esse frete ai?</div>
        <input type="text" class="form-control w-75 justify-self-center">
        <div class="justify-self-center mt-2">
          <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
            Calcular frete(Ñ funciona)
          </button>
        </div>
      </div>
    </div>
  </div>
  @include('carrinho.cards', ['produtos' => $carrinho['carrinho']])
  <form id="form-excluir" method="POST">
    @csrf
    @method('DELETE')
    <x-modal modal_id="modal-excluir" title="Excluir produto">
      <p>Deseja excluir o produto do carrinho?</p>
      <input type="hidden" name="method_excluir" id="method_excluir">
      <x-slot name="footer">
        <button id="confirmaExclusao" type="submit" class="btn btn-danger">Excluir</button>
      </x-slot>
    </x-modal>
  </form>

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
  const produto = {!! json_encode($carrinho['carrinho']) !!};
  let valores = {};
  let total = 0;

  window.onload = function() {
    produto.forEach(p => {
      const valorUnitario = parseFloat(p.valor_produto.replace(",", "."));
      const subtotal = valorUnitario * p.quantidade;

      valores[p.id] = subtotal;
      total += subtotal;
    });

    $('.valor').each(function() {
      const id = $(this).data('id');
      if (valores[id] !== undefined) {
        $(this).html(valores[id].toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        }));
      }
    });
    const totalFormatado = total.toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    });
    $('.total').html(totalFormatado);
  };

  function manipulacao_modais(element, dados){
    if(element.id == 'btn-excluir'){
      $('#method_excluir').attr('value', 'DELETE');
      $('#form-excluir').attr('action', "{{route('carrinho.delete')}}" + '/' + dados);
    }
  }


  function quantidade(element, dados, action) {
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
