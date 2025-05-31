<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Concretize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('app.js') }}"></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center h-100">
        <div id="principal" class="border border-5">
            <div class="content">
                <div class=" ms-3 mt-3">
                    <a href="{{route('inicio.index')}}" class="text-decoration-none">
                        <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i>
                    </a>
                </div>
                <div id="header" class="d-flex my-4 justify-content-center">
                    <img style="width:150px" src="{{ asset('image/logo.png') }}" alt="logo">
                </div>
                <div class=" border-2 rounded m-4 alpha-color">
                        <h1 class="text-center text-light my-2">REGISTRE-SE</h1>
                    </div>
                <div id="content">
                    <form class="form-register" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="row mx-2">
                            <div class="col-12">
                                <label for="email" class="text-center">E-mail:</label>
                            </div>
                            <div class="col-12">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu E-mail"><br><br>
                            </div>
                        </div>
                        <hr class="mx-4">
                        <div class="row m-2">
                            <div class="col-12">
                                <label for="password">Senha:</label><br>
                            </div>
                            <div class="col-12">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Digite uma senha">
                            </div>
                        </div>
                        <div class="col-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        <div class="d-flex justify-content-end me-3">
                            <a href="{{route('register.index')}}">Não possui cadastro? Registre-se</a>
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
    height: 80%;
    border-color: #E67F25 !important;
    border-radius: 20px;
}
.alpha-color{
    background-color: #fd7e14;
}
</style>
