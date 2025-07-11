<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRE-SE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center h-100 row">
        <div id="principal" class="border border-5 col-6">
            <div class="content">
                <div class=" ms-3 mt-3">
                    <a href="{{route('inicio.index')}}" class="text-decoration-none">
                        <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i>
                    </a>
                </div>
                <div id="header" class="d-flex my-4 justify-content-center">
                    <img style="width:150px" src="{{ asset('image/logo.png') }}" alt="logo">
                </div>
                <div class="row justify-content-center mx-1">
                    <div class=" border-2 rounded m-2 p-0 alpha-color col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <h1 class="text-center text-light my-2">REGISTRE-SE</h1>
                    </div>
                </div>
                <div id="content">
                    <form class="form-register" method="POST" action="{{ route('register.cria') }}">
                        @csrf
                        <div class="d-flex row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-2">
                                <div class="">
                                    <label for="nome" class="text-center">NOME:</label>
                                </div>
                                <div class="">
                                    <input type="text" id="nome" class="form-control" name="nome" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-2">
                                <div class="">
                                    <label for="password">Data:</label>
                                </div>
                                <div class="">
                                    <input type="date" id="date" class="form-control" name="data_nascimento" placeholder="Digite sua data de nascimento">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-2">
                                <div class="">
                                    <label for="email" class="text-center">E-mail:</label>
                                </div>
                                <div class="">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu E-mail">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 my-2">
                                <div class="">
                                    <label for="password">Senha:</label><br>
                                </div>
                                <div class="">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Digite uma senha">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        <div class="d-flex justify-content-end me-3">
                            <a href="{{route('login.index')}}">Possui cadastro? Faça login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<style>
body {
    height: 100vh;
}
#principal {
    /* height: 88vh; */
    border-color: #fd7e14 !important;
    border-radius: 20px;
}
.alpha-color{
    background-color: #fd7e14;
}

</style>
