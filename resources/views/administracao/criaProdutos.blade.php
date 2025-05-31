<x-layout layout>
    <div class="mt-5">
        <div class=" alpha-color border border-2 border-dark rounded mb-2 row mx-2">
            <div class="col-1 d-flex justify-content-start align-items-center">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">
                    <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i>
                </a>
            </div>
            <div class="col-10">
                <h2 class="text-light text-center m-0 py-2">ADMINISTRAÇÃO</h2>
            </div>
         </div>
         <div class="row d-flex justify-content-end m-2">
            <div class="col-2 d-flex justify-content-end">
                <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide" class="btn-warning border border-dark" style="margin: 5px" title="Insira as informações">
                    <h2 style="font-size: 15px">TROCAR SLIDES</h2>
                </x-botaoModal>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <x-botaoModal id_button="btnCriaProduto" modal_id="novoProduto" class="btn-warning border border-dark" style="margin: 5px" title="Insira as informações">
                   <h2 style="font-size: 15px">ADICIONAR PRODUTO</h2>
                </x-botaoModal>
            </div>
        </div>
        <div id="tableExcluir" class="mx-2">
            <table class="table table-striped">
                <thead>
                    <tr class="alpha-color border border-2 border-dark">
                        <th class="col-auto ">#</th>
                        <th class="col-auto ">NOME</th>
                        <th class="col-auto ">VALOR</th>
                        <th class="col-auto ">CATEGORIA</th>
                        <th class="col-auto ">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr class="border border-2">
                            <th class="col-1">{{$produto->id}}</th>
                            <th class="col-2">{{$produto->nome}}</th>
                            <th class="col-2">{{$produto->valor_produto}}</th>
                            <th class="col-2">{{$produto->categoria_nome}}</th>
                            <th class="col-1">
                                <x-botaoModal
                                    id_button="btnTableEdita"
                                    modal_id="editaProduto"
                                    type="button"
                                    class="btn btn-primary"
                                    onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-botaoModal>
                                <x-botaoModal
                                    id_button="btnTableExcluir"
                                    modal_id="deletaProduto"
                                    type="button"
                                    class="btn btn-danger"
                                    onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
                                    <i class="fa-solid fa-trash"></i>
                                </x-botaoModal>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   {{--  modal para criar produtos --}}
   <x-modal  modal_id="novoProduto" title="Insira as informações">
      <form action="{{ route('admin.cria') }}" method="POST" id="formCria" enctype="multipart/form-data">
         @csrf
         @include('administracao.forms.formCria')
         <x-slot name="footer">
               <button id="confirmaCria" type="submit" class="btn btn-primary" id form="formCria">Salvar</button>
         </x-slot>
      </form>
   </x-modal>

   {{--  modal para editar produtos --}}
   <form method="POST" id="formEditaProduto" enctype="multipart/form-data">
      <x-modal  modal_id="editaProduto" title="Editar">
         @csrf
         <input hidden name="_method" id="_method_editar_produtos" />
         @include('administracao.forms.formEdita')
         <x-slot name="footer">
               <button type="submit" class="btn btn-primary" form="formEditaProduto">Salvar</button>
         </x-slot>
      </x-modal>
   </form>

   {{-- modal para excluir produtos --}}
   <form id="formDeletar" method="POST" >
      <x-modal modal_id="deletaProduto" title="Confirmar Exclusão">
         @csrf
         <input hidden name="_method" id="_method_excluir_produtos" />
         <p id="textoConfirmacao"></p>
         <x-slot name="footer">
               <button id="confirmaExclusao" type="submit" class="btn btn-danger">Excluir</button>
         </x-slot>
      </x-modal>
   </form>

   {{-- modal para trocar slides --}}
   <form id="formSlide" method="POST" >
      <x-modal modal_id="mudaSlide" title="Mudar Slides">
         @csrf
         <input hidden name="_method" id="_method_muda_slides" />
         @include('administracao.forms.formSlide')
         <x-slot name="footer">
               <button id="confirmaslide" type="submit" class="btn btn-danger">Excluir</button>
         </x-slot>
      </x-modal>
   </form>
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
    .alpha-color{
    background-color: #fd7e14;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function manipulacao_modais(element, dados){
        // console.log(element.id == "btnTableExcluir")
        if(element.id == "btnTableExcluir"){
            $("#_method_excluir_produtos").attr('value', 'delete');
            $("#formDeletar").attr('action', "{{route('admin.delete')}}" + "/" + dados.id);
            $('#textoConfirmacao').text("Tem certeza que deseja excluir o produto " + dados.nome + "?");
        }
        if(element.id == "btnTableEdita"){
            // $("#_method_excluir_produtos").attr('value', 'delete');
            $("#_method_editar_produtos").attr('value', 'patch');
            $("#formEditaProduto").attr('action', "{{route('admin.edita')}}" + "/" + dados.id);
        }
    }
</script>
