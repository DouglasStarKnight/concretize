<x-layout>
  <div class="my-5">
    <div class=" title-color border border-secondary rounded mb-2 row mx-2">
      <div class="col-1 d-flex justify-content-start align-items-center">
        <a class="text-decoration-none" href="{{ route('inicio.index') }}">
          <i class="ph ph-arrow-circle-left" style="font-size:35px; color:white"></i>
        </a>
      </div>
      <div class="col-10">
        <h2 class="text-light text-center m-0 py-2">ADMINISTRAÇÃO</h2>
      </div>
    </div>
    <div class="row d-flex justify-content-end m-2">
      <div class="col-2 d-flex justify-content-end">
        <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide" class="btn-warning border border-dark"
          style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($slides) !!})">
          <h2 style="font-size: 15px">TROCAR SLIDES</h2>
        </x-botaoModal>
      </div>
      <div class="col-2 d-flex justify-content-end">
        <x-botaoModal id_button="btnDestaque" modal_id="modal-destaque" class="btn-warning border border-dark"
          style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
          <h2 style="font-size: 15px">PRODUTOS DESTAQUES</h2>
        </x-botaoModal>
      </div>
      <div class="col-2 d-flex justify-content-end">
        <x-botaoModal id_button="btnCriaProduto" modal_id="modal-produto" class="btn-warning border border-dark"
          style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
          <h2 style="font-size: 15px">ADICIONAR PRODUTO</h2>
        </x-botaoModal>
      </div>
    </div>

    <div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="produtos-tab" data-bs-toggle="tab" data-bs-target="#produtos"
            type="button" role="tab" aria-controls="produtos" aria-selected="true">
            Produtos
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="destaques-tab" data-bs-toggle="tab" data-bs-target="#destaques" type="button"
            role="tab" aria-controls="destaques" aria-selected="false">
            Destaques
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="funcionarios-tab" data-bs-toggle="tab" data-bs-target="#funcionarios"
            type="button" role="tab" aria-controls="funcionarios" aria-selected="false">
            Funcionários
          </button>
        </li>
      </ul>

      <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="produtos" role="tabpanel" aria-labelledby="produtos-tab">
          @include('administracao.reparticao.produtos')
        </div>
        <div class="tab-pane fade" id="destaques" role="tabpanel" aria-labelledby="destaques-tab">
          @include('administracao.reparticao.destaques')
        </div>
        <div class="tab-pane fade" id="funcionarios" role="tabpanel" aria-labelledby="funcionarios-tab">
        </div>
      </div>
    </div>
    
    {{--  modal para munipulação de dados --}}
    <form method="POST" id="form_produto" enctype="multipart/form-data">
      @csrf
      <x-modal modal_id="modal-produto" title="Insira as informações">
        <input hidden name="_method" id="_method_manipula_produtos" />
        @include('administracao.forms.formProduto')
        <x-slot name="footer">
          <button id="confirmaCria" type="submit" class="btn btn-primary">Salvar</button>
        </x-slot>
      </x-modal>
    </form>

    {{--  modal para Cria destaques --}}
    <form method="POST" id="form_destaque">
      @csrf
      <x-modal modal_id="modal-destaque" title="Insira as informações">
        <input hidden name="_methodDestaque" id="_method_manipula_produtos" />
        @include('administracao.forms.formDestaque')
        <x-slot name="footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </x-slot>
      </x-modal>
    </form>

    {{-- modal para excluir produtos --}}
    <form id="formDeletar" method="POST">
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
        <input hidden name="_method" id="_method_muda_slides" />
        @include('administracao.forms.formSlide')
        <x-slot name="footer">
          <button id="confirmaslide" type="submit" class="btn btn-danger">Salvar</button>
        </x-slot>
      </x-modal>
    </form>
  </div>

</x-layout>
<style>
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

  .title-color {
    background-color: #fd7e14;
  }
</style>
<script>
  produtos = {!! json_encode($produtos) !!};

  function manipulacao_modais(element, dados) {
    posicao = null;
    if (element.id == "btnCriaProduto") {
      $('#input_nome').val(null)
      $('#valor_produto').val(null)
      $('#t').val(null)
      $('#tipo_venda').val(null)
      $("#_method_manipula_produtos").attr('value', 'post');
      $("#form_produto").attr('action', "{{ route('admin.cria') }}");

    } else if (element.id == "btnTableEdita") {
      $('#input_nome').val(dados.nome)
      $('#valor_produto').val(dados.valor_produto)
      $('#input_estoque').val(dados.estoque)
      $('#tipo_venda').val(dados.tipo_de_venda)
      $("#_method_manipula_produtos").attr('value', 'post');
      $("#form_produto").attr('action', "{{ route('admin.edita') }}" + "/" + dados.id);

    } else if (element.id == "btnTableExcluir") {
      $("#_method_excluir_produtos").attr('value', 'delete');
      $("#formDeletar").attr('action', "{{ route('admin.delete') }}" + "/" + dados.id);
      $('#textoConfirmacao').text("Tem certeza que deseja excluir o produto " + dados.nome + "?");

    } else if (element.id == "btnMudaSlide") {
      $('input[name="posicao"]').off('change').on('change', function() {
        let posicao = $(this).val();
        let slideSelecionado = dados.find(slide => slide.posicao == posicao);
        if (slideSelecionado) {
          $("#_method_muda_slides").attr('value', 'patch');
          $("#formSlide").attr('action', "{{ route('slides.edita') }}" + "/" + slideSelecionado.id);
        }
      });
    } else if (element.id === "btnDestaque") {
      $('#_methodDestaque').attr('value', 'post');
      $('#form_destaque').attr('action', "{{ route('admin.destaque') }}");
    }
  }

  $(document).ready(function() {
    if (produtos.length === 0) {
      $('#produtos_destaque').html('<option disabled>Nenhum produto encontrado</option>');
    } else {
      let options = '';
      produtos.forEach(function(produto) {
        options += `<option value="${produto.id}">${produto.nome}</option>`;
      });
      $('#produtos_destaque').html(options);
    }

    // Inicializa o select2
    $('#produtos_destaque').select2({
      theme: 'bootstrap-5',
      allowClear: true,
      placeholder: 'Selecione...',
      width: '100%',
      language: "pt-BR"
    });
  });
</script>
