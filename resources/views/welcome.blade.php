<!DOCTYPE html>
<html lang="en">
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
                    <img style="height: 150px; width:400px" src="{{asset('image/345436371_779705427129635_4169249992040216313_n(1) (1).jpg')}}" alt="logo">
                </div>
                <div id="content">
                    @csrf
                    <form class="form-register d-flex justify-content-center row">
                        <div class="col-12 text-center">
                            <label for="fname">Nome:</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Digite o nome"><br>
                        </div>
                        <div class="col-12 text-center">
                            <label for="lname">Data de nascimento:</label><br>
                            <input type="text" id="lname" name="lname" placeholder="Digite a data de nascimento"><br><br>
                        </div>
                        <div class="col-12 text-center">
                            <label for="lname">E-mail:</label><br>
                            <input type="text" id="lname" name="lname" placeholder="Digite seu E-mail"><br><br>
                        </div>
                        <div class="col-12 text-center">
                            <label for="lname">Senha:</label><br>
                            <input type="text" id="lname" name="lname" placeholder="Digite uma senha"><br><br>
                        </div>
                        <input type="submit" value="Salvar">
                      </form>
                </div>
                <div id="footer" class="d-flex justify-content-center">
                    <img style="height: 150px; width:400px" src="{{asset('image/345436371_779705427129635_4169249992040216313_n(1) (1).jpg')}}" alt="concretize">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<style>
body{
    height: 100vh
}
#principal {
    height: 800px;
    width: 500px;
    border-color: #E67F25 !important;
    border-radius: 20px
}
.form-register input{
    border-radius: 5px;
    width: 70%
}

</style>
