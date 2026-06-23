<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <div>
        <h5 class="m-0 fw-bold text-brand">Grupos de destaque</h5>
        <small class="text-muted">Organize coleções promocionais para a vitrine</small>
    </div>
    <x-botaoModal id_button="btn-destaque" modal_id="modal-destaque"
        onclick="manipulacao_modais(this)">
        <i class="ph ph-plus-circle me-1"></i> Novo grupo
    </x-botaoModal>
</div>

<div class="accordion accordion-flush" id="accordionDestaques">
    @forelse ($destaques['data'] as $destaque)
    <div class="accordion-item">
        <div class="accordion-header d-flex align-items-center bg-white">
            <button class="accordion-button collapsed flex-grow-1 d-flex align-items-center gap-2"
                    type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $destaque['id'] }}">
                <i class="ph-fill ph-star text-accent"></i>
                <span class="fw-bold">{{ $destaque['nome'] }}</span>
                <span class="badge bg-light ms-2">{{ count($destaque['produtos']) }} itens</span>
            </button>

            <div class="pe-3 d-flex gap-1">
                <button type="button" id="btn-edita-destaque" class="btn btn-sm btn-light border"
                        data-bs-toggle="modal" data-bs-target="#modal-destaque"
                        onclick="manipulacao_modais(this, {{ $destaque['id'] }})"
                        title="Editar grupo">
                    <i class="fa-solid fa-pencil text-primary"></i>
                </button>
                <button type="button" class="btn btn-sm btn-light border btn-exclui-destaque"
                        data-bs-toggle="modal" data-bs-target="#modal-deleta"
                        onclick="manipulacao_modais('btn-exclui-destaque', {{ $destaque['id'] }})"
                        title="Excluir grupo">
                    <i class="fa-solid fa-trash text-danger"></i>
                </button>
            </div>
        </div>

        <div id="collapse{{ $destaque['id'] }}" class="accordion-collapse collapse"
             data-bs-parent="#accordionDestaques">
            <div class="accordion-body bg-light p-0">
                <table class="table table-sm table-hover m-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-2" style="width: 90px">ID</th>
                            <th class="py-2">Nome do produto</th>
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
    @empty
    <div class="surface-card p-5 text-center text-muted">
        <i class="ph ph-star" style="font-size: 2.5rem;"></i>
        <p class="mt-3 mb-0">Nenhum grupo de destaque criado ainda.</p>
    </div>
    @endforelse
</div>
