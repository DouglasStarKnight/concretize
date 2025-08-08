<div class="row">
  <div class="col-6">
    <label for="destaque">Nome do grupo destaque</label>
    <input type="text" class="form-control" name="nome" id="destaque" placeholder="Insira um nome">
  </div>
  {{-- @dd($produtos) --}}
  <div class="col-6">
    <label for="produtos_destaque">Quais produtos</label>
    <select modal_id="modal-destaque" class="form-select select2" name="produtos_id[]" id="produtos_destaque" multiple>
    </select>
  </div>
</div>
