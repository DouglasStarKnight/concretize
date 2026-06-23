@props([
    'produtos' => isset($produtos) ? $produtos : [],
    'tipo' => isset($tipo) ? $tipo : null,
])

<div class="container-fluid py-4 px-0">
  <div class="card border-0 shadow-sm rounded-4 bg-white p-3 p-md-5 mb-4">
  {{-- Header do Catálogo --}}
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 pb-3 border-bottom">
    <div>
      <h2 class="fw-extrabold text-dark m-0" style="font-size: 1.75rem; letter-spacing: -0.5px;">
        @if ($tipo)
          Categoria: <span class="text-accent">{{ $tipo }}</span>
        @elseif (request('find'))
          Resultados para <span class="text-accent">"{{ request('find') }}"</span>
        @else
          Todos os Produtos
        @endif
      </h2>
      <p class="text-muted m-0 mt-1">
        Exibindo {{ $produtos->count() }} {{ $produtos->count() === 1 ? 'produto' : 'produtos' }}
      </p>
    </div>
    
    <div>
      <a href="{{ route('inicio.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="ph ph-arrow-left me-1"></i> Voltar ao início
      </a>
    </div>
  </div>

  @if($produtos->isEmpty())
    <div class="card border-0 shadow-sm rounded-4 text-center py-5 my-4 bg-white">
      <div class="card-body py-5">
        <div class="mb-4">
          <i class="ph ph-magnifying-glass text-muted" style="font-size: 64px; opacity: 0.5;"></i>
        </div>
        <h4 class="fw-bold text-dark mb-2">Nenhum produto encontrado</h4>
        <p class="text-muted mb-4">Não encontramos resultados para a sua busca ou categoria selecionada.</p>
        <a href="{{ route('produtos.index') }}" class="btn btn-accent rounded-pill px-4 py-2">
          Ver todos os produtos
        </a>
      </div>
    </div>
  @else
    {{-- Grid de Produtos --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      @foreach ($produtos as $p)
        <div class="col">
          <form id="form_pedidos{{ $p->id }}" method="POST" class="h-100 form-produto-adicionar">
            @csrf
            <input id="input_prod_id{{ $p->id }}" name="produto_id" type="hidden" value="{{ $p->id }}">
            <input type="hidden" id="input_img{{ $p->id }}" name="image" value="{{ $p->image }}">
            <input id="input_nome{{ $p->id }}" name="nome" type="hidden" value="{{ $p->nome }}">
            <input id="input_valor{{ $p->id }}" name="valor_produto" type="hidden" value="{{ $p->valor_produto }}">
            
            <div class="card product-card-modern border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white">
              {{-- Imagem do Produto --}}
              <div class="image-container position-relative bg-light">
                <a href="{{ route('produtos.descricao', ['id' => $p->id]) }}" class="d-block">
                  <img name="image" src="{{ Storage::disk('s3')->url($p->image) }}" alt="{{ $p->nome }}"
                    class="img-fluid w-100 product-img-display" />
                </a>
                
                {{-- Categoria Badge --}}
                <span class="badge position-absolute top-3 start-3 bg-dark-blue text-white rounded-pill px-3 py-1.5 small fw-semibold shadow-sm">
                  {{ $tipo ?? 'Material' }}
                </span>
              </div>
              
              {{-- Detalhes --}}
              <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                  <a href="{{ route('produtos.descricao', ['id' => $p->id]) }}" class="text-decoration-none text-dark">
                    <h5 class="product-title fw-bold mb-2">{{ $p->nome }}</h5>
                  </a>
                  <h4 class="product-price fw-extrabold text-accent mb-3">R$ {{ $p->valor_produto }}</h4>
                </div>
                
                <div class="mt-auto">
                  {{-- Controle de Quantidade --}}
                  <div class="d-flex justify-content-between align-items-center mb-3 bg-light rounded-pill p-1 border">
                    <button type="button" class="btn btn-qty-ctrl btn-minus rounded-circle border-0 d-flex align-items-center justify-content-center"
                      onclick="quantidade({{ $p->id }}, 'minus')">
                      <i class="ph ph-minus fw-bold"></i>
                    </button>
                    
                    <div class="text-center fw-bold text-dark fs-5 px-2">
                      <input name="quantidade" type="hidden" id="input_qtd{{ $p->id }}" value="1">
                      <span class="spanQuantidade{{ $p->id }}">1</span>
                    </div>
                    
                    <button type="button" class="btn btn-qty-ctrl btn-plus rounded-circle border-0 d-flex align-items-center justify-content-center"
                      onclick="quantidade({{ $p->id }}, 'plus')">
                      <i class="ph ph-plus fw-bold"></i>
                    </button>
                  </div>
                  
                  {{-- Botão Adicionar --}}
                  <button type="button" onclick="adicionarAoCarrinho({{ $p->id }})"
                    class="btn btn-accent w-100 rounded-pill py-2.5 fw-bold d-flex align-items-center justify-content-center gap-2 shadow-sm transition-all btn-adicionar-carrinho">
                    <i class="ph ph-shopping-cart-simple fs-5"></i> Adicionar
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      @endforeach
    </div>
  @endif
  </div>
</div>

<style>
  :root {
    --accent-color: #ff6500;
    --dark-blue: #000066;
  }
  
  .text-accent {
    color: var(--accent-color) !important;
  }
  .bg-dark-blue {
    background-color: var(--dark-blue) !important;
  }
  .btn-accent {
    background-color: var(--accent-color) !important;
    border-color: var(--accent-color) !important;
    color: white !important;
  }
  .btn-accent:hover {
    background-color: #e65c00 !important;
    border-color: #e65c00 !important;
  }
  
  .product-card-modern {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.04) !important;
  }
  .product-card-modern:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
  }
  
  .image-container {
    aspect-ratio: 4 / 3;
    overflow: hidden;
  }
  .product-img-display {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .product-card-modern:hover .product-img-display {
    transform: scale(1.06);
  }
  
  .product-title {
    font-size: 1.1rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 44px;
    transition: color 0.2s;
  }
  .product-title:hover {
    color: var(--accent-color);
  }
  
  .product-price {
    font-size: 1.35rem;
    letter-spacing: -0.5px;
  }
  
  .btn-qty-ctrl {
    width: 32px;
    height: 32px;
    background-color: white;
    color: #495057;
    transition: all 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .btn-qty-ctrl:hover {
    background-color: var(--accent-color);
    color: white;
  }
  
  .btn-adicionar-carrinho {
    transition: all 0.2s ease;
  }
  .btn-adicionar-carrinho:active {
    transform: scale(0.97);
  }
  
  .top-3 { top: 1rem; }
  .start-3 { start: 1rem; }
  .fw-extrabold { font-weight: 800; }
</style>

<script>
  function quantidade(produtoId, action) {
    const input = $(`#input_qtd${produtoId}`);
    const span = $(`.spanQuantidade${produtoId}`);

    let quantidadeP = parseInt(input.val()) || 1;

    if (action === 'plus') {
      quantidadeP++;
    } else if (action === 'minus') {
      if (quantidadeP > 1) {
        quantidadeP--;
      }
    }
    input.val(quantidadeP);
    span.text(quantidadeP);
  }

  function adicionarAoCarrinho(produtoId) {
    const form = $(`#form_pedidos${produtoId}`);
    const submitBtn = form.find('.btn-adicionar-carrinho');
    const originalText = submitBtn.html();
    
    // Mostra loading no botão
    submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status"></span>');
    
    $.ajax({
      url: "{{ route('carrinho.cria') }}",
      type: "POST",
      data: form.serialize(),
      success: function(response) {
        if (response.sucesso) {
          // Exibe Toast de sucesso
          if (window.mostrarToast) {
            window.mostrarToast(response.mensagem, 'success');
          }
          
          // Atualiza a contagem no carrinho na navbar
          const spanCart = $('#cart-count');
          if (spanCart.length) {
            let currentCount = parseInt(spanCart.text()) || 0;
            let addedQty = parseInt($(`#input_qtd${produtoId}`).val()) || 1;
            spanCart.text(currentCount + addedQty);
          }
          
          // Reseta quantidade para 1
          $(`#input_qtd${produtoId}`).val(1);
          $(`.spanQuantidade${produtoId}`).text(1);
        } else {
          if (window.mostrarToast) {
            window.mostrarToast(response.mensagem || 'Erro ao adicionar.', 'danger');
          }
        }
      },
      error: function(xhr) {
        let errorMsg = 'Não foi possível adicionar o produto ao carrinho.';
        if (xhr.responseJSON && xhr.responseJSON.mensagem) {
          errorMsg = xhr.responseJSON.mensagem;
        }
        if (window.mostrarToast) {
          window.mostrarToast(errorMsg, 'danger');
        }
      },
      complete: function() {
        submitBtn.prop('disabled', false).html(originalText);
      }
    });
  }
</script>
