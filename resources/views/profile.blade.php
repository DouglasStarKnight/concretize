<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Concretize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center h-100">
        <div id="principal" class="border border-5">
            <div class="content">
                <div class="row">
                    <div id="header" class="mt-5 col-6">
                        <img src="{{ asset('image/profile-circle-svgrepo-com.svg') }}" class="img-thumbnail rounded" alt="Perfil" height="60px" width="100px">
                    </div>
                    <div class="col-6">
                        oi
                    </div>
                </div>
                    <div id="content">
                    <form class="form-register" method="POST" action="{{ route('register.cria') }}">
                        @csrf
                        <div class="row m-2">
                            <div class="col-6">
                                <label for="password">Nome:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" id="nome" class="form-control" name="nome" placeholder="Digite seu nome">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-6">
                                <label for="password">Data:</label>
                            </div>
                            <div class="col-6">
                                <input type="date" id="date" class="form-control" name="data_nascimento" placeholder="Digite sua data de nascimento">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-6">
                                <label for="email" class="text-center">E-mail:</label>
                            </div>
                            <div class="col-6">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu E-mail">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-6">
                                <label for="password">Senha:</label>
                            </div>
                            <div class="col-6">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Digite uma senha">
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
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
    height: 88%;
    width: 40%;
    border-color: #E67F25 !important;
    border-radius: 20px;
}

</style>
