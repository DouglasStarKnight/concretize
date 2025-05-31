<x-layout>
  <?php
  $quantidadeP = 0;

    $mapaCategorias = [
        'basicos' => 1,
        'acabamento' => 2,
        'eletricos' => 4,
        'conexcoes' => 4,
        'tubulacoes' => 5,
        // adicione conforme seu banco
    ];
    if (isset($tipo) && isset($mapaCategorias[$tipo])) {
        $categoriaId = $mapaCategorias[$tipo];
        $produtosFiltrados = $produtos->where('categoria_id', $categoriaId);
    } else {
        $categoriaId = null;
        $produtosFiltrados = collect();
    }
    // dd($produtosFiltrados);
  ?>
<div id="contentmaisvendidos">

            <div class="produtos m-2 row border border-black d-flex justify-content-around" style="border-radius:10px">
              @foreach($produtosFiltrados as $p)
                <div class="col-2 border my-1 mx-2">
                  <div class="image">
                    <img src="{{ Storage::disk('s3')->url($p->image) }}" alt="Imagem do Produto" style="height:300px" class="img-fluid" />
                  </div>
                  <div class="fw-bold d-flex justify-content-center">
                    {{$p->nome}}
                      </div>
                    <div class="fw-bold d-flex justify-content-center">
                      R$ {{$p->valor_produto}}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <button class="btn btn-light col-2 p-0 fw-bold btn-minus" onclick="quantidade(this, {{$p->id}}, 'minus')">-</button>
                            <div class="col-3 text-center">
                                <input type="hidden" name="produtos_quantidade" id="input_qtd{{$p->id}}" value="{{$quantidadeP}}">
                                <span class="spanQuantidade{{$p->id}}">{{$quantidadeP}}</span>
                            </div>
                        <button class="btn btn-light col-2 p-0 fw-bold btn-plus" onclick="quantidade(this, {{$p->id}}, 'plus')">+</button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                      <button class="btn subHeader-color border rounded text-white add-to-cart-btn bg-gradient">adicionar ao carrinho</button>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
</x-layout>
<style>
    .alpha-color{
    background-color: #fd7e14;
}
.subHeader-color{
    background-color:#000080;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    quantidadeP = 0;

    function quantidade(element, produtoId, action) {
    const parent = $(element).closest('div.produtos');
    const input = parent.find(`#input_qtd${produtoId}`);
    const span = parent.find(`.spanQuantidade${produtoId}`);

    let quantidadeP = parseInt(input.val());

    if (action === 'plus') {
        quantidadeP++;
    } else if (action === 'minus') {
        if (quantidadeP > 0) {
            quantidadeP--;
        }
    }
    input.val(quantidadeP);
    span.text(quantidadeP);
};
</script>
