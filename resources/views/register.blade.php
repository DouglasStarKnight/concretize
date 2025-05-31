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
    <div class="d-flex justify-content-center align-items-center h-100">
        <div id="principal" class="border border-5">
            <div class="content">
                <div id="header" class="d-flex justify-content-center">
                    <img style="width:300px" src="{{ asset('image/logo.png') }}" alt="logo">
                </div>
                <div id="content">
                    <div class=" border-2 rounded m-4 alpha-color">
                        <h1 class="text-center text-light my-2">REGISTRE-SE</h1>
                    </div>
                    <form class="form-register" method="POST" action="{{ route('register.cria') }}">
                        @csrf
                        <div class="row m-2">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="col-12 mt-2">
                                    <label for="password">Nome:</label>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="text" id="nome" class="form-control" name="nome" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="col-12 mt-2">
                                    <label for="password">Data:</label>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="date" id="date" class="form-control" name="data_nascimento" placeholder="Digite sua data de nascimento">
                                </div>
                            </div>
                        </div>
                        <div class="row mx-2 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="col-12 mt-2">
                                    <label for="email" class="text-center">E-mail:</label>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu E-mail">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="col-12 mt-2">
                                    <label for="password">Senha:</label>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Digite uma senha">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        <div class="d-flex justify-content-end  my-5 me-3">
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
    height: 88vh;
    border-color: #E67F25 !important;
    border-radius: 20px;
}
.alpha-color{
    background-color: #fd7e14;
}

</style>
