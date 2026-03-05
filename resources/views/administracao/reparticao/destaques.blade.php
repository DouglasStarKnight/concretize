<div class="d-flex justify-content-between align-items-center my-3 px-2">
    <h5 class="fw-bold m-0 text-dark">Grupos de Destaque</h5>
    <x-botaoModal id_button="btn-destaque" modal_id="modal-destaque" 
        class="btn-warning shadow-sm" 
        onclick="manipulacao_modais('btn-destaque')">
        <i class="ph ph-plus-circle fw-bold me-1"></i> NOVO GRUPO
    </x-botaoModal>
</div>

<div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden" id="accordionDestaques">
    @foreach ($destaques['data'] as $destaque)
    <div class="accordion-item border-bottom">
        <div class="accordion-header d-flex align-items-center bg-white">
            <button class="accordion-button collapsed flex-grow-1" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse{{ $destaque['id'] }}">
                <span class="fw-bold text-primary">{{ $destaque['nome'] }}</span>
                <span class="badge bg-light text-dark border ms-2">{{ count($destaque['produtos']) }} itens</span>
            </button>
            
            <div class="pe-3 d-flex gap-1">
                <button type="button" class="btn btn-sm btn-outline-primary border-0" 
                    data-bs-toggle="modal" data-bs-target="#modal-destaque"
                    onclick="manipulacao_modais('btn-edita-destaque', {{ $destaque['id'] }})">
                    <i class="fa-solid fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger border-0" 
                    data-bs-toggle="modal" data-bs-target="#modal-deleta"
                    onclick="manipulacao_modais('btn-exclui-destaque', {{ $destaque['id'] }})">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>

        <div id="collapse{{ $destaque['id'] }}" class="accordion-collapse collapse" data-bs-parent="#accordionDestaques">
            <div class="accordion-body bg-light p-0">
                <table class="table table-sm table-hover m-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4 py-2" style="width: 80px">ID</th>
                            <th class="py-2">NOME DO PRODUTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destaque['produtos'] as $produto)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#{{ $produto['id'] }}</td>
                            <td>{{ $produto['nome'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
    /* Remove a borda azul chata do bootstrap ao focar no accordion */
    .accordion-button:focus { box-shadow: none; }
    .accordion-button:not(.collapsed) { background-color: #f8f9fa; color: #6e6eff; }
    
    /* Efeito de listra na tabela interna */
    .accordion-body .table tbody tr { transition: 0.2s; }
    .accordion-body .table tbody tr:hover { background-color: #fff1e6 !important; }
</style>