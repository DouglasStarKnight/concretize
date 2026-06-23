<x-layout>
  {{-- Header do Carrinho --}}
  <div class="title-color shadow-sm rounded row m-1 align-items-center bg-dark">
    <div class="col-1 d-flex justify-content-center">
      <a class="text-decoration-none transition-hover" href="{{ route('inicio.index') }}">
        <i class="ph ph-arrow-left-circle" style="font-size:32px; color:#ffffff"></i>
      </a>
    </div>
    <div class="col-10">
      <h4 class="text-light text-center m-0 py-3 fw-bold">CARRINHO DE COMPRAS</h4>
    </div>
  </div>

  <div class="row my-4 produtos g-4">
    {{-- Lista de Produtos --}}
    <div class="col-lg-9 col-md-12">
      <div class="card border-0 shadow-sm rounded">
        @if($carrinho['carrinho']->isNotEmpty())
        <div class="card-header bg-white border-bottom py-3">
          <h5 class="mb-0 fw-bold"><i class="ph ph-shopping-cart me-2"></i>Itens Selecionados</h5>
        </div>

        <div class="table-responsive p-3">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th class="text-muted small uppercase">Produto</th>
                <th></th> {{-- Espaço para nome --}}
                <th class="text-center text-muted small uppercase">Quantidade</th>
                <th class="text-end text-muted small uppercase">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($carrinho['carrinho'] as $c)
                <tr class="mat" data-id="{{ $c->id }}">
                  <td style="width: 100px;">
                    <div class="rounded border overflow-hidden bg-white" style="width: 80px; height: 80px;">
                      <img src="{{ Storage::disk('s3')->url($c->image) }}" alt="{{ $c->nome }}"
                        class="img-fluid w-100 h-100 object-fit-contain" />
                    </div>
                  </td>
                  <td>
                    <span class="fw-bold d-block">{{ $c->nome }}</span>
                    <small class="text-muted">ID: #{{$c->id}}</small>
                  </td>
                  <td>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                      <button type="button" onclick="quantidade(this, {{ json_encode($c) }}, 'minus')"
                        class="btn btn-link p-0 text-danger btn-minus shadow-none">
                        <i class="fa-solid fa-circle-minus fa-xl"></i>
                      </button>

                      <div class="text-center" style="min-width: 30px;">
                        <input name="quantidade" type="hidden" id="input_qtd{{ $c->id }}" value="{{ $c->quantidade }}">
                        <span class="spanQuantidade{{ $c->id }} fw-bold fs-5">{{ $c->quantidade }}</span>
                      </div>

                      <button type="button" onclick="quantidade(this, {{ json_encode($c) }}, 'plus')"
                        class="btn btn-link p-0 text-primary btn-plus shadow-none">
                        <i class="fa-solid fa-circle-plus fa-xl"></i>
                      </button>
                    </div>
                  </td>
                  <td class="text-end fw-bold fs-6 pt-3">
                    <span class="valor{{ $c->id }}" data-id="{{ $c->id }}"></span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="card-footer bg-white border-top py-3 text-end text-dark">
            <span class="qtd-produtos me-2 text-muted"></span>
            <span class="fw-bold total fs-4 text-primary"></span>
        </div>
        @else
        <div class="text-center py-5">
            <i class="ph ph-shopping-cart text-muted mb-3" style="font-size: 60px;"></i>
            <h3 class="text-muted">Seu carrinho está vazio</h3>
            <a href="{{ route('inicio.index') }}" class="btn btn-outline-primary mt-3">Continuar comprando</a>
        </div>
        @endif
      </div>
    </div>

    {{-- Resumo e Ações laterais --}}
    <div class="col-lg-3 col-md-12">
      <div class="sticky-top" style="top: 20px;">
        <div class="card border-0 shadow-sm mb-4 rounded">
          <div class="card-body p-4">
            <label class="fw-bold mb-2">Possui um cupom?</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Código">
              <button class="btn btn-outline-dark" type="button">Aplicar</button>
            </div>
            <hr>
            <div class="text-center">
              <p class="small text-muted mb-1 qtd-produtos text-start"></p>
              <h3 class="fw-bold total text-dark text-start mb-4"></h3>

              <a href="{{ route('carrinho.pagamento') }}" class="text-decoration-none">
                <x-botaoModal class="btn btn-success w-100 py-3 fw-bold shadow-sm"
                  id_button="btnConfirma" modal_id="modal-pedido">
                  FECHAR PEDIDO
                </x-botaoModal>
              </a>
            </div>
          </div>
        </div>

        <div class="card border-0 shadow-sm rounded">
          <div class="card-body p-4">
            <label class="fw-bold mb-2">Calcular Frete</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="00000-000">
              <button class="btn btn-dark btn-add-cart fw-bold py-2">
                <i class="ph ph-truck"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Forms ocultos e Modais (Mantidos conforme lógica original) --}}
  <form id="form-excluir" method="POST">@csrf<input type="hidden" name="method_excluir" id="method_excluir">@method('DELETE')</form>
  <form method="POST" id="form_pedido">
    @csrf
    <x-modal modal_id="modal-pedido" title="Escolha o método de pagamento">
      <input hidden name="_method" id="_method_manipula_pedido" />
      @include('carrinho.forms.formPedido')
      <x-slot name="footer">
        <button id="confirmaPedido" type="submit" class="btn btn-primary w-100">Finalizar Pedido</button>
      </x-slot>
    </x-modal>
  </form>
</x-layout>

<style>
    .transition-hover { transition: transform 0.2s; }
    .transition-hover:hover { transform: scale(1.1); }
    .object-fit-contain { object-fit: contain; }
    .btn-link:hover { opacity: 0.8; }
    .card { overflow: hidden; }
</style>

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

    $('.qtd-produtos').append('SubTotal(' + produto.length +' produtos):')
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
    if (element.id === 'btn-excluir' && quantidade === 0) {
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
