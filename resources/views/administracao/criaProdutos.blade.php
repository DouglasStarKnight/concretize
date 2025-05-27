<x-layout>
    <div class="d-flex justify-content-evenly">
{{-- botão para criar produto --}}
        <button class="bg-primary bg-gradient" style="width: 300px; height: 100px;" data-bs-toggle="modal" data-bs-target="#novoProduto">
            <h4 class="text-light">Inserir Produtos</h4>
        </button>
        {{-- botão para excluir Produto --}}
        <x-botaoModal  class="bg-primary bg-gradient" style="width: 300px; height: 100px;" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
           <h4 class="text-light">Deletar Produto</h4>
        </x-botaoModal>

        {{-- botão para  mandar Produto --}}
        <button class="bg-primary bg-gradient" style="width: 300px; height: 100px;" data-bs-toggle="modal" data-bs-target="#especificaPagina">
            <h4 class="text-light">principais</h4>
        </button>

    {{--  modal para criar produtos --}}
    <x-modal  modal_id="novoProduto" title="Insira as informações">
        <form action="{{ route('admin.cria') }}" method="POST" id="formCria" enctype="multipart/form-data">
            @csrf
            @include('administracao.forms.formCria')
            <x-slot name="footer">
                <button type="submit" class="btn btn-primary" form="formCria">Salvar</button>
            </x-slot>
        </form>
    </x-modal>

     {{-- modal para excluir produtos --}}
    <x-modal modal_id="deletaProduto" title="Confirmar Exclusão">
    <form id="formDeletar" method="POST" action="">
        @csrf
        @method('DELETE')
        <p id="textoConfirmacao"></p>
        <x-slot name="footer">
            <button type="submit" class="btn btn-danger">Excluir</button>
        </x-slot>
    </form>
</x-modal>

    {{--  modal para mandar produtos para página específica --}}
    <x-modal  modal_id="especificaPagina" title="Insira as informações">
        <form action="{{ route('admin.cria') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('administracao.forms.formEspecifico')
        </form>
        <x-slot name="footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </x-slot>
    </x-modal>
 </div>
<div id="tableExcluir" >
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
                    <button

                        type="button"
                        class="btn btn-danger"
                        data-bs-toggle="modal" data-bs-target="#deletaProduto"
                        onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})"
                        data-id="{{ $produto->id }}"
                        data-nome="{{ $produto->nome }}">
                        Excluir
                    </button>
            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layout>
<style>
.criaProdutos {
}
input {
    height: 40px;
    border-radius: 5px;
}
select {
   border-radius: 5px
}
button {
   border-radius: 5px;

}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    // function manipulacao_modais(element, dados){
    //     console.log("element")
    //     if(element.id == "btnTableExcluir"){
    //         $("#formDeletar").attr('action', "{route('admin.delete') !!}" + "/" + dados.id);
    //         $('#textoConfirmacao').text(`Tem certeza que deseja excluir o produto "${nome}"?`);
    //     }
    // }
    function manipulacao_modais(element) {
    const id = element.getAttribute('data-id');
    const nome = element.getAttribute('data-nome');
    const url = "{{ url('admin/delete') }}/" + id;
console
    $("#formDeletar").attr('action', url);
    $('#textoConfirmacao').text(`Tem certeza que deseja excluir o produto "${nome}"?`);
}
</script>
