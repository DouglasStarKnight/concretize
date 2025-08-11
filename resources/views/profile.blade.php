<x-layout class="d-flex justify-content-center h-100">
  <div class="row align-self-center border border-dark border-2 w-50 align-self-center rounded"
    style="background-color: #ffffff">
    <div class=" row box-title my-4">
      <div class="col-1 d-flex justify-content-start align-items-center">
        <a class="text-decoration-none" href="{{ route('inicio.index') }}">
          <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i>
        </a>
      </div>
      <div class="col-10">
        <h4 class="text-center fw-bold letters-color">PERFIL</h4>
      </div>
    </div>
    <div class="row box-content">
      <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-8 col-sm-10">
        <img src="{{ asset('image/oriPerfil.jpeg') }}" class="border rounded-circle" alt="img perfil" height="100px">
      </div>
      <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-2 ">
        <button class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
          EDITAR
        </button>
      </div>
      <div class="col-12">
        <div class="row my-4">
          <h6 class="fw-bold letters-color">Informações Pessoais</h6>
        </div>
        <div class="row">
          @foreach ($user['data'] as $us )
          @dd($us)
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
            <label for="nome">NOME</label>
            <input type="text" class="form-control" value="{{$us->nome}}" placeholder="Digite seu nome">
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
            <label for="nome">DATA DE NASCIMENTO</label>
            <input type="text" class="form-control" value="{{isset($us->data_nascimento) ? date("d/m/Y", strtotime($us->data_nascimento)) : null }}" placeholder="Data de nascimento">
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
            <label for="nome">E-MAIL</label>
            <input type="text" class="form-control" value="{{isset($us->email) ? $us->email : null}}" placeholder="Informe um E-MAIL">
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
            <label for="nome">TESTE</label>
            <input type="text" class="form-control">
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-layout>
