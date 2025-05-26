{{-- <div>
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
                    <button type="submit"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#deletaProduto"
                    data-id="{{ $produto->id }}">
                    Excluir
                </button>
            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
