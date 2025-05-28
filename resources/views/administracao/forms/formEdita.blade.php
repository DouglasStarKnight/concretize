
<div class="row">
    <div class="col-6">
        <label class="col-12" for="nome"><h5>Novo nome do produto</h5></label>
        <input class="col-12 form-control" name="nome" type="text" placeholder="Digite o nome do material">
    </div>
    <div class="col-6">
        <label class="col-12" for="valor_produto"><h5>Novo valor</h5></label>
        <input class="col-12 form-control" name="valor_produto" type="text" placeholder="Digite o valor do produto">
    </div>
</div>
<div class="row m-1">
    <div class="col-6 mb-1">
                <h5>Categoria do Produto</h5>
        <select class="form-select" name="categoria_id" id="category">
            <option value="1">básico</option>
            <option value="2">Acabamento</option>
            <option value="3">eletrico</option>
            <option value="4">conexção</option>
        </select>
    </div>
    <div class="col-6">
        <div class="row m-1">
            <div class="col-12">
                <label for="imagem"><h5>Nova imagem do produto</h5></label>
                <input class="form-control" type="file" name="image" accept="image/*" >
            </div>
        </div>
    </div>
</div>
