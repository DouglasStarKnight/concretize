<div style="justify-self: end" class="my-2">
  <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide" class="btn-warning border shadow" style="margin: 5px"
    title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($slides) !!})">
    <h2 style="font-size: 15px">TROCAR SLIDES</h2>
  </x-botaoModal>
  <x-botaoModal id_button="btnCriaProduto" modal_id="modal-produto" class="btn-warning border shadow"
    style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
    <h2 style="font-size: 15px">ADICIONAR PRODUTO</h2>
  </x-botaoModal>
</div>
<div id="tableExcluir" class="mx-2 card-admin border-0 shadow-sm overflow-hidden">
  {{-- Header da Tabela mais limpo --}}
  <div class="title-color p-3 text-center rounded-top">
    <h5 class="text-white m-0 fw-bold">Produtos Cadastrados</h5>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3 py-3 border-0 text-secondary">#</th>
          <th class="py-3 border-0 text-secondary">NOME</th>
          <th class="py-3 border-0 text-secondary">VALOR</th>
          <th class="py-3 border-0 text-secondary">CATEGORIA</th>
          <th class="py-3 border-0 text-secondary text-center">ESTOQUE</th>
          <th class="py-3 border-0 text-secondary">TIPO DE VENDA</th>
          <th class="pe-3 py-3 border-0 text-secondary text-end">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produtos['produtos'] as $produto)
          <tr class="border-bottom">
            <td class="ps-3 fw-bold text-muted">{{ $produto->id ?? '' }}</td>
            <td class="fw-semibold">{{ $produto->nome ?? '' }}</td>
            <td class="money_mask text-success fw-medium">R$ {{ $produto->valor_produto ?? '0,00' }}</td>
            <td>
                <span class="badge bg-light text-dark border fw-normal">
                    {{ $produto->categoria_nome ?? 'Geral' }}
                </span>
            </td>
            <td class="text-center">
                {{-- Badge dinâmica para estoque --}}
                <span class="badge {{ ($produto->estoque < 10) ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' }} rounded-pill">
                    {{ $produto->estoque ?? '0' }}
                </span>
            </td>
            <td>{{ $produto->tipo_de_venda ?? '' }}</td>
            <td class="pe-3 text-end">
              <div class="btn-group shadow-sm rounded-pill overflow-hidden" role="group">
                <button
                    type="button"
                    id="editaProduto"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-produto"
                    class="btn btn-sm btn-white border-0 py-2 px-3"
                    onclick="manipulacao_modais(this, {{ json_encode($produto) }})"
                    title="Editar">
                    <i class="fa-solid fa-pencil text-primary"></i>
                </button>
                <button
                    type="button"
                    id="excluiProduto"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-deleta"
                    class="btn btn-sm btn-white border-0 py-2 px-3"
                    onclick="manipulacao_modais(this, {{ json_encode($produto) }})"
                    title="Excluir">
                    <i class="fa-solid fa-trash text-danger"></i>
                </button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="title-color p-3 text-center rounded-bottom">
    <h5 class="text-white m-0 fw-bold">Paginação</h5>
  </div>
</div>
{{-- <nav aria-label="..." class="d-flex justify-content-center">
  <ul class="pagination">
    <li class="page-item"><a href="#" class="page-link">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#" aria-current="page">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Proxima</a></li>
  </ul>
</nav> --}}
