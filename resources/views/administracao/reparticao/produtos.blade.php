<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
  <div>
    <h5 class="m-0 fw-bold text-brand">Produtos cadastrados</h5>
    <small class="text-muted">Gerencie o catálogo da sua loja</small>
  </div>
  <div class="d-flex gap-2">
    <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide"
      title="Trocar slides do banner"
      onclick="manipulacao_modais(this, {!! json_encode($slides) !!})">
      <i class="ph ph-image me-1"></i> Trocar slides
    </x-botaoModal>
    <x-botaoModal id_button="btnCriaProduto" modal_id="modal-produto"
      title="Adicionar novo produto"
      onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
      <i class="ph ph-plus-circle me-1"></i> Adicionar produto
    </x-botaoModal>
  </div>
</div>
<div id="tableProdutos" class="card-admin">
  <div class="table-responsive">
    <table class="table table-striped align-middle mb-0">
      <thead>
        <tr>
          <th class="bg-primary text-white" style="border-radius: 5px 0px 0px 0px; width:30%;">#</th>
          <th class="bg-primary text-white">Nome</th>
          <th class="bg-primary text-white">Valor</th>
          <th class="bg-primary text-white">Categoria</th>
          <th class="bg-primary text-white">Estoque</th>
          <th class="bg-primary text-white">Tipo de venda</th>
          <th class="bg-primary text-white" style="border-radius: 0px 5px 0px 0px;">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($produtos['produtos'] as $produto)
          <tr>
            <td class="ps-4 fw-bold text-muted">#{{ $produto->id ?? '' }}</td>
            <td class="fw-semibold">{{ $produto->nome ?? '' }}</td>
            <td class="money_mask text-success fw-semibold">R$ {{ $produto->valor_produto ?? '0,00' }}</td>
            <td>
              <span class="badge bg-secondary-subtle text-dark">{{ $produto->categoria_nome ?? 'Geral' }}</span>
            </td>
            <td class="text-center">
              <span class="badge {{ ($produto->estoque < 10) ? 'bg-danger-subtle text-dark' : 'bg-success-subtle text-dark' }} rounded-pill px-3">
                {{ $produto->estoque ?? '0' }}
              </span>
            </td>
            <td class="text-muted">{{ $produto->tipo_de_venda ?? '—' }}</td>
            <td class="pe-4 text-end">
              <div class="btn-group" role="group">
                <button type="button"
                        data-bs-toggle="modal" data-bs-target="#modal-produto"
                        class="btn editaProduto btn-sm btn-light border"
                        onclick="manipulacao_modais(this, {{ json_encode($produto) }})"
                        title="Editar">
                  <i class="fa-solid fa-pencil text-primary"></i>
                </button>
                <button type="button"
                        data-bs-toggle="modal" data-bs-target="#modal-deleta"
                        class="btn excluiProduto btn-exclui-produto btn-sm btn-light border"
                        onclick="manipulacao_modais(this, {{ json_encode($produto) }})"
                        title="Excluir">
                  <i class="fa-solid fa-trash text-danger"></i>
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">
              <i class="ph ph-package" style="font-size:2.5rem;"></i>
              <p class="mt-2 mb-0">Nenhum produto cadastrado ainda.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Rodapé / paginação --}}
  <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top bg-light">
    <small class="text-muted">
      Mostrando {{ count($produtos['produtos'] ?? []) }} produto(s)
    </small>
    {{-- <nav>{{ $produtos->links() }}</nav> --}}
  </div>
</div>
