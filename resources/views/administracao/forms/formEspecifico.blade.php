<div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-auto">#</th>
                <th class="col-auto">nome</th>
                <th class="col-auto">valor</th>
                <th class="col-auto">Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <th class="col-3">{{$produto->id}}</th>
                <th class="col-3">{{$produto->nome}}</th>
                <th class="col-3">{{$produto->valor_produto}}</th>
                <th class="col-3">{{$produto->categoria_nome}}</th>
                <th class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                        <label class="form-check-label" for="checkDefault">
                        </label>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-6 mb-1">
        <h5>Selecione a página</h5>
        <select name="categoria" id="category">
            <option value="1">inicio</option>
        </select>
    </div>
    <div class="col-6 mb-1">
        <h5>Selecione local de destaque</h5>
        <select name="categoria" id="category">
            <option value="1">Promoções</option>
            <option value="2">Mais Vendidos</option>
        </select>
    </div>
</div>
