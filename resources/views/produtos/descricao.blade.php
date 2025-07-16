<x-layout style="background-color: white">
  @dump($produto)
  <div class="row">
    <div class="col-9">
      <div class="row">
        <div class="col-7">
          <img name="image" src="{{ Storage::disk('s3')->url($produto->image) }}" alt="Imagem do Produto"
            style="height: 250px; object-fit: cover;" class="img-fluid" />
        </div>
        <div class="col-5">
          <h5>{{ $produto->nome }}</h5>
          <div>
            <ul>
              <li><span class="fw-bold">principal:</span> ola apenas um teste para testar como funcionaria allguma coisa
                aqui!</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="border rounded">
        <h1 class="fw-bold text-center letters-color">R$ {{ $produto->valor_produto }}</h1>
        <p>à vista ou no pix com <b>10% de desconto</b></p>
        <p></p>
        <div class="d-flex justify-content-center my-2">
          <button id="submit" class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
            adicionar ao carrinho
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    {{-- @include('carrinho.cards') --}}
  </div>
</x-layout>
