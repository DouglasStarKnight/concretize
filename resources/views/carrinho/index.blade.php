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
  <div class="row my-4 produtos">
    <div class="col-xxl-9 col-lx-9 col-lg-9 col-md-12 col-12">
      <div class="bg-light">
        @if($carrinho['carrinho']->isNotEmpty())
        <div class="text-center  border rounded">
          <h4 >Produtos adicionados:</h4>
        </div>
        <div class="mx-4"></div>
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">image</th>
              <th scope="col">produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col">valor</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carrinho['carrinho'] as $c)
              <div class="row my-2  mx-4 mat" data-id="{{ $c->id }}">
                <tr>
                  <th scope="row">{{$c->id}}</th>
                  <td>
                    <div>
                      <img name="image" src="{{ Storage::disk('s3')->url($c->image) }}" alt="Imagem do Produto"
                        style="height:auto; width:100px" />
                    </div>
                  </td>
                  <td>
                    <div class="col-5" style="align-self: center">
                      <span>{{ $c->nome }}</span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                      <div id="btn-excluir" onclick="quantidade(this, {{ json_encode($c) }}, 'minus')"
                        class="btn btn-light p-0 fw-bold btn-minus"><i class="fa-solid fa-circle-minus fa-xl"></i></div>
                      <div class="text-center">
                        <input name="quantidade" type="hidden" id="input_qtd{{ $c->id }}"
                          value="{{ $c->quantidade }}">
                        <h5 class="spanQuantidade{{ $c->id }}">{{ $c->quantidade }}</h5>
                      </div>
                      <div onclick="quantidade(this, {{ json_encode($c) }}, 'plus')"
                        class="btn btn-light p-0 fw-bold btn-plus"><i class="fa-solid fa-circle-plus fa-xl"></i></div>
                    </div>
                  </td>
                  <td><span class="valor{{ $c->id }}" data-id="{{ $c->id }}"></span></td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <div class="border-bottom mx-4"></div>
        <div class="row m-3 justify-self-end">
          <h6>Sub Total(3 produtos):<span class="fw-bold total"></span></h6>
        </div>
        @else
        <div class="text-center py-5"><h1>Nunhum item adicionado</h1></div>
        @endif
      </div>
    </div>
    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-12">
      <div class="row">
        <div class="bg-light text-center py-2 rounded col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-6">
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
        <div class="bg-light text-center py-2 mt-5 mt-md-0 rounded col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-6">
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
  </div>
  {{-- @include('carrinho.cards', ['produtos' => $carrinho['carrinho']]) --}}
  {{-- Form para excluir um produto do carrinho --}}
  <form id="form-excluir" method="POST">
    @csrf
    <input type="hidden" name="method_excluir" id="method_excluir">
    @method('DELETE')
  </form>
  {{-- Fim do form para excluir um produto do carrinho --}}

  {{-- Form para ir para a tela de finalizar pedido --}}
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
  {{-- Fim do form para ir para a tela de finalizar pedido --}}
</x-layout>

<script>
  const produto = {!! json_encode($carrinho['carrinho']) !!};
  let valores = {};
  let total = 0;

  window.onload = function() {
    produto.forEach(p => {
      const produtoDiv = $(`.mat[data-id="${p.id}"]`);
      const btnMinus = produtoDiv.find('.btn-minus i');
      const valorUnitario = parseFloat(p.valor_produto.replace(",", "."));
      const quantidade = parseInt($(`#input_qtd${p.id}`).val()) || 0;
      const subtotal = valorUnitario * quantidade;
      valores[p.id] = subtotal;
      total += subtotal;
      if (quantidade === 1) {
        btnMinus.removeClass("fa-circle-minus").addClass("fa-trash");
      } else {
        btnMinus.addClass("fa-circle-minus").removeClass("fa-trash");
      }
      atualizarValor(p.id, subtotal);
    });
    atualizarTotal();
  };

  function quantidade(element, dados, action) {
    const produtoDiv = $(`.mat[data-id="${dados.id}"]`);
    const btnMinus = produtoDiv.find('.btn-minus i');
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${dados.id}`);
    const spanQtd = parent.find(`.spanQuantidade${dados.id}`);

    let quantidade = parseInt(input.val()) || 0;
    if (action === 'plus') {
      quantidade++;
    } else if (action === 'minus' && quantidade > 0) {
      quantidade--;
    }

    input.val(quantidade);
    spanQtd.text(quantidade);

    const valorUnitario = parseFloat(dados.valor_produto.replace(",", "."));
    const subtotal = valorUnitario * quantidade;
    valores[dados.id] = subtotal;

    if (action === 'plus') {
      total += valorUnitario;
    } else if (action === 'minus' && quantidade >= 0) {
      total -= valorUnitario;
    }

    if (quantidade === 1) {
      btnMinus.removeClass("fa-circle-minus").addClass("fa-trash");
    } else {
      btnMinus.addClass("fa-circle-minus").removeClass("fa-trash");
    }
    atualizarValor(dados.id, subtotal);
    atualizarTotal();
    console.log(quantidade === 0)
    if (element.id === 'btn-excluir' && quantidade === 0) {
      console.log('oi')
      $('#method_excluir').val('DELETE');
      $('#form-excluir').attr('action', "{{ route('carrinho.delete') }}" + "/" + dados.id);
      $('#form-excluir').submit();
    }

    const spanCart = $('#cart-count');
    let quantCart = parseInt(spanCart.text()) || 0;
    spanCart.text(quantCart + 1);
  }

  function atualizarValor(id, valor) {
    console
    $(`.valor${id}`).html(valor.toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    }));
  }

  function atualizarTotal() {
    const totalFormatado = total.toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    });
    $('.total').html(totalFormatado);
  }
</script>
