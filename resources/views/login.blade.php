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
                <div id="header" class="d-flex justify-content-center">
                    <img style="width:350px" src="{{ asset('image/logo.png') }}" alt="logo">
                </div>
                <div id="content">
                    <form class="form-register" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="row mx-2 mt-5">
                            <div class="col-12">
                                <label for="email" class="text-center">E-mail:</label>
                            </div>
                            <div class="col-12">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu E-mail"><br><br>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-12">
                                <label for="password">Senha:</label><br>
                            </div>
                            <div class="col-12">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Digite uma senha">
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary">Salvar</button>
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
    height: 88%;
    width: 40%;
    border-color: #E67F25 !important;
    border-radius: 20px;
}

</style>
