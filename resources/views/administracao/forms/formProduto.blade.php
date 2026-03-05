<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <div class="row g-3"> <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="input_nome">Nome do Produto</label>
                <input id="input_nome" class="form-control form-control-lg" name="nome" type="text" placeholder="Ex: Cimento CP-II" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="valor_produto">Valor Unitário</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">R$</span>
                    <input id="valor_produto" class="form-control form-control-lg" name="valor_produto" type="text" placeholder="0,00">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="input_estoque">Quantidade em Estoque</label>
                <input id="input_estoque" class="form-control form-control-lg" type="number" name="estoque" placeholder="0">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="category">Categoria</label>
                <select class="form-select form-select-lg" name="categoria_id" id="category">
                    <option selected disabled>Selecione uma categoria...</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="tipo_venda">Tipo de Venda</label>
                <input id="tipo_venda" class="form-control form-control-lg" type="text" name="tipo_de_venda" placeholder="Ex: Unitária, Atacado...">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary" for="input_image">Imagem do Produto</label>
                <input id="input_image" class="form-control form-control-lg" type="file" name="image" accept="image/*">
                <div class="form-text text-muted">Formatos aceitos: JPG, PNG. Máx 2MB.</div>
            </div>

        </div>
    </div>
</div>