<!-- COMPONENTE: x-produto-card -->
@props([
    'title' => isset($title) ? $title : null,
    'produtos' => isset($produtos) ? $produtos : null,
    'destaques' => isset($destaques) ? $destaques : null,
])
<?php
$quantidadeP = 0;
?>

<style>
    /* UI Melhorada */
    .product-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid #f0f0f0 !important;
        background: #fff;
        width: 100%; /* Deixa o Swiper controlar a largura */
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 16px;
    }
    .product-card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        transform: translateY(-4px);
        border-color: #e0e0e0 !important;
    }
    .img-wrapper {
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 1rem;
        border-bottom: 1px solid #f8f9fa;
    }
    .img-wrapper img {
        object-fit: contain !important;
        transition: transform 0.3s ease;
    }
    .product-card:hover .img-wrapper img {
        transform: scale(1.05); /* Zoom suave na imagem ao passar o mouse */
    }
    .product-title {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Limita a 2 linhas para alinhar os cards */
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.8em;
        font-size: 0.95rem;
    }
    .qty-controls {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 4px;
    }
    .btn-qty-box {
        cursor: pointer;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        background: #fff;
        border: 1px solid #dee2e6;
        user-select: none;
        transition: all 0.1s ease;
    }
    .btn-qty-box:active { transform: scale(0.95); }
    .btn-qty-box:hover { background: #e9ecef; border-color: #ced4da; }
</style>

<div id="promocoes" style="background-color:#ffffff" class="my-4 rounded-4 shadow-sm border border-light p-3 p-md-4">
    <!-- Cabeçalho do Carrossel -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h4 class="m-0 fw-bold text-uppercase fs-5 text-dark">{{ $title }}</h4>
    </div>

    <!-- Carrossel de Produtos -->
    <div class="produtos">
        <div class="swiper mySwiper pb-5">
            <div class="swiper-wrapper">
                @foreach ($destaques ?? collect() as $destaque)
                    @foreach ($destaque['produtos'] ?? [] as $p)
                    {{-- @dd($p) --}}
                        <div class="swiper-slide height-auto">
                            <form id="form_pedidos{{ $p['id'] }}" method="POST" onsubmit="manipulaDados(event, this, {{ $p['id'] }})" class="h-100">
                                @csrf
                                <input hidden name="_method" id="_method" />
                                <input id="input_valor{{ $p['id'] }}" name="produto_id" type="hidden" value="{{ $p['id'] }}">

                                <div class="product-card p-3">
                                    <a href="{{ route('produtos.descricao', ['id' => $p['id']]) }}" class="text-decoration-none flex-grow-1">
                                        <div class="img-wrapper mb-3 rounded-3">
                                            <input type="hidden" id="input_img{{ $p['id'] }}" name="image" value="{{ $p['image'] }}">
                                            <img name="image" src="{{ Storage::disk('s3')->url($p['image']) }}" alt="Imagem do Produto" class="img-fluid w-100 h-100" loading="lazy" />
                                        </div>

                                        <div class="text-start mb-2">
                                            <input id="input_nome{{ $p['id'] }}" name="nome" type="hidden" value="{{ $p['nome'] }}">
                                            <span name="nome" class="product-title text-secondary fw-semibold">{{ $p['nome'] }}</span>
                                        </div>

                                        {{-- <div class="text-start mb-3">
                                            <input id="input_valor{{ $p['id'] }}" name="valor_produto" type="hidden" value="{{ $p['valor_produto'] }}">
                                            <span class="fs-4 fw-bold text-success">R$ {{ number_format($p['valor_produto'], 2, ',', '.') }}</span>
                                        </div> --}}
                                    </a>

                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center gap-2 mb-3 qty-controls">
                                            <div class="btn-qty-box fw-bold btn-minus text-muted" onclick="quantidade(this, {{ $p['id'] }}, 'minus')">-</div>
                                            <div class="text-center flex-grow-1">
                                                <input name="quantidade" type="hidden" id="input_qtd{{ $p['id'] }}" value="{{ $quantidadeP }}">
                                                <span class="spanQuantidade{{ $p['id'] }} fw-bold fs-5">{{ $quantidadeP }}</span>
                                            </div>
                                            <div class="btn-qty-box fw-bold btn-plus text-dark" onclick="quantidade(this, {{ $p['id'] }}, 'plus')">+</div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" id="submit{{ $p['id'] }}" class="btn btn-dark text-white add-to-cart-btn fw-bold py-2 rounded-3 shadow-sm transition">
                                                <i class="bi bi-cart-plus me-1"></i> Adicionar
                                            </button>
                                        </div>
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
            if (q > 0) q--; // Evita quantidade negativa
        }
        
        input.val(q);
        span.text(q);
        
        // NOTA DE UX: O código que aumentava o ícone do carrinho foi removido daqui 
        // e movido para o "success" do AJAX, para só contabilizar quando realmente adicionar.
    };

    function manipulaDados(event, form, produtoId) {
        event.preventDefault();
        const $form = $(form);
        $form.find("#_method").val('post');
        const actionUrl = "{!! route('carrinho.cria') !!}";
        const formData = $form.serialize();

        const btn = $form.find('button[type="submit"]');
        const textOriginal = btn.html(); // Usar html() para preservar ícones, se houver
        
        // UX: Estado de loading
        btn.prop('disabled', true).removeClass('btn-dark').addClass('btn-secondary').html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Adicionando...');

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.sucesso) {
                    // UX: Retorna botão ao estado original
                    btn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-dark').html(textOriginal);

                    // UX: Atualiza o contador do carrinho no Header apenas após sucesso real!
                    const spanCart = $('#cart-count');
                    const inputQtd = parseInt($form.find(`#input_qtd${produtoId}`).val()) || 1; // Pega a qtd adicionada

                    if(spanCart.length) {
                        let quantCart = parseInt(spanCart.text()) || 0;
                        spanCart.text(quantCart + inputQtd);
                    }

                    // Nota: No seu código original chamava "mostrarErroToast" para um sucesso. 
                    // Certifique-se de usar a função correta da sua biblioteca de alertas.
                    if(typeof mostrarErroToast === 'function') {
                        mostrarErroToast("Produto Cadastrado com Sucesso!"); 
                    } else {
                        alert("Produto Cadastrado com Sucesso!");
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao adicionar produto:', error);
                btn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-dark').html(textOriginal);
                alert("Erro ao adicionar o produto. Tente novamente.");
            }
        });
    }

    // Swiper Config - Configuração melhorada de espaçamento
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20, // Aumentado um pouco para respiro visual
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true, // Deixa a paginação mais elegante se houver muitos produtos
        },
        breakpoints: {
            480: { slidesPerView: 2, spaceBetween: 15 },
            768: { slidesPerView: 3, spaceBetween: 20 },
            1024: { slidesPerView: 4, spaceBetween: 20 },
            1400: { slidesPerView: 5, spaceBetween: 24 },
            1660: { slidesPerView: 6, spaceBetween: 24 }
        }
    });
</script>