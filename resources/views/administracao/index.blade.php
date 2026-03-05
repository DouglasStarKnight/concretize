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
    <div class="mt-5">
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
    
    {{-- modal para excluir produtos --}}
    <form id="formDeletar" method="POST">
      <x-modal modal_id="modal-deleta" title="Confirmar Exclusão">
        @csrf
        <input hidden name="_method" id="_method_excluir" />
        <p id="textoConfirmacao"></p>
        <x-slot name="footer">
          <button id="confirmaExclusao" type="submit" class="btn btn-danger">Excluir</button>
        </x-slot>
      </x-modal>
    </form>

    {{--  modal para manipulação de destaques --}}
    <form method="POST" id="form_destaque">
      @csrf
      <x-modal modal_id="modal-destaque" title="Insira as informações">
        <input hidden name="_method_destaque" id="_method_manipula_produtos" />
        @include('administracao.forms.formDestaque')
        <x-slot name="footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
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
  :root {
    --primary-orange: #fd7e14;
    --dark-blue: #000080;
    --light-gray: #f8f9fa;
  }

  
  .title-color { background-color: var(--primary-orange) !important; border: none !important; }
  .btn-warning { background-color: var(--primary-orange); color: white; border: none; font-weight: bold; }
  .btn-warning:hover { background-color: #e66d00; color: white; }

  
  .nav-tabs .nav-link { color: var(--dark-blue); font-weight: 600; border: none; }
  .nav-tabs .nav-link.active { border-bottom: 3px solid var(--primary-orange); color: var(--primary-orange); }

  
  .table thead th { background-color: var(--dark-blue); color: white; text-transform: uppercase; font-size: 0.85rem; border: none; }
  .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(107, 107, 244, 0.03); }
  input, select, .select2-selection { border: 1px solid #ced4da !important; border-radius: 8px !important; }
  
  .card-admin { border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); background: white; padding: 20px; }
</style>
<script>
  
  const globalData = {
    produtos: {!! json_encode($produtos['produtos'] ?? []) !!},
    destaques: {!! json_encode($destaques['data'] ?? []) !!},
    slides: {!! json_encode($slides ?? []) !!}
  };

  function manipulacao_modais(tipo, id = null) {
    const formProduto = $('#form_produto');
    const formDestaque = $('#form_destaque');
    const formDeletar = $('#formDeletar');
    const formSlide = $('#formSlide');
    
    // RESET GERAL - Limpa campos e estados de validação
    formProduto.trigger('reset');
    formDestaque.trigger('reset');
    $('#produtos_destaque').val(null).trigger('change');

    switch(tipo) {
      case 'criaProduto':
        $("#_method_manipula_produtos").val('post');
        formProduto.attr('action', "{{ route('admin.cria') }}");
        break;

      case 'editaProduto':
        const prod = globalData.produtos.find(p => p.id == id);
        if(prod) {
          $('#input_nome').val(prod.nome);
          $('#valor_produto').val(prod.valor_produto);
          $('#input_estoque').val(prod.estoque);
          $('#tipo_venda').val(prod.tipo_de_venda);
          $("#_method_manipula_produtos").val('post');
          formProduto.attr('action', "{{ route('admin.edita') }}/" + id);
        }
        break;

      case 'excluiProduto':
        const prodDel = globalData.produtos.find(p => p.id == id);
        $("#_method_excluir").val('delete');
        formDeletar.attr('action', "{{ route('admin.delete') }}/" + id);
        $('#textoConfirmacao').text(`Tem certeza que deseja excluir o produto "${prodDel ? prodDel.nome : ''}"?`);
        break;

      /* --- DESTAQUES --- */
      case 'btn-destaque': // Novo grupo
        $('#_method_destaque').val('post');
        formDestaque.attr('action', "{{ route('admin.destaque') }}");
        break;

      case 'btn-edita-destaque':
        const group = globalData.destaques.find(d => d.id == id);
        if(group) {
          $('#input_destaque').val(group.nome);
          const ids = group.produtos.map(p => p.id);
          $('#produtos_destaque').val(ids).trigger('change');
          $('#_method_destaque').val('post'); // Ou 'patch' dependendo da sua rota
          formDestaque.attr('action', "{{ route('admin.destaqueEdita') }}/" + id);
        }
        break;

      case 'btn-exclui-destaque':
        const groupDel = globalData.destaques.find(d => d.id == id);
        $("#_method_excluir").val('delete');
        formDeletar.attr('action', "{{ route('admin.exclui_destaque') }}/" + id);
        $('#textoConfirmacao').text(`Tem certeza que deseja excluir o grupo de destaque "${groupDel ? groupDel.nome : ''}"?`);
        break;

      /* --- SLIDES --- */
      case 'mudaSlide':
        $('input[name="posicao"]').off('change').on('change', function() {
          let pos = $(this).val();
          let slide = globalData.slides.find(s => s.posicao == pos);
          if (slide) {
            $("#_method_muda_slides").val('patch');
            formSlide.attr('action', "{{ route('slides.edita') }}/" + slide.id);
          }
        });
        break;
    }
  }

  $(document).ready(function() {
    const $select = $('#produtos_destaque');
    
    // Alimenta o Select2 com os produtos disponíveis no globalData
    if (globalData.produtos.length > 0) {
        let options = globalData.produtos.map(p => new Option(p.nome, p.id, false, false));
        $select.append(options);
    }

    $select.select2({
      theme: 'bootstrap-5',
      placeholder: 'Selecione os produtos...',
      allowClear: true,
      width: '100%',
      dropdownParent: $('#modal-destaque') // Garante que o select2 funcione dentro do modal
    });
  });
</script>