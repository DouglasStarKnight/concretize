<div style="justify-self: end" class="my-2">
  <x-botaoModal id_button="btnMudaSlide" modal_id="mudaSlide" class="btn-warning border border-dark" style="margin: 5px"
    title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($slides) !!})">
    <h2 style="font-size: 15px">TROCAR SLIDES</h2>
  </x-botaoModal>
  <x-botaoModal id_button="btnCriaProduto" modal_id="modal-produto" class="btn-warning border border-dark"
    style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
    <h2 style="font-size: 15px">ADICIONAR PRODUTO</h2>
  </x-botaoModal>
</div>
<div id="tableExcluir" class="mx-2">
  <div class="border border-bottom-0 border-2 border-dark rounded-top text-center">
    <h5 class="py-2 m-0">Produtos Cadastrados</h5>
  </div>
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
      @foreach ($produtos['produtos'] as $produto)
        <tr class="border border-2">
          <td class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">{{ !empty($produto->id) ? $produto->id : '' }}</td>
          <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ isset($produto->nome) ? $produto->nome : '' }}</td>
          <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1 money_mask">{{ isset($produto->valor_produto) ? $produto->valor_produto : '' }}</td>
          <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1">{{ isset($produto->categoria_nome) ? $produto->categoria_nome : '' }}</td>
          <td class="col-xxl-2 col-lx-2 col-lg-2 col-md-2 col-sm-2">{{ isset($produto->estoque) ? $produto->estoque : '' }}</td>
          <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ isset($produto->tipo_de_venda) ? $produto->tipo_de_venda : '' }}</td>
          <td class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">
            <x-botaoModal id_button="btnTableEdita" modal_id="modal-produto" type="button" class="btn btn-primary"
              onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
              <i class="fa-solid fa-pencil"></i>
            </x-botaoModal>
            <x-botaoModal id_button="btnTableExcluir" modal_id="modal-deleta" type="button" class="btn btn-danger"
              onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
              <i class="fa-solid fa-trash"></i>
            </x-botaoModal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
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
