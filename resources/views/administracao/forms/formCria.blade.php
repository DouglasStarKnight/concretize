
<div class="row">
    <div class="col-6">
        <label class="col-12" for="nome" required><h5>Qual produto deseja adicionar?</h5></label>
        <input class="col-12" style="width: 200px" name="nome" type="text" placeholder="Digite o nome do material" required>
    </div>
    <div class="col-6">
        <label class="col-12" for="valor" required><h5>Valor do produto?</h5></label>
        <input class="col-12" style="width: 200px" name="valor" type="text" placeholder="Digite o valor do produto" required>
    </div>
</div>
<div class="row m-1">
    <div class="col-6 mb-1">
                <h5>Categoria do Produto</h5>
        <select name="categoria" id="category" required>
            <option value="1">básico</option>
            <option value="2">Acabamento</option>
            <option value="3">eletrico</option>
            <option value="4">conexção</option>
        </select>
    </div>
    <div class="col-6">
        <div class="row m-1">
            <div class="col-12">
                <label for="imagem"><h5>Imagem do Produto</h5></label>
                <input type="file" name="image" accept="image/*" required>
            </div>
        </div>
    </div>
</div>
