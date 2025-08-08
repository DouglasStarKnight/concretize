<div class="accordion" id="grupos">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        Grupos de produtos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#grupos">
      <div class="accordion-body">
        <div class="accordion" id="titulo">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#titulos"
                aria-expanded="true" aria-controls="titulos">
                {{$destaques['data'][0]->nome}}
              </button>
            </h2>
            <div id="titulos" class="accordion-collapse collapse" data-bs-parent="#titulo">
              <div class="accordion-body">
                <table class="table table-striped">
                  <thead>
                    <tr class="border border-2 border-dark rounded title-color">
                      <th class="col-auto ">NOME</th>
                      <th class="col-auto ">AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @dd($destaques) --}}
                    @foreach ($destaques['data'] as $destaque)
                      <tr class="border border-2">
                        <th class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ $destaque->produtos_id }}</th>
                        <th class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1">
                          <x-botaoModal id_button="btnTableExcluir" modal_id="deletaProduto" type="button"
                            class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                          </x-botaoModal>
                        </th>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
