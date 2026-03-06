<x-layout>
    <style>
        /* Estilização dos Radio Buttons como Cards */
        .payment-option {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            background: #fff;
        }

        .payment-option:hover {
            border-color: #dee2e6;
            background-color: #f8f9fa;
        }

        /* Esconde o radio original mas mantém funcional */
        .payment-option input[type="radio"] {
            margin-right: 15px;
            width: 18px;
            height: 18px;
        }

        /* Quando selecionado */
        .payment-option.active {
            border-color: #0d6efd; /* Azul do Bootstrap */
            background-color: #f0f7ff;
        }

        .payment-icon {
            font-size: 24px;
            width: 40px;
            text-align: center;
            margin-right: 10px;
        }

        .summary-card {
            border-top: 3px solid #0d6efd;
        }
    </style>

    {{-- Header --}}
    <div class="title-color shadow-sm rounded row m-1 align-items-center bg-dark text-white">
        <div class="col-1 d-flex justify-content-center">
            <a class="text-decoration-none" href="{{ route('carrinho.index') }}">
                <i class="ph ph-arrow-left-circle" style="font-size:32px; color:#ffffff"></i>
            </a>
        </div>
        <div class="col-10">
            <h4 class="text-center m-0 py-3 fw-bold uppercase">FINALIZAR PEDIDO</h4>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row g-4">
            {{-- Coluna da Esquerda: Pagamento --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Selecione a forma de pagamento:</h5>

                    <div class="payment-methods">
                        <label class="payment-option" for="dinheiro">
                            <input type="radio" name="pagamento" id="dinheiro" value="dinheiro">
                            <div class="payment-icon"><i class="fa-solid fa-money-bill text-success"></i></div>
                            <span class="fw-bold">Dinheiro</span>
                        </label>

                        <label class="payment-option" for="pix">
                            <input type="radio" name="pagamento" id="pix" value="pix">
                            <div class="payment-icon"><i class="fa-brands fa-pix text-info"></i></div>
                            <span class="fw-bold">Pix</span>
                        </label>

                        <label class="payment-option" for="card-credit">
                            <input type="radio" name="pagamento" id="card-credit" value="card-credit">
                            <div class="payment-icon"><i class="fa-regular fa-credit-card text-primary"></i></div>
                            <span class="fw-bold">Cartão de Crédito</span>
                        </label>

                        <label class="payment-option" for="card-debito">
                            <input type="radio" name="pagamento" id="card-debito" value="card-debito">
                            <div class="payment-icon"><i class="fa-solid fa-credit-card text-secondary"></i></div>
                            <span class="fw-bold">Cartão de Débito</span>
                        </label>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded border-start border-4 border-primary">
                        <h6 class="mb-0 text-muted">Previsão de entrega: <span class="fw-bold text-dark text-uppercase">1 a 5 dias úteis</span></h6>
                    </div>
                </div>
            </div>

            {{-- Coluna da Direita: Formulários Dinâmicos e Resumo --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 summary-card h-100">
                    <h5 class="fw-bold mb-3">Resumo e Detalhes</h5>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal (3 itens):</span>
                            <span class="fw-bold">R$ 3.000,00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Entrega:</span>
                            <span class="text-success fw-bold">Grátis</span>
                        </div>
                    </div>

                    <hr>

                    <div class="dynamic-forms mb-4">
                        <div id="money" style="display: none;">
                            <div class="alert alert-info py-2 small">Preencha o troco se necessário:</div>
                            @include('carrinho.forms.dinheiro')
                        </div>

                        <div id="cards" style="display: none;">
                            <div class="alert alert-secondary py-2 small">Insira os dados do cartão:</div>
                            @include('carrinho.forms.cartao')
                        </div>

                        <div id="pix-info" style="display: none;">
                            <div class="text-center p-3 border rounded bg-light">
                                <i class="fa-brands fa-pix fa-2x text-info mb-2"></i>
                                <p class="small mb-0">O QR Code será gerado após finalizar.</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success w-100 py-3 fw-bold shadow-sm">
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    $('input[name="pagamento"]').on('change', function () {
        let valor = $(this).val();

        // Remove classe 'active' de todos e adiciona ao pai do selecionado
        $('.payment-option').removeClass('active');
        $(this).closest('.payment-option').addClass('active');

        // Lógica de exibição (troquei hidden por hide/show para transição mais suave)
        if(valor == "dinheiro"){
            $('#money').fadeIn();
            $('#cards, #pix-info').hide();
        } else if(valor == "card-credit" || valor == "card-debito"){
            $('#cards').fadeIn();
            $('#money, #pix-info').hide();
        } else if(valor == "pix") {
            $('#pix-info').fadeIn();
            $('#money, #cards').hide();
        } else {
            $('#money, #cards, #pix-info').hide();
        }
    });
</script>
