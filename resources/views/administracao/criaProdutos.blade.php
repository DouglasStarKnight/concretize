<x-layout>
    <div class="mt-5">
        <div class=" title-color border border-secondary rounded mb-2 row mx-2">
            <div class="col-1 d-flex justify-content-start align-items-center">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">
                    <i class="ph ph-arrow-circle-left" style="font-size:35px; color:white"></i>
                </a>
            </div>
            <div class="col-10">
                <h2 class="text-light text-center m-0 py-2">ADMINISTRAÇÃO</h2>
            </div>
         </div>
         <div class="row d-flex justify-content-end m-2">
            <div class="col-2 d-flex justify-content-end">
               <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide" class="btn-warning border border-dark" style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
                  <h2 style="font-size: 15px">TROCAR SLIDES</h2>
               </x-botaoModal>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <x-botaoModal id_button="btnCriaProduto" modal_id="modal-produto" class="btn-warning border border-dark" style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
                   <h2 style="font-size: 15px">ADICIONAR PRODUTO</h2>
                </x-botaoModal>
            </div>
        </div>
        <div id="tableExcluir" class="mx-2">
            <table class="table table-striped">
                <thead>
                    <tr class="border border-2 border-dark rounded title-color">
                        <th class="col-auto ">#</th>
                        <th class="col-auto ">NOME</th>
                        <th class="col-auto ">VALOR</th>
                        <th class="col-auto ">CATEGORIA</th>
                        <th class="col-auto">ESTOQUE</th>
                        <th class="col-auto">TIPO DE VENDA</th>
                        <th class="col-auto ">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr class="border border-2">
                            <th class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">{{$produto->id}}</th>
                            <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{$produto->nome}}</th>
                            <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1">{{$produto->valor_produto}}</th>
                            <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1">{{$produto->categoria_nome}}</th>
                            <th class="col-xxl-2 col-lx-2 col-lg-2 col-md-2 col-sm-2">{{$produto->estoque}}</th>
                            <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{$produto->tipo_de_venda}}</th>
                            <th class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                <x-botaoModal
                                    id_button="btnTableEdita"
                                    modal_id="modal-produto"
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
   {{--  modal para munipulação de dados --}}
   <form method="POST" id="form_produto" enctype="multipart/form-data">
        @csrf
        <x-modal  modal_id="modal-produto" title="Insira as informações">
            <input hidden name="_method" id="_method_manipula_produtos" />
            @include('administracao.forms.formProduto')
            <x-slot name="footer">
                <button id="confirmaCria" type="submit" class="btn btn-primary" >Salvar</button>
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
   <form id="formSlide" method="POST" enctype="multipart/form-data">
      <x-modal modal_id="mudaSlide" title="Mudar Slides">
         @csrf
         <input hidden name="_method" id="_method_muda_slides"/>
         @include('administracao.forms.formSlide')
         <x-slot name="footer">
               <button id="confirmaslide" type="submit" class="btn btn-danger" >Salvar</button>
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
    .title-color{
    background-color: #fd7e14;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function manipulacao_modais(element, dados){
        if(element.id == "btnCriaProduto"){
            $('#input_nome').val(null)
            $('#valor_produto').val(null)
            $('#t').val(null)
            $('#tipo_venda').val(null)
            $("#_method_manipula_produtos").attr('value', 'post');
            $("#form_produto").attr('action', "{{route('admin.cria')}}");

        }else if(element.id == "btnTableEdita"){
            console.log(dados)
            $('#input_nome').val(dados.nome)
            $('#valor_produto').val(dados.valor_produto)
            $('#input_estoque').val(dados.estoque)
            $('#tipo_venda').val(dados.tipo_de_venda)
            $("#_method_manipula_produtos").attr('value', 'post');
            $("#form_produto").attr('action', "{{route('admin.edita')}}" + "/" + dados.id);
        
        }else if(element.id == "btnTableExcluir"){
            $("#_method_excluir_produtos").attr('value', 'delete');
            $("#formDeletar").attr('action', "{{route('admin.delete')}}" + "/" + dados.id);
            $('#textoConfirmacao').text("Tem certeza que deseja excluir o produto " + dados.nome + "?");
        
        }else if(element.id == "btnMudaSlide"){
            $('input[name="posicao"]').off('change').on('change', function () {
                const valor = $(this).val();
                console.log(dados.id);
                console.log(dados.id);
                if(posicaoSelecionada){
                  $("#_method_muda_slides").attr('value', 'patch');
                  $("#formSlide").attr('action', "{{route('slides.edita')}}" + "/" + dados.id);
                }
            });

        }
        
    }
</script>
