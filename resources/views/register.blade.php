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
                    <img style="height: 150px; width:400px" src="{{ asset('image/logo.jpg') }}" alt="logo">
                </div>
                <div id="content">
                    <form class="form-register d-flex justify-content-center row" method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="col-12 text-center">
                            <label for="name">Nome:</label><br>
                            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Digite o nome"><br>
                            @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <label for="birthdate">Data de nascimento:</label><br>
                            <input type="date" id="nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}"><br><br>
                            @error('data_nascimento')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <label for="email">E-mail:</label><br>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Digite seu E-mail"><br><br>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <label for="password">Senha:</label><br>
                            <input type="password" id="senha" name="senha" placeholder="Digite uma senha"><br><br>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
                <div id="footer" class="d-flex justify-content-center">
                    <img style="height: 150px; width:400px" src="{{ asset('image/logo.jpg') }}" alt="concretize">
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
.form-register input {
    border-radius: 5px;
    width: 60%;
}
</style>
