<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PERFIL</title>
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
            <div class="alpha-color m-5 rounded row">
                <div class="col-1 d-flex align-items-center">
                    <a href="{{route('inicio.index')}}" class="text-decoration-none">
                        <i class="ph ph-arrow-circle-left" style="font-size:35px; color:black"></i> 
                    </a>
                </div>
                <div class="col-11">
                    <h2 class="text-center text-light font-weight-bold"><strong>PERFIL</strong></h2>
                </div>
            </div>
            @foreach($user as $user)
            <div class="content">
                <div class="row mx-0 mb-4">
                    <div id="header" class=" col-3 d-flex justify-content-end">
                        <img src="{{ Storage::disk('s3')->url($user->image) }}" class="img-thumbnail rounded" alt="Perfil" width="150px">
                    </div>
                    <div class="col-9 d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <h5> {{$user->nome}}</h5>
                            </div>
                            <div class="col-12">
                                <h5>{{$user->data_nascimento}}</h5>
                            </div>
                            <div class="col-12">
                                <h5>{{$user->email}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alpha-color m-5 rounded">
                    <h2 class="text-center text-light font-weight-bold"><strong>INFORMAÇẼS PESSOAIS</strong></h2>
                </div>
                <div id="informacoes">
                    <form class="form-register" method="POST" enctype="multipart/form-data" action="{{ route('profile.atualiza',['id' => $user->id]) }}">
                        @csrf
                        <div class="row mx-2 mt-5">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="col-12">
                                    <label for="password">Nome:</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" id="nome" class="form-control" name="nome" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="col-12">
                                        <label for="date">Data:</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" id="date" class="form-control" name="data_nascimento" placeholder="Digite sua data de nascimento">
                                    </div>
                            </div>
                        </div>
                        <div class="row mx-2 my-5">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="col-12">
                                        <label for="email" class="text-center">E-mail:</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Digite seu novo E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="col-12">
                                            <label for="image">imagem de peefil:</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="file" id="image" class="form-control" name="image" placeholder="Digite uma senha">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            @endforeach
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
    border-color: #E67F25 !important;
    border-radius: 20px;
}
.alpha-color{
    background-color: #fd7e14;
}
</style>
<script>
    
</script>
