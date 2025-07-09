<x-layout>
{{-- <div class="" style="justify-self: center"> --}}
    <div class="row g-0 align-self-center border border-danger w-50 justify-self-center rounded" style="justify-self: center">
        <div class=" row g-0 box-title my-4">
            <div class="col-1 d-flex justify-content-start align-items-center">
                <a class="text-decoration-none" href="{{route('inicio.index')}}">
                    <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i>
                </a>
            </div>
            <div class="col-10">
                <h4 class="text-center fw-bold">PERFIL</h4>
            </div>
        </div>
        <div class="row g-0 box-content">
            <div class="col-10">
               <img src="..." class="border rounded-circle" alt="...">
            </div>
            <div class="col-2 ">
                <button>editar</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <h6 class="fw-bold">Informações Pessoais</h6>
                </div>
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="nome">NOME</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="nome">DATA DE NASCIMENTO</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="nome">E-MAIL</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="nome">TESTE</label>
                    <input type="text" class="form-control">
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
{{-- </div> --}}
</x-layout>
