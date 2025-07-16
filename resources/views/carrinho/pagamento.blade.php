<x-layout>
  <div class="title-color border border-secondary rounded row m-1">
    <div class="col-1 d-flex justify-content-start align-items-center">
      <a class="text-decoration-none" href="{{ route('carrinho.index') }}">
        <i class="ph ph-arrow-circle-left" style="font-size:35px; color:#f0f3f4"></i>
      </a>
    </div>
    <div class="col-10">
      <h2 class="text-light text-center m-0 py-2">FINALZIAR PEDIDO</h2>
    </div>
  </div>
  <div class="row">
    <div>
      <div class="row my-4">
        <div class="col-8">
          <div class="bg-light ">
            <div>
              <h4 class="text-start mx-4">Selecone a forma de pagmento:</h4>
            </div>
            <div class="mx-4">
              <div class="form-check">
                <i class="fa-solid fa-money-bill" style="color: #00cc0e;"></i>
                <input class="form-check-input" type="radio" name="pagamento" id="dinheiro" value="dinheiro" height="22px">
                <label class="form-check-label" for="Dinheiro">Dinheiro</label>
              </div>
              <div class="form-check">
                <i class="fa-brands fa-pix" style="color: #63E6BE;"></i>
                <input class="form-check-input" type="radio" name="pagamento" id="pix" value="pix">
                <label class="form-check-label" for="Pix">Pix</label>
              </div>
              <div class="form-check">
                <i class="fa-regular fa-credit-card"></i>
                <input class="form-check-input" type="radio" name="pagamento" id="card-credit"value="card-credit">
                <label class="form-check-label" for="card-credit">Cartão de Crédito</label>
              </div>
              <div class="form-check">
                <i class="fa-solid fa-credit-card"></i>
                <input class="form-check-input" type="radio" name="pagamento" id="card-debito" value="card-debito">
                <label class="form-check-label" for="card-debito">Cartão de Débito</label>
              </div>
              <hr>
              <div>
                <h6>previsão de entrega:<span class="fw-bold"> de 1 a 500 dias</span></h6>
              </div>
              <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
                Finalizar Compra
              </button>
              <div class="row m-3 justify-self-end">
                <h6>Sub Total(3 produtos):<span class="fw-bold"> R$3.000,00</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="bg-light px-4 mt">
            <div id="money" hidden>
              @include('carrinho.forms.dinheiro')
            </div>
            <div id="cards" hidden>
              @include('carrinho.forms.cartao')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
<script>
  $('input[name="pagamento"]').on('change', function () {
  let valor = $('input[name="pagamento"]:checked').val();
// console.log(valor)
    // $('#money').hide()
    // $('#cards').hide()

    if(valor == "dinheiro"){
      $('#money').prop('hidden', false)
    }else if(valor == "card-credit" || valor == "card-debito"){
      $('#cards').prop('hidden', false)
    }else{
      $('#money').prop('hidden', true)
      $('#cards').hide('hidden', true)
    }
  });
  // $('.money_mask').mask('000.000.000.000.000,00', {reverse: true});

</script>
