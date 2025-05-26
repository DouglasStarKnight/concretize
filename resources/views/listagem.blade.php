<x-layout>
    <div class="contentmaisvendidos">
        <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
          @foreach($produtos as $p)
            <div class="col-2 border my-1 mx-2">
              <div class="image">
                <img src="{{ $p->image }}" alt="Imagem do Produto" class="img-fluid" />
              </div>
              <div class="fw-bold d-flex justify-content-center">
                {{$p->nome}}
                  </div>
                <div class="fw-bold d-flex justify-content-center">
                  R$ {{$p->valor_produto}}
                </div>
                <div class="d-flex justify-content-center">
                  <button>adicionar ao carrinho</button>
              </div>
            </div>
                @endforeach
        </div>
      </div>
</x-layout>
