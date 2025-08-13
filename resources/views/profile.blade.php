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
      @foreach ($user['data'] as $us)
      <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-8 col-sm-10">
        <img src="{{ Storage::disk('s3')->url($us->image) }}" class="border rounded-circle" alt="img perfil" height="100px" width="100px">
      </div>
      @endforeach
      <div class="col-12">
        <div class="row my-4">
          <h6 class="fw-bold letters-color">Informações Pessoais</h6>
        </div>
        <div class="row">
          @foreach ($user['data'] as $us)
            <form action="{{ route('profile.edita', ['id' => $us->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <label for="nome">NOME</label>
                <input type="text" class="form-control" name="nome" value="{{ $us->nome }}" placeholder="Digite seu nome">
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <label for="nome">DATA DE NASCIMENTO</label>
                <input type="text" class="form-control" name="data_nascimento"
                  value="{{ isset($us->data_nascimento) ? date('d/m/Y', strtotime($us->data_nascimento)) : null }}"
                  placeholder="Data de nascimento">
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <label for="nome">E-MAIL</label>
                <input type="text" class="form-control" name="email" value="{{ isset($us->email) ? $us->email : null }}"
                  placeholder="Informe um E-MAIL">
              </div>
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <label for="nome">Foto Perfil</label>
                <input id="input_image" class="form-control" type="file" name="image" accept="image/*">
              </div>
              <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-2 ">
                <button type="submit"
                  class="btn alpha-color border rounded text-white add-to-cart-btn bg-gradient fw-bold">
                  EDITAR
                </button>
              </div>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-layout>
