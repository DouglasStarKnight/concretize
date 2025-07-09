
<div class="row g-0">
    <div class="col-xl-6 col-lg-6 col-md-6">
        <label class="col-12" for="nome"><h5>Nome do produto</h5></label>
        <input id="input_nome" class="col-12 form-control" name="nome" type="text" placeholder="Digite o nome do material">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <label class="col-12" for="valor"><h5>Valor do produto?</h5></label>
        <input id="valor_produto" class="col-12 form-control" name="valor_produto" type="text" placeholder="Digite o valor do produto">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <label for="estoque"><h5>quantidade no estoque</h5></label>
        <input id="input_estoque" class="form-control" type="number" name="estoque" id="estoque" placeholder="Digite a quantidade no estoque">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
                <h5>Categoria do Produto</h5>
                <select class="form-select" name="categoria_id" id="category">
                    @foreach ($categorias as $categoria)
                        <option id="option_categoria" value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="row">
            <div class="col-12">
                <label for="imagem"><h5>Imagem do Produto</h5></label>
                <input id="input_image" class="form-control" type="file" name="image" accept="image/*">
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <label for="tipo_de_venda"><h5>Tipo de venda</h5></label>
        <input id="tipo_venda" class="form-control" type="text" name="tipo_de_venda" placeholder="Unitária|Atacado|fracionada...">
    </div>
</div>
