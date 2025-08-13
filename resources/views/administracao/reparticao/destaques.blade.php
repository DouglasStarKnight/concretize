<div style="justify-self: end" class="my-2">
        <x-botaoModal id_button="btn-destaque" modal_id="modal-destaque" class="btn-warning border border-dark"
          style="margin: 5px" title="Insira as informações" onclick="manipulacao_modais(this, {!! json_encode($produtos) !!})">
          <h2 style="font-size: 15px">PRODUTOS DESTAQUES</h2>
        </x-botaoModal>
      </div>
@foreach ($destaques['data'] as $destaque)
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header row">
        <div class="col-11">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne{{ $destaque['id'] }}" aria-expanded="false" aria-controls="flush-collapseOne">
              {{ $destaque['nome'] }}
            </button>
        </div>
        <div class="col-1">
            <x-botaoModal id_button="btn-edita-destaque" modal_id="modal-destaque" onclick="manipulacao_modais(this, {!! json_encode($destaque) !!})"><i class="fa-solid fa-pencil"></i></x-botaoModal>
            <x-botaoModal id_button="btn-exclui-destaque" class="bg-danger" modal_id="modal-deleta" onclick="manipulacao_modais(this, {!! json_encode($destaque) !!})"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></x-botaoModal>
        </div>
      </h2>
      <div id="flush-collapseOne{{ $destaque['id'] }}" class="accordion-collapse collapse"
        data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <table class="table table-striped">
            <thead>
              <tr class="border border-2 border-dark rounded title-color">
                <th class="col-auto">#</th>
                <th class="col-auto">PRODUTOS</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($destaque['produtos'] as $index => $produto)
                <tr class="border border-2">
                  <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{$produto['id']}}</td>
                  <td class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{$produto['nome']}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endforeach
