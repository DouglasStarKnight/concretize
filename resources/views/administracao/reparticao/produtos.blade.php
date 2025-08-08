<div id="tableExcluir" class="mx-2">
      <div class="border border-bottom-0 border-2 border-dark rounded-top text-center">
        <h5 class="py-2 m-0">Pordutos Cadastrados</h5>
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
          @foreach ($produtos as $produto)
            <tr class="border border-2">
              <th class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">{{ $produto->id }}</th>
              <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ $produto->nome }}</th>
              <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1 money_mask">{{ $produto->valor_produto }}</th>
              <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1">{{ $produto->categoria_nome }}</th>
              <th class="col-xxl-2 col-lx-2 col-lg-2 col-md-2 col-sm-2">{{ $produto->estoque }}</th>
              <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ $produto->tipo_de_venda }}</th>
              <th class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">
                <x-botaoModal id_button="btnTableEdita" modal_id="modal-produto" type="button" class="btn btn-primary"
                  onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
                  <i class="fa-solid fa-pencil"></i>
                </x-botaoModal>
                <x-botaoModal id_button="btnTableExcluir" modal_id="deletaProduto" type="button" class="btn btn-danger"
                  onclick="manipulacao_modais(this, {!! json_encode($produto) !!})">
                  <i class="fa-solid fa-trash"></i>
                </x-botaoModal>
              </th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>