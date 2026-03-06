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
                    <button class="nav-link" id="destaques-tab" data-bs-toggle="tab" data-bs-target="#destaques"
                        type="button" role="tab" aria-controls="destaques" aria-selected="false">
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
                <p id="textoConfirmacao">Deseja excluir o produto?</p>
                <x-slot name="footer">
                    <button id="confirmaExclusao" type="submit" class="btn btn-danger">Excluir</button>
                </x-slot>
            </x-modal>
        </form>

        {{-- Modal para manipulação de destaques --}}
<form method="POST" id="form_destaque">
    @csrf
    <x-modal modal_id="modal-destaque" title="Informações do Destaque">
        {{-- ID único para o método de destaque --}}
        <input type="hidden" name="_method" id="_method_destaque" />
        @include('administracao.forms.formDestaque')

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar Destaque</button>
        </x-slot>
    </x-modal>
</form>

{{-- Modal para trocar slides --}}
<form id="formSlide" method="POST" enctype="multipart/form-data">
    @csrf
    <x-modal modal_id="mudaSlide" title="Mudar Slides">
        <input type="hidden" name="_method" id="_method_muda_slides" />
        @include('administracao.forms.formSlide')

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button id="confirmaslide" type="submit" class="btn btn-danger">Salvar Slide</button>
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

.nav-tabs .nav-link:hover {
    color: var(--primary-orange) !important;
    background-color: var(--light-gray) !important;
    border-color: transparent;
    border-bottom: 3px solid #dee2e6;
}

.nav-tabs .nav-link.active {
    background-color: white !important;
    border-bottom: 3px solid var(--primary-orange) !important;
    color: var(--primary-orange) !important;
}

    .accordion-button:hover {
    background-color: var(--light-gray) !important; /* Cor de fundo ao passar o mouse */
    color: var(--primary-orange) !important; /* Cor do texto ao passar o mouse */
}
    .title-color {
        background-color: var(--primary-orange) !important;
        border: none !important;
    }

    .btn-warning {
        background-color: var(--primary-orange);
        color: white;
        border: none;
        font-weight: bold;
    }

    .btn-warning:hover {
        background-color: #e66d00;
        color: white;
    }


    .nav-tabs .nav-link {
        color: var(--dark-blue);
        font-weight: 600;
        border: none;
    }

    .nav-tabs .nav-link.active {
        border-bottom: 3px solid var(--primary-orange);
        color: var(--primary-orange);
    }


    .table thead th {
        /* background-color: var(--dark-blue); */
        color: white;
        text-transform: uppercase;
        font-size: 0.85rem;
        border: none;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(107, 107, 244, 0.03);
    }

    input,
    select,
    .select2-selection {
        border: 1px solid #ced4da !important;
        border-radius: 8px !important;
    }

    .card-admin {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        background: white;
        padding: 20px;
    }
</style>
<script>
    produtos = {!! json_encode($produtos) !!};
    // 1. Defina a função de utilidade no topo
    function preencherSelectProdutos(listaProdutos) {
        const $select = $('#produtos_destaque');
        console.log($select)
        $select.empty();
        if (!listaProdutos || listaProdutos.length === 0) {
            $select.append(new Option('Nenhum produto encontrado', '', false, false));
        } else {
            listaProdutos.forEach(p => {
                $select.append(new Option(p.nome, p.id, false, false));
            });
        }
        $select.trigger('change');
    }

    // 2. Função principal de manipulação
    function manipulacao_modais(element, dados) {
        const idTrigger = element.id;
console.log(idTrigger)
        // Resets iniciais
        $('#form_produto').trigger('reset');
        $('#form_destaque').trigger('reset');

        if (idTrigger === "btnCriaProduto") {
            $("#_method_manipula_produtos").val('POST');
            $("#form_produto").attr('action', "{{ route('admin.cria') }}");

        } else if (idTrigger == "editaProduto") {
            $('#input_nome').val(dados.nome);
            $('#valor_produto').val(dados.valor_produto);
            $('#input_estoque').val(dados.estoque);
            $('#tipo_venda').val(dados.tipo_de_venda);
            $("#_method_manipula_produtos").val('POST');
            $("#form_produto").attr('action', "{{ route('admin.edita', '') }}/" + dados.id);

        } else if (idTrigger == "excluiProduto") {
            $("#_method_excluir").val('DELETE');
            $("#formDeletar").attr('action', "{{ route('admin.delete', '') }}/" + dados.id);
            $('#textoConfirmacao').text(`Tem certeza que deseja excluir o produto ${dados.nome}?`);

        } else if (idTrigger === "btn-destaque") {
            preencherSelectProdutos(produtos.produtos);
            $('#_method_destaque').val('POST');
            $('#form_destaque').attr('action', "{{ route('admin.destaque') }}");

        } else if (idTrigger === "btn-edita-destaque") {
            preencherSelectProdutos(produtos.produtos);
            $('#input_destaque').val(dados.nome);
            const ids = dados.produtos.map(p => p.id);
            $('#produtos_destaque').val(ids).trigger('change');
            $('#_method_destaque').val('POST');
            $('#form_destaque').attr('action', "{{ route('admin.destaqueEdita', '') }}/" + dados.id);

        } else if (idTrigger === "btn-exclui-destaque") {
            $("#_method_excluir").val('DELETE');
            $("#formDeletar").attr('action', "{{ route('admin.exclui_destaque', '') }}/" + dados.id);
            $('#textoConfirmacao').text("Tem certeza que deseja excluir este grupo?");

        } else if (idTrigger === "btnMudaSlide") {
            // Lógica de slide...
            $('input[name="posicao"]').off('change').on('change', function() {
                let pos = $(this).val();
                let slide = dados.find(s => s.posicao == pos);
                if (slide) {
                    $("#_method_muda_slides").val('PATCH');
                    $("#formSlide").attr('action', "{{ route('slides.edita', '') }}/" + slide.id);
                }
            });
        }
    }

    $(document).ready(function() {
        $('#produtos_destaque').select2({
            theme: 'bootstrap-5',
            allowClear: true,
            placeholder: 'Selecione...',
            width: '100%',
            language: "pt-BR",
            dropdownParent: $(
                '#modal-destaque') // IMPORTANTE: Para funcionar dentro de modais Bootstrap
        });
    });
</script>
